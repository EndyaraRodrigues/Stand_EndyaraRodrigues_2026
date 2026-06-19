@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-clipboard-check me-2 text-warning"></i>Avaliações</h2>
        <p>Pedidos de avaliação de carros para venda</p>
    </div>
    <a href="{{ route('avaliacoes.create') }}" class="btn btn-primary" target="_blank">
        <i class="bi bi-eye me-1"></i> Ver formulário público
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('avaliacoes.index') }}" class="row g-2 align-items-end">
            <div class="col-md-5">
                <label class="form-label">Pesquisar</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0"
                           placeholder="Nome, marca, modelo ou matrícula"
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-select">
                    <option value="">-- Todos --</option>
                    @foreach(['pendente' => 'Pendente', 'confirmada' => 'Confirmada', 'concluida' => 'Concluída', 'cancelada' => 'Cancelada'] as $valor => $label)
                        <option value="{{ $valor }}" {{ request('estado') == $valor ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
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
                    <th>Carro</th>
                    <th>Agendamento</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($avaliacoes as $avaliacao)
                <tr>
                    <td><span class="text-muted">#{{ $avaliacao->id }}</span></td>
                    <td>
                        <div>{{ $avaliacao->nome }}</div>
                        <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $avaliacao->telefone }}</small>
                    </td>
                    <td>
                        <strong>{{ $avaliacao->marca }}</strong> {{ $avaliacao->modelo }}
                        @if($avaliacao->matricula)
                            <br><small class="text-muted">{{ $avaliacao->matricula }}</small>
                        @endif
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($avaliacao->data_agendada)->format('d/m/Y') }}
                        às {{ \Carbon\Carbon::parse($avaliacao->hora_agendada)->format('H:i') }}
                    </td>
                    <td>
                        @php
                            $cores = [
                                'pendente' => 'bg-warning text-dark',
                                'confirmada' => 'bg-info text-white',
                                'concluida' => 'bg-success text-white',
                                'cancelada' => 'bg-danger text-white',
                            ];
                        @endphp
                        <span class="badge {{ $cores[$avaliacao->estado] ?? 'bg-secondary' }}">
                            {{ ucfirst($avaliacao->estado) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('avaliacoes.show', $avaliacao) }}"
                               class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('avaliacoes.destroy', $avaliacao) }}" method="POST"
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
                        <i class="bi bi-clipboard-check fs-1 text-muted d-block mb-2"></i>
                        <span class="text-muted">Nenhum pedido de avaliação registado</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
