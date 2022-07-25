<?php
function selectPostagens()
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = "SELECT
                    *, date_format(postagens.data_postagem, '%d/%m/%Y às %H:%i') as Data
              FROM postagens
             INNER JOIN usuarios ON postagens.fk_usuarios = usuarios.id_usuario
             INNER JOIN empresas ON postagens.fk_empresas = empresas.id_empresas
             INNER JOIN cidades ON usuarios.fk_cidade = cidades.id_cidades
             INNER JOIN estados ON cidades.fk_estado = estados.id_estados
             INNER JOIN categorias ON categorias.id_categoria = postagens.fk_categoria
             ORDER BY postagens.data_postagem desc";

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetchAll();

    return $retornoSql;
}

function selectPostagemById($idPostagem)
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = "SELECT
                    *, date_format(postagens.data_postagem, '%d/%m/%Y às %H:%i') as 'Data'
            FROM postagens
            INNER JOIN usuarios ON postagens.fk_usuarios = usuarios.id_usuario
            INNER JOIN cidades ON usuarios.fk_cidade = cidades.id_cidades
            INNER JOIN estados ON cidades.fk_estado = estados.id_estados
            INNER JOIN categorias ON categorias.id_categoria = postagens.fk_categoria
            INNER JOIN empresas ON postagens.fk_empresas = empresas.id_empresas
            WHERE postagens.id_postagem = $idPostagem";

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetchAll();

    $_SESSION['dadosPostagem'] = $retornoSql[0];

    return $retornoSql[0];
}

function selectPostagemUsuarioLogado($usuarioLogado)
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = "SELECT
                    postagens.id_postagem,
                    date_format(postagens.data_postagem, '%d/%m/%Y às %H:%i') as Data,
                    empresas.nome_empresa
              FROM postagens
             INNER JOIN usuarios ON postagens.fk_usuarios = usuarios.id_usuario
             INNER JOIN empresas ON postagens.fk_empresas = empresas.id_empresas
             where usuarios.nome_usuario = '$usuarioLogado'
             ORDER BY  Data asc; 
             ";

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetchAll();

    return $retornoSql;
}

function selectNomeEmpresasCitadas(){
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");

    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();
    $sql = "SELECT DISTINCT empresas.nome_empresa as nome_empresa
            FROM postagens
            JOIN empresas ON postagens.fk_empresas = empresas.id_empresas;";
    $statement = $conexao->prepare($sql);
    $statement->execute();
    $retornoSql = $statement->fetchAll();
    return $retornoSql;
}
