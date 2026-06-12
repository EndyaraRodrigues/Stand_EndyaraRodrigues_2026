@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-3">Detalhes do Cliente</h4>
            <p><strong>ID:</strong> {{ $cliente->id }}</p>
            <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
            <p><strong>Email:</strong> {{ $cliente->email }}</p>
            <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
            <p><strong>Morada:</strong> {{ $cliente->morada }}</p>
            <p><strong>NIF:</strong> {{ $cliente->nif }}</p>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
