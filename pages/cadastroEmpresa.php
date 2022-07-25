<?php
$title = "Cadastrar Empresa";

include("../controller/select/selectCidades.php");
include("../controller/select/selectEstados.php");

$cidades = selectCidades();
$estados = selectEstados();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('../layouts/head.php'); ?>
</head>

<body>

    <?php include('../layouts/navbarUnlogged.php'); ?>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-12 d-flex justify-content-center">
            <div class="col-8">
                <h1 class="text-center mb-4">Cadastro de Empresa</h1>
                <form method="POST" action="../controller/insert/insertEmpresa.php" class="row g-3">
                    <div class="col-6">
                        <label for="nomeFantasia" class="form-label">Nome Fantasia</label>
                        <input required type="text" maxlength="40" class="form-control" id="nomeFantasia" name="nomeFantasia" placeholder="Nome da Empresa">
                    </div>
                    <div class="col-6">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input required type="text" maxlength="15" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00">
                    </div>
                    <div class="mt-6">
                        <h5>Sede Principal</h5>
                    </div>
                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <select required id="estado" name="estado" class="form-select">
                            <option selected>Selecione</option>
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
                        <select required id="cidade" name="cidade" class="form-select">
                            <option selected>Selecione</option>
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
                        <label for="numeroSede" class="form-label">Número</label>
                        <input required type="number" value-min="1" class="form-control" id="numeroSede" name="numeroSede" placeholder="123">
                    </div>
                    <div class="col-md-6">
                        <label for="usuarioEmpresa" class="form-label">Usuário Empresarial</label>
                        <input required type="text;" class="form-control" id="usuarioEmpresa" name="usuarioEmpresa" placeholder="Usuario Empresarial">
                        <div class="form-text">Mínimo 8 letras</div>
                    </div>
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha</label>
                        <input required type="password" class="form-control" id="senha" name="senha" placeholder="*******">
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary btn-cadastrar-empresa border-0">Cadastrar-me</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("../layouts/footer.php"); ?>
    <script src="../assets/js/validarDadosCadastro.js"></script>
</body>

</html>