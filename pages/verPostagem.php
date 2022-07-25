<?php
include("../controller/select/selectPostagens.php");
include("../controller/select/selectComentarios.php");

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['postagem']) && $_GET['postagem'] != "") {
    $postagem = selectPostagemById($_GET['postagem']);
}

if (isset($_GET['postagem']) && $_GET['postagem'] != "") {
    $comentarios = selectComentarios($_GET['postagem']);
}

$title = "Publicação";

if (isset($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado'] == true) {
    $usuarioLogado = true;
    $navType = 'Logged';
} else {
    $usuarioLogado = false;
    $navType = 'Unlogged';
}

$dadosUsuarioLogado = (isset($_SESSION['dadosUsuarioLogado'])) ? $_SESSION['dadosUsuarioLogado'] : null;
$dadosPostagem = (isset($_SESSION['dadosPostagem'])) ? $_SESSION['dadosPostagem'] : null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../layouts/head.php"); ?>
</head>

<body>
    <?php include('../layouts/navbar' . $navType . '.php'); ?> <div class="container">
        <div class="pt-5 col-12">

            <div class=" col-10  card border-secondary mb-3 border border-light">
                <div class="card-body text-secondary bg-white">
                    <div class="card-text mb-3">
                        <h4 class="card-title "> <?= $postagem['titulo'] ?> </h4>
                    </div>
                    <div class="col-5 mb-2">
                        <small>
                            <p class="card-text"><?= $postagem['nome_empresa'] ?></p>
                        </small>
                    </div>
                    <div class="card-text row">
                        <div class="col-3">
                            <small> <i class="link-postagem fa-solid fa-user"></i> <?= $postagem["nome_completo"] ?> </small>
                        </div>
                        <div class="col-3 d-flex justif-content-center">
                            <small class="col-12"> <i class="link-postagem usuario-icon fa-solid fa-location-dot"></i> <?= $postagem['nome_cidade'] . ' - ' . $postagem['sigla_estado'] ?></small>
                        </div>
                        <div class="col-3 mb-2">
                            <small id="data_publicacao"> <i class="link-postagem fa-solid fa-calendar-day"></i> <?= $postagem["Data"] ?></small>
                        </div>
                        <div class="col-3">
                            <small><i class="link-postagem fa-solid fa-circle-exclamation"></i> <?= $postagem['categoria'] ?></small>
                        </div>
                    </div>
                    <div class="card-text mt-4 border-light bg-white">
                        <p><?= $postagem["descricao"] ?></p>
                    </div>
                    <form action="../controller/insert/insertComentario.php" method="POST">
                        <?php
                        if (isset($dadosUsuarioLogado) && $dadosUsuarioLogado['fk_empresas'] != NULL) {
                        ?>
                            <div class="card-body">
                                <input name="descricaoComentario" id="descricaoComentario" type="text" class="form-control" aria-label="Text input with radio button" placeholder="Forneça uma resposta ao cliente...">
                            </div>
                        <?php
                        }
                        if (isset($dadosPostagem) && $dadosUsuarioLogado['id_usuario'] == $dadosPostagem['fk_usuarios']) {
                        ?>
                            <div class="card-body">
                                <input name="descricaoComentario" id="descricaoComentario" type="text" class="form-control" aria-label="Text input with radio button" placeholder="Forneça uma resposta à empresa...">
                            </div>
                        <?php
                        }
                        ?>
                    </form>
                    <div class="card-body">
                        <h6 class="card-text">Respostas</h6>
                        <?php
                        foreach ($comentarios as $comentario) {
                        ?>
                            <div class="card-body border border-light border-2 rounded">
                                <div class="row">
                                    <div class="col-5">
                                        <small> <i class="link-postagem fa-solid fa-user"></i> <?= $comentario["usuarioComentario"] ?> </small>
                                    </div>
                                </div>
                                <div class="card-text mt-3">
                                    <p><?= $comentario["descricaoComentario"] ?></p>
                                </div>
                                <div class="card-text">
                                    <div class="text-end">
                                        <small> <i class="link-postagem fa-solid fa-calendar-day"></i> <?= $comentario["dataComentario"] ?> </small>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../layouts/footer.php"); ?>
</body>

</html>