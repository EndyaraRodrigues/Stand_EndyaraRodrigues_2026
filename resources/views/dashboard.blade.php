@extends('layouts.app')

@section('content')

<div class="container">
    <div class="mb-4">
        <h2>👋 Bem-vindo, {{ Auth::user()->name }}</h2>
        <p class="text-muted">Painel de Controlo</p>
    </div>


<div class="row g-4">

    <div class="col-md-4">
        <a href="{{ route('clientes.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill text-primary fs-1"></i>
                    <h4 class="mt-3">Clientes</h4>
                    <p class="text-muted">Gerir clientes registados</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('viaturas.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-car-front-fill text-danger fs-1"></i>
                    <h4 class="mt-3">Viaturas</h4>
                    <p class="text-muted">Consultar viaturas</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('vendas.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-cash-stack text-success fs-1"></i>
                    <h4 class="mt-3">Vendas</h4>
                    <p class="text-muted">Consultar vendas</p>
                </div>
            </div>
        </a>
    </div>

</div>


</div>

@endsection

