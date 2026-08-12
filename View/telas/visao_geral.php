<?php 
    namespace Astroblog\View\telas;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astroblog+ - Visão Geral</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Customizado -->
    <link rel="stylesheet" href="../../CSS/estilo.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../imagens/astroblog_app_icon.png?v=1" type="image/png">
    <link rel="icon" href="../../imagens/astroblog_app_icon.png?v=1" type="image/png">
</head>

<body>

    <!-- NAVBAR CARREGADA DINAMICAMENTE -->
    <div id="navbar-container"></div>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="container-fluid px-md-5 my-4">

        <!-- CABEÇALHO DA PÁGINA -->
        <h1 class="fw-bold text-white mb-1 fs-2">Visão Geral</h1>
        <p class="text-secondary mb-4">
            Acompanhe o crescimento da comunidade e gerencie o conteúdo do blog.
        </p>

        <!-- CARDS DE MÉTRICAS (KPIs) -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card text-center">
                    <div class="number">3.482</div>
                    <div class="label">Usuarios Cadastrados</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card text-center">
                    <div class="number">12.905</div>
                    <div class="label">Observações registradas</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card text-center">
                    <div class="number">7.214</div>
                    <div class="label">Curtidas no blog</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card text-center">
                    <div class="number">58</div>
                    <div class="label">Postagens publicadas</div>
                </div>
            </div>
        </div>

        <!-- PAINÉIS PRINCIPAIS -->
        <div class="row g-4">

            <!-- COLUNA ESQUERDA: GERENCIAR CONTEÚDO DO BLOG -->
            <div class="col-lg-7 col-xl-8">
                <div class="dash-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Cabeçalho do Card -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-white m-0 fs-5">Gerenciar conteúdo do blog</h5>
                            <a href="registrar_observacao.php" class="btn-local-add">
                                Nova postagem <span class="fs-5 lh-1">+</span>
                            </a>
                        </div>

                        <!-- Filtros de Categoria (CORRIGIDO SEM DUPLICAÇÃO) -->
                        <div class="d-flex gap-2 mb-4">
                            <!-- Adicionado data-filtro em cada botão -->
                            <button class="btn filtro-btn btn-filtro-ativo" data-filtro="todos">Todos</button>
                            <button class="btn filtro-btn btn-filtro-outline" data-filtro="evento">Eventos</button>
                            <button class="btn filtro-btn btn-filtro-outline" data-filtro="curiosidade">Curiosidades</button>
                        </div>

                        <!-- Tabela de Postagens -->
                        <div class="table-responsive">
                            <table class="table table-dash align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 50%;">Título</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Curtidas</th>
                                        <th scope="col" class="text-end pe-2">Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Adicionado class="postagem" e data-tipo="evento" -->
                                    <tr class="postagem" data-tipo="evento">
                                        <td class="fw-bold text-white">Como observar as Perseidas em agosto</td>
                                        <td class="text-white">Evento</td>
                                        <td class="text-white">84</td>
                                        <td class="text-end pe-2 text-white">12 mar 2026</td>
                                    </tr>
                                    
                                    <!-- Adicionado class="postagem" e data-tipo="curiosidade" -->
                                    <tr class="postagem" data-tipo="curiosidade">
                                        <td class="fw-bold text-white">Por que Saturno tem anéis?</td>
                                        <td class="text-white">Curiosidade</td>
                                        <td class="text-white">132</td>
                                        <td class="text-end pe-2 text-white">23 abr 2026</td>
                                    </tr>
                                    
                                    <!-- Adicionado class="postagem" e data-tipo="curiosidade" -->
                                    <tr class="postagem" data-tipo="curiosidade">
                                        <td class="fw-bold text-white">Guia de compra: primeiro telescópio</td>
                                        <td class="text-white">Curiosidade</td>
                                        <td class="text-white">543</td>
                                        <td class="text-end pe-2 text-white">20 abr 2026</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUNA DIREITA: USUÁRIOS CADASTRADOS -->
            <div class="col-lg-5 col-xl-4">
                <div class="dash-card">
                    <h5 class="fw-bold text-white mb-4 text-center fs-5">Usuários cadastrados</h5>

                    <div class="table-responsive">
                        <table class="table table-dash table-compact align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col" class="text-center">Observações</th>
                                    <th scope="col" class="text-end pe-1">Cadastro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-white">Marina T.</td>
                                    <td class="text-white small">marina.t@email.com</td>
                                    <td class="text-center text-white">34</td>
                                    <td class="text-end pe-1 text-white">12 mar 2026</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-white">Pedro L.</td>
                                    <td class="text-white small">pedro.lima@email.com</td>
                                    <td class="text-center text-white">19</td>
                                    <td class="text-end pe-1 text-white">28 abr 2026</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-white">Ana C.</td>
                                    <td class="text-white small">ana.costa@email.com</td>
                                    <td class="text-center text-white">07</td>
                                    <td class="text-end pe-1 text-white">02 ago 2026</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-white">José K.</td>
                                    <td class="text-white small">jose.k@email.com</td>
                                    <td class="text-center text-white">19</td>
                                    <td class="text-end pe-1 text-white">23 abr 2026</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-white">Felipe F.</td>
                                    <td class="text-white small">felipe.f@email.com</td>
                                    <td class="text-center text-white">23</td>
                                    <td class="text-end pe-1 text-white">10 jun 2026</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-white">Valentino</td>
                                    <td class="text-white small">valentino.v@email.com</td>
                                    <td class="text-center text-white">67</td>
                                    <td class="text-end pe-1 text-white">12 jul 2026</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-white">Fernanda</td>
                                    <td class="text-white small">fernanda.t@email.com</td>
                                    <td class="text-center text-white">09</td>
                                    <td class="text-end pe-1 text-white">30 jan 2026</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-white">Vitoria</td>
                                    <td class="text-white small">vitoria.t@email.com</td>
                                    <td class="text-center text-white">01</td>
                                    <td class="text-end pe-1 text-white">09 ago 2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center pt-4 pb-2 text-secondary fw-semibold small">
                        Fim do registro
                    </div>
                </div>
            </div>

        </div> <!-- /.row -->

    </div> <!-- /.container-fluid -->

    <!-- Script para Carregar a Navbar Reaproveitável -->
    <script>
        fetch('../componentes/navbar.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar-container').innerHTML = data;
            });
    </script>

    <!-- JS Customizado -->
    <script src="../../JS/script.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>