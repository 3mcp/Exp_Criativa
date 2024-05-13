<?php
include("../dbconnection/functions.php");

$pratoID   = $conn->real_escape_string($_POST['pratoID']);
$pratoNome   = $conn->real_escape_string($_POST['pratoNomeNovo']);
$pratoPreco   = $conn->real_escape_string($_POST['pratoPrecoNovo']);
$pratoDescricao   = $conn->real_escape_string($_POST['pratoDescricaoNovo']);
$pratoFoto   = $conn->real_escape_string($_POST['pratoFotoNovo']);


$campos = array(
    'pratoNomeNovo' => 'NomePrato',
    'pratoDescricaoNovo' => 'DescricaoPrato',
    'pratoFotoNovo' => 'FotoPrato',
    'pratoPrecoNovo' => 'PrecoPrato'
);

$aSet = array();

if (isset($_FILES['pratoFotoNovo']))
    if ($_FILES['pratoFotoNovo']['tmp_name'] != "") {
        $imagem = addslashes(file_get_contents($_FILES['pratoFotoNovo']['tmp_name']));
        $aSet['FotoPrato'] = $imagem;
        echo "Imagem adicionada";
    }
    
foreach ($campos as $campo_post => $campo_bd) {
    if (isset($_POST[$campo_post]) && !empty($_POST[$campo_post])) {
        $valor = $conn->real_escape_string($_POST[$campo_post]);
        $aSet[$campo_bd] = $valor;
    }
}

if(isset($_POST['pratoCategorias']) && !empty($_POST['pratoCategorias'])) {
    $tabelaCategoria = "Prato_Categoria";
    $condition = "fk_Prato_IdPrato = ". $pratoID;
    deleteByCondition($conn, $tabelaCategoria, $condition);
    foreach($_POST['pratoCategorias'] as $categoriaID) {
        $aCamposCategoriaEdicao = array("fk_Categoria_IdCategoria", "fk_Prato_IdPrato");
        $aValoresCategoria = array($categoriaID, $pratoID);
        create($conn, $aCamposCategoriaEdicao, $aValoresCategoria, $tabelaCategoria);
    }
}

if (!empty($aSet)) {
    $tabela = "prato";
    $condicao = "IdPrato = " . $pratoID;
    echo update($conn, $tabela, $aSet, $condicao);
}

$conn->close();

if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ');
}
