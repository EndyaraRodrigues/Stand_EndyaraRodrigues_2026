@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-receipt me-2 text-info"></i>Venda #{{ $venda->id }}</h2>
        <p>Detalhes da venda</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('vendas.edit', $venda) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Editar
        </a>
        <a href="{{ route('vendas.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white"><strong><i class="bi bi-person me-2"></i>Cliente</strong></div>
            <div class="card-body">
                <p class="mb-1"><strong>Nome:</strong> {{ $venda->cliente->nome }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $venda->cliente->email }}</p>
                <p class="mb-0"><strong>Telefone:</strong> {{ $venda->cliente->telefone }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white"><strong><i class="bi bi-car-front me-2"></i>Viatura</strong></div>
            <div class="card-body">
                <p class="mb-1"><strong>Marca/Modelo:</strong> {{ $venda->viatura->marca }} {{ $venda->viatura->modelo }}</p>
                <p class="mb-1"><strong>Matrícula:</strong> {{ $venda->viatura->matricula }}</p>
                <p class="mb-0"><strong>Ano:</strong> {{ $venda->viatura->ano }}</p>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white"><strong><i class="bi bi-cash me-2"></i>Dados da Venda</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted mb-1 small">Data da Venda</p>
                        <p class="fw-bold">{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1 small">Valor</p>
                        <p class="fw-bold text-success fs-4">{{ number_format($venda->valor_venda, 2) }}€</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1 small">Observações</p>
                        <p class="fw-bold">{{ $venda->observacoes ?? '—' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
