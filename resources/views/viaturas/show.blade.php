@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-car-front me-2 text-info"></i>{{ $viatura->marca }} {{ $viatura->modelo }}</h2>
        <p>Matrícula: {{ $viatura->matricula }}</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('viaturas.edit', $viatura) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Editar
        </a>
        <a href="{{ route('viaturas.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-5">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center justify-content-center p-0" style="min-height:260px;">
                @if($viatura->foto)
                    <img src="{{ asset('storage/' . $viatura->foto) }}"
                         class="img-fluid w-100" style="border-radius:16px; object-fit:cover; max-height:280px;">
                @else
                    <div class="text-center text-muted">
                        <i class="bi bi-image fs-1"></i>
                        <p class="mt-2">Sem foto</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card h-100">
            <div class="card-header bg-white">
                <strong>Informações da Viatura</strong>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td class="text-muted" width="40%">Marca</td>
                        <td><strong>{{ $viatura->marca }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Modelo</td>
                        <td><strong>{{ $viatura->modelo }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Matrícula</td>
                        <td><span class="badge bg-secondary fs-6">{{ $viatura->matricula }}</span></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Ano</td>
                        <td><strong>{{ $viatura->ano }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Quilómetros</td>
                        <td><strong>{{ number_format($viatura->quilometros) }} km</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Preço</td>
                        <td><strong class="text-success fs-5">{{ number_format($viatura->preco, 2) }}€</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Estado</td>
                        <td>
                            @if($viatura->estado === 'disponivel')
                                <span class="badge bg-success fs-6"><i class="bi bi-check-circle me-1"></i>Disponível</span>
                            @else
                                <span class="badge bg-danger fs-6"><i class="bi bi-x-circle me-1"></i>Vendida</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
