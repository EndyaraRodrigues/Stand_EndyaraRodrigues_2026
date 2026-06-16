@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-pencil me-2 text-warning"></i>Editar Venda #{{ $venda->id }}</h2>
        <p>Atualiza os dados da venda</p>
    </div>
    <a href="{{ route('vendas.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('vendas.update', $venda) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">

                <div class="col-md-6">
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

                <div class="col-md-6">
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

                <div class="col-md-4">
                    <label class="form-label">Data da Venda</label>
                    <input type="date" name="data_venda" class="form-control"
                           value="{{ old('data_venda', $venda->data_venda) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Valor da Venda</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="valor_venda" class="form-control"
                               value="{{ old('valor_venda', $venda->valor_venda) }}">
                        <span class="input-group-text">€</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Observações</label>
                    <input type="text" name="observacoes" class="form-control"
                           value="{{ old('observacoes', $venda->observacoes) }}">
                </div>

                <div class="col-12 mt-2">
                    <hr>
                    <button type="submit" class="btn btn-warning px-4">
                        <i class="bi bi-check-lg me-1"></i> Atualizar Venda
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
