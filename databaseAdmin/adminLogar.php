<?php
include("../dbconnection/functions.php");

$email = $conn->real_escape_string($_POST['EmailAdmin']); // prepara a string recebida para ser utilizada em comando SQL
$senha   = $conn->real_escape_string($_POST['SenhaAdmin']); // prepara a string recebida para ser utilizada em comando SQL

$tabela = "admin";
    $aCampos = ["IdAdmin","EmailAdmin","SenhaAdmin"];
    $condicao = "EmailAdmin = ".$email." AND SenhaAdmin = ".md5($senha);

    $usuarios = select($conn, $aCampos, $tabela, $condicao);
    foreach($usuarios as $usuario){
        session_start();
        $_SESSION["ID"] = $usuario["IdPRA"];
    }

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}