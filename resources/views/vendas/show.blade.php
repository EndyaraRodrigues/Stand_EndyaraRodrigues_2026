@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-3">Detalhes da Venda</h4>
            <p><strong>ID:</strong> {{ $venda->id }}</p>
            <p><strong>Cliente:</strong> {{ $venda->cliente->nome }}</p>
            <p><strong>Viatura:</strong> {{ $venda->viatura->marca }} {{ $venda->viatura->modelo }}</p>
            <p><strong>Data:</strong> {{ $venda->data_venda }}</p>
            <p><strong>Valor (€):</strong> {{ $venda->valor_venda }}</p>
            <p><strong>Observações:</strong> {{ $venda->observacoes ?? 'Sem observações' }}</p>

            @if($venda->viatura->foto)
                <p><strong>Foto da Viatura:</strong></p>
                <img src="{{ asset('storage/' . $venda->viatura->foto) }}" alt="Foto" class="img-fluid rounded" style="max-width: 300px;">
            @endif
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('vendas.edit', $venda) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
