<?php 
    namespace Astroblog\View\telas;
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Astroblog+ - Início</title>

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
    <main class="container my-5" style="max-width: 1000px;">

        <!-- CABEÇALHO -->
        <header class="mb-4">
            <h1 class="fw-bold text-white mb-2 fs-2">Bem-vindo, [Usuario]</h1>
            <p class="text-secondary mb-0">O céu de hoje está com boa visibilidade na sua região.</p>
        </header>

        <div class="row g-4">
            
            <!-- COLUNA ESQUERDA -->
            <div class="col-lg-7">
                
                <!-- Cards de Estatísticas -->
                <div class="row g-3 mb-4">
                    <div class="col-4">
                        <div class="stat-card h-100">
                            <div class="number">47</div>
                            <div class="label">Observações registradas</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-card h-100">
                            <div class="number">23</div>
                            <div class="label">Objetos catalogados</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-card h-100">
                            <div class="number">9</div>
                            <div class="label">Eventos acompanhados</div>
                        </div>
                    </div>
                </div>

                <!-- Tabela Últimas Postagens -->
                <div class="dash-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-white fw-bold mb-0">Ultimas postagens</h5>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-dash mb-0">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Categoria</th>
                                    <th class="text-end">Curtidas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Guia de compra: primeiro telescópio</td>
                                    <td>Curiosidade</td>
                                    <td class="text-end">543</td>
                                </tr>
                                <tr>
                                    <td>Guia de compra: segundo telescópio</td>
                                    <td>Evento</td>
                                    <td class="text-end">102</td>
                                </tr>
                                <tr>
                                    <td>Guia de compra: terceiro telescópio</td>
                                    <td>Curiosidade</td>
                                    <td class="text-end">98</td>
                                </tr>
                                <tr>
                                    <td>Guia de compra: quarto telescópio</td>
                                    <td>Evento</td>
                                    <td class="text-end">10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-center mt-4 pt-2">
                        <span class="text-secondary" style="font-size: 0.9rem;">Fim do registro</span>
                    </div>
                </div>

            </div>

            <!-- COLUNA DIREITA -->
            <div class="col-lg-5">
                
                <!-- Registrar Observação -->
                <div class="dash-card mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="box-add-icon">
                            <i class="bi bi-plus-lg fs-1"></i>
                        </div>
                        <div>
                            <h6 class="text-white fw-bold mb-1 fs-5">Registrar observação</h6>
                            <p class="text-secondary mb-3" style="font-size: 0.85rem; line-height: 1.3;">
                                Adicione um novo objeto ao seu histórico com data, instrumento e notas.
                            </p>
                            <button class="btn-acao-dash w-100"> <a href="./registrar_observacao.php">Adicionar postagem</a></button>
                        </div>
                    </div>
                </div>

                <!-- Próximos Eventos -->
                <div class="dash-card">
                    <h5 class="text-white fw-bold mb-4">Proximos Eventos</h5>

                    <div class="evento-item d-flex gap-3">
                        <div class="data-box">
                            <span class="dia">12</span>
                            <span class="mes">AGO</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <span class="text-white fw-semibold">Chuva de meteoros Perseidas</span>
                            <span class="text-secondary" style="font-size: 0.85rem;">Pico após meia-noite</span>
                        </div>
                    </div>

                    <div class="evento-item d-flex gap-3">
                        <div class="data-box">
                            <span class="dia">19</span>
                            <span class="mes">AGO</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <span class="text-white fw-semibold">Lua cheia do Esturjão</span>
                            <span class="text-secondary" style="font-size: 0.85rem;">Boa visibilidade de crateras</span>
                        </div>
                    </div>

                    <div class="evento-item d-flex gap-3">
                        <div class="data-box">
                            <span class="dia">02</span>
                            <span class="mes">SET</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <span class="text-white fw-semibold">Conjunção Vênus-Marte</span>
                            <span class="text-secondary" style="font-size: 0.85rem;">Visível ao anoitecer</span>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <span class="text-secondary" style="font-size: 0.9rem;">Fim dos eventos</span>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Script para Carregar a Navbar -->
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