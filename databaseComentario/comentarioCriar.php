<?php 
//chamado em restaurante php
include("../dbconnection/functions.php");

//pega por post o comentario feito
$comentarioContent   = $conn->real_escape_string($_POST['texto_comentario']);   
//pega a nota feita entre 0 a 5 estrelas
$comentarioNota  = $conn->real_escape_string($_POST['nota']);  
//pega o id do usuario que fez o comentario
$usuario = $_SESSION["ID"];
//pega o id do restaurante que o usuario fez o comenatrio
$restauranteId = $_GET["id"];
//pega a data que o comentario foi feita
$date = date("Y-m-d"); 

//array dos comapos que devem ser inseridos os valores 
$aCampos = array("TextoComentario", "DataComentario", "NotaComentario", "fk_Restaurante_IdRestaurante", "fk_P_R_A__IdPRA");
//valores que devem ser inseridos no campo
$aValores = array("$comentarioContent", "$date", "$comentarioNota", "$restauranteId", "$usuario");
//tudo isso na tabela comentario
$tabela = "comentario";

//chama a função criar no banco de dados
$result = create($conn, $aCampos, $aValores, $tabela);

$conn->close();

//redireciona o usuário para a página anterior, ou, se a informação da página anterior não estiver disponível, redireciona o usuário para uma página padrão
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  header('Location:');
}
 
