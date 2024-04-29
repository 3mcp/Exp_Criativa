<?php 
include("../dbconnection/functions.php");

$adminNome   = $conn->real_escape_string($_POST['adminNome']);   // prepara a string recebida para ser utilizada em comando SQL
$adminEmail = $conn->real_escape_string($_POST['adminEmail']); // prepara a string recebida para ser utilizada em comando SQL
$adminSenha  = $conn->real_escape_string($_POST['adminSenha']);  // prepara a string recebida para ser utilizada em comando SQL

//Criptografa Senha
$md5Senha = md5($adminSenha);

$aCampos = array("NomeAdmin", "EmailAdmin", "SenhaAdmin");
$aValores = array("$adminNome", "$adminEmail","$md5Senha");
$tabela = "admin";

$result = create($conn, $aCampos, $aValores, $tabela);

if($result == "Registro inserido com sucesso.") {
    session_start();
    $_SESSION["ID"] = $conn->insert_id;
}

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}

?>
