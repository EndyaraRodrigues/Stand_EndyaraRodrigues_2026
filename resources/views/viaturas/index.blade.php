@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-car-front me-2 text-danger"></i>Viaturas</h2>
        <p>Conheça as viaturas disponíveis no nosso stand</p>
    </div>
    @auth
    <a href="{{ route('viaturas.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Nova Viatura
    </a>
    @endauth
</div>

{{-- Pesquisa e Ordenação --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('viaturas.index') }}" class="row g-2 align-items-end">
            <div class="col-md-5">
                <label class="form-label">Pesquisar</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0"
                           placeholder="Marca, modelo ou matrícula..."
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Ordenar por</label>
                <select name="order" class="form-select">
                    <option value="id"     {{ request('order') == 'id'     ? 'selected' : '' }}>ID</option>
                    <option value="marca"  {{ request('order') == 'marca'  ? 'selected' : '' }}>Marca</option>
                    <option value="modelo" {{ request('order') == 'modelo' ? 'selected' : '' }}>Modelo</option>
                    <option value="ano"    {{ request('order') == 'ano'    ? 'selected' : '' }}>Ano</option>
                    <option value="preco"  {{ request('order') == 'preco'  ? 'selected' : '' }}>Preço</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-funnel me-1"></i> Filtrar
                </button>
            </div>
        </form>
    </div>
</div>

@auth
    {{-- TABELA: vista de gestão para utilizadores autenticados --}}
    <div class="card">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
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
                        <td><span class="text-muted">#{{ $viatura->id }}</span></td>
                        <td>
                            @if($viatura->foto)
                                <img src="{{ asset('storage/' . $viatura->foto) }}"
                                     width="65" height="50"
                                     style="object-fit:cover; border-radius:8px;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                     style="width:65px;height:50px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $viatura->marca }}</strong></td>
                        <td>{{ $viatura->modelo }}</td>
                        <td><span class="badge bg-secondary">{{ $viatura->matricula }}</span></td>
                        <td>{{ $viatura->ano }}</td>
                        <td><strong>{{ number_format($viatura->preco, 2) }}€</strong></td>
                        <td>
                            @if($viatura->estado === 'disponivel')
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Disponível</span>
                            @else
                                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Vendida</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('viaturas.show', $viatura) }}"
                                   class="btn btn-sm btn-info text-white" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('viaturas.edit', $viatura) }}"
                                   class="btn btn-sm btn-warning" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('viaturas.destroy', $viatura) }}" method="POST"
                                      onsubmit="return confirm('Tens a certeza que queres apagar esta viatura?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Apagar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5">
                            <i class="bi bi-car-front fs-1 text-muted d-block mb-2"></i>
                            <span class="text-muted">Nenhuma viatura encontrada</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@else
    {{-- CARDS: vitrine pública para visitantes sem login --}}
    <div class="row g-4">
        @forelse($viaturas as $viatura)
        <div class="col-md-4 col-sm-6">
            <div class="card h-100 viatura-card">
                <div class="viatura-img-wrapper">
                    @if($viatura->foto)
                        <img src="{{ asset('storage/' . $viatura->foto) }}" class="viatura-img">
                    @else
                        <div class="viatura-img-placeholder">
                            <i class="bi bi-car-front-fill"></i>
                        </div>
                    @endif

                    @if($viatura->estado === 'disponivel')
                        <span class="badge bg-success viatura-badge">
                            <i class="bi bi-check-circle me-1"></i>Disponível
                        </span>
                    @else
                        <span class="badge bg-danger viatura-badge">
                            <i class="bi bi-x-circle me-1"></i>Vendida
                        </span>
                    @endif
                </div>

                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold mb-1">{{ $viatura->marca }} {{ $viatura->modelo }}</h5>
                    <p class="text-muted small mb-3">
                        <i class="bi bi-calendar3 me-1"></i>{{ $viatura->ano }}
                        &nbsp;&middot;&nbsp;
                        <i class="bi bi-speedometer2 me-1"></i>{{ number_format($viatura->quilometros) }} km
                        &nbsp;&middot;&nbsp;
                        <i class="bi bi-credit-card-2-front me-1"></i>{{ $viatura->matricula }}
                    </p>

                    <h4 class="text-danger fw-bold mb-3 mt-auto">{{ number_format($viatura->preco, 2) }}€</h4>

                    <a href="{{ route('viaturas.show', $viatura) }}"
                       class="btn btn-outline-dark w-100 {{ $viatura->estado !== 'disponivel' ? 'disabled' : '' }}">
                        <i class="bi bi-eye me-1"></i> Ver detalhes
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-car-front fs-1 text-muted d-block mb-2"></i>
            <span class="text-muted">Nenhuma viatura encontrada</span>
        </div>
        @endforelse
    </div>
@endauth

@isset($viaturas)
    @if(method_exists($viaturas, 'hasPages') && $viaturas->hasPages())
    <div class="card mt-3">
        <div class="card-body d-flex justify-content-between align-items-center py-2">
            <span class="text-muted small">
                A mostrar {{ $viaturas->firstItem() }} a {{ $viaturas->lastItem() }}
                de {{ $viaturas->total() }} viaturas
            </span>
            {{ $viaturas->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
    @endif
@endisset

@endsection
