<?php 
    namespace Astroblog\View\telas;
    session_start();
    
    require_once('../../DAO/Conexao.php');
    require_once('../../DAO/Consultar.php');
    require_once('../../DAO/Cadastrar.php');

    use AstroBlog\DAO\Conexao;
    use AstroBlog\DAO\Consultar;
    use AstroBlog\DAO\Cadastrar;

    $conexao = new Conexao();
    $consultar = new Consultar();
    $cadastrar = new Cadastrar();

    $mensagem = '';

    $usuarioIdLogado = $_SESSION['idUsuario'] ?? 0;
    $minhasObservacoes = $consultar->consultarObservacoesPorUsuario($conexao, $usuarioIdLogado);
    $info_Eventos = $consultar->consultarEventos($conexao);

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

    <!-- CONTEÚDO PRINCIPAL (Fluido como visao_geral.html) -->
    <main class="container-fluid px-md-5 my-4">

        <!-- CABEÇALHO DA PÁGINA -->
        <header class="mb-4">
            <h1 class="fw-bold text-white mb-2 fs-2">Bem-vindo, <?php 
            $mensagem = $_SESSION['usuario'];
            echo $mensagem;
            ?></h1>
            <p class="text-secondary mb-0">Acompanhe suas observações, eventos e novidades da comunidade.</p>
        </header>

        <!-- PAINÉIS PRINCIPAIS -->
        <div class="row g-4">
            
            <!-- COLUNA ESQUERDA -->
            <div class="col-lg-7 col-xl-8">
                
                <!-- Cards de Estatísticas -->
                <div class="row g-3 mb-4" cardstal>
                    <div class="col-12 col-sm-4 cardw">
                        <div class="stat-card text-center h-100">
                            <div class="number">
                                <?php 
                                $mensagem = $cadastrar->contarObservacoes($conexao);
                                echo $mensagem;
                                ?>
                            </div>
                            <div class="label">Observações registradas</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 cardw">
                        <div class="stat-card text-center h-100">
                            <div class="number">
                                <?php 
                                $mensagem = $cadastrar->contarObjetos($conexao);
                                echo $mensagem;
                                ?>
                            </div>
                            <div class="label">Objetos catalogados</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 cardw">
                        <div class="stat-card text-center h-100">
                            <div class="number">
                                <?php 
                                    $mensagem = $cadastrar->contarEventos($conexao);
                                    echo $mensagem;
                                ?>
                            </div>
                            <div class="label">Eventos acompanhados</div>
                        </div>
                    </div>
                </div>

                <!-- Tabela Últimas Postagens -->
                <div class="dash-card UltPost">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-white fw-bold mb-0 fs-5">Últimas postagens</h5>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-dash align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50%;">Título</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col" class="text-end pe-2">Curtidas</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php while($linha = mysqli_fetch_assoc($minhasObservacoes)): ?>
                                    <tr>
                                        <td class="fw-bold text-white"><?= $linha['titulo'] ?></td>
                                        <td class="text-white"><?= ucfirst($linha['categoria']) ?></td>
                                        <td class="text-end pe-2 text-white"><?= $linha['totalCurtidas'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-center pt-4 pb-2 text-secondary fw-semibold small">
                        Fim do registro
                    </div>
                </div>

            </div>

            <!-- COLUNA DIREITA -->
            <div class="col-lg-5 col-xl-4">
                
                <!-- Registrar Observação -->
                <div class="dash-card mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="box-add-icon flex-shrink-0">
                            <i class="bi bi-plus-lg fs-1"></i>
                        </div>
                        <div class="w-100">
                            <h6 class="text-white fw-bold mb-1 fs-5">Registrar observação</h6>
                            <p class="text-secondary mb-3" style="font-size: 0.85rem; line-height: 1.3;">
                                Adicione um novo objeto ao seu histórico com data, instrumento e notas.
                            </p>
                            <button class="btn-acao-dash w-100"> <a href="./registrar_observacao.php" style="text-decoration: none; color:white;">Adicionar postagem</a></button>
                        </div>
                    </div>
                </div>

                <!-- Próximos Eventos -->
                <div class="dash-card PostEvento">
                    <h5 class="text-white fw-bold mb-4 fs-5">Próximos Eventos</h5>

                    <div class="evento-item d-flex gap-3 mb-3">
                        <div class="data-box flex-shrink-0">
                            <span class="dia">20</span>
                            <span class="mes">AGO</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <span class="text-white fw-semibold">Perseidas</span>
                            <span class="text-secondary" style="font-size: 0.85rem;">Pico de atividade após a meia-noite, melhor visibilidade longe da cidade.</span>
                        </div>
                    </div>

                    <div class="evento-item d-flex gap-3 mb-3">
                        <div class="data-box flex-shrink-0">
                            <span class="dia">19</span>
                            <span class="mes">OUT</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <span class="text-white fw-semibold">Eclipse solar parcial</span>
                            <span class="text-secondary" style="font-size: 0.85rem;">Use óculos apropriados — não observe diretamente sem filtro solar.</span>
                        </div>
                    </div>

                    <?php while($linha = mysqli_fetch_assoc($info_Eventos)): ?>
                        <div class="evento-item d-flex gap-3 mb-3">
                            <div class="data-box flex-shrink-0">
                                <span class="dia"><?= date('d', strtotime($linha['dataEvento'])) ?></span>
                                <span class="mes"><?= strtoupper(date('M', strtotime($linha['dataEvento']))) ?></span>
                            </div>
                                <div class="d-flex flex-column justify-content-center">
                                <span class="text-white fw-semibold"><?= $linha['nomeEvento'] ?></span>
                                <span class="text-secondary" style="font-size: 0.85rem;"><?= $linha['descricao'] ?></span>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <div class="text-center pt-4 pb-2 text-secondary fw-semibold small">
                        Fim dos eventos
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