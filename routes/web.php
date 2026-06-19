<?php
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ViaturaController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstatisticaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AvaliacaoController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', [ViaturaController::class, 'index'])->name('viaturas.index');

// Página pública de estatísticas
Route::get('/estatisticas', [EstatisticaController::class, 'index'])->name('estatisticas.index');

// Guardar uma nova review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Avaliações de carros para venda
Route::get('/avaliacoes/pedir', [AvaliacaoController::class, 'create'])->name('avaliacoes.create');
Route::post('/avaliacoes', [AvaliacaoController::class, 'store'])->name('avaliacoes.store');
Route::get('/avaliacoes/confirmado', [AvaliacaoController::class, 'confirmado'])->name('avaliacoes.pedido.confirmado');

// Página pública de contactos / endereço
Route::get('/contactos', function () {
    return view('contactos');
})->name('contactos');

// Página "welcome"
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

// Gestão de pedidos de avaliação - autenticado
Route::get('/avaliacoes', [AvaliacaoController::class, 'index'])->name('avaliacoes.index');
Route::get('/avaliacoes/{avaliacao}', [AvaliacaoController::class, 'show'])->name('avaliacoes.show');
Route::put('/avaliacoes/{avaliacao}', [AvaliacaoController::class, 'update'])->name('avaliacoes.update');
Route::delete('/avaliacoes/{avaliacao}', [AvaliacaoController::class, 'destroy'])->name('avaliacoes.destroy');

// Ver detalhes de uma viatura é público - tem de vir DEPOIS do grupo de rotas
// protegidas de viaturas (create, edit, etc.), para não capturar essas rotas
Route::get('/viaturas/{viatura}', [ViaturaController::class, 'show'])->name('viaturas.show');

require __DIR__.'/auth.php';
