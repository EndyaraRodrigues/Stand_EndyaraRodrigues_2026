<?php
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ViaturaController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::resource('clientes', ClienteController::class);
Route::resource('viaturas', ViaturaController::class);
Route::resource('vendas', VendaController::class);

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/editarcliente/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/gravaralteracao/{id}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/eliminar/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    Route::get('/viaturas', [ViaturaController::class, 'index'])->name('viaturas.index');
    Route::get('/viaturas/create', [ViaturaController::class, 'create'])->name('viaturas.create');
    Route::post('/viaturas', [ViaturaController::class, 'store'])->name('viaturas.store');
    Route::get('/viaturas/{id}', [ViaturaController::class, 'show'])->name('viaturas.show');
    Route::get('/editarviatura/{id}', [ViaturaController::class, 'edit'])->name('viaturas.edit');
    Route::put('/gravaralteracao/{id}', [ViaturaController::class, 'update'])->name('viaturas.update');
    Route::delete('/eliminar/{id}', [ViaturaController::class, 'destroy'])->name('viaturas.destroy');
