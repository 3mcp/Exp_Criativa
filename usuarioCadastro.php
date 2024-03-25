<?php 
include("dbconnection/functions.php");

$usuarioNome   = $conn->real_escape_string($_POST['usuarioNome']);   // prepara a string recebida para ser utilizada em comando SQL
$usuarioEmail = $conn->real_escape_string($_POST['usuarioEmail']); // prepara a string recebida para ser utilizada em comando SQL
$usuarioSenha  = $conn->real_escape_string($_POST['usuarioSenha']);  // prepara a string recebida para ser utilizada em comando SQL

//Criptografa Senha
$md5Senha = md5($usuarioSenha);

$aCampos = array("NomePRA", "EmailPRA", "SenhaPRA");
$aValores = array("$usuarioNome", "$usuarioEmail","$md5Senha");
$tabela = "p_r_a_";

$result = create($conn, $aCampos, $aValores, $tabela);

if($result == "Registro inserido com sucesso.") {
    session_start();
    $_SESSION["ID"] = $conn->insert_id;
}

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: usuarioTeste.php');
}

?>
