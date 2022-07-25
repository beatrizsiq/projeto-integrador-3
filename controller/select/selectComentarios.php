<?php
function selectComentarios($idPostagem)
{
    include_once(__DIR__ . "/../../include/mysqlConnection.class.php");
    
    $connectionObj = new Connection;
    $conexao = $connectionObj->connect();

    $sql = "SELECT
                    comentarios_postagem.descricao AS 'descricaoComentario',
                    usuarios.nome_completo AS 'usuarioComentario',
                    date_format(comentarios_postagem.data_comentario, '%d/%m/%Y às %H:%i') AS 'dataComentario'
              FROM comentarios_postagem
             INNER JOIN usuarios 
                        ON comentarios_postagem.fk_usuario = usuarios.id_usuario
             INNER JOIN cidades 
                        ON usuarios.fk_cidade = cidades.id_cidades
             INNER JOIN estados
                        ON cidades.fk_estado = estados.id_estados
             INNER JOIN postagens 
                        ON comentarios_postagem.fk_postagem = postagens.id_postagem
             INNER JOIN categorias 
                        ON categorias.id_categoria = postagens.fk_categoria
             WHERE 
                    comentarios_postagem.fk_postagem = $idPostagem
             ORDER BY 
                    comentarios_postagem.data_comentario DESC";

    $statement = $conexao->prepare($sql);
    $statement->execute();

    $retornoSql = $statement->fetchAll();

    return $retornoSql;
}