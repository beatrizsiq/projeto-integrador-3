<?php

if (!isset($_SESSION)) {
        session_start();
}

include_once('../../include/mysqlConnection.class.php');

$connectionObj = new Connection;

$novaSenha = $_POST['novaSenhaConfirmada'];
$idUsuario = $_SESSION['dadosUsuarioLogado'][0];
$fkEmpresa = $_SESSION['dadosUsuarioLogado'][11];

$conexao = $connectionObj->connect();

$sql = "UPDATE usuarios  
        SET senha = '$novaSenha'
        where id_usuario = '$idUsuario';";

$sql2 = "UPDATE empresas 
            SET empresas.senha = (SELECT usuarios.senha
                                            FROM 
                                                usuarios 
                                            WHERE usuarios.fk_empresas = empresas.id_empresas)
            where empresas.id_empresas ='$fkEmpresa';";

$statement = $conexao->prepare($sql);
$statement2 = $conexao->prepare($sql2);

try {
        $statement->execute();
        $statement2->execute();
?>
<script> window.location.href = '../../pages/login.php'; </script>
<?php
} catch (PDOException $ex) {
        echo $ex->getMessage();
}
?>