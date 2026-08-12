<?php 
    namespace Astroblog\View\telas;

    require_once('../../DAO/Cadastrar.php');
    require_once('../../DAO/Conexao.php');

    use AstroBlog\DAO\Cadastrar;
    use AstroBlog\DAO\Conexao;
    use DateTime;

    $conexao = new Conexao();
    $inserir = new Cadastrar();
    $mensagem = '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astroblog+ - Cadastro</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- CSS Customizado (Volta 1 pasta) -->
    <link rel="stylesheet" href="../../CSS/estilo.css">

    <!-- Favicon (Volta 1 pasta) -->
    <link rel="shortcut icon" href="../../imagens/astroblog_app_icon.png?v=1" type="image/png">
    <link rel="icon" href="../../imagens/astroblog_app_icon.png?v=1" type="image/png">
</head>

<body>

    <div class="cadastro-bg d-flex align-items-center justify-content-center p-3">
        <div class="cadastro-card">
            
            <!-- Título e Subtítulo -->
            <h2 class="text-center text-white fw-bold mb-2 fs-3">Junte-se à comunidade</h2>
            <p class="text-center text-secondary small mb-3">
                Compartilhe suas observações e descubra o céu com outros astrônomos
            </p>

            <!-- Divisória -->
            <hr class="linha-divisora-login mb-4">

            <!-- Formulário de Cadastro -->
            <form  method="POST">
                
                <!-- Campo Nome do Usuário -->
                <div class="mb-3">
                    <label for="nome_usuario" class="form-label text-white fw-semibold d-flex align-items-center gap-2 mb-1 fs-6">
                        <img src="../../imagens/user.png" alt="Ícone Usuário" width="18" height="18"> Nome do usuario
                    </label>
                    <input type="text" class="form-control input-login" id="nome_usuario" name="nome" placeholder="Digite seu usuario..." required>
                </div>

                <!-- Campo Email -->
                <div class="mb-3">
                    <label for="email" class="form-label text-white fw-semibold d-flex align-items-center gap-2 mb-1 fs-6">
                        <img src="../../imagens/envelope.png" alt="Ícone Email" width="18" height="18"> Email
                    </label>
                    <input type="email" class="form-control input-login" id="email" name="email" placeholder="Digite seu email..." required>
                </div>

                <!-- Campo Crie uma senha com Olho -->
                <div class="mb-3">
                    <label for="senha" class="form-label text-white fw-semibold d-flex align-items-center gap-2 mb-1 fs-6">
                        <img src="../../imagens/cadeado-trancado.png" alt="Ícone Senha" width="18" height="18"> Crie uma senha
                    </label>
                    <div class="position-relative">
                        <input type="password" class="form-control input-login pe-5" id="senha" name="senha" placeholder="Digite sua senha..." required>
                        <button type="button" class="btn p-0 position-absolute end-0 top-50 translate-middle-y me-3 border-0 bg-transparent" onclick="toggleSenha('senha', this, '../')">
                            <img src="../../imagens/olho-fechado.png" alt="Mostrar/Ocultar Senha" width="20" height="20">
                        </button>
                    </div>
                </div>

                <!-- Campo Confirme sua senha com Olho -->
                <div class="mb-4">
                    <label for="confirma_senha" class="form-label text-white fw-semibold d-flex align-items-center gap-2 mb-1 fs-6">
                        <img src="../../imagens/cadeado-trancado.png" alt="Ícone Senha" width="18" height="18"> Confirme sua senha
                    </label>
                    <div class="position-relative">
                        <input type="password" class="form-control input-login pe-5" id="confirma_senha" name="Confirmar_Senha" placeholder="Digite sua senha..." required>
                        <button type="button" class="btn p-0 position-absolute end-0 top-50 translate-middle-y me-3 border-0 bg-transparent" onclick="toggleSenha('confirma_senha', this, '../')">
                            <img src="../../imagens/olho-fechado.png" alt="Mostrar/Ocultar Senha" width="20" height="20">
                        </button>
                    </div>
                </div>

                <!-- Botão Cadastrar -->
                <button type="submit" class="btn btn-entrar w-100 fw-semibold mb-3">
                    Cadastrar
                <?php 
                    if(isset($_POST['nome'])){
                        $usuario = $_POST['nome'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $Confirmar_Senha = $_POST['Confirmar_Senha'];
                        $ValidarEmail = $inserir->ValidarEmail($conexao,$email);

                        if($senha == $Confirmar_Senha && $ValidarEmail != $email){
                            $mensagem = $inserir->CadastrarUsuario($conexao,$usuario,$email,$senha,'usuario',New DateTime(),0,1);     
                        }
                    }
                ?>
                </button>

                <!-- Link Voltar -->
                <div class="text-center">
                    <a href="../../index.php" class="link-cadastro text-decoration-underline small">
                        Voltar
                    </a>
                </div>

            </form>

        </div>
    </div>

    <!-- Script para alternar visibilidade da senha -->
    <script>
        function toggleSenha(inputId, btn, pathPrefix) {
            const input = document.getElementById(inputId);
            const img = btn.querySelector('img');
            if (input.type === 'password') {
                input.type = 'text';
                img.src = pathPrefix + '../../imagens/olho.png';
            } else {
                input.type = 'password';
                img.src = pathPrefix + '../../imagens/olho-fechado.png';
            }
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>