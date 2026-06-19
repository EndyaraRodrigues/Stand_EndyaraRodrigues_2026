@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body p-5 text-center">
        <i class="bi bi-check-circle text-success" style="font-size: 4rem;"></i>
        <h2 class="mt-3">Pedido enviado com sucesso!</h2>
        <p class="text-muted">
            Obrigado por nos confiar a avaliação do seu carro.<br>
            Vamos entrar em contacto consigo para confirmar o dia e a hora marcados.
        </p>
        <a href="{{ route('viaturas.index') }}" class="btn btn-primary mt-3">
            <i class="bi bi-house me-1"></i> Voltar à página inicial
        </a>
    </div>
</div>

@endsection
