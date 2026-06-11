@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Nova Venda</h2>
        <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('vendas.store') }}" method="POST">
                @csrf

                <div class="mb-3">
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

                <div class="mb-3">
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

                <div class="mb-3">
                    <label class="form-label">Data da Venda</label>
                    <input type="date" name="data_venda"
                           class="form-control @error('data_venda') is-invalid @enderror"
                           value="{{ old('data_venda') }}">
                    @error('data_venda') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Valor da Venda (€)</label>
                    <input type="number" step="0.01" name="valor_venda"
                           class="form-control @error('valor_venda') is-invalid @enderror"
                           value="{{ old('valor_venda') }}">
                    @error('valor_venda') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Observações</label>
                    <textarea name="observacoes" class="form-control" rows="3">{{ old('observacoes') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Registar Venda</button>
            </form>
        </div>
    </div>
@endsection
