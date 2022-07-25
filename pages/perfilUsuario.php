<?php
if (!isset($_SESSION)) {
    session_start();
};

$usuarioLogado = $_SESSION['dadosUsuarioLogado'][1];
$id_usuario_logado = $_SESSION['dadosUsuarioLogado'][0];

include('../controller/select/selectDadosUsuarioLogadado.php');
$dadosUsuarioLogado = selectDadosUsuario();

include('../controller/select/selectPostagens.php');
$postagensPerfil = selectPostagemUsuarioLogado($usuarioLogado);

include('../controller/select/selectQuantidadesPostagens.php');
$todasPostagens = selectTodasPostagens($usuarioLogado);
$postagensComentadas = selectPostagensRespondidas($id_usuario_logado);


$title = "Perfil";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../layouts/head.php"); ?>
</head>

<body>
    <?php include('../layouts/navbarLogged.php'); ?>
    <div id="perfilUsuario" class="container pt-5 d-flex">
        <div class="col-12 row">
            <!-- Menu Esquerdo -->
            <div class="col-4 bg-light rounded" id="menu-esquerdo">
                <div class="col-12 d-flex row mt-4" id="foto-mensagem-Ola">
                    <div class="col-2">
                        <img src="/img/usuario_perfil.jpg" alt="Imagem Usuário" class="img-perfil">
                    </div>
                    <div class="col-10">
                        <h5 class="text-left">Olá,<?= ' ' . $dadosUsuarioLogado["nome_completo"] ?>!</h5>
                        <small>Cidadão</small>
                    </div>
                </div>
                <hr>
                <div class="col-12 d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary border-0" style="background-color:#f9844a;"  type="button"><a href="/pages/novaPostagem.php" id="btn-postagem" class="btn-link">Realizar Postagem</a></button>
                    <ul class="list-group bg-light ">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    <h6>Postagens</h6>
                                </div>
                                <div class="border-0">
                                    <a href="" class="list-group-item list-group-item-action border-0 border border-white">Todas
                                        <span class="badge rounded-pill"><?= $todasPostagens['TodasPostagens']?></span>
                                    </a>
                                </div>
                                <div class="border-0">
                                    <a href="" class="list-group-item list-group-item-action border-0 border border-white">Respondidas
                                        <span class="badge rounded-pill"><?= $postagensComentadas['PostagensComentadas']?></span>
                                    </a>
                                </div>
                                <div class="border-0">
                                    <a href="" class="list-group-item list-group-item-action border-0 border border-white">Não Respondidas
                                        <span class="badge rounded-pill"><?= $todasPostagens['TodasPostagens'] - $postagensComentadas['PostagensComentadas']?></span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    <h6>Configurações</h6>
                                </div>
                                <div class="border-0">
                                    <a href="/pages/alterarUsuario.php" class="list-group-item list-group-item-action border-0 border border-white">Alterar Usuário</a>
                                </div>
                                <div class="border-0">
                                    <a href="/pages/alterarSenha.php" class="list-group-item list-group-item-action border-0 border border-white">Alterar Senha</a>
                                </div>
                                <div class="border-0">
                                    <a href="" class="list-group-item list-group-item-action border-0 border border-white">Dados Pessoais</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Menu direito -->
            <div class="col-8 bg-light rounded" id="menu-direito">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Status</th>
                            <th scope="col">ID da Postagem</th>
                            <th scope="col">Data</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Postagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($postagensPerfil as $postagem) {
                            $postagemId = selectPostagemById($postagem["id_postagem"]);
                            $id_postagem = $postagemId['id_postagem'];
                            $respondidas_nao_respondidas = selectRespondidasNaoRespondidas($id_usuario_logado, $id_postagem); 
                        ?>
                            <tr>
                                <td scope="row">
                                <?php
                                    
                                    if ($respondidas_nao_respondidas["Respondida_nao_respondida"] >= 1)
                                        echo  'Respondida';
                                    if($respondidas_nao_respondidas["Respondida_nao_respondida"] <= 0)
                                        echo 'Não Respondida';
                                ?>
                                </td>
                                <td><?= $postagem["id_postagem"] ?></td>
                                <td><?= $postagem["Data"] ?></td>
                                <td><?= $postagem["nome_empresa"] ?></td>
                                <td><a class="link-postagem"  href="../pages/verPostagem.php?postagem=<?= $id_postagem ?>">Clique Aqui</a></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php include("../layouts/footer.php"); ?>               
</body>

</html>