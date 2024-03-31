<?php 
include("../dbconnection/functions.php");

$pratoNome   = $conn->real_escape_string($_POST['pratoNome']);   // prepara a string recebida para ser utilizada em comando SQL
$pratoDescricao = $conn->real_escape_string($_POST['pratoDescricao']); // prepara a string recebida para ser utilizada em comando SQL
$pratoFoto = addslashes(file_get_contents($_FILES['Imagem']['tmp_name'])); // Prepara para salvar em BD
$pratoPreco  = $conn->real_escape_string($_POST['pratoPreco']);  // prepara a string recebida para ser utilizada em comando SQL


$aCampos = array("NomePrato", "DescricaoPrato", "FotoPrato", "PrecoPrato");
$aValores = array("$pratoNome", "$pratoDescricao","$pratoFoto","$pratoPreco");
$tabela = "prato";

$result = create($conn, $aCampos, $aValores, $tabela);

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  header('Location:');
}

?>
