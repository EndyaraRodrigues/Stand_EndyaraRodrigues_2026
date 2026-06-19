@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-clipboard-check me-2 text-warning"></i>Avalie o seu Carro</h2>
        <p>Preencha os dados do seu veículo e escolha o melhor dia e hora para a avaliação</p>
    </div>
    <a href="{{ route('viaturas.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('avaliacoes.store') }}" method="POST">
            @csrf
            <div class="row g-3">

                <div class="col-12">
                    <h5 class="mb-0"><i class="bi bi-person me-2"></i>Os seus dados</h5>
                    <hr class="mt-2">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome"
                           class="form-control @error('nome') is-invalid @enderror"
                           value="{{ old('nome') }}" placeholder="O seu nome">
                    @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone"
                           class="form-control @error('telefone') is-invalid @enderror"
                           value="{{ old('telefone') }}" placeholder="912 345 678">
                    @error('telefone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Email <span class="text-muted">(opcional)</span></label>
                    <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" placeholder="email@exemplo.com">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 mt-4">
                    <h5 class="mb-0"><i class="bi bi-car-front me-2"></i>Dados do carro</h5>
                    <hr class="mt-2">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Marca</label>
                    <input type="text" name="marca"
                           class="form-control @error('marca') is-invalid @enderror"
                           value="{{ old('marca') }}" placeholder="Ex: Volkswagen">
                    @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo"
                           class="form-control @error('modelo') is-invalid @enderror"
                           value="{{ old('modelo') }}" placeholder="Ex: Golf">
                    @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Matrícula <span class="text-muted">(opcional)</span></label>
                    <input type="text" name="matricula"
                           class="form-control @error('matricula') is-invalid @enderror"
                           value="{{ old('matricula') }}" placeholder="00-AA-00">
                    @error('matricula') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Ano <span class="text-muted">(opcional)</span></label>
                    <input type="number" name="ano"
                           class="form-control @error('ano') is-invalid @enderror"
                           value="{{ old('ano') }}" placeholder="2018">
                    @error('ano') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Quilómetros <span class="text-muted">(opcional)</span></label>
                    <input type="number" name="quilometros"
                           class="form-control @error('quilometros') is-invalid @enderror"
                           value="{{ old('quilometros') }}" placeholder="85000">
                    @error('quilometros') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Observações <span class="text-muted">(opcional)</span></label>
                    <input type="text" name="observacoes"
                           class="form-control @error('observacoes') is-invalid @enderror"
                           value="{{ old('observacoes') }}" placeholder="Estado do carro, etc.">
                    @error('observacoes') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 mt-4">
                    <h5 class="mb-0"><i class="bi bi-calendar-event me-2"></i>Agendamento</h5>
                    <hr class="mt-2">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Dia pretendido</label>
                    <input type="date" name="data_agendada"
                           class="form-control @error('data_agendada') is-invalid @enderror"
                           value="{{ old('data_agendada') }}"
                           min="{{ now()->format('Y-m-d') }}">
                    @error('data_agendada') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Horário pretendido</label>
                    <select name="hora_agendada" class="form-select @error('hora_agendada') is-invalid @enderror">
                        <option value="">-- Selecionar horário --</option>
                        @foreach(['09:00','09:30','10:00','10:30','11:00','11:30','12:00','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30'] as $hora)
                            <option value="{{ $hora }}" {{ old('hora_agendada') == $hora ? 'selected' : '' }}>{{ $hora }}</option>
                        @endforeach
                    </select>
                    @error('hora_agendada') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 mt-2">
                    <hr>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-1"></i> Pedir Avaliação
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
