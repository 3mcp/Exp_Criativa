<?php
include("../dbconnection/functions.php");

$restauranteID   = $conn->real_escape_string($_SESSION['ID']);
$restauranteNomeNovo   = $conn->real_escape_string($_POST['restauranteNomeNovo']);
$restauranteEmailNovo   = $conn->real_escape_string($_POST['restauranteEmailNovo']);
$restauranteSenhaAntiga   = md5($conn->real_escape_string($_POST['restauranteSenhaAntiga']));
$restauranteSenhaNovo   = $conn->real_escape_string($_POST['restauranteSenhaNovo']);
$restauranteCNPJNovo   = $conn->real_escape_string($_POST['restauranteCNPJNovo']);
$restauranteCEPNovo   = $conn->real_escape_string($_POST['restauranteCEPNovo']);
$restauranteRuaNovo   = $conn->real_escape_string($_POST['restauranteRuaNovo']);
$restauranteNumeroNovo   = $conn->real_escape_string($_POST['restauranteNumeroNovo']);
$restauranteSiteNovo   = $conn->real_escape_string($_POST['restauranteSiteNovo']);

$tabela = "restaurante";
$aSet = array(
    'NomeRestaurante' => "$restauranteNomeNovo",
    'EmailRestaurante' => "$restauranteEmailNovo",
    'CNPJRestaurante' => "$restauranteCNPJNovo",
    'CEPRestaurante' => "$restauranteCEPNovo",
    'RuaRestaurante' => "$restauranteRuaNovo",
    'Numero_Restaurante' => "$restauranteNumeroNovo",
    'SiteRestaurante' => "$restauranteSiteNovo"
);

if ($restauranteSenhaNovo != "") {
    $restauranteSenhaNovo = md5($restauranteSenhaNovo);
    if ($restauranteSenhaAntiga != $_SESSION['SENHA']) {
        $_SESSION['erro'] = "A senha antiga está incorreta!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    if ($restauranteSenhaNovo == $_SESSION['SENHA']) {
        $_SESSION['erro'] = "A senha nova é igual a senha antiga!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    $aSet['SenhaRestaurante'] = "$restauranteSenhaNovo";
}

if (isset($_FILES['Imagem']))
    if ($_FILES['Imagem']['tmp_name'] != "") {
        $imagem = addslashes(file_get_contents($_FILES['Imagem']['tmp_name']));
        $aSet['FotoRestaurante'] = $imagem;
        echo "Imagem adicionada";
    }

$restauranteNomeNovo = ucwords(strtolower($restauranteNomeNovo));

$tabela = "restaurante";
$condicao = "IdRestaurante = " . $restauranteID;
$return = update($conn, $tabela, $aSet, $condicao);
$_SESSION["NOME"] = $restauranteNomeNovo;
if ($restauranteSenhaNovo != "")
    $_SESSION["SENHA"] = $restauranteSenhaNovo;
if (isset($imagem))
    $_SESSION["FOTO"] = file_get_contents($_FILES['Imagem']['tmp_name']);
if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: index.php');
}
