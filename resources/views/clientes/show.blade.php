@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-person me-2 text-info"></i>{{ $cliente->nome }}</h2>
        <p>Detalhes do cliente</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Editar
        </a>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white">
        <strong>Informações do Cliente</strong>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-2 text-center">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                     style="width:80px;height:80px;font-size:2rem;font-weight:700;">
                    {{ strtoupper(substr($cliente->nome, 0, 1)) }}
                </div>
            </div>
            <div class="col-md-10">
                <table class="table table-borderless">
                    <tr>
                        <td class="text-muted" width="20%">Nome</td>
                        <td><strong>{{ $cliente->nome }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email</td>
                        <td>{{ $cliente->email }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Telefone</td>
                        <td>{{ $cliente->telefone }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Morada</td>
                        <td>{{ $cliente->morada }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">NIF</td>
                        <td><span class="badge bg-secondary fs-6">{{ $cliente->nif }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
