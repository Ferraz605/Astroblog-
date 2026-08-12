<?php 
    namespace Astroblog\View;
    ob_start();
    session_start();
    
    require_once('DAO/Conexao.php');
    require_once('DAO/Consultar.php');

    use AstroBlog\DAO\Conexao;
    use AstroBlog\DAO\Consultar;

    $conexao = new Conexao();
    $consultar = new Consultar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astroblog+ - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- CSS Customizado -->
    <link rel="stylesheet" href="./CSS/estilo.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./imagens/astroblog_app_icon.png?v=1" type="image/png">
    <link rel="icon" href="./imagens/astroblog_app_icon.png?v=1" type="image/png">
</head>

<body>

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">

            <!-- LADO ESQUERDO: Imagem do Observatório -->
            <div class="col-lg-8 col-md-7 d-none d-md-block login-bg-image" style="background-image: url('imagens/observatory_nebula.png');">
            </div>

            <!-- LADO DIREITO: Form de Login -->
            <div class="col-lg-4 col-md-5 login-panel d-flex flex-column justify-content-center align-items-center px-4 py-5">
                
                <div class="w-100" style="max-width: 320px;">
                    
                    <!-- Logo em 3D -->
                    <div class="text-center mb-3">
                        <img src="./imagens/astroblog_logo_3d.png" alt="Astroblog+" class="img-fluid" style="max-width: 190px;">
                    </div>

                    <!-- Slogan -->
                    <p class="text-center text-white fw-medium fs-6 mb-4">
                        Descubra o universo de<br>forma organizada.
                    </p>

                    <!-- Divisória -->
                    <hr class="linha-divisora-login mb-4">

                    <!-- Formulário -->
                    <form method="POST">
                        
                        <!-- Campo Usuário -->
                        <div class="mb-3">
                            <label for="usuario" class="form-label text-white fw-semibold d-flex align-items-center gap-2 mb-2">
                                <img src="imagens/user.png" alt="Ícone Usuário" width="18" height="18"> Usuario
                            </label>
                            <input type="text" class="form-control input-login" id="usuario" name="usuario" placeholder="Digite seu usuario..." required>
                        </div>

                        <!-- Campo Senha com Olho -->
                        <div class="mb-4">
                            <label for="senha" class="form-label text-white fw-semibold d-flex align-items-center gap-2 mb-2">
                                <img src="imagens/cadeado-trancado.png" alt="Ícone Senha"  width="18" height="18"> Senha
                            </label>
                            <div class="position-relative">
                                <input type="password" class="form-control input-login pe-5" id="senha" name="senha" placeholder="Digite sua senha..." required>
                                <button type="button" class="btn p-0 position-absolute end-0 top-50 translate-middle-y me-3 border-0 bg-transparent" onclick="toggleSenha('senha', this, '')">
                                    <img src="imagens/olho-fechado.png" alt="Mostrar/Ocultar Senha" width="20" height="20">
                                </button>
                            </div>
                        </div>

                        <!-- Botão Entrar -->
                        <button type="submit" class="btn btn-entrar w-100 fw-semibold mb-3">
                            Entrar
                            <?php 
                                if(isset($_POST['usuario']) || isset($_POST['senha'])){
                                    $usuario = $_POST['usuario'];
                                    $senha = $_POST['senha'];
                                    $validarTipo = $consultar->ConsultarTipo($conexao, $usuario); 
                                    
                                    $ValidarSenha = $consultar->ConsultarSenha($conexao,$senha);
                                    $ValidarUsuario = $consultar->ConsultarUsuario($conexao,$usuario);

                                    if($ValidarSenha == $senha && $ValidarUsuario == $usuario && $validarTipo == "admin"){
                                        $_SESSION['idUsuario'] = $consultar->consultarIdUsuario($conexao, $usuario);
                                        $_SESSION['tipo'] = $validarTipo;
                                        header("location: ./View/telas/visao_geral.php");  
                                        exit;
                                    } else if($ValidarSenha == $senha && $ValidarUsuario == $usuario && $validarTipo == "usuario"){
                                        $_SESSION['idUsuario'] = $consultar->consultarIdUsuario($conexao, $usuario);
                                        $_SESSION['tipo'] = $validarTipo;
                                        header("location: ./View/telas/pagina_usuario.php");
                                        exit;
                                    }
                                }
                            ?>
                        </button>

                        <!-- Link Cadastre-se -->
                        <div class="text-center">
                            <a href="./View/telas/cadastro.php" class="link-cadastro text-decoration-underline small">
                                Cadastre-se aqui
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

    <!-- Script para alternar visibilidade da senha -->
    <script>
        function toggleSenha(inputId, btn, pathPrefix) {
            const input = document.getElementById(inputId);
            const img = btn.querySelector('img');
            if (input.type === 'password') {
                input.type = 'text';
                img.src = pathPrefix + './imagens/olho.png';
            } else {
                input.type = 'password';
                img.src = pathPrefix + './imagens/olho-fechado.png';
            }
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>