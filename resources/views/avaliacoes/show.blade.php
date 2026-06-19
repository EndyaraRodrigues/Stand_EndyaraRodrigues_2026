@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-clipboard-check me-2 text-warning"></i>Pedido de Avaliação #{{ $avaliacao->id }}</h2>
        <p>Detalhes do pedido e gestão do agendamento</p>
    </div>
    <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Voltar
    </a>
</div>

<div class="row g-4">

    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-person me-2"></i>Dados de contacto
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $avaliacao->nome }}</p>
                <p><strong>Telefone:</strong> {{ $avaliacao->telefone }}</p>
                <p class="mb-0"><strong>Email:</strong> {{ $avaliacao->email ?? '—' }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-car-front me-2"></i>Dados do carro
            </div>
            <div class="card-body">
                <p><strong>Marca / Modelo:</strong> {{ $avaliacao->marca }} {{ $avaliacao->modelo }}</p>
                <p><strong>Matrícula:</strong> {{ $avaliacao->matricula ?? '—' }}</p>
                <p><strong>Ano:</strong> {{ $avaliacao->ano ?? '—' }}</p>
                <p><strong>Quilómetros:</strong> {{ $avaliacao->quilometros ? number_format($avaliacao->quilometros, 0, ',', '.') . ' km' : '—' }}</p>
                <p class="mb-0"><strong>Observações:</strong> {{ $avaliacao->observacoes ?? '—' }}</p>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-calendar-event me-2"></i>Agendamento
            </div>
            <div class="card-body">
                <form action="{{ route('avaliacoes.update', $avaliacao) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="row g-3 align-items-end">

                        <div class="col-md-3">
                            <label class="form-label">Dia</label>
                            <input type="date" name="data_agendada" class="form-control"
                                   value="{{ \Carbon\Carbon::parse($avaliacao->data_agendada)->format('Y-m-d') }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="hora_agendada" class="form-control"
                                   value="{{ \Carbon\Carbon::parse($avaliacao->hora_agendada)->format('H:i') }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select">
                                @foreach(['pendente' => 'Pendente', 'confirmada' => 'Confirmada', 'concluida' => 'Concluída', 'cancelada' => 'Cancelada'] as $valor => $label)
                                    <option value="{{ $valor }}" {{ $avaliacao->estado == $valor ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-check-lg me-1"></i> Guardar
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
