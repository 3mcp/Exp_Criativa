<?php
include("../dbconnection/functions.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $pratoID = $_GET['id'];
    $tabela = "prato";
    $condicao = "IdPrato = " . $pratoID;
    $pratos = select($conn, "*", $tabela, $condicao);
    foreach ($pratos as $prato) {
        if ($_SESSION["TYPE"] == "Restaurante")
            if ($prato["fk_Restaurante_IdRestaurante"] == $_SESSION["ID"]) {
                echo deleteByCondition($conn, $tabela, $condicao);
            }
    }
} else {
    echo "ID do prato não fornecido.";
}


if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}
