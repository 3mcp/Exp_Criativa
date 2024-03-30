<?php
include("../dbconnection/functions.php");

$usuarioID   = $conn->real_escape_string($_SESSION['ID']); 

$tabela = "p_r_a_";
$condicao = "IdPRA = ".$usuarioID;

echo deleteByCondition($conn, $tabela, $condicao);

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: usuarioTeste.php');
}