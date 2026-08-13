<?php 
    namespace Astroblog;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- CSS Customizado -->
    <link rel="stylesheet" href="./CSS/index.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./imagens/astroblog_app_icon.png?v=1" type="image/png">
    <link rel="icon" href="./imagens/astroblog_app_icon.png?v=1" type="image/png">
</head>
<body>


  <video class="bg-video" autoplay loop muted playsinline>
    <source src="./imagens/GifNebulosa_sem_marca.mp4" type="video/mp4">
  </video>
  <div class="overlay"></div>

  <div class="tela">
    <div class="logo">
      <img src="./imagens/astroblog_app_icon.png" alt="" style="width: 3%;">
      Astroblog+
    </div>

    <div class="acoes">
      <a href="login.php" class="btn-entrar">Entrar</a>
      <a href="./View/telas/cadastro.php" class="btn-entrar">Criar conta</a>
    </div>
  </div>

</body>
</html>