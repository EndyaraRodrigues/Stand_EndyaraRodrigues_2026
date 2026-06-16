@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-people me-2 text-primary"></i>Clientes</h2>
        <p>Gestão de todos os clientes</p>
    </div>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Novo Cliente
    </a>
</div>

{{-- Pesquisa e Ordenação --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('clientes.index') }}" class="row g-2 align-items-end">
            <div class="col-md-5">
                <label class="form-label">Pesquisar</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0"
                           placeholder="Nome, email, telefone ou NIF"
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>NIF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                <tr>
                    <td><span class="text-muted">#{{ $cliente->id }}</span></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                 style="width:36px;height:36px;font-weight:700;font-size:0.9rem;">
                                {{ strtoupper(substr($cliente->nome, 0, 1)) }}
                            </div>
                            <strong>{{ $cliente->nome }}</strong>
                        </div>
                    </td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td><span class="badge bg-light text-dark">{{ $cliente->nif }}</span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('clientes.show', $cliente) }}"
                               class="btn btn-sm btn-info text-white" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('clientes.edit', $cliente) }}"
                               class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                                  onsubmit="return confirm('Tens a certeza?')">
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
                    <td colspan="6" class="text-center py-5">
                        <i class="bi bi-people fs-1 text-muted d-block mb-2"></i>
                        <span class="text-muted">Nenhum cliente encontrado</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
