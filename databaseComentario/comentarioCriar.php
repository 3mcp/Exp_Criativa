<?php 
include("../dbconnection/functions.php");

$comentarioContent   = $conn->real_escape_string($_POST['']);   
$comentarioNota  = $conn->real_escape_string($_POST['']);  
$usuario = $_SESSION["ID"];
$restaurante = $conn->real_escape_string($_POST['']); 

$aCampos = array("TextoComentario", "DataComentario", "NotaComentario", "fk_Restaurante_IdRestaurante", "fk_P_R_A__IdPRA");
$aValores = array("$comentarioContent", date("d-m-Y"), "$comentarioNota", "$usuario", "$restaurante");
$tabela = "comentario";

$result = create($conn, $aCampos, $aValores, $tabela);

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  header('Location:');
}
 

