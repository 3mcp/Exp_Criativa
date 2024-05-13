<?php
//Login PRA e Admin
include("../dbconnection/functions.php");

$email = $conn->real_escape_string(trim($_POST['usuarioEmail'])); // prepara a string recebida para ser utilizada em comando SQL
$senha   = $conn->real_escape_string(trim($_POST['usuarioSenha'])); // prepara a string recebida para ser utilizada em comando SQL

$tabela = "p_r_a_";
$aCampos = ["IdPRA", "NomePRA", "UsernamePRA", "EmailPRA", "SenhaPRA", "FotoPRA", "AdminUser"];
$condicao = "EmailPRA = '" . $email . "' AND SenhaPRA = '" . md5($senha) . "'";


$usuarios = select($conn, $aCampos, $tabela, $condicao);
foreach ($usuarios as $usuario) {
    session_start();
    $_SESSION["ID"] = $usuario["IdPRA"];
    $_SESSION["NOME"] = $usuario["UsernamePRA"];
    $_SESSION["SENHA"] = md5($senha);
    $_SESSION["ADMIN"] = $usuario["AdminUser"];
    if($usuario["AdminUser"] == 0) {
        $_SESSION["TYPE"] = "P.R.A.";
    } else {
        $_SESSION["TYPE"] = "ADMIN";
    }
    header('Location: ../index.php');
}

if ($usuarios == null) {
    session_start();
    $_SESSION['erro'] = "Email ou senha incorretos!";
    $_SESSION['erroLogin'] = "pra";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ../index.php');
}

