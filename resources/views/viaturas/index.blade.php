@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Viaturas</h2>
        <a href="{{ route('viaturas.create') }}" class="btn btn-primary">Nova Viatura</a>
    </div>

    {{-- Pesquisa e Ordenação --}}
    <form method="GET" action="{{ route('viaturas.index') }}" class="row g-2 mb-3">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control"
                   placeholder="Pesquisar por marca, modelo ou matrícula..."
                   value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="order" class="form-select">
                <option value="id"     {{ request('order') == 'id'     ? 'selected' : '' }}>Ordenar por ID</option>
                <option value="marca"  {{ request('order') == 'marca'  ? 'selected' : '' }}>Ordenar por Marca</option>
                <option value="modelo" {{ request('order') == 'modelo' ? 'selected' : '' }}>Ordenar por Modelo</option>
                <option value="ano"    {{ request('order') == 'ano'    ? 'selected' : '' }}>Ordenar por Ano</option>
                <option value="preco"  {{ request('order') == 'preco'  ? 'selected' : '' }}>Ordenar por Preço</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-outline-secondary w-100">Filtrar</button>
        </div>
    </form>

    <table class="table table-bordered table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($viaturas as $viatura)
            <tr>
                <td>{{ $viatura->id }}</td>
                <td>
                    @if($viatura->foto)
                        <img src="{{ asset('storage/' . $viatura->foto) }}"
                             width="60" height="45" style="object-fit:cover;" class="rounded">
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </td>
                <td>{{ $viatura->marca }}</td>
                <td>{{ $viatura->modelo }}</td>
                <td>{{ $viatura->matricula }}</td>
                <td>{{ $viatura->ano }}</td>
                <td>{{ number_format($viatura->preco, 2) }} €</td>
                <td>
                    @if($viatura->estado === 'disponivel')
                        <span class="badge bg-success">Disponível</span>
                    @else
                        <span class="badge bg-danger">Vendida</span>
                    @endif
                </td>
                <td class="d-flex gap-1">
                    <a href="{{ route('viaturas.show', $viatura) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('viaturas.edit', $viatura) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('viaturas.destroy', $viatura) }}" method="POST"
                          onsubmit="return confirm('Tens a certeza?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">Nenhuma viatura encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
