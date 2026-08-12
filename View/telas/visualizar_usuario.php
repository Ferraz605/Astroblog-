<?php 
    namespace Astroblog\View\telas;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astroblog+ - Usuários</title>

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
    <div class="container my-5" style="max-width: 900px;">
        
        <!-- Cabeçalho com Campo de Busca -->
        <div class="d-flex justify-content-between align-items-center mb-1">
            <h1 class="fw-bold text-white m-0 fs-2">Usuários</h1>
            <div>
                <input type="text" id="buscaUsuario" class="input-busca-astro" placeholder="Buscar Usuario...">
            </div>
        </div>
        <p class="text-secondary mb-4">
            Promova, remova o acesso de admin ou exclua uma conta.
        </p>

        <!-- Card da Tabela de Usuários -->
        <div class="locais-card">
            <div class="table-responsive">
                <table class="table table-locais align-middle mb-0" id="tabela-usuarios">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 25%;">Usuario</th>
                            <th scope="col" style="width: 30%;">Email</th>
                            <th scope="col">Cadastro</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end pe-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- USUÁRIO 1 (ADMIN) -->
                        <tr>
                            <td class="fw-bold text-white">Astroblog+</td>
                            <td class="text-white fw-semibold">Jorelma@gmail.com</td>
                            <td class="text-white fw-semibold">02 mar 2026</td>
                            <td>
                                <span class="badge-admin">Admin</span>
                            </td>
                            <td class="text-end pe-3">
                                <button class="acao-icon" title="Promover / Alterar Permissão">
                                    <i class="bi bi-arrow-up-circle-fill fs-5"></i>
                                </button>
                                <button class="acao-icon" title="Excluir Usuário">
                                    <i class="bi bi-x-lg fs-6"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- USUÁRIO 2 -->
                        <tr>
                            <td class="fw-bold text-white">Marina T.</td>
                            <td class="text-white fw-semibold">Maria.T@gmail.com</td>
                            <td class="text-white fw-semibold">12 mar 2026</td>
                            <td class="text-white fw-semibold">Usuario</td>
                            <td class="text-end pe-3">
                                <button class="acao-icon" title="Promover / Alterar Permissão">
                                    <i class="bi bi-arrow-up-circle-fill fs-5"></i>
                                </button>
                                <button class="acao-icon" title="Excluir Usuário">
                                    <i class="bi bi-x-lg fs-6"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- USUÁRIO 3 -->
                        <tr>
                            <td class="fw-bold text-white">Pedro L.</td>
                            <td class="text-white fw-semibold">Pedro.L@gmail.com</td>
                            <td class="text-white fw-semibold">28 abr 2026</td>
                            <td class="text-white fw-semibold">Usuario</td>
                            <td class="text-end pe-3">
                                <button class="acao-icon" title="Promover / Alterar Permissão">
                                    <i class="bi bi-arrow-up-circle-fill fs-5"></i>
                                </button>
                                <button class="acao-icon" title="Excluir Usuário">
                                    <i class="bi bi-x-lg fs-6"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- USUÁRIO 4 -->
                        <tr>
                            <td class="fw-bold text-white">Ana C.</td>
                            <td class="text-white fw-semibold">Ana.C@gamail.com</td>
                            <td class="text-white fw-semibold">02 ago 2026</td>
                            <td class="text-white fw-semibold">Usuario</td>
                            <td class="text-end pe-3">
                                <button class="acao-icon" title="Promover / Alterar Permissão">
                                    <i class="bi bi-arrow-up-circle-fill fs-5"></i>
                                </button>
                                <button class="acao-icon" title="Excluir Usuário">
                                    <i class="bi bi-x-lg fs-6"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Fim dos Usuarios -->
            <div class="text-center py-4 text-secondary fw-semibold">
                Fim dos Usuarios
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

    <!-- JS Customizado (Filtro e Busca) -->
    <script src="../../JS/script.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>