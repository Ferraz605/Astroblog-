<nav class="navbar navbar-expand-lg navbar-custom p-3">
    <!-- O container nativo do Bootstrap já gerencia o alinhamento corretamente -->
    <div class="container-fluid">
        
        <!-- 1. LADO ESQUERDO: HAMBÚRGUER + LOGO -->
        <div class="d-flex align-items-center gap-2 order-1">
            <!-- Menu Hambúrguer -->
            <button class="navbar-toggler btn-hamburger-astro shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo" aria-controls="navbarConteudo" aria-expanded="false" aria-label="Alternar navegação">
                <i class="bi bi-list fs-3"></i>
            </button>

            <!-- Logo -->
            <a class="navbar-brand titulo-gradiente m-0 fs-4" href="blog.html">
                AstroBlog+
            </a>
        </div>

        <!-- 2. LADO DIREITO: PERFIL DO USUÁRIO (Sempre no topo) -->
        <!-- "order-2" para ficar ao lado do logo no celular, "order-lg-3" para ir pro final no desktop -->
        <div class="dropdown order-2 order-lg-3">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle foto-perfil-toggle" data-bs-toggle="dropdown" aria-expanded="false" title="Menu do Usuário">
                <img src="../../imagens/usuario.png" alt="Foto do Usuário" class="rounded-circle border border-2 border-secondary" width="45" height="45" style="object-fit: cover;">
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow-lg mt-2">
                <li>
                    <a class="dropdown-item text-danger fw-semibold d-flex align-items-center gap-2" href="../../index.php">
                        Deseja sair?
                    </a>
                </li>
            </ul>
        </div>

        <!-- 3. LINKS PRINCIPAIS (COLLAPSE) -->
        <!-- "order-3" para cair pra linha de baixo no celular, "order-lg-2" para ficar no centro no desktop -->
        <div class="collapse navbar-collapse justify-content-center order-3 order-lg-2" id="navbarConteudo">
            <ul class="navbar-menu nav nav-pills gap-2 my-3 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="blog.html">Início</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-semibold" data-bs-toggle="dropdown" href="#" role="button">Blog</a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="../telas/blog.php">Geral</a></li>
                        <li><a class="dropdown-item" href="../telas/registrar_observacao.php">Nova Observação</a></li>
                        <li><a class="dropdown-item" href="#">Eventos</a></li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="../telas/sistema_solar.php">Sistema Solar</a>
                </li>

              <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="../telas/equipamentos.php">Equipamentos</a>
                </li>

              <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="../telas/locais_observacao.php">Locais</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-semibold" data-bs-toggle="dropdown" href="#" role="button">Gerenciamento</a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Eventos</a></li>
                        <li><a class="dropdown-item" href="../telas/visualizar_usuario.php">Visualizar Usuários</a></li>

                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>