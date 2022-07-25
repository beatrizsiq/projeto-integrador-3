<?php
$title = "Cadastro";

include("../controller/select/selectCidades.php");
include("../controller/select/selectEstados.php");

$cidades = selectCidades();
$estados = selectEstados();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../layouts/head.php'); ?>
</head>

<body>

    <?php include('../layouts/navbarUnlogged.php'); ?>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-12 d-flex justify-content-center">
            <div class="col-8">
                <h1 class="text-center mb-5">Cadastro</h1>

                <form method="POST" action="../controller/insert/insertUsuario.php" class="row g-3">
                    <div class="col-6">
                        <label for="validationServer01" class="form-label">Nome Completo</label>
                        <input required type="text" maxlength="40" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Nome completo"> 
                    </div>
                    <div class="col-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input required type="text" maxlength="15" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
                    </div>
                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <select id="estado" name="estado" class="form-select" required>
                            <option>Selecione</option>
                            <?php
                            foreach ($estados as $estado) {
                            ?>
                                <option value="<?= $estado["id_estados"] ?>"><?= $estado["nome_estado"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="cidade" class="form-label">Cidade</label>
                        <select id="cidade" name="cidade" class="form-select" required>
                            <option>Selecione</option>
                            <?php
                            foreach ($cidades as $cidade) {
                            ?>
                                <option value="<?= $cidade["id_cidades"] ?>"><?= $cidade["nome_cidade"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="cep" class="form-label">CEP</label>
                        <input required type="text" class="form-control" id="cep" name="cep" placeholder="00000-000">
                    </div>
                    <div class="col-4">
                        <label for="rua" class="form-label">Rua</label>
                        <input required type="text" class="form-control" id="rua" name="rua" placeholder="Rua, Avenida, Travessa...">
                    </div>
                    <div class="col-4">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input required type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                    </div>
                    <div class="col-4">
                        <label for="numeroCasa" class="form-label">Número</label>
                        <input required type="number" value-min="1" class="form-control" id="numeroCasa" name="numeroCasa" placeholder="123">
                    </div>
                    <div class="col-md-6">
                        <label for="nomeUsuario" class="form-label">Usuário</label>
                        <input required type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" placeholder="Usuário">
                        <div class="form-text">Mínimo 8 letras</div>
                    </div>
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha</label>
                        <input required type="password" class="form-control" id="senha" name="senha" placeholder="********">
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary btn-cadastrar-usuario border-0">Cadastrar-me</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("../layouts/footer.php"); ?>
    <script src="../assets/js/validarDadosCadastro.js"></script>
</body>


</html>