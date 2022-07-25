<?php

session_start();
include_once('../../include/mysqlConnection.class.php');

$connectionObj = new Connection;

$usuario = $_POST['nomeUsuario'];
$senha = $_POST['senha'];

$conexao = $connectionObj->connect();

$sql = "select *
        from usuarios
        where usuarios.nome_usuario = ('$usuario')
        and usuarios.senha = ('$senha');";
$statement = $conexao->prepare($sql);
$statement->execute();

$retornoSql = $statement->fetchAll();

if ($statement->rowCount() == 1) {
    $_SESSION['usuarioLogado'] = true;
    $_SESSION['loginEfetuado'] = true;
    $_SESSION['dadosUsuarioLogado'] = $retornoSql[0];

    header('Location: ../../pages/index.php');
} else{
    $_SESSION['usuarioLogado'] = false;
    $_SESSION['loginEfetuado'] = false;
    header('Location: ../../pages/login.php');
}