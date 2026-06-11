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
        <h2 class="fw-bold">Detalhes do Cliente</h2>
    </x-slot>

    <div class="card shadow-sm">
        <div class="card-body">
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
</x-app-layout>
</body>
</html>
