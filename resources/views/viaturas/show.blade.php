<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold">Detalhes da viatura</h2>
    </x-slot>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $viatura ->id }}</p>
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
</x-app-layout>
</body>
</html>
        
