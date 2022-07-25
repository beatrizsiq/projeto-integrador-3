<?php

if (!isset($_SESSION)) {
    session_start();
};

$usuario = $_SESSION['dadosUsuarioLogado'][11];
?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="../pages/index.php">
            <img id="logo" src="../img/cidade-inteligente.png" alt="Portal Cidadão" > Portal Cidadão
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item ">
                        <a class="nav-item nav-link" id="homeMenu" href="../pages/index.php">Home</span></a>
                    </li>
                    <?php
                    if($usuario > 0){?>
                        <li></li>
                    <?php }
                    else{ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-item nav-link" id="realizarReclamacao" href="../pages/novaPostagem.php">Nova Postagem</a>
                        </li>
                    <?php } ?>

                    <?php
                    if($usuario > 0){?>
                        <li class="nav-item">
                            <a class="nav-item nav-link" id="perfilUsuario" href="../pages/perfilEmpresa.php">Perfil</a>
                        </li>
                    <?php }
                    else{ ?>
                        <li class="nav-item">
                            <a class="nav-item nav-link" id="perfilUsuario" href="../pages/perfilUsuario.php">Perfil</a>
                        </li>
                    <?php } ?>
                    
                    <li class="nav-item">
                        <a class="nav-item nav-link" id="sair" href="../controller/logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>