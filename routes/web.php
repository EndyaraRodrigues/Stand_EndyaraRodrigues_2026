<?php
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ViaturaController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Se já estiver autenticado vai para as viaturas
    if (Auth::check()) {
        return redirect()->route('viaturas.index');
    }
    // Se não estiver, vai para o registo
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return redirect()->route('viaturas.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('clientes', ClienteController::class);
Route::resource('viaturas', ViaturaController::class);
Route::resource('vendas', VendaController::class);

});

require __DIR__.'/auth.php';

