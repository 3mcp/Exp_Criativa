<?php
include("dbconnection/functions.php");

$usuarioID   = $conn->real_escape_string($_SESSION['ID']); 

$tabela = "restaurante";
$condicao = "IdRestaurante = ".$restauranteID;

echo deleteByCondition($conn, $tabela, $condicao);
session_start();
session_destroy();
header('Location: index.php');