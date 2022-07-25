<?php
$title = "Login";
session_start();
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
            <div class="col-5">
                <h1 class="text-center mb-5">Login</h1>

                <?php
                if (isset($_SESSION['loginEfetuado']) && $_SESSION['loginEfetuado'] == false) {
                ?>
                    <div class="text-center">
                        <p class="text-danger">Credenciais incorretas, tente novamente!!</p>
                    </div>
                <?php
                }
                ?>

                <form method="POST" action="../controller/select/loginUsuario.php">
                    <div class="mb-3">
                        <label for="nomeUsuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" onblur="validarUsuario(this.value);">
                        <div class="form-text">Mínimo 8 letras</div>
                        <small>
                            <span id="feedbackErroUsuario" class="hide text-danger">Usuário menor que 8 letras!</span>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("../layouts/footer.php"); ?>
    <script src="../assets/js/validarDadosCadastro.js"></script>
</body>


</html>