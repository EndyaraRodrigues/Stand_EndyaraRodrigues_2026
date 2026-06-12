@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-3">Detalhes da Viatura</h4>
            <p><strong>ID:</strong> {{ $viatura->id }}</p>
            <p><strong>Marca:</strong> {{ $viatura->marca }}</p>
            <p><strong>Modelo:</strong> {{ $viatura->modelo }}</p>
            <p><strong>Matrícula:</strong> {{ $viatura->matricula }}</p>
            <p><strong>Ano:</strong> {{ $viatura->ano }}</p>
            <p><strong>Quilómetros:</strong> {{ $viatura->quilometros }}</p>
            <p><strong>Preço (€):</strong> {{ $viatura->preco }}</p>
            <p><strong>Estado:</strong> {{ $viatura->estado }}</p>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('viaturas.edit', $viatura) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('viaturas.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection

