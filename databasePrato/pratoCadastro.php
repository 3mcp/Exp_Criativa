<?php 
include("../dbconnection/functions.php");

$pratoNome   = $conn->real_escape_string($_POST['nomeP']);   // prepara a string recebida para ser utilizada em comando SQL
$pratoDescricao = $conn->real_escape_string($_POST['descricaoP']); // prepara a string recebida para ser utilizada em comando SQL
$pratoPreco  = $conn->real_escape_string($_POST['precoP']);  // prepara a string recebida para ser utilizada em comando SQL
$restauranteID = $_SESSION["ID"];


if ($_FILES['img']['tmp_name'] != "") {
  $imagem = addslashes(file_get_contents($_FILES['img']['tmp_name']));
  $aSet['FotoPrato'] = $imagem;
  echo "Imagem adicionada";
}

$aCampos = array("NomePrato", "DescricaoPrato", "FotoPrato", "PrecoPrato", "fk_Restaurante_IdRestaurante");
$aValores = array("$pratoNome", "$pratoDescricao", "$imagem", "$pratoPreco", "$restauranteID");
$tabela = "prato";

$result = create($conn, $aCampos, $aValores, $tabela);

$ultimoIdPrato = mysqli_insert_id($conn);

if (!is_string($ultimoIdPrato)) {
  // Se categorias foram selecionadas
  if (isset($_POST['pratoCategorias']) && !empty($_POST['pratoCategorias'])) {
      foreach ($_POST['pratoCategorias'] as $categoriaId) {
          $categoriaId = $conn->real_escape_string($categoriaId);

          $aCamposCategoria = array("fk_Categoria_IdCategoria", "fk_Prato_IdPrato");
          $aValoresCategoria = array($categoriaId, $ultimoIdPrato);
          $tabelaCategoria = "prato_categoria";

          // Criar um novo registro na tabela de associação para cada categoria selecionada
          $resultCategoria = create($conn, $aCamposCategoria, $aValoresCategoria, $tabelaCategoria);
      }
  }
}

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  header('Location:');
}

