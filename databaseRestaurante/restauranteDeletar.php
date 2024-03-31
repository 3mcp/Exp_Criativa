<?php
include("dbconnection/functions.php");

$usuarioID   = $conn->real_escape_string($_SESSION['ID']); 

$tabela = "restaurante";
$condicao = "IdRestaurante = ".$restauranteID;

echo deleteByCondition($conn, $tabela, $condicao);

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}