<?php
    namespace Astroblog\View\telas;
    session_start();

    require_once('../../DAO/Conexao.php');
    require_once('../../DAO/Consultar.php');
    require_once('../../DAO/Excluir.php');

    use AstroBlog\DAO\Conexao;
    use AstroBlog\DAO\Consultar;
    use AstroBlog\DAO\Excluir;

    $conexao = new Conexao();
    $consultar = new Consultar();
    $excluir = new Excluir();

    if(isset($_GET['excluir'])){
        $idParaExcluir = (int) $_GET['excluir'];
        $excluir->ExcluirEvento($conexao, $idParaExcluir);
        header('Location: eventos.php');
        exit;
    }

    $eventos = $consultar->consultarEventos($conexao);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Astroblog+ - Eventos astronômicos</title>

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
    <main class="container my-5 pagina-eventos" style="max-width: 900px;">

        <!-- CABEÇALHO -->
        <header class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold text-white mb-2 fs-2">Eventos astronômicos</h1>
                <p class="text-secondary mb-0">Acompanhe os eventos e veja as observações registradas pela comunidade.</p>
            </div>

            <?php if($_SESSION['tipo'] == 'admin'):?>
            <a href="novo_Evento.php" class="btn-local-add">
                Novo Evento <span class="fs-5 lh-1">+</span>
            </a>                    
            <?php endif; ?>



        </header>
        <!-- GRID DE EVENTOS -->
        <div class="row row-cols-1 row-cols-md-2 g-4">

            <!-- 1. PERSEIDAS -->
            <div class="col">
                <div class="card-evento">
                    <div class="card-evento-header">
                        <div class="data-box">
                            <span class="dia">20</span>
                            <span class="mes">AGO</span>
                        </div>
                        <div class="d-flex flex-column align-items-end gap-2">
                            <span class="badge-categoria">Chuva de meteoros</span>
                        </div>
                    </div>
                    <div class="card-evento-body">
                        <div class="card-evento-texto">
                            <h5 class="card-evento-titulo">Perseidas</h5>
                            <p class="card-evento-desc">Pico de atividade após a meia-noite, melhor visibilidade longe da cidade.</p>
                        </div>
                        <div class="card-evento-img">
                            <img src="../../imagens/Perseidas-Evento icone.png" alt="Perseidas">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. ECLIPSE SOLAR PARCIAL -->
            <div class="col">
                <div class="card-evento">
                    <div class="card-evento-header">
                        <div class="data-box">
                            <span class="dia">19</span>
                            <span class="mes">OUT</span>
                        </div>
                        <div class="d-flex flex-column align-items-end gap-2">
                            <span class="badge-categoria">Eclipse</span>
                        </div>
                    </div>
                    <div class="card-evento-body">
                        <div class="card-evento-texto">
                            <h5 class="card-evento-titulo">Eclipse solar parcial</h5>
                            <p class="card-evento-desc">Use óculos apropriados — não observe diretamente sem filtro solar.</p>
                        </div>
                        <div class="card-evento-img">
                            <img src="../../imagens/Eclipse Solar Parcial - Evento.png" alt="Eclipse Solar Parcial">
                        </div>
                    </div>
                </div>
            </div>

            <?php while($linha = mysqli_fetch_assoc($eventos)): ?>
            <div class="col">
                <div class="card-evento">
                    <div class="card-evento-header">
                        <div class="data-box">
                            <span class="dia"><?= date('d', strtotime($linha['dataEvento'])) ?></span>
                            <span class="mes"><?= strtoupper(date('M', strtotime($linha['dataEvento']))) ?></span>
                        </div>
                        <div class="d-flex flex-column align-items-end gap-2">
                            <?php if($_SESSION['tipo'] == 'admin'):?>
                            <div class="card-evento-acoes">
                                <a href="./Atualizar_Evento.php?idEventoAstronomico=<?= $linha['idEventoAstronomico'] ?>" class="SemL" title="Editar">
                                    <i class="bi bi-arrow-repeat"></i>
                                </a>
                                <a href="eventos.php?excluir=<?= $linha['idEventoAstronomico'] ?>"  class="SemL" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este local?');">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </div>
                            <?php endif; ?>

                            <span class="badge-categoria"><?= $linha['categoria'] ?></span>
                        </div>
                    </div>
                    <div class="card-evento-body">
                        <div class="card-evento-texto">
                            <h5 class="card-evento-titulo"><?= $linha['nomeEvento'] ?></h5>
                            <p class="card-evento-desc"><?= $linha['descricao'] ?></p>
                        </div>
                        <div class="card-evento-img">
                            <img src="../../imagens/Terra.png" alt="Eclipse Solar Parcial">
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
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