<?php
include("../dbconnection/functions.php");

$email = $conn->real_escape_string($_POST['EmailRestaurante']); // prepara a string recebida para ser utilizada em comando SQL
$senha   = $conn->real_escape_string($_POST['SenhaRestaurante']); // prepara a string recebida para ser utilizada em comando SQL

$tabela = "restaurante";
    $aCampos = ["IdRestaurante","EmailRestaurante","SenhaRestaurante"];
    $condicao = "EmailRestaurante = ".$email." AND SenhaRestaurante = ".md5($senha);

    $usuarios = select($conn, $aCampos, $tabela, $condicao);
    foreach($usuarios as $usuario){
        session_start();
        $_SESSION["ID"] = $usuario["IdRestaurante"];
        $_SESSION["NOME"] = $usuario["NomeRestaurante"];
        $_SESSION["TYPE"] = "restaurante";
    }

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}