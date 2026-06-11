@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Editar Viatura</h2>
        <a href="{{ route('viaturas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('viaturas.update', $viatura) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control"
                               value="{{ old('marca', $viatura->marca) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control"
                               value="{{ old('modelo', $viatura->modelo) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Matrícula</label>
                        <input type="text" name="matricula" class="form-control"
                               value="{{ old('matricula', $viatura->matricula) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Ano</label>
                        <input type="number" name="ano" class="form-control"
                               value="{{ old('ano', $viatura->ano) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Quilómetros</label>
                        <input type="number" name="quilometros" class="form-control"
                               value="{{ old('quilometros', $viatura->quilometros) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Preço (€)</label>
                        <input type="number" step="0.01" name="preco" class="form-control"
                               value="{{ old('preco', $viatura->preco) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select">
                            <option value="disponivel" {{ $viatura->estado == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                            <option value="vendida"    {{ $viatura->estado == 'vendida'    ? 'selected' : '' }}>Vendida</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto atual</label><br>
                    @if($viatura->foto)
                        <img src="{{ asset('storage/' . $viatura->foto) }}"
                             height="80" class="rounded mb-2">
                    @else
                        <span class="text-muted">Sem foto</span>
                    @endif
                    <input type="file" name="foto" class="form-control mt-2" accept="image/*">
                </div>

                <button type="submit" class="btn btn-warning">Atualizar</button>
            </form>
        </div>
    </div>
@endsection
