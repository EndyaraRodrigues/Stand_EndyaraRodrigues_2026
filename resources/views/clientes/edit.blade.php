@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-pencil me-2 text-warning"></i>Editar Cliente</h2>
        <p>{{ $cliente->nome }}</p>
    </div>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control"
                           value="{{ old('nome', $cliente->nome) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $cliente->email) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control"
                           value="{{ old('telefone', $cliente->telefone) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">NIF</label>
                    <input type="text" name="nif" class="form-control"
                           value="{{ old('nif', $cliente->nif) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Morada</label>
                    <input type="text" name="morada" class="form-control"
                           value="{{ old('morada', $cliente->morada) }}">
                </div>

                <div class="col-12 mt-2">
                    <hr>
                    <button type="submit" class="btn btn-warning px-4">
                        <i class="bi bi-check-lg me-1"></i> Atualizar Cliente
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
