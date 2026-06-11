@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Editar Venda</h2>
        <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('vendas.update', $venda) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="cliente_id" class="form-select">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}"
                                {{ $venda->cliente_id == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Viatura</label>
                    <select name="viatura_id" class="form-select">
                        @foreach($viaturas as $viatura)
                            <option value="{{ $viatura->id }}"
                                {{ $venda->viatura_id == $viatura->id ? 'selected' : '' }}>
                                {{ $viatura->marca }} {{ $viatura->modelo }} — {{ $viatura->matricula }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data da Venda</label>
                    <input type="date" name="data_venda" class="form-control"
                           value="{{ old('data_venda', $venda->data_venda) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Valor da Venda (€)</label>
                    <input type="number" step="0.01" name="valor_venda" class="form-control"
                           value="{{ old('valor_venda', $venda->valor_venda) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Observações</label>
                    <textarea name="observacoes" class="form-control" rows="3">{{ old('observacoes', $venda->observacoes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">Atualizar</button>
            </form>
        </div>
    </div>
@endsection
