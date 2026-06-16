@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-person-plus me-2 text-primary"></i>Novo Cliente</h2>
        <p>Preenche os dados do novo cliente</p>
    </div>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome"
                           class="form-control @error('nome') is-invalid @enderror"
                           value="{{ old('nome') }}" placeholder="Nome completo">
                    @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" placeholder="email@exemplo.com">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone"
                           class="form-control @error('telefone') is-invalid @enderror"
                           value="{{ old('telefone') }}" placeholder="9XXXXXXXX">
                    @error('telefone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">NIF</label>
                    <input type="text" name="nif"
                           class="form-control @error('nif') is-invalid @enderror"
                           value="{{ old('nif') }}" placeholder="XXXXXXXXX">
                    @error('nif') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Morada</label>
                    <input type="text" name="morada"
                           class="form-control @error('morada') is-invalid @enderror"
                           value="{{ old('morada') }}" placeholder="Rua, cidade...">
                    @error('morada') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 mt-2">
                    <hr>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-1"></i> Guardar Cliente
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
