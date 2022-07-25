<?php
if (!isset($_SESSION)) {
    session_start();
};

$nome_usuario_logado = $_SESSION['dadosUsuarioLogado'][1];


$title = "Alteração de Usuário";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("../layouts/head.php"); ?>
</head>
<body>
    <?php include('../layouts/navbarLogged.php'); ?>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-12 d-flex justify-content-center">
            <div class="col-5">
                <form method="POST" action="../controller/insert/alteracaoUsuario.php">
                    <h2 class="text-center mb-4">Alteração de Usuário</h2>
                    <div class="mb-3">
                        <label for="usuarioAtual" class="form-label">Usuario Atual</label>
                        <input type="text" class="form-control" id="usuarioAtual" name="usuarioAtual" onblur="validarUsuario(this.value);" required>
                        <div class="form-text">Mínimo 8 letras</div>
                    </div>
                    <div class="mb-3">
                        <label for="novoUsuarioConfirmacao" class="form-label">Novo Usuário</label>
                        <input type="text" class="form-control" id="novoUsuarioConfirmacao" name="novoUsuarioConfirmacao" onblur="validarUsuario(this.value);" required>
                        <div class="form-text">Mínimo 8 letras</div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn-alterar-usuario btn border-0">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("../layouts/footer.php"); ?>
    <script src="../assets/js/validarDadosCadastro.js"></script>
</body>

</html>