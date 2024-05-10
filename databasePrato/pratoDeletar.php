<?php
include("../dbconnection/functions.php");

if(isset($_GET['id'])) {
  $pratoID = $_GET['id'];
  $tabela = "prato";
  $condicao = "IdPrato = ".$pratoID;

  echo deleteByCondition($conn, $tabela, $condicao);

  if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    header('Location:');
  }
} else {
  echo "ID do prato não fornecido.";
}
?>
