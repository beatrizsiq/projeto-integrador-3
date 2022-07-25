<?php
include('../controller/select/selectPostagens.php');

$postagens = selectPostagens();
$empresasCitadas = selectNomeEmpresasCitadas();

if (!isset($_SESSION)) {
    session_start();
};

$title = "Home";

if (isset($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado'] == true) {
    $usuarioLogado = true;
    $navType = 'Logged';
} else {
    $usuarioLogado = false;
    $navType = 'Unlogged';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../layouts/head.php"); ?>
</head>

<body>
    <?php include('../layouts/navbar' . $navType . '.php'); ?>
    <div class="container pt-5 col-12 d-flex justify-content-around">

        <div class="col-8 float-left">
            <?php
            foreach ($postagens as $postagem) {
            ?>
                <div class="card border-secondary mb-3 border border-light bg-light">
                    <div class="card-body text-secondary">
                        <a href="../pages/verPostagem.php?postagem=<?= $postagem['id_postagem'] ?>" class="text-decoration-none link-secondary">
                            <h4 class="card-title"> <?= $postagem['titulo'] ?> </h4>
                        </a>
                        <div class="col-5 mb-2">
                            <small>
                                <p class="card-text"><?= $postagem['nome_empresa'] ?></p>
                            </small>
                        </div>
                        <div class="card-text descricao">
                            <p><?= $postagem["descricao"] ?></p>
                        </div>
                        <div class="card-text row">
                            <div class="col-3">
                                <small> <i class="link-postagem fa-solid fa-user"></i> <?= $postagem["nome_completo"] ?> </small>
                            </div>
                            <div class="col-3 d-flex justif-content-center">
                                <small class="col-12"> <i class=" link-postagem  usuario-icon fa-solid fa-location-dot"></i> <?= $postagem['nome_cidade'] . ' - ' . $postagem['sigla_estado'] ?></small>
                            </div>
                            <div class="col-3">
                                <small id="data_publicacao"> <i class="link-postagem fa-solid fa-calendar-day"></i> <?= $postagem["Data"] ?></small>
                            </div>
                            <div class="card-text categoria mb-2 col-3">
                                <small><i class="link-postagem fa-solid fa-circle-exclamation"></i> <?= $postagem['categoria'] ?></small>
                            </div>
                            <div class="link-postagem text-end mt-3">
                                <i class="fa-solid fa-comments"></i>
                                <small><a href="../pages/verPostagem.php?postagem=<?= $postagem['id_postagem'] ?>" class="link-secondary" style="text-decoration: none ;">Ver postagem completa</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="menu-empresas-citadas card border-secondary mb-3 border border-light col-3">
            <div class="card-body text-secondary">
                <div class="card-text">
                    <h4><small class="titulo-empresas-citadas">Empresas mais Citadas</small></h4>
                </div>
                <div class="col-12 py-2 mt-3 text-left">
                        <?php
                        foreach ($empresasCitadas as $empresas){
                        ?> <p> <i class="fa-solid fa-building" id="icone-empresa"></i> <?= $empresas["nome_empresa"]?></p><?php
                        }
                        ?>
                </div>
            </div>
        </div>
        <?php include("../layouts/footer.php"); ?>
</body>

</html>