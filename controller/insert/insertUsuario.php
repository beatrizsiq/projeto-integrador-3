<?php

include_once('../../include/mysqlConnection.class.php');

$connectionObj = new Connection;

$nomeCompleto = $_POST['nomeCompleto'];
$nomeUsuario = $_POST['nomeUsuario'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numeroCasa = $_POST['numeroCasa'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];


$conexao = $connectionObj->connect();

$sql = "INSERT INTO usuarios (nome_completo, nome_usuario, senha, cpf, cep, rua, bairro, numero, fk_estado, fk_cidade)
        VALUES ('$nomeCompleto', '$nomeUsuario', '$senha','$cpf', '$cep', '$rua', '$bairro', '$numeroCasa', '$estado', '$cidade');";
$statement = $conexao->prepare($sql);

try {
    $statement->execute();

?>
    <script>
        window.location.href = '../../pages/login.php';
    </script>
<?php
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
