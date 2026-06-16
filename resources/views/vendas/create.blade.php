@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-plus-circle me-2 text-warning"></i>Nova Venda</h2>
        <p>Regista uma nova venda</p>
    </div>
    <a href="{{ route('vendas.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('vendas.store') }}" method="POST">
            @csrf
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Cliente</label>
                    <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror">
                        <option value="">-- Selecionar Cliente --</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('cliente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Viatura</label>
                    <select name="viatura_id" class="form-select @error('viatura_id') is-invalid @enderror">
                        <option value="">-- Selecionar Viatura --</option>
                        @foreach($viaturas as $viatura)
                            <option value="{{ $viatura->id }}" {{ old('viatura_id') == $viatura->id ? 'selected' : '' }}>
                                {{ $viatura->marca }} {{ $viatura->modelo }} — {{ $viatura->matricula }}
                            </option>
                        @endforeach
                    </select>
                    @error('viatura_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Data da Venda</label>
                    <input type="date" name="data_venda"
                           class="form-control @error('data_venda') is-invalid @enderror"
                           value="{{ old('data_venda', now()->format('Y-m-d')) }}">
                    @error('data_venda') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Valor da Venda</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="valor_venda"
                               class="form-control @error('valor_venda') is-invalid @enderror"
                               value="{{ old('valor_venda') }}" placeholder="0.00">
                        <span class="input-group-text">€</span>
                    </div>
                    @error('valor_venda') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Observações</label>
                    <input type="text" name="observacoes" class="form-control"
                           value="{{ old('observacoes') }}" placeholder="Opcional...">
                </div>

                <div class="col-12 mt-2">
                    <hr>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-1"></i> Registar Venda
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
