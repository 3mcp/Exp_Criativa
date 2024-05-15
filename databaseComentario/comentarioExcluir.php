<?php
include("../dbconnection/functions.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $comentarioID = $_GET['id'];
    $tabela = "comentario";
    $condicao = "IdComentario = " . $comentarioID;
    $comentarios = select($conn, "*", $tabela, $condicao);
    foreach ($comentarios as $comentario) {
        if ($_SESSION["TYPE"] == "P.R.A.")
            if ($comentario["fk_P_R_A__IdPRA"] == $_SESSION["ID"]) {
                echo deleteByCondition($conn, $tabela, $condicao);
            }
    }
} else {
    echo "ID do comentario não fornecido.";
}


if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}
