<?php
function selectPostagemUsuarioEmpresa($idEmpresa)
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = "SELECT
                    postagens.id_postagem,
                    date_format(postagens.data_postagem, '%d/%m/%Y às %H:%i') as Data,
                    empresas.nome_empresa, 
                    usuarios.nome_completo 
              FROM postagens
             INNER JOIN usuarios ON postagens.fk_usuarios = usuarios.id_usuario
             INNER JOIN empresas ON postagens.fk_empresas = empresas.id_empresas
             where postagens.fk_empresas = '$idEmpresa'
             ORDER BY  Data asc; 
             ";

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetchAll();

    return $retornoSql;
}

function selectTodasPostagensRelacEmpresa($idEmpresa){

    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = " SELECT DISTINCT 
                    COUNT(postagens.id_postagem) as 'TodasPostagens'
	         FROM 
                postagens
             WHERE postagens.fk_empresas = '$idEmpresa';"
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

function selectRespondidasNaoRespondidasEmpresa($id_usuario, $id_postagem)
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
                    comentarios_postagem.fk_usuario = '$id_usuario'
                AND postagens.fk_usuarios <> '$id_usuario'
                AND postagens.id_postagem = '$id_postagem';"
            ;

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetch();

    return $retornoSql;
}

?>