<?php
function selectDadosUsuario()
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $usuario = $_SESSION['dadosUsuarioLogado'][1];
    $senha = $_SESSION['dadosUsuarioLogado'][3];

    $sql = "SELECT *
            FROM usuarios
            where usuarios.nome_usuario = ('$usuario')
            and usuarios.senha = ('$senha');";

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetchAll();
    $_SESSION['dadosUsuario'] = $retornoSql[0];

    return $retornoSql[0];
}
