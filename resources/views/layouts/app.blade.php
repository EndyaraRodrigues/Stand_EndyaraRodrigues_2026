<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stand Automóveis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #e63946;
            --dark: #1a1a2e;
            --darker: #16213e;
            --card-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #1a1a2e, #16213e) !important;
            padding: 12px 0;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }
        .navbar-brand {
            font-size: 1.4rem;
            font-weight: 700;
            color: white !important;
            letter-spacing: 1px;
        }
        .navbar-brand span {
            color: var(--primary);
        }
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: white !important;
            background: rgba(255,255,255,0.1);
        }
        .nav-link i {
            margin-right: 6px;
        }
        .navbar-toggler {
            border-color: rgba(255,255,255,0.3);
        }
        .navbar-toggler-icon {
            filter: invert(1);
        }

        /* USER DROPDOWN */
        .user-badge {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        .user-badge:hover {
            background: rgba(255,255,255,0.25);
        }

        /* MAIN CONTENT */
        .main-content {
            padding: 30px 0;
            min-height: calc(100vh - 130px);
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
        }
        .card-header {
            border-radius: 16px 16px 0 0 !important;
            border-bottom: 1px solid rgba(0,0,0,0.06);
            padding: 16px 20px;
            font-weight: 600;
        }

        /* STAT CARDS */
        .stat-card {
            border-radius: 16px;
            padding: 24px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .stat-card::after {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        .stat-card .icon {
            font-size: 2rem;
            opacity: 0.9;
        }
        .stat-card .number {
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1;
        }
        .stat-card .label {
            font-size: 0.85rem;
            opacity: 0.85;
        }
        .stat-blue   { background: linear-gradient(135deg, #667eea, #764ba2); }
        .stat-green  { background: linear-gradient(135deg, #11998e, #38ef7d); }
        .stat-red    { background: linear-gradient(135deg, #e63946, #c1121f); }
        .stat-orange { background: linear-gradient(135deg, #f7971e, #ffd200); }

        /* BUTTONS */
        .btn-primary {
            background: linear-gradient(135deg, #e63946, #c1121f);
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(230,57,70,0.4);
            background: linear-gradient(135deg, #c1121f, #e63946);
        }
        .btn-warning {
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-danger {
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-info {
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-secondary {
            border-radius: 8px;
            font-weight: 600;
        }

        /* TABLES */
        .table {
            border-radius: 12px;
            overflow: hidden;
        }
        .table thead th {
            background: #1a1a2e;
            color: white;
            font-weight: 600;
            border: none;
            padding: 14px 16px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table tbody tr {
            transition: all 0.2s;
            border-bottom: 1px solid #f0f0f0;
        }
        .table tbody tr:hover {
            background: #f8f9ff;
            transform: scale(1.001);
        }
        .table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border: none;
        }

        /* BADGES */
        .badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        /* FORMS */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1.5px solid #e0e0e0;
            padding: 10px 14px;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(230,57,70,0.1);
        }
        .form-label {
            font-weight: 600;
            color: #444;
            font-size: 0.9rem;
        }

        /* ALERTS */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 14px 20px;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
        }
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }

        /* PAGE HEADER */
        .page-header {
            background: white;
            border-radius: 16px;
            padding: 20px 24px;
            margin-bottom: 24px;
            box-shadow: var(--card-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .page-header h2 {
            font-weight: 700;
            margin: 0;
            color: #1a1a2e;
        }
        .page-header p {
            margin: 0;
            color: #888;
            font-size: 0.9rem;
        }

        /* FOOTER */
        footer {
            background: #1a1a2e;
            color: rgba(255,255,255,0.6);
            text-align: center;
            padding: 16px;
            font-size: 0.85rem;
        }

        /* CARDS DE VIATURAS - VITRINE PÚBLICA */
        .viatura-card {
            border: none;
            transition: all 0.3s;
            overflow: hidden;
        }
        .viatura-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        .viatura-img-wrapper {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: #f1f1f1;
        }
        .viatura-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s;
        }
        .viatura-card:hover .viatura-img {
            transform: scale(1.08);
        }
        .viatura-img-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e9ecef, #dee2e6);
            color: #adb5bd;
            font-size: 3rem;
        }
        .viatura-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            padding: 6px 12px;
            font-size: 0.78rem;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('viaturas.index') }}">
                🚗 Stand<span>Auto</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
               <ul class="navbar-nav me-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('viaturas.*') ? 'active' : '' }}"
                           href="{{ route('viaturas.index') }}">
                            <i class="bi bi-car-front"></i> Viaturas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('estatisticas.*') ? 'active' : '' }}"
                           href="{{ route('estatisticas.index') }}">
                            <i class="bi bi-bar-chart-line"></i> Estatísticas
                        </a>
                    </li>

                    <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('avaliacoes.create') ? 'active' : '' }}"
       href="{{ route('avaliacoes.create') }}">
        <i class="bi bi-clipboard-check"></i> Avaliar o meu Carro
    </a>
</li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contactos') ? 'active' : '' }}"
                           href="{{ route('contactos') }}">
                            <i class="bi bi-geo-alt"></i> Contactos
                        </a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                               href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}"
                               href="{{ route('clientes.index') }}">
                                <i class="bi bi-people"></i> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('vendas.*') ? 'active' : '' }}"
                               href="{{ route('vendas.index') }}">
                                <i class="bi bi-receipt"></i> Vendas
                            </a>
                        </li>

                        <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('avaliacoes.index') || request()->routeIs('avaliacoes.show') ? 'active' : '' }}"
       href="{{ route('avaliacoes.index') }}">
        <i class="bi bi-calendar2-check"></i> Pedidos de Avaliação
    </a>
</li>
                    @endauth
                </ul>

                @auth
                    <!-- User Menu -->
                    <div class="dropdown">
                        <div class="user-badge dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name ?? 'Utilizador' }}
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end mt-2 shadow border-0 rounded-3">
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="dropdown-item py-2">
                                        <i class="bi bi-person-plus me-2"></i> Criar Conta
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger py-2">
                                        <i class="bi bi-box-arrow-right me-2"></i> Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Visitante: leva à página de boas-vindas para escolher Login ou Criar Conta -->
                    <a href="{{ route('welcome') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- CONTEÚDO -->
    <div class="main-content">
        <div class="container">

            {{-- Alertas --}}
            @if(session('sucesso'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <i class="bi bi-check-circle me-2"></i>{{ session('sucesso') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <ul class="mb-0 mt-1">
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        🚗 Stand Automóveis &copy; {{ date('Y') }} — Todos os direitos reservados
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
