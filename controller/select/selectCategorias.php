<?php
    function selectCategorias(){

        include_once(__DIR__ . "/../../include/mysqlConnection.class.php");
        
        $connectionObj = new Connection;
        $conexao = $connectionObj->connect();
        

        $sql = "select * from categorias;";
        $statement = $conexao->prepare($sql);
        $statement->execute();
        
        $retornoSql = $statement->fetchAll();
        
        return $retornoSql;
    }
?>