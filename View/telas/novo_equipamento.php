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
    <title>Astroblog+ - Novo Equipamento</title>

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
        <h1 class="fw-bold text-white mb-2 fs-2">Novo equipamento</h1>
        <p class="text-secondary mb-4">
            Cadastre um item pra vincular às observações.
        </p>

        <!-- Card do Formulário -->
        <div class="form-observacao-card">
            <form method="POST">

                <!-- Nome do equipamento -->
                <div class="mb-3">
                    <label for="nome_equipamento" class="form-label text-white fw-semibold small">Nome do equipamento</label>
                    <input type="text" class="form-control input-astro" id="nome_equipamento" name="nome_equipamento" placeholder="Digite o nome do equipamento..." required>
                </div>

                <!-- Tipo e Marca -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="tipo" class="form-label text-white fw-semibold small">Tipo</label>
                        <input type="text" class="form-control input-astro" id="tipo" name="tipo" placeholder="Digite o tipo..." required>
                    </div>
                    <div class="col-md-6">
                        <label for="marca" class="form-label text-white fw-semibold small">Marca</label>
                        <input type="text" class="form-control input-astro" id="marca" name="marca" placeholder="Digite a marca..." required>
                    </div>
                </div>

                <!-- Modelo -->
                <div class="mb-4">
                    <label for="modelo" class="form-label text-white fw-semibold small">Modelo</label>
                    <input type="text" class="form-control input-astro" id="modelo" name="modelo" placeholder="Digite o modelo..." required>
                </div>

                <!-- BOTÕES DE AÇÃO -->
                <div class="row g-3 pt-2">
                    <div class="col-6">
                        <a href="equipamentos.php" class="btn btn-cancelar w-100">Cancelar</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-submeter w-100">Registrar Equipamento
                            <?php 
                                if(isset($_POST['nome_equipamento'])){
                                    $nome_equipamento = $_POST['nome_equipamento'];
                                    $tipo = $_POST['tipo'];
                                    $marca = $_POST['marca'];
                                    $modelo = $_POST['modelo'];

                                    if($nome_equipamento && $tipo && $marca && $modelo){
                                        $mensagem = $inserir->cadastrarEquipamento($conexao, $nome_equipamento, $tipo, $marca, $modelo);
                                    }

                                    if ($mensagem){
                                        header('Location: equipamentos.php');
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