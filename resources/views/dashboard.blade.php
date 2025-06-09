<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PROFA.AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #c7d2fe 0%, #f3e8ff 100%);
            position: relative;
            overflow-x: hidden;
        }
        .bg-shape1, .bg-shape2, .bg-shape3 {
            position: absolute;
            border-radius: 50%;
            filter: blur(12px);
            opacity: 0.25;
            z-index: 0;
        }
        .bg-shape1 {
            width: 320px; height: 320px;
            background: linear-gradient(135deg, #7c3aed 60%, #818cf8 100%);
            top: -80px; left: -100px;
        }
        .bg-shape2 {
            width: 220px; height: 220px;
            background: linear-gradient(135deg, #a21caf 60%, #818cf8 100%);
            bottom: 40px; right: -60px;
        }
        .bg-shape3 {
            width: 120px; height: 120px;
            background: linear-gradient(135deg, #818cf8 60%, #a21caf 100%);
            top: 60%; left: 60%;
        }
        .navbar {
            background: transparent;
            box-shadow: none;
            padding-top: 1.2rem;
        }
        .navbar-brand {
            font-size: 1.3rem;
            font-weight: 700;
            color: #7c3aed !important;
            letter-spacing: 1px;
        }
        .nav-btn {
            background: #fff;
            color: #7c3aed;
            border-radius: 8px;
            font-weight: 600;
            padding: 6px 18px;
            font-size: 1rem;
            box-shadow: 0 2px 8px #7c3aed22;
            border: none;
            transition: background 0.2s, color 0.2s;
            text-decoration: none;
        }
        .nav-btn:hover {
            background: #ede9fe;
            color: #5b21b6;
        }
        .dashboard-card {
            position: relative;
            z-index: 1;
            border: none;
            border-radius: 1.2rem;
            box-shadow: 0 6px 32px 0 rgba(124, 58, 237, 0.13);
            background: rgba(255,255,255,0.97);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 600px;
            width: 100%;
        }
        .dashboard-icon-circle {
            width: 80px; height: 80px;
            background: linear-gradient(135deg, #7c3aed 60%, #818cf8 100%);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.1rem auto;
            box-shadow: 0 2px 12px #7c3aed33;
        }
        .dashboard-icon-circle i {
            color: #fff;
            font-size: 2.6rem;
        }
        .dashboard-title {
            font-weight: 700;
            color: #22223b;
            font-size: 1.7rem;
            letter-spacing: 0.5px;
            margin-bottom: 0.2rem;
            text-align: center;
        }
        .dashboard-subtitle {
            color: #7c3aed;
            font-size: 1.08rem;
            margin-bottom: 1.2rem;
            font-weight: 500;
            text-align: center;
        }
        .dashboard-actions {
            display: flex;
            gap: 18px;
            justify-content: center;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }
        .dashboard-action-btn {
            background: linear-gradient(90deg, #7c3aed 0%, #818cf8 100%);
            color: #fff;
            border: none;
            font-weight: 600;
            border-radius: 10px;
            box-shadow: 0 2px 8px #7c3aed22;
            padding: 0.9rem 2.1rem;
            font-size: 1.08rem;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
        }
        .dashboard-action-btn:hover {
            background: linear-gradient(90deg, #818cf8 0%, #7c3aed 100%);
            box-shadow: 0 6px 18px #7c3aed33;
            transform: translateY(-2px) scale(1.03);
        }
        @media (max-width: 700px) {
            .dashboard-card { padding: 1.2rem 0.5rem; }
            .dashboard-actions { flex-direction: column; gap: 12px; }
        }
        .dropdown-menu .dropdown-item:hover {
            background: #ede9fe;
            color: #7c3aed;
        }
    </style>
</head>
<body>
    <div class="bg-shape1"></div>
    <div class="bg-shape2"></div>
    <div class="bg-shape3"></div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <span class="logo-icon" style="font-size:1.5rem;">&#128218;</span> <span>PROFA.AI</span>
            </a>
            <div class="dropdown ms-auto">
                <button class="btn p-0 border-0 bg-transparent" type="button" id="userMenuBtn" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow:none;">
                    <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white text-indigo-700 fw-bold border border-3 border-primary shadow-sm" style="width:44px; height:44px; font-size:1.2rem; border-color:#7c3aed; cursor:pointer; transition:box-shadow 0.2s;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="userMenuBtn" style="min-width: 170px; border-radius: 14px;">
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin')
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 text-success"></i> Ir para o Painel Admin
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    @endif
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person-circle text-primary"></i> Editar Perfil
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2"><i class="bi bi-box-arrow-right text-danger"></i> Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="dashboard-card mx-auto">
            <div class="dashboard-icon-circle"><i class="bi bi-mortarboard"></i></div>
            <div class="dashboard-title">Bem-vindo ao seu Dashboard!</div>
            <div class="dashboard-subtitle">Aqui você gerencia seus planos de aula, atividades e avaliações.</div>
            <div class="dashboard-actions">
                <a href="#" class="dashboard-action-btn"><i class="bi bi-journal-plus"></i>Novo Plano de Aula</a>
                <a href="#" class="dashboard-action-btn"><i class="bi bi-list-task"></i>Ver Atividades</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 