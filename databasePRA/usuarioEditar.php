<?php
include("../dbconnection/functions.php");

$usuarioID   = $conn->real_escape_string($_SESSION['ID']); 
$usuarioNomeNovo   = $conn->real_escape_string($_POST['usuarioNomeNovo']); 
$usuarioEmailNovo   = $conn->real_escape_string($_POST['usuarioEmailNovo']); 
$usuarioSenhaNovo   = md5($conn->real_escape_string($_POST['usuarioSenhaNovo'])); 

$tabela = "p_r_a_";
$aSet = array("NomePRA" => "$usuarioNomeNovo", "EmailPRA" => "$usuarioEmailNovo", "SenhaPRA" => "$usuarioSenhaNovo");
$condicao = "IdPRA = ".$usuarioID;


echo update($conn, $tabela, $aSet, $condicao);
$_SESSION["NOME"] = $usuarioNomeNovo;


$conn->close();


if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: index.php');
}
