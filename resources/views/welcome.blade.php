<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFA.AI - Micro SaaS para Professores</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>
    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-impact shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <span class="logo-icon">&#128218;</span> PROFA.AI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <a href="{{ url('/register') }}" class="nav-btn"><i class="bi bi-person-plus"></i>Cadastre-se</a>
                <a href="{{ url('/login') }}" class="nav-btn"><i class="bi bi-box-arrow-in-right"></i>Entrar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center flex-lg-row flex-column-reverse">
                <div class="col-lg-6 text-lg-start text-center mt-4 mt-lg-0">
                    <h1>PROFA.AI</h1>
                    <p>Seu assistente inteligente para professores da educação básica.<br>Crie planos de aula, atividades e avaliações personalizadas com apoio de inteligência artificial.</p>
                    <a href="{{ url('/register') }}" class="btn btn-light btn-lg me-2">Cadastre-se</a>
                    <a href="{{ url('/login') }}" class="btn btn-outline-light btn-lg">Entrar</a>
                </div>
                <div class="col-lg-6 text-center mb-4 mb-lg-0">
                    <img src="{{ asset('img/logo.png') }}" alt="Minha foto" class="img-fluid hero-img-edu">
                </div>
            </div>
        </div>
    </section>

    <!-- Objetivo -->
    <section class="section-goal">
        <div class="container">
            <div class="goal-header">
                <h2><i class="bi bi-bullseye"></i> Qual é o objetivo?</h2>
                <p class="main-objective-text">Nosso principal objetivo é economizar o tempo dos professores no planejamento pedagógico. Com o PROFA.AI, eles podem se concentrar mais na didática inovadora e no relacionamento significativo com os alunos.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="objective-details-card h-100">
                        <h3><i class="bi bi-clock-history"></i> Economia de Tempo</h3>
                        <ul>
                            <li>Reduza horas no planejamento diário e semanal.</li>
                            <li>Gere conteúdo em minutos, não em horas.</li>
                            <li>Foque mais na didática e interação com alunos.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="objective-details-card h-100">
                        <h3><i class="bi bi-lightbulb"></i> Inovação Pedagógica</h3>
                        <ul>
                            <li>Apoio da IA para criar conteúdo criativo e atual.</li>
                            <li>Personalize atividades para diferentes necessidades.</li>
                            <li>Mantenha-se à frente com tecnologia educacional.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="objective-details-card h-100">
                        <h3><i class="bi bi-people"></i> Melhor Relacionamento</h3>
                        <ul>
                            <li>Tenha mais tempo para a interação em sala de aula.</li>
                            <li>Prepare aulas mais engajadoras e personalizadas.</li>
                            <li>Fortaleça a conexão com seus alunos e responsáveis.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Como funciona -->
    <section class="section-how">
        <div class="container">
            <h2 class="mb-3">📌 Como funciona?</h2>
            <div class="process-steps-container">
                <div class="process-step">
                    <span class="step-corner-number">1</span>
                    <div class="icon-wrapper"><i class="bi bi-person-check"></i></div>
                    <h3>Acesso e Autenticação</h3>
                    <p>O professor inicia sua jornada fazendo login ou um cadastro rápido. Nosso sistema garante acesso seguro e exclusivo, permitindo que cada educador tenha sua área personalizada e protegida.</p>
                </div>
                <div class="process-step">
                    <span class="step-corner-number">2</span>
                    <div class="icon-wrapper"><i class="bi bi-book"></i></div>
                    <h3>Escolha do Conteúdo</h3>
                    <p>Após o acesso, o professor seleciona o tipo de material pedagógico que deseja criar: um Plano de Aula detalhado, uma Atividade dinâmica ou uma Avaliação personalizada.</p>
                </div>
                <div class="process-step">
                    <span class="step-corner-number">3</span>
                    <div class="icon-wrapper"><i class="bi bi-ui-checks"></i></div>
                    <h3>Definição dos Parâmetros</h3>
                    <p>Em seguida, basta informar dados básicos como tema, ano/série e duração. Quanto mais detalhes, mais personalizada e alinhada às suas necessidades será a criação do conteúdo.</p>
                </div>
                <div class="process-step">
                    <span class="step-corner-number">4</span>
                    <div class="icon-wrapper"><i class="bi bi-robot"></i></div>
                    <h3>Geração por Inteligência Artificial</h3>
                    <p>Com as informações fornecidas, nosso sistema, com o apoio de IA (como o ChatGPT), gera automaticamente o conteúdo pedagógico pronto, otimizado e de alta qualidade.</p>
                </div>
                <div class="process-step">
                    <span class="step-corner-number">5</span>
                    <div class="icon-wrapper"><i class="bi bi-file-earmark-check"></i></div>
                    <h3>Edição e Download</h3>
                    <p>O material gerado pode ser revisado e editado. Com total flexibilidade, o professor pode salvar o conteúdo ou baixá-lo em formato PDF, pronto para uso em sala de aula.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Funcionalidades planejadas -->
    <section class="section-func">
        <div class="container">
            <h2 class="mb-3">🧩 Funcionalidades planejadas</h2>
            <div class="features-grid">
                <div class="feature-block">
                    <div class="icon-wrapper"><i class="bi bi-journal-check"></i></div>
                    <h3>Geração de Planos de Aula</h3>
                    <p>Cria automaticamente planos de aula completos com objetivos, metodologias e avaliações, adaptados ao seu tema e série.</p>
                </div>
                <div class="feature-block">
                    <div class="icon-wrapper"><i class="bi bi-pencil-square"></i></div>
                    <h3>Criação de Atividades</h3>
                    <p>Gere exercícios prontos e variados, incluindo gabaritos e sugestões de aplicação para diferentes disciplinas.</p>
                </div>
                <div class="feature-block">
                    <div class="icon-wrapper"><i class="bi bi-file-earmark-bar-graph"></i></div>
                    <h3>Avaliações Personalizadas</h3>
                    <p>Elabore provas e questionários sob medida, com diferentes formatos de questões e critérios de avaliação claros.</p>
                </div>
                <div class="feature-block">
                    <div class="icon-wrapper"><i class="bi bi-archive"></i></div>
                    <h3>Histórico de Planos</h3>
                    <p>Acesse e organize todos os planos de aula e materiais já gerados, facilitando a reutilização e o acompanhamento pedagógico.</p>
                </div>
                <div class="feature-block">
                    <div class="icon-wrapper"><i class="bi bi-link-45deg"></i></div>
                    <h3>Sugestões de Recursos</h3>
                    <p>Receba indicações de vídeos, artigos e links de apoio que complementam seu material e enriquecem suas aulas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Para quem é -->
    <section class="section-who">
        <div class="container">
            <h2 class="section-audience-title">👥 Para quem é esse sistema?</h2>
            <div class="audience-list-container">
                <div class="audience-list-item">
                    <div class="icon-circle"><i class="bi bi-person-video"></i></div>
                    <div class="text-content">
                        <h3>Professores do Ensino Fundamental e Médio</h3>
                        <p>Otimize seu tempo de planejamento e crie materiais didáticos personalizados com o apoio da inteligência artificial.</p>
                    </div>
                </div>
                <div class="audience-list-item">
                    <div class="icon-circle"><i class="bi bi-person-badge"></i></div>
                    <div class="text-content">
                        <h3>Coordenadores Pedagógicos</h3>
                        <p>Padronize a criação de conteúdos e agilize o trabalho da sua equipe, garantindo qualidade e consistência no planejamento.</p>
                    </div>
                </div>
                <div class="audience-list-item">
                    <div class="icon-circle"><i class="bi bi-buildings"></i></div>
                    <div class="text-content">
                        <h3>Escolas e Instituições de Ensino</h3>
                        <p>Inove na educação oferecendo uma ferramenta de ponta que potencializa a criatividade e eficiência de seus educadores.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Pronto para simplificar seu dia a dia?</h2>
            <p class="section-content">Junte-se à comunidade PROFA.AI e transforme a maneira como você planeja suas aulas.</p>
            <div class="cta-buttons">
                <a href="{{ url('/register') }}" class="cta-btn">Comece Agora <i class="bi bi-arrow-right-short"></i></a>
                <a href="{{ url('/login') }}" class="cta-btn">Já sou Professor <i class="bi bi-box-arrow-in-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Landing Page Footer -->
    <footer class="landing-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <img src="{{ asset('img/logo.png') }}" alt="PROFA.AI Logo" class="footer-logo">
                    <h5 class="mt-3">PROFA.AI</h5>
                    <p class="footer-description">Seu assistente inteligente para professores da educação básica.</p>
                </div>
                <div class="col-md-4 footer-col">
                    <h5>Links Rápidos</h5>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}"><i class="bi bi-house-door"></i> Início</a></li>
                        <li><a href="{{ url('/register') }}"><i class="bi bi-person-plus"></i> Cadastre-se</a></li>
                        <li><a href="{{ url('/login') }}"><i class="bi bi-box-arrow-in-right"></i> Entrar</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-col">
                    <h5>Sobre Nós</h5>
                    <p class="about-us-text">Nossa missão é empoderar educadores, oferecendo ferramentas inovadoras e eficientes para a criação de materiais pedagógicos. Acreditamos que a tecnologia deve ser uma aliada para um ensino mais criativo e impactante.</p>
                </div>
            </div>
            <div class="footer-bottom-bar">
                <p>&copy; {{ date('Y') }} PROFA.AI. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle (para componentes como o navbar-toggler) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>
