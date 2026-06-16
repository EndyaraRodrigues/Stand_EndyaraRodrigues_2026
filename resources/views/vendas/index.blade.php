@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-receipt me-2 text-warning"></i>Vendas</h2>
        <p>Histórico de todas as vendas</p>
    </div>
    <a href="{{ route('vendas.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Nova Venda
    </a>
</div>

{{-- Pesquisa e Ordenação --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('vendas.index') }}" class="row g-2 align-items-end">
            <div class="col-md-5">
                <label class="form-label">Pesquisar</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0"
                           placeholder="Cliente, ID, viatura ou data"
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-funnel me-1"></i> Procurar
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
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
                    <td><span class="text-muted">#{{ $venda->id }}</span></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center"
                                 style="width:32px;height:32px;font-weight:700;font-size:0.85rem;">
                                {{ strtoupper(substr($venda->cliente->nome, 0, 1)) }}
                            </div>
                            {{ $venda->cliente->nome }}
                        </div>
                    </td>
                    <td>
                        <strong>{{ $venda->viatura->marca }}</strong>
                        {{ $venda->viatura->modelo }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</td>
                    <td><strong class="text-success">{{ number_format($venda->valor_venda, 2) }}€</strong></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('vendas.show', $venda) }}"
                               class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('vendas.edit', $venda) }}"
                               class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('vendas.destroy', $venda) }}" method="POST"
                                  onsubmit="return confirm('Tens a certeza?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="bi bi-receipt fs-1 text-muted d-block mb-2"></i>
                        <span class="text-muted">Nenhuma venda registada</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection
