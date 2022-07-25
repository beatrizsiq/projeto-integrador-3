<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once('../../include/mysqlConnection.class.php');

$connectionObj = new Connection;

$descricaoComentario = $_POST['descricaoComentario'];
$idUsuario = $_SESSION['dadosUsuarioLogado']['id_usuario'];
$idPostagem = $_SESSION['dadosPostagem']['id_postagem'];

$conexao = $connectionObj->connect();

$sql = "INSERT INTO comentarios_postagem (fk_postagem, fk_usuario, descricao)
        VALUES ('$idPostagem', '$idUsuario','$descricaoComentario');
        ";

$statement = $conexao->prepare($sql);

$fallback = 'index.php';
$anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;



try {
    $statement->execute();
    ?>
    <script> window.location.href = '../../pages/index.php'; </script>
<?php 
} catch (PDOException $ex) {
        echo $ex->getMessage();
        exit;
}
?>