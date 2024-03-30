<?php
include("../dbconnection/functions.php");

$pratoID   = $conn->real_escape_string($_POST['HiddenIDPrato']);

$tabela = "prato";
$condicao = "IdPrato = ".$pratoID;

echo deleteByCondition($conn, $tabela, $condicao);

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}