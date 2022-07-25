<?php

include_once('../../include/mysqlConnection.class.php');
$connectionObj = new Connection;

$nomeFantasia = $_POST['nomeFantasia'];
$usuarioEmpresa = $_POST['usuarioEmpresa'];
$senha = $_POST['senha'];
$cnpj = $_POST['cnpj'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numeroSede = $_POST['numeroSede'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];

$conexao = $connectionObj->connect();

try {
    $sql = "INSERT INTO empresas (nome_empresa, usuario_empresa, senha, cnpj, cep, rua, bairro, numero_sede, fk_estado, fk_cidade)
        VALUES ('$nomeFantasia', '$usuarioEmpresa', '$senha','$cnpj', '$cep', '$rua', '$bairro', '$numeroSede', '$estado', '$cidade')
        ";

    $statement = $conexao->prepare($sql);
    
    if($statement->execute()){
        $idEmpresa = $conexao->lastInsertId();

        try {
            $sql2 = "INSERT INTO usuarios (nome_usuario, nome_completo, senha, fk_empresas)
                        VALUES ('$usuarioEmpresa','$nomeFantasia', '$senha', $idEmpresa);";
    
            $statement2 = $conexao->prepare($sql2);
            $statement2->execute();
            
        } catch (\Throwable $th) {
            echo $ex->getMessage();
        }
    }

?>
    <script>
        window.location.href = '../../pages/login.php';
    </script>
<?php
} catch (PDOException $ex) {
    echo $ex->getMessage();
}


?>