@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-pencil me-2 text-warning"></i>Editar Viatura</h2>
        <p>{{ $viatura->marca }} {{ $viatura->modelo }} — {{ $viatura->matricula }}</p>
    </div>
    <a href="{{ route('viaturas.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('viaturas.update', $viatura) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Marca</label>
                    <input type="text" name="marca" class="form-control"
                           value="{{ old('marca', $viatura->marca) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control"
                           value="{{ old('modelo', $viatura->modelo) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Matrícula</label>
                    <input type="text" name="matricula" class="form-control"
                           value="{{ old('matricula', $viatura->matricula) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Ano</label>
                    <input type="number" name="ano" class="form-control"
                           value="{{ old('ano', $viatura->ano) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Quilómetros</label>
                    <div class="input-group">
                        <input type="number" name="quilometros" class="form-control"
                               value="{{ old('quilometros', $viatura->quilometros) }}">
                        <span class="input-group-text">km</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Preço</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="preco" class="form-control"
                               value="{{ old('preco', $viatura->preco) }}">
                        <span class="input-group-text">€</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="disponivel" {{ $viatura->estado == 'disponivel' ? 'selected' : '' }}>✅ Disponível</option>
                        <option value="vendida"    {{ $viatura->estado == 'vendida'    ? 'selected' : '' }}>❌ Vendida</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Nova Foto</label>
                    <input type="file" name="foto" accept="image/*" class="form-control">
                </div>

                @if($viatura->foto)
                <div class="col-12">
                    <label class="form-label">Foto Atual</label><br>
                    <img src="{{ asset('storage/' . $viatura->foto) }}"
                         height="100" style="border-radius:10px; object-fit:cover;">
                </div>
                @endif

                <div class="col-12 mt-2">
                    <hr>
                    <button type="submit" class="btn btn-warning px-4">
                        <i class="bi bi-check-lg me-1"></i> Atualizar Viatura
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
