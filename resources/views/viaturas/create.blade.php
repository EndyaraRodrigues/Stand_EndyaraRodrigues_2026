@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-plus-circle me-2 text-danger"></i>Nova Viatura</h2>
        <p>Preenche os dados da nova viatura</p>
    </div>
    <a href="{{ route('viaturas.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('viaturas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Marca</label>
                    <input type="text" name="marca"
                           class="form-control @error('marca') is-invalid @enderror"
                           value="{{ old('marca') }}" placeholder="Ex: Toyota">
                    @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo"
                           class="form-control @error('modelo') is-invalid @enderror"
                           value="{{ old('modelo') }}" placeholder="Ex: Corolla">
                    @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Matrícula</label>
                    <input type="text" name="matricula"
                           class="form-control @error('matricula') is-invalid @enderror"
                           value="{{ old('matricula') }}" placeholder="Ex: AA-12-BB">
                    @error('matricula') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Ano</label>
                    <input type="number" name="ano"
                           class="form-control @error('ano') is-invalid @enderror"
                           value="{{ old('ano') }}" placeholder="Ex: 2020">
                    @error('ano') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Quilómetros</label>
                    <div class="input-group">
                        <input type="number" name="quilometros"
                               class="form-control @error('quilometros') is-invalid @enderror"
                               value="{{ old('quilometros') }}" placeholder="Ex: 45000">
                        <span class="input-group-text">km</span>
                    </div>
                    @error('quilometros') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Preço</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="preco"
                               class="form-control @error('preco') is-invalid @enderror"
                               value="{{ old('preco') }}" placeholder="Ex: 18500">
                        <span class="input-group-text">€</span>
                    </div>
                    @error('preco') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="disponivel">✅ Disponível</option>
                        <option value="vendida">❌ Vendida</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" accept="image/*"
                           class="form-control @error('foto') is-invalid @enderror">
                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 mt-2">
                    <hr>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-1"></i> Guardar Viatura
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
