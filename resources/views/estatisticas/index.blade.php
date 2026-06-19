@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-bar-chart-line me-2 text-danger"></i>Estatísticas</h2>
        <p>Resultados do stand em tempo real</p>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card stat-blue">
            <div class="icon mb-2"><i class="bi bi-receipt"></i></div>
            <div class="number">{{ $totalVendas }}</div>
            <div class="label">Vendas realizadas</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card stat-green">
            <div class="icon mb-2"><i class="bi bi-cash-stack"></i></div>
            <div class="number">{{ number_format($valorTotalVendas, 0, ',', '.') }}€</div>
            <div class="label">Valor faturado</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card stat-orange">
            <div class="icon mb-2"><i class="bi bi-people-fill"></i></div>
            <div class="number">{{ $totalClientes }}</div>
            <div class="label">Clientes adquiridos</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card stat-red">
            <div class="icon mb-2"><i class="bi bi-star-fill"></i></div>
            <div class="number">{{ $mediaReviews }} / 5</div>
            <div class="label">{{ $totalReviews }} avaliações</div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">

    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white">
                <i class="bi bi-graph-up me-2 text-primary"></i> Vendas por mês
            </div>
            <div class="card-body">
                <canvas id="graficoVendas" height="220"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white">
                <i class="bi bi-currency-euro me-2 text-success"></i> Valor faturado por mês
            </div>
            <div class="card-body">
                <canvas id="graficoValor" height="220"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white">
                <i class="bi bi-person-plus me-2 text-warning"></i> Clientes adquiridos por mês
            </div>
            <div class="card-body">
                <canvas id="graficoClientes" height="220"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white">
                <i class="bi bi-star-half me-2 text-danger"></i> Distribuição das avaliações
            </div>
            <div class="card-body">
                <canvas id="graficoReviews" height="220"></canvas>
            </div>
        </div>
    </div>

</div>

<div class="row g-3">

    <div class="col-md-7">
        <div class="card h-100">
            <div class="card-header bg-white">
                <i class="bi bi-chat-quote me-2 text-info"></i> O que dizem os nossos clientes
            </div>
            <div class="card-body" style="max-height: 420px; overflow-y: auto;">
                @forelse($reviews as $review)
                    <div class="d-flex gap-3 mb-3 pb-3 border-bottom">
                        <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:42px;height:42px;font-weight:700;">
                            {{ strtoupper(substr($review->nome, 0, 1)) }}
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <strong>{{ $review->nome }}</strong>
                                <span class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= $review->classificacao ? 'bi-star-fill' : 'bi-star' }}"></i>
                                    @endfor
                                </span>
                            </div>
                            <p class="mb-1 text-muted">{{ $review->comentario }}</p>
                            <span class="text-muted small">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-chat-square-text fs-1 d-block mb-2"></i>
                        Ainda não há avaliações. Seja o primeiro a avaliar!
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card h-100">
            <div class="card-header bg-white">
                <i class="bi bi-pencil-square me-2 text-primary"></i> Deixe a sua avaliação
            </div>
            <div class="card-body">
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">O seu nome</label>
                        <input type="text" name="nome"
                               class="form-control @error('nome') is-invalid @enderror"
                               value="{{ old('nome') }}" placeholder="Nome">
                        @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Classificação</label>
                        <div class="d-flex gap-2 fs-4" id="estrelasInput">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star estrela" data-valor="{{ $i }}" style="cursor:pointer; color:#ffc107;"></i>
                            @endfor
                        </div>
                        <input type="hidden" name="classificacao" id="classificacaoInput"
                               value="{{ old('classificacao', 5) }}">
                        @error('classificacao') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Comentário</label>
                        <textarea name="comentario" rows="4"
                                  class="form-control @error('comentario') is-invalid @enderror"
                                  placeholder="Conte-nos a sua experiência...">{{ old('comentario') }}</textarea>
                        @error('comentario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-send me-1"></i> Enviar avaliação
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const labelsMeses = @json($labelsMeses);

    new Chart(document.getElementById('graficoVendas'), {
        type: 'bar',
        data: {
            labels: labelsMeses,
            datasets: [{
                label: 'Vendas',
                data: @json($vendasPorMes),
                backgroundColor: '#e63946',
                borderRadius: 6
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
        }
    });

    new Chart(document.getElementById('graficoValor'), {
        type: 'line',
        data: {
            labels: labelsMeses,
            datasets: [{
                label: 'Valor (€)',
                data: @json($valorPorMes),
                borderColor: '#11998e',
                backgroundColor: 'rgba(17,153,142,0.15)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    new Chart(document.getElementById('graficoClientes'), {
        type: 'bar',
        data: {
            labels: labelsMeses,
            datasets: [{
                label: 'Clientes',
                data: @json($clientesPorMes),
                backgroundColor: '#f7971e',
                borderRadius: 6
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
        }
    });

    new Chart(document.getElementById('graficoReviews'), {
        type: 'doughnut',
        data: {
            labels: ['1 estrela', '2 estrelas', '3 estrelas', '4 estrelas', '5 estrelas'],
            datasets: [{
                data: @json($distribuicaoReviews),
                backgroundColor: ['#e63946', '#f7971e', '#ffd200', '#38ef7d', '#11998e']
            }]
        },
        options: {
            plugins: { legend: { position: 'bottom' } }
        }
    });

    const estrelas = document.querySelectorAll('#estrelasInput .estrela');
    const classificacaoInput = document.getElementById('classificacaoInput');

    function pintarEstrelas(valor) {
        estrelas.forEach(estrela => {
            const v = parseInt(estrela.dataset.valor);
            estrela.classList.toggle('bi-star-fill', v <= valor);
            estrela.classList.toggle('bi-star', v > valor);
        });
    }

    pintarEstrelas(parseInt(classificacaoInput.value) || 5);

    estrelas.forEach(estrela => {
        estrela.addEventListener('click', () => {
            const valor = parseInt(estrela.dataset.valor);
            classificacaoInput.value = valor;
            pintarEstrelas(valor);
        });
    });
</script>

@endsection
