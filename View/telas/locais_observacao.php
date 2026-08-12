<?php 
    namespace Astroblog\View\telas;

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
        $excluir->ExcluirLocal($conexao, $idParaExcluir);
        header('Location: locais_observacao.php');
        exit;
    }

    $locais = $consultar->consultarLocais($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astroblog+ - Locais de Observação</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons (para os ícones das Ações) -->
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
    <div class="container my-5" style="max-width: 900px;">
        
        <!-- Cabeçalho -->
        <div class="d-flex justify-content-between align-items-center mb-1">
            <h1 class="fw-bold text-white m-0 fs-2">Locais de observação</h1>
            <a href="novo_local.php" class="btn-local-add">
                Local <span class="fs-5 lh-1">+</span>
            </a>
        </div>
        <p class="text-secondary mb-4">
            Lugares disponíveis pra vincular às observações da comunidade.
        </p>

        <!-- Card da Tabela de Locais -->
        <div class="locais-card">
            <div class="table-responsive">
                <table class="table table-locais align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 45%;">Nome</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">País</th>
                            <th scope="col" class="text-end pe-3">Ações</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php while ($linha = mysqli_fetch_assoc($locais)): ?>
                                <tr>
                                    <td>
                                        <span class="nome-local"><?= $linha['nomeLocal'] ?></span>
                                        <span class="descricao-local"><?= $linha['descricao'] ?></span>
                                    </td>
                                    <td class="text-white fw-semibold"><?= $linha['cidade'] ?></td>
                                    <td class="text-white fw-semibold"><?= $linha['estado'] ?></td>
                                    <td class="text-white fw-semibold"><?= $linha['pais'] ?></td>
                                    <td class="text-end pe-3">
                                        <a href="./Atualizar_Local.php?idLocal=<?= $linha['idLocal'] ?>" class="acao-icon" title="Editar">↻</a>
                                        <a href="locais_observacao.php?excluir=<?= $linha['idLocal'] ?>" class="acao-icon" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este local?');">✖</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                </table>
            </div>

            <!-- Fim da Lista -->
            <div class="text-center py-4 text-secondary fw-semibold">
                Fim da Lista
            </div>
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