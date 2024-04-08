<?php
include("../dbconnection/functions.php");

$email = $conn->real_escape_string(trim($_POST['usuarioEmail'])); // prepara a string recebida para ser utilizada em comando SQL
$senha   = $conn->real_escape_string(trim($_POST['usuarioSenha'])); // prepara a string recebida para ser utilizada em comando SQL

$tabela = "p_r_a_";
$aCampos = ["IdPRA", "EmailPRA", "SenhaPRA", "NomePRA"];
$condicao = "EmailPRA = '" . $email . "' AND SenhaPRA = '" . md5($senha) . "'";

$usuarios = select($conn, $aCampos, $tabela, $condicao);
foreach ($usuarios as $usuario) {
    session_start();
    $_SESSION["ID"] = $usuario["IdPRA"];
    $_SESSION["NOME"] = $usuario["NomePRA"];
    $_SESSION["TYPE"] = "P.R.A.";
    header('Location: ../index.php');
}

if ($usuarios == null) {
    session_start();
    $_SESSION['erro'] = "Email ou senha incorretos!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ../index.php');
}
