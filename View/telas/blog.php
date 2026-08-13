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
    $tipoUsuario = $_SESSION['tipo'] ?? '';
    $usuarioLogado = $_SESSION['idUsuario'] ?? null;

    $observacao = $consultar->consultarObservacaoEspecifica($conexao, $idParaExcluir);

    if($tipoUsuario === 'admin' || $usuarioLogado == $observacao['UsuarioId']){
        $excluir->ExcluirObservacao($conexao, $idParaExcluir);
    }

    header('Location: blog.php');
    exit;
}

    $locais = $consultar->consultarObservacoes($conexao);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Astroblog+ - Blog</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Customizado -->
    <link rel="stylesheet" href="../../CSS/estilo.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../imagens/astroblog_app_icon.png?v=1 type="image/png">
    <link rel="icon" href="../../imagens/astroblog_app_icon.png?v=1" type="image/png">
</head>

<body>

    <!-- NAVBAR CARREGADA DINAMICAMENTE -->
    <div id="navbar-container"></div>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="container my-5" style="max-width: 800px;">

        <!-- CABEÇALHO DAS POSTAGENS -->
        <div class="d-flex justify-content-between align-items-center mb-1">
            <h1 class="fw-bold text-white m-0 fs-2">Últimas postagens</h1>

            <a href="registrar_observacao.php" class="btn-local-add">
                Nova postagem <span class="fs-5 lh-1">+</span>
            </a>
        </div>

        <p class="text-secondary mb-4">
            Conteúdo oficial e observações compartilhadas pela comunidade.
        </p>

        <!-- FILTROS -->
        <div class="d-flex gap-2 mb-4">
            <button class="btn filtro-btn btn-filtro-ativo" data-filtro="todos">
                Todos
            </button>

            <button class="btn filtro-btn btn-filtro-outline" data-filtro="oficial">
                Oficial
            </button>

            <button class="btn filtro-btn btn-filtro-outline" data-filtro="comunidade">
                Comunidade
            </button>

            <button class="btn filtro-btn btn-filtro-outline" data-filtro="curiosidade">
                Curiosidade
            </button>
        </div>

        <!-- LISTA DE POSTAGENS (FEED) -->
        <div class="d-flex flex-column gap-4" id="lista-postagens">

            <div class="postagem-card postagem" data-tipo="comunidade">
                <!-- Cabeçalho do Card -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-circulo"></div>
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-bold text-white">Marina T.</span>
                                <span class="badge-comunidade">Comunidade</span>
                            </div>
                            <small class="text-secondary" style="font-size: 0.8rem;">30 jun · Astrofotografia</small>
                        </div>
                    </div>
                    <!-- Ações -->

                </div>

                <!-- Título do Post -->
                <h5 class="fw-bold text-white mt-3 mb-3">✨ O QUE É UMA NEBULOSA? 🌌</h5>

                <!-- Imagem do Post -->
                <div class="mb-3">
                    <img src="../../imagens/O que é uma nebulosa.png" alt="O que é uma nebulosa?" class="img-fluid rounded w-100" style="max-height: 400px; object-fit: cover;">
                </div>

                <!-- Texto do Post -->
                <p class="text-light mb-3" style="font-size: 0.95rem; line-height: 1.6; text-align: justify;">
                    Uma nebulosa é, essencialmente, um berçário de estrelas. Imagine nuvens gigantescas flutuando no espaço, compostas por poeira cósmica e gases como hidrogênio e hélio. Elas são as estruturas mais coloridas e fascinantes do universo, formadas quando estrelas morrem e expelem suas camadas externas ou quando a gravidade começa a agrupar matéria para dar à luz novos sistemas solares. Em resumo, as nebulosas representam tanto o fim quanto o início de tudo o que conhecemos no cosmos: são poeira estelar em sua forma mais pura e vibrante.
                </p>

                <!-- Footer do Card (Curtidas) -->
                <div>
                    <button class="btn-like">
                        <i class="bi bi-heart fs-5"></i>
                        <span>0 likes</span>
                    </button>
                </div>
            </div>

            <?php while($linha = mysqli_fetch_assoc($locais)): ?>
    <div class="postagem-card postagem" data-tipo="<?= $linha['categoria'] ?>">
        <!-- Cabeçalho do Card -->
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex align-items-center gap-3">
                <div class="avatar-circulo"></div>
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="fw-bold text-white"><?= $linha['nomeUsuario'] ?? 'Usuário' ?></span>
                        <?php if($linha['categoria'] === 'oficial'): ?>
                            <span class="badge-oficial">Oficial</span>
                        <?php elseif($linha['categoria'] === 'comunidade'): ?>
                            <span class="badge-comunidade">Comunidade</span>
                        <?php else: ?>
                            <span class="badge-comunidade">Curiosidade</span>
                        <?php endif; ?>
                    </div>
                    <small class="text-secondary" style="font-size: 0.8rem;"><?= date('d M', strtotime($linha['dataObservacao'])) ?> · <?= $linha['objetoObservado'] ?></small>
                </div>
            </div>
            <div>
                <?php if(($_SESSION['idUsuario'] ?? null) == $linha['UsuarioId']): ?>
                        <a href="Atualizar_Registro.php?idObservercao=<?= $linha['idObservercao'] ?>" class="acao-icon" title="Editar">
                        <i class="bi bi-arrow-repeat fs-5"></i>
                    </a>
                <?php endif; ?>

                <?php if(($_SESSION['tipo'] ?? '') === 'admin' || ($_SESSION['idUsuario'] ?? null) == $linha['UsuarioId']): ?>
                    <a href="blog.php?excluir=<?= $linha['idObservercao'] ?>" class="acao-icon" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta postagem?');">
                    <i class="bi bi-x-lg fs-6"></i>
                    </a>
                <?php endif; ?>

            </div>
        </div>

        <!-- Título do Post -->
        <h5 class="fw-bold text-white mt-3 mb-2"><?= $linha['titulo'] ?></h5>

        <!-- Container / Placeholder da Imagem -->
        <div class="post-img-placeholder">
            <img src="../../imagens/NebulosaBlog.png" alt="Imagem dos cosmos">
        </div>

        <p class="text-light mb-3" style="font-size: 0.95rem; line-height: 1.6; text-align: justify;"><?= $linha['descricao'] ?></p>


        <?php
            $sqlCurtida = "SELECT COUNT(*) AS total FROM Curtida WHERE ObservacaoId = '{$linha['idObservercao']}'";
            $totalCurtidas = mysqli_fetch_assoc(mysqli_query($conexao->conectar(), $sqlCurtida))['total'];

            $sqlJaCurtiu = "SELECT idCurtida FROM Curtida WHERE ObservacaoId = '{$linha['idObservercao']}' AND UsuarioId = '" . ($_SESSION['idUsuario'] ?? 0) . "'";
            $jaCurtiu = mysqli_fetch_assoc(mysqli_query($conexao->conectar(), $sqlJaCurtiu));
        ?>
        <div>
            <button class="btn-like <?= $jaCurtiu ? 'curtido' : '' ?>" data-id="<?= $linha['idObservercao'] ?>">
                <i class="bi <?= $jaCurtiu ? 'bi-heart-fill' : 'bi-heart' ?> fs-5"></i>
                <span><?= $totalCurtidas ?> likes</span>
            </button>
        </div>
    </div>
<?php endwhile; ?>

        </div> <!-- /#lista-postagens -->

    </div> <!-- /.container -->

    <!-- Script para Carregar a Navbar Reaproveitável -->
    <script>
        fetch('../componentes/navbar.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar-container').innerHTML = data;
            });
    </script>

    <!-- JS Customizado (Mantém o filtro por botão funcionando perfeitamente) -->
    <script src="../../JS/script.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>