<?php 
    namespace Astroblog\View\telas;
    ob_start();

    require_once('../../DAO/Conexao.php');
    require_once('../../DAO/Cadastrar.php');

    use AstroBlog\DAO\Conexao;
    use AstroBlog\DAO\Cadastrar;

    $conexao = new Conexao();
    $inserir = new Cadastrar();
    $mensagem = '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astroblog+ - Novo Local</title>

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
        <h1 class="fw-bold text-white mb-2 fs-2">Novo local</h1>
        <p class="text-secondary mb-4">
            Cadastre um local pra vincular às observações.
        </p>

        <!-- Card do Formulário -->
        <div class="form-observacao-card">
            <form method="POST">

                <!-- Nome do local -->
                <div class="mb-3">
                    <label for="nome_local" class="form-label text-white fw-semibold small">Nome do local</label>
                    <input type="text" class="form-control input-astro" id="nome_local" name="nome_local" placeholder="Digite o nome do local..." required>
                </div>

                <!-- Cidade e Estado -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="cidade" class="form-label text-white fw-semibold small">Cidade</label>
                        <input type="text" class="form-control input-astro" id="cidade" name="cidade" placeholder="Digite a cidade..." required>
                    </div>
                    <div class="col-md-6">
                        <label for="estado" class="form-label text-white fw-semibold small">Estado</label>
                        <input type="text" class="form-control input-astro" id="estado" name="estado" placeholder="Digite o estado..." required>
                    </div>
                </div>

                <!-- País -->
                <div class="mb-3">
                    <label for="pais" class="form-label text-white fw-semibold small">País</label>
                    <input type="text" class="form-control input-astro" id="pais" name="pais" placeholder="Digite o país..." required>
                </div>

                <!-- Descrição -->
                <div class="mb-4">
                    <label for="descricao" class="form-label text-white fw-semibold small">Descrição</label>
                    <textarea class="form-control input-astro" id="descricao" name="descricao" rows="4" placeholder="Digite a descrição..."></textarea>
                </div>

                <!-- BOTÕES DE AÇÃO -->
                <div class="row g-3 pt-2">
                    <div class="col-6">
                        <a href="locais_observacao.php" class="btn btn-cancelar w-100">Cancelar</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-submeter w-100">Cadastrar Local
                            <?php 
                                if(isset($_POST['nome_local'])){
                                    $nomeLocal = $_POST['nome_local'];
                                    $cidade = $_POST['cidade'];
                                    $pais = $_POST['pais'];
                                    $estado = $_POST['estado'];
                                    $descricao = $_POST['descricao'];

                                    if($nomeLocal && $cidade && $estado && $pais && $descricao){
                                        $mensagem = $inserir->cadastrarLocal($conexao, $nomeLocal, $cidade, $estado, $pais, $descricao);
                                    }

                                    if ($mensagem){
                                        header('Location: locais_observacao.php');
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