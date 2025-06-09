<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - PROFA.AI</title>
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
        .profile-card {
            position: relative;
            z-index: 1;
            border: none;
            border-radius: 1.2rem;
            box-shadow: 0 6px 32px 0 rgba(124, 58, 237, 0.13);
            background: rgba(255,255,255,0.97);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 400px;
            width: 100%;
        }
        .profile-icon-circle {
            width: 70px; height: 70px;
            background: linear-gradient(135deg, #7c3aed 60%, #818cf8 100%);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.1rem auto;
            box-shadow: 0 2px 12px #7c3aed33;
        }
        .profile-icon-circle i {
            color: #fff;
            font-size: 2.2rem;
        }
        .profile-title {
            font-weight: 700;
            color: #22223b;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
            margin-bottom: 0.2rem;
            text-align: center;
        }
        .profile-subtitle {
            color: #7c3aed;
            font-size: 1.01rem;
            margin-bottom: 1.2rem;
            font-weight: 500;
            text-align: center;
        }
        .input-group-text {
            background: #ede9fe;
            border: none;
            color: #7c3aed;
            font-size: 1.2rem;
        }
        .form-control {
            border-radius: 8px !important;
            border: 1.5px solid #e0e7ff;
            font-size: 1.05rem;
        }
        .form-control:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 0.15rem #7c3aed33;
        }
        .profile-btn {
            background: linear-gradient(90deg, #7c3aed 0%, #818cf8 100%);
            color: #fff;
            border: none;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #7c3aed22;
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
            margin-top: 0.5rem;
        }
        .profile-btn:hover {
            background: linear-gradient(90deg, #818cf8 0%, #7c3aed 100%);
            box-shadow: 0 6px 18px #7c3aed33;
            transform: translateY(-2px) scale(1.03);
        }
        @media (max-width: 500px) {
            .profile-card { padding: 1.2rem 0.5rem; }
            .navbar { padding-top: 0.5rem; }
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
            <a href="{{ route('dashboard') }}" class="nav-btn ms-auto">Voltar</a>
        </div>
    </nav>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="profile-card mx-auto">
            <div class="profile-icon-circle"><i class="bi bi-person-circle"></i></div>
            <div class="profile-title">Editar Perfil</div>
            <div class="profile-subtitle">Atualize suas informações abaixo</div>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success py-2 mb-2">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger py-2 mb-2">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required class="form-control" placeholder="Nome">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required class="form-control" placeholder="Email">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Deixe em branco para não alterar">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirme a nova senha">
                </div>
                <button type="submit" class="btn profile-btn w-100 mb-2 py-2"><i class="bi bi-check2-circle me-2"></i>Salvar Alterações</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 