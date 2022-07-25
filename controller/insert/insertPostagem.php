<?php

if (!isset($_SESSION)) {
        session_start();
}

include_once('../../include/mysqlConnection.class.php');

$connectionObj = new Connection;

$tituloPost = $_POST['tituloPost'];
$descricaoPost = $_POST['descricaoPost'];
$categoria = $_POST['categoriaPost'];
$empresa = $_POST['instituicaoRelacionada'];
$idUsuario = $_SESSION['dadosUsuarioLogado']['id_usuario'];

$conexao = $connectionObj->connect();

$sql = "INSERT INTO postagens (titulo, descricao, fk_empresas, fk_categoria, fk_usuarios)
        VALUES ('$tituloPost', '$descricaoPost', '$empresa','$categoria', '$idUsuario' );
        ";
$statement = $conexao->prepare($sql);

try {
        $statement->execute();
?>
        <script>
                window.location.href = '../../pages/index.php';
        </script>
<?php
} catch (PDOException $ex) {
        echo $ex->getMessage();
}
?>