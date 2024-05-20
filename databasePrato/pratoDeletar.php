<?php
include("../dbconnection/functions.php");

//o prato so pode ser selecionada se ele estiver vinculado ao id do restaurante que a sessão esta iniciada
//e se o prato estiver associado ao restaurante
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
