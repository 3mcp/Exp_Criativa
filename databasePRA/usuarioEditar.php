<?php
include("../dbconnection/functions.php");

$usuarioID   = $conn->real_escape_string($_SESSION['ID']);
$usuarioNomeNovo   = $conn->real_escape_string($_POST['usuarioNomeNovo']);
$usuarioUsernameNovo   = $conn->real_escape_string($_POST['usuarioUsernameNovo']);
$usuarioEmailNovo   = $conn->real_escape_string($_POST['usuarioEmailNovo']);
$usuarioSenhaAntiga   = md5($conn->real_escape_string($_POST['usuarioSenhaAntiga']));
$usuarioSenhaNovo   = $conn->real_escape_string($_POST['usuarioSenhaNovo']);

$usuarioNomeNovo = ucwords(strtolower($usuarioNomeNovo));
$tabela = "p_r_a_";
$aSet = array("NomePRA" => "$usuarioNomeNovo", "UsernamePRA" => "$usuarioUsernameNovo","EmailPRA" => "$usuarioEmailNovo");
$condicao = "IdPRA = " . $usuarioID;

if ($usuarioSenhaNovo != "") {
    $usuarioSenhaNovo = md5($usuarioSenhaNovo);
    if ($usuarioSenhaAntiga != $_SESSION['SENHA']) {
        $_SESSION['erro'] = "A senha antiga está incorreta!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    if ($usuarioSenhaNovo == $_SESSION['SENHA']) {
        $_SESSION['erro'] = "A senha nova é igual a senha antiga!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    $aSet['SenhaPRA'] = "$usuarioSenhaNovo";
}

if (isset($_FILES['Img']))
    if ($_FILES['Img']['tmp_name'] != "") {
        $imagem = addslashes(file_get_contents($_FILES['Img']['tmp_name']));
        $aSet['FotoPRA'] = $imagem;
        echo "Imagem adicionada";
    }

echo update($conn, $tabela, $aSet, $condicao);
$_SESSION["NOME"] = $usuarioNomeNovo;
if ($usuarioSenhaNovo != "")
    $_SESSION["SENHA"] = $usuarioSenhaNovo;


if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: index.php');
}
