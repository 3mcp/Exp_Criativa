<?php
include("../dbconnection/functions.php");

$email = $conn->real_escape_string(trim($_POST['usuarioEmail'])); // prepara a string recebida para ser utilizada em comando SQL
$senha   = $conn->real_escape_string(trim($_POST['usuarioSenha'])); // prepara a string recebida para ser utilizada em comando SQL

$tabela = "p_r_a_";
    $aCampos = ["IdPRA","EmailPRA","SenhaPRA"];
    $condicao = "EmailPRA = ".$email." AND SenhaPRA = ".md5($senha);

    $usuarios = select($conn, $aCampos, $tabela, $condicao);
    foreach($usuarios as $usuario){
        session_start();
        $_SESSION["ID"] = $usuario["IdPRA"];
        $_SESSION["TYPE"] = "pra";
    }

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: usuarioTeste.php');
}