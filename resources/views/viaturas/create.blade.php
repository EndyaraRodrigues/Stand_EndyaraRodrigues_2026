@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Nova Viatura</h2>
        <a href="{{ route('viaturas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('viaturas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror"
                               value="{{ old('marca') }}">
                        @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror"
                               value="{{ old('modelo') }}">
                        @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Matrícula</label>
                        <input type="text" name="matricula" class="form-control @error('matricula') is-invalid @enderror"
                               value="{{ old('matricula') }}">
                        @error('matricula') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Ano</label>
                        <input type="number" name="ano" class="form-control @error('ano') is-invalid @enderror"
                               value="{{ old('ano') }}">
                        @error('ano') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Quilómetros</label>
                        <input type="number" name="quilometros" class="form-control @error('quilometros') is-invalid @enderror"
                               value="{{ old('quilometros') }}">
                        @error('quilometros') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Preço (€)</label>
                        <input type="number" step="0.01" name="preco"
                               class="form-control @error('preco') is-invalid @enderror"
                               value="{{ old('preco') }}">
                        @error('preco') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select">
                            <option value="disponivel">Disponível</option>
                            <option value="vendida">Vendida</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                           accept="image/*">
                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
