<?php
include("../dbconnection/functions.php");
$email = $conn->real_escape_string($_POST['EmailRestaurante']); // prepara a string recebida para ser utilizada em comando SQL
$senha   = $conn->real_escape_string($_POST['SenhaRestaurante']); // prepara a string recebida para ser utilizada em comando SQL
$tabela = "restaurante";
$aCampos = ["IdRestaurante", "EmailRestaurante", "SenhaRestaurante", "NomeRestaurante"];
$condicao = "EmailRestaurante = '" . $email . "' AND SenhaRestaurante = '" . md5($senha) . "'";
echo $condicao;
$usuarios = select($conn, $aCampos, $tabela, $condicao);

echo $usuarios;
foreach ($usuarios as $usuario) {
    session_start();
    $_SESSION["ID"] = $usuario["IdRestaurante"];
    $_SESSION["NOME"] = $usuario["NomeRestaurante"];
    $_SESSION["TYPE"] = "restaurante";
    header('Location: ../index.php');
}

if ($usuarios == null) {
    session_start();
    $_SESSION['erro'] = "Email ou senha incorretos!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ../index.php');
}
