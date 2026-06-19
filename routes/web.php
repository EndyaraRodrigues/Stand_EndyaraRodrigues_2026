<?php
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ViaturaController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstatisticaController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Página inicial pública: mostra a lista de viaturas, sem precisar login
Route::get('/', [ViaturaController::class, 'index'])->name('viaturas.index');

// Página pública de estatísticas: gráficos de vendas, valor, clientes e reviews
Route::get('/estatisticas', [EstatisticaController::class, 'index'])->name('estatisticas.index');

// Guardar uma nova review - ação pública, qualquer visitante pode avaliar
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Página pública de contactos / endereço - apenas leitura, sem necessidade de login
Route::get('/contactos', function () {
    return view('contactos');
})->name('contactos');

// Página "welcome": ecrã de boas-vindas para quem ainda não tem sessão
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Dashboard com os cards de acesso (Clientes, Viaturas, Vendas)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de Clientes - só para utilizadores autenticados
    Route::resource('clientes', ClienteController::class);

    // CRUD de Viaturas (criar, editar, apagar) - só para autenticados.
    // IMPORTANTE: isto tem de vir ANTES da rota pública /viaturas/{viatura},
    // senão "/viaturas/create" é interpretado como "/viaturas/{id}" com id="create"
    Route::resource('viaturas', ViaturaController::class)->except(['index', 'show']);

    // CRUD de Vendas - só para utilizadores autenticados
    Route::resource('vendas', VendaController::class);
});

// Ver detalhes de uma viatura é público - tem de vir DEPOIS do grupo de rotas
// protegidas de viaturas (create, edit, etc.), para não capturar essas rotas
Route::get('/viaturas/{viatura}', [ViaturaController::class, 'show'])->name('viaturas.show');

require __DIR__.'/auth.php';
