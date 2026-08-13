<?php
    namespace Astroblog\View\telas;
    session_start();
    ob_start();

    require_once('../../DAO/Conexao.php');
    require_once('../../DAO/Consultar.php');
    require_once('../../DAO/Atualizar.php');

    use AstroBlog\DAO\Conexao;
    use AstroBlog\DAO\Consultar;
    use AstroBlog\DAO\Atualizar;

    $conexao = new Conexao();
    $consultar = new Consultar();
    $atualizar = new Atualizar();
    $mensagem = '';

    $idObservercao = (int) $_GET['idObservercao'];

    $info_Especifica = $consultar->consultarObservacaoEspecifica($conexao,$idObservercao);

    if(($_SESSION['idUsuario'] ?? null) != $info_Especifica['UsuarioId']){
        header('Location: blog.php');
        exit;
}
    $Equipamento_Especifico = $consultar->consultarEquipamentos($conexao);
    $Local_Especifico = $consultar->consultarLocais($conexao);
    $Evento_Especifico = $consultar->consultarEventos($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astroblog - Atualizar Observação</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

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
    <div class="container my-5" style="max-width: 760px;">
        
        <!-- Cabeçalho da Página -->
        <h1 class="fw-bold text-white mb-2 fs-2">Atualizar observação</h1>
        <p class="text-secondary mb-4">
            Atualize os dados abaixo para seu histórico e ao blog.
        </p>

        <!-- Card do Formulário -->
        <div class="form-observacao-card">
            <form method="POST" enctype="multipart/form-data">

                <!-- SEÇÃO 1: O que você observou -->
                <h3 class="form-secao-titulo">O que você observou</h3>

                <div class="mb-3">
                    <label for="titulo" class="form-label text-white fw-semibold small">Título da observação</label>
                    <input type="text" class="form-control input-astro" id="titulo" name="titulo" value="<?php echo $info_Especifica['titulo']?>" placeholder="Digite o título..." required>
                </div>

               <div class="mb-3">
                    <label for="titulo" class="form-label text-white fw-semibold small">Objeto Observado</label>
                    <input type="text" class="form-control input-astro" id="titulo" name="objeto" value="<?php echo $info_Especifica['objetoObservado']?>" placeholder="Digite o título..." required>
                </div>

                    <label for="tipo_objeto" class="form-label text-white fw-semibold small">Categoria</label>
                        <select class="form-select input-astro" id="categoria" name="categoria" required>
                            <option value="" disabled>Selecione</option>
                            <option value="oficial" <?= ($info_Especifica['categoria'] == 'oficial') ? 'selected' : '' ?>>Oficial</option>
                            <option value="comunidade" <?= ($info_Especifica['categoria'] == 'comunidade') ? 'selected' : '' ?>>Comunidade</option>    
                            <option value="curiosidade" <?= ($info_Especifica['categoria'] == 'curiosidade') ? 'selected' : '' ?>>Curiosidade</option>    
                        </select>

                <!-- SEÇÃO 2: Quando e onde -->
                <h3 class="form-secao-titulo">Quando e onde</h3>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="data" class="form-label text-white fw-semibold small">Data da observação</label>
                        <input type="date" class="form-control input-astro" id="data" name="data" value="<?php echo $info_Especifica['dataObservacao']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="condicao_clima1" class="form-label text-white fw-semibold small">Condição climática</label>
                        <input type="text" class="form-control input-astro" id="condicao_clima" name="condicao_clima" value="<?php echo $info_Especifica['condicaoClimatica']?>" placeholder="Digite a condição climática....">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <label for="local" class="form-label text-white fw-semibold small m-0">Local de observação</label>
                        <a href="locais_observacao.php" class="badge-locais">Ver locais</a>
                    </div>
                        <select class="form-select input-astro" id="local" name="localid" required>
                            <option value="" selected disabled>Selecione</option>
                            <option value="0" <?= ($info_Especifica['LocalId'] == 0) ? 'selected' : '' ?>>Nenhum</option>
                            <?php while($linha = mysqli_fetch_assoc($Local_Especifico)): ?>
                                <option value="<?= $linha['idLocal'] ?>" <?= ($info_Especifica['LocalId'] == $linha['idLocal']) ? 'selected' : '' ?>><?= $linha['nomeLocal'] ?></option>
                            <?php endwhile; ?>
                        </select>
                </div>

                <!-- SEÇÃO 3: Equipamento e evento -->
                <h3 class="form-secao-titulo">Equipamento e evento</h3>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="equipamentoid" class="form-label text-white fw-semibold small">Equipamento utilizado</label>
                            <select class="form-select input-astro" id="equipamentoid" name="equipamentoid">
                                <option value="" selected disabled>Selecione</option>
                                <option value="0" <?= ($info_Especifica['EquipamentoId'] == 0) ? 'selected' : '' ?>>Nenhum</option>
                                <?php while($linha = mysqli_fetch_assoc($Equipamento_Especifico)): ?>
                                    <option value="<?= $linha['idEquipamento'] ?>" <?= ($info_Especifica['EquipamentoId'] == $linha['idEquipamento']) ? 'selected' : '' ?>><?= $linha['nomeEquipamento'] ?></option>
                                <?php endwhile; ?>
                            </select>
                    </div>

                    <div class="col-md-6">
                        <label for="eventoAstronomicoid" class="form-label text-white fw-semibold small">Evento Astronomico</label>
                            <select class="form-select input-astro" id="eventoAstronomicoid" name="eventoAstronomicoid">
                                <option value="" selected disabled>Selecione</option>
                                <option value="0" <?= ($info_Especifica['EventoAstronomicoId'] == 0) ? 'selected' : '' ?>>Nenhum</option>
                                <?php while($linha = mysqli_fetch_assoc($Evento_Especifico)): ?>
                                    <option value="<?= $linha['idEventoAstronomico'] ?>" <?= ($info_Especifica['EventoAstronomicoId'] == $linha['idEventoAstronomico']) ? 'selected' : '' ?>><?= $linha['nomeEvento'] ?></option>
                                <?php endwhile; ?>
                            </select>
                    </div>

                <!-- SEÇÃO 4: Detalhes -->
                <h3 class="form-secao-titulo">Detalhes</h3>

                <div class="mb-3">
                    <label for="descricao" class="form-label text-white fw-semibold small">Descrição</label>
                    <textarea class="form-control input-astro" id="descricao" name="descricao" rows="4" placeholder="Digite a descrição..."><?= $info_Especifica['descricao'] ?></textarea>
                </div>


                <!-- BOTÕES DE AÇÃO -->
                <div class="row g-3 pt-2">
                    <div class="col-6">
                        <a href="blog.php" class="btn btn-cancelar w-100">Cancelar</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-submeter w-100">Atualizar Observação
                            <?php 
                                if(isset($_POST['titulo'])){
                                    $titulo = $_POST['titulo'];
                                    $objeto = $_POST['objeto'];
                                    $categoria = $_POST['categoria'];
                                    $data = $_POST['data'];
                                    $condicaoClimatica = $_POST['condicao_clima'];
                                    $descricao = $_POST['descricao'];

                                    $localId = ($_POST['localid'] === '') ? 0 : (int)$_POST['localid'];
                                    $equipamentoId = ($_POST['equipamentoid'] === '') ? 0 : (int)$_POST['equipamentoid'];
                                    $eventoId = ($_POST['eventoAstronomicoid'] === '') ? 0 : (int)$_POST['eventoAstronomicoid'];

                                    $usuarioId = $_SESSION['idUsuario'] ?? 0;
                                    $tipoUsuario = $_SESSION['tipo'] ?? 'usuario';
                                    $contarObservacao = 1;

                                    $mensagem = $atualizar->atualizarObservacao($conexao, $idObservercao, $titulo, $categoria, $objeto, $data, $condicaoClimatica, $descricao, $contarObservacao, $eventoId, $equipamentoId, $usuarioId, $localId);
                               
                               
                                    if ($mensagem){
                                        header('Location: blog.php');
                                        exit;
                                    }
                                    }
                            ?>        

                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

    <!-- Script para Carregar a Navbar Reaproveitável -->
    <script>
        fetch('../componentes/navbar.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar-container').innerHTML = data;
            });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>