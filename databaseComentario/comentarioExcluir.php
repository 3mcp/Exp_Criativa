<?php
//chamado em meuperfil do admin
include("../dbconnection/functions.php");

//Verifica se o parâmetro id foi passado via URL e não está vazio.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    //pega o id do comentario
    $comentarioID = $_GET['id'];
    //na tabela comentario
    $tabela = "comentario";
    $condicao = "IdComentario = " . $comentarioID;
    //Usa a função select para buscar o comentário com o ID especificado
    $comentarios = select($conn, "*", $tabela, $condicao);
    foreach ($comentarios as $comentario) {
        //Verifica se o usuário é do tipo "P.R.A." e se o ID do usuário na sessão corresponde ao ID do autor do comentário.
        //Verifica se o usuário é do tipo "ADMIN".
        //Chama a função deleteByCondition para deletar o comentário se qualquer uma das verificações for verdadeira.
        if ($_SESSION["TYPE"] == "P.R.A.") {
            if ($comentario["fk_P_R_A__IdPRA"] == $_SESSION["ID"]) {
                echo deleteByCondition($conn, $tabela, $condicao);
            }
        } else if ($_SESSION["TYPE"] = "ADMIN") {
            echo deleteByCondition($conn, $tabela, $condicao);
        }
    }
}
 else {
    echo "ID do comentario não fornecido.";
}

//redireciona o usuário para a página anterior, ou, se a informação da página anterior não estiver disponível, redireciona o usuário para uma página padrão
if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}
