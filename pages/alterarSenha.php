<?php
if (!isset($_SESSION)) {
    session_start();
};

$id_usuario_logado = $_SESSION['dadosUsuarioLogado'][0];

$title = "Alteração de Senha";
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
                <form method="POST" action="../controller/insert/alteracaoSenha.php">
                    <h2 class="text-center mb-4">Alteração de Senha</h2>
                    <div class="mb-3">
                        <label for="nomeUsuario" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="novaSenha" name="novaSenha" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Confime a nova senha</label>
                        <input type="password" class="form-control" id="novaSenhaConfirmada" name="novaSenhaConfirmada" required>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn-alterar-senha btn border-0">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("../layouts/footer.php"); ?>
</body>

</html>