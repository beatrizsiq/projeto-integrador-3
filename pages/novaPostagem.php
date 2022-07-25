<?php
if (!isset($_SESSION)) {
    session_start();
}
$title = "Nova Postagem";

include('../controller/select/selectEmpresas.php');
include('../controller/select/selectCategorias.php');

$empresas = selectEmpresas();
$categorias = selectCategorias();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php include('../layouts/head.php'); ?>
</head>

<body>
    <?php include('../layouts/navbarLogged.php'); ?>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-12 d-flex justify-content-center">
            <div class="col-8">
                <h2 class="text-center mb-4">Nova Postagem</h2>
                <form method="POST" action="../controller/insert/insertPostagem.php" class="row g-3">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="tituloPost" class="form-label ">Título</label>
                            <input type="text" maxlength="100" class="form-control" id="tituloPost" name="tituloPost" placeholder="Título da Postagem" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricaoPost" class="form-label">Descrição</label>
                            <textarea class="form-control" maxlength="1000" id="descricaoPost" name="descricaoPost" rows="3" placeholder="Informe aqui a sua descrição" required></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="categoriaPost" class="form-label">Categoria da Postagem</label>
                                <select id="categoriaPost" name="categoriaPost" class="form-select" >
                                    <option selected required>Selecione</option>
                                    <?php
                                    foreach ($categorias as $categoria) { ?>
                                        <option required value="<?= $categoria["id_categoria"] ?>"><?= $categoria["categoria"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="instituicaoRelacionada" class="form-label" >Instituição Relacionada</label>
                                <select id="instituicaoRelacionada" name="instituicaoRelacionada" class="form-select" onchange="inserirOutraInstituicao(this.value);" >
                                    <option selected>Selecione</option>
                                    <?php
                                    foreach ($empresas as $empresa) {
                                    ?>
                                        <option required value="<?= $empresa["id_empresas"] ?>"><?= $empresa["nome_empresa"] ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-4">
                                <button type="submit" class="btn-nova-postagem btn border-0">Enviar</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("../layouts/footer.php"); ?>
</body>

</html>