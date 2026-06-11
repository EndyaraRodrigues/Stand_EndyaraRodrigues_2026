
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Vendas</h2>
        <a href="{{ route('vendas.create') }}" class="btn btn-primary">Nova Venda</a>
    </div>

    <table class="table table-bordered table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Viatura</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vendas as $venda)
            <tr>
                <td>{{ $venda->id }}</td>
                <td>{{ $venda->cliente->nome }}</td>
                <td>{{ $venda->viatura->marca }} {{ $venda->viatura->modelo }}</td>
                <td>{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</td>
                <td>{{ number_format($venda->valor_venda, 2) }} €</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('vendas.show', $venda) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('vendas.edit', $venda) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('vendas.destroy', $venda) }}" method="POST"
                          onsubmit="return confirm('Tens a certeza?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Nenhuma venda registada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
