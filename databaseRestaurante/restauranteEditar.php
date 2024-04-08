<?php
include("../dbconnection/functions.php");

$restauranteID   = $conn->real_escape_string($_SESSION['ID']);
$restauranteNomeNovo   = $conn->real_escape_string($_POST['restauranteNomeNovo']);
$restauranteEmailNovo   = $conn->real_escape_string($_POST['restauranteEmailNovo']);
$restauranteSenhaNovo   = md5($conn->real_escape_string($_POST['restauranteSenhaNovo']));


$tabela = "restaurante";
$aSet = array(
    'NomeRestaurante' => "$restauranteNomeNovo",
    'EmailRestaurante' => "$restauranteEmailNovo",
    'SenhaRestaurante' => "$restauranteSenhaNovo"
);

    $tabela = "restaurante";
    $condicao = "IdRestaurante = " . $restauranteID;
    echo update($conn, $tabela, $aSet, $condicao);
    $_SESSION["NOME"] = $restauranteNomeNovo;
    if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: index.php');
    }