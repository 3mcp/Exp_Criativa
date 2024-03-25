<?php
include("dbconnection/functions.php");

$usuarioID   = $conn->real_escape_string($_SESSION['ID']); 
$usuarioNomeNovo   = $conn->real_escape_string($_POST['usuarioNomeNovo']); 

$tabela = "p_r_a_";
$aSet = array("NomePRA" => "$usuarioNomeNovo");
$condicao = "IdPRA = ".$usuarioID;

echo update($conn, $tabela, $aSet, $condicao);

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: usuarioTeste.php');
}
?>