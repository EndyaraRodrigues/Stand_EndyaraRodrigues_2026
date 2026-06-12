<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stand Automóveis</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1b1b1b 0%, #2d2d2d 100%);
            min-height: 100vh;
        }
        .card-stand {
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .btn-register {
            background-color: #dc3545;
            border: none;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .btn-register:hover {
            background-color: #bb2d3b;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220,53,69,0.4);
        }
        .btn-login {
            border: 2px solid #dee2e6;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
        }
        .icon-car {
            font-size: 3rem;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="card card-stand p-5" style="width: 100%; max-width: 420px;">

        <div class="text-center mb-4">
            <div class="icon-car mb-2">🚗</div>
            <h1 class="fw-bold fs-3 mb-1">Stand Automóveis</h1>
            <p class="text-muted mb-0">Gestão de clientes, viaturas e vendas</p>
        </div>

        <hr class="my-4">

        <div class="d-grid gap-3">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-register btn-danger text-white fw-semibold">
                    ✨ Criar Conta
                </a>
            @endif

            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-login btn-outline-secondary fw-semibold">
                    Já tenho conta — Entrar
                </a>
            @endif
        </div>

        <p class="text-center text-muted mt-4 mb-0" style="font-size: 0.8rem;">
            Stand Automóveis &copy; {{ date('Y') }}
        </p>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
