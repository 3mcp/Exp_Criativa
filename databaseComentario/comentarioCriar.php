<?php 
include("../dbconnection/functions.php");

$comentarioContent   = $conn->real_escape_string($_POST['texto_comentario']);   
$comentarioNota  = $conn->real_escape_string($_POST['nota']);  
$usuario = $_SESSION["ID"];
$restauranteId = $_GET["id"];
$date = date("Y-m-d"); 

$aCampos = array("TextoComentario", "DataComentario", "NotaComentario", "fk_Restaurante_IdRestaurante", "fk_P_R_A__IdPRA");
$aValores = array("$comentarioContent", "$date", "$comentarioNota", "$restauranteId", "$usuario");
$tabela = "comentario";

$result = create($conn, $aCampos, $aValores, $tabela);

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  header('Location:');
}
 
