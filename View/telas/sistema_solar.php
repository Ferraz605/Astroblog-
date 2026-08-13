<?php 
    namespace Astroblog\View\telas;
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Astroblog+ - Sistema Solar</title>

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

    <!-- CONTEÚDO PRINCIPAL (Classe pagina-sistema-solar adicionada aqui no topo) -->
    <main class="container my-5 pagina-sistema-solar" style="max-width: 800px;">

        <!-- CABEÇALHO DA PÁGINA -->
        <header class="header-pagina mb-3">
            <h1 class="fw-bold text-white fs-2 mb-1">Sistema Solar</h1>
            <p class="text-secondary mb-0">
                Da fornalha do Sol até os confins gelados de Netuno: conheça os oito planetas.
            </p>
        </header>

        <hr class="divisor mb-4">

        <!-- LISTA DE PLANETAS -->
        <section class="lista-planetas d-flex flex-column gap-4">

            <!-- 1. MERCÚRIO -->
            <article class="planeta-card">
                <div class="planeta-imagem">
                    <img src="../../imagens/Mercurio.png" alt="Mercúrio">
                </div>
                <div class="planeta-info">
                    <div class="planeta-header">
                        <h2>Mercúrio</h2>
                        <div class="badges">
                            <span class="badge">0 Luas</span>
                            <span class="badge">Rochoso</span>
                        </div>
                    </div>
                    <p>
                        O menor e mais rápido planeta do sistema solar, orbitando o Sol em apenas 88 dias terrestres. Sem atmosfera para reter calor, sua superfície varia de mais de 400°C durante o dia a quase -170°C à noite.
                    </p>
                </div>
            </article>

            <hr class="divisor-suave">

            <!-- 2. VÊNUS -->
            <article class="planeta-card reverso">
                <div class="planeta-imagem">
                    <img src="../../imagens/Venus.png" alt="Vênus">
                </div>
                <div class="planeta-info">
                    <div class="planeta-header">
                        <h2>Vênus</h2>
                        <div class="badges">
                            <span class="badge">0 Luas</span>
                            <span class="badge">Rochoso</span>
                        </div>
                    </div>
                    <p>
                        O planeta mais quente do sistema solar, mesmo estando mais longe do Sol que Mercúrio. Sua atmosfera espessa de gás carbônico cria um efeito estufa extremo, com nuvens de ácido sulfúrico e pressão atmosférica esmagadora na superfície.
                    </p>
                </div>
            </article>

            <hr class="divisor-suave">

            <!-- 3. TERRA -->
            <article class="planeta-card">
                <div class="planeta-imagem">
                    <img src="../../imagens/Terra.png" alt="Terra">
                </div>
                <div class="planeta-info">
                    <div class="planeta-header">
                        <h2>Terra</h2>
                        <div class="badges">
                            <span class="badge">1 Lua</span>
                            <span class="badge">Rochoso</span>
                        </div>
                    </div>
                    <p>
                        Nosso lar, e até hoje o único mundo conhecido com água líquida na superfície e vida confirmada. A combinação certa de distância do Sol, atmosfera e campo magnético é o que torna isso possível.
                    </p>
                </div>
            </article>

            <hr class="divisor-suave">

            <!-- 4. MARTE -->
            <article class="planeta-card reverso">
                <div class="planeta-imagem">
                    <img src="../../imagens/Marte.png" alt="Marte">
                </div>
                <div class="planeta-info">
                    <div class="planeta-header">
                        <h2>Marte</h2>
                        <div class="badges">
                            <span class="badge">2 Luas</span>
                            <span class="badge">Rochoso</span>
                        </div>
                    </div>
                    <p>
                        O planeta vermelho, batizado assim pela cor do óxido de ferro em sua superfície. Abriga o Monte Olimpo, o maior vulcão do sistema solar, e tem duas luas pequenas e irregulares, Fobos e Deimos.
                    </p>
                </div>
            </article>

            <hr class="divisor-suave">

            <!-- 5. JÚPITER -->
            <article class="planeta-card">
                <div class="planeta-imagem">
                    <img src="../../imagens/Jupiter.png" alt="Júpiter">
                </div>
                <div class="planeta-info">
                    <div class="planeta-header">
                        <h2>Júpiter</h2>
                        <div class="badges">
                            <span class="badge">95 Luas</span>
                            <span class="badge">Gasoso</span>
                        </div>
                    </div>
                    <p>
                        O gigante gasoso do sistema solar, tão grande que caberiam mais de 1.300 Terras dentro dele. Sua Grande Mancha Vermelha é uma tempestade que já dura séculos, e suas 95 luas conhecidas incluem Europa, uma das candidatas mais promissoras a abrigar vida.
                    </p>
                </div>
            </article>

            <hr class="divisor-suave">

            <!-- 6. SATURNO -->
            <article class="planeta-card reverso">
                <div class="planeta-imagem">
                    <img src="../../imagens/Saturno.png" alt="Saturno">
                </div>
                <div class="planeta-info">
                    <div class="planeta-header">
                        <h2>Saturno</h2>
                        <div class="badges">
                            <span class="badge">146 Luas</span>
                            <span class="badge">Gasoso</span>
                        </div>
                    </div>
                    <p>
                        Famoso por seu deslumbrante sistema de anéis composto por bilhões de pedaços de gelo e rocha. É o planeta menos denso do sistema solar — se houvesse um oceano grande o suficiente, ele flutuaria na água.
                    </p>
                </div>
            </article>

            <hr class="divisor-suave">

            <!-- 7. URANO -->
            <article class="planeta-card">
                <div class="planeta-imagem">
                    <img src="../../imagens/Urano.png" alt="Urano">
                </div>
                <div class="planeta-info">
                    <div class="planeta-header">
                        <h2>Urano</h2>
                        <div class="badges">
                            <span class="badge">27 Luas</span>
                            <span class="badge">Gigante Gelado</span>
                        </div>
                    </div>
                    <p>
                        Um gigante gelado cujo eixo gira quase deitado, com o eixo praticamente paralelo à sua órbita provavelmente resultado de uma colisão antiga. Sua cor azul-esverdeada vem do metano na atmosfera, que absorve a luz vermelha do Sol.
                    </p>
                </div>
            </article>

            <hr class="divisor-suave">

            <!-- 8. NETUNO -->
            <article class="planeta-card reverso">
                <div class="planeta-imagem">
                    <img src="../../imagens/Netuno.png" alt="Netuno">
                </div>
                <div class="planeta-info">
                    <div class="planeta-header">
                        <h2>Netuno</h2>
                        <div class="badges">
                            <span class="badge">14 Luas</span>
                            <span class="badge">Gigante Gelado</span>
                        </div>
                    </div>
                    <p>
                        O planeta mais distante e mais ventoso do sistema solar, com tempestades que chegam a 2.100 km/h. Foi o primeiro planeta descoberto por cálculos matemáticos antes de ser observado diretamente no telescópio.
                    </p>
                </div>
            </article>

        </section>

        <!-- BOTÃO VOLTAR -->
        <div class="acoes mt-5">
            <button class="btn-voltar w-100"><a href="./sistema_solar.php" style="text-decoration: none; color:white;">Voltar</a></button>
        </div>

    </main>

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