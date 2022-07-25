<?php

function selectTodasPostagens($nome_usuario)
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = " SELECT DISTINCT 
                    COUNT(postagens.id_postagem) as 'TodasPostagens'
	         FROM 
                postagens
             JOIN usuarios ON usuarios.id_usuario = postagens.fk_usuarios
             WHERE usuarios.nome_usuario = '$nome_usuario';"
            ;

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetch();

    return $retornoSql;
}

function selectPostagensRespondidas($id_usuario)
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = " SELECT COUNT(DISTINCT comentarios_postagem.fk_postagem) as 'PostagensComentadas' 
            FROM postagens
            JOIN comentarios_postagem on postagens.id_postagem = comentarios_postagem.fk_postagem
            WHERE comentarios_postagem.fk_usuario <> '$id_usuario'
            AND postagens.fk_usuarios = '$id_usuario';"
            ;

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetch();

    return $retornoSql;
}

function selectRespondidasNaoRespondidas($id_usuario, $id_postagem)
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = " SELECT COUNT(DISTINCT comentarios_postagem.fk_postagem) as 'Respondida_nao_respondida' 
                FROM 
                    postagens
                JOIN comentarios_postagem 
                    ON postagens.id_postagem = comentarios_postagem.fk_postagem
                WHERE 
                    comentarios_postagem.fk_usuario <> '$id_usuario'
                AND postagens.fk_usuarios = '$id_usuario'
                AND postagens.id_postagem = '$id_postagem';"
            ;

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetch();

    return $retornoSql;
}

?>