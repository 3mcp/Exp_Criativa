<?php
include("../dbconnection/functions.php");

$usuarioID   = $conn->real_escape_string($_SESSION['ID']);
$usuarioNomeNovo   = $conn->real_escape_string($_POST['usuarioNomeNovo']);
$usuarioUsernameNovo   = $conn->real_escape_string($_POST['usuarioUsernameNovo']);
$usuarioEmailNovo   = $conn->real_escape_string($_POST['usuarioEmailNovo']);
$usuarioSenhaAntiga   = md5($conn->real_escape_string($_POST['usuarioSenhaAntiga']));
$usuarioSenhaNovo   = $conn->real_escape_string($_POST['usuarioSenhaNovo']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pratoCategorias = isset($_POST['pratoCategorias']) ? $_POST['pratoCategorias'] : [];

    $conn->query("DELETE FROM PRA_Categoria WHERE fk_P_R_A__IdPRA = ".$_SESSION['ID']);

    if (!empty($pratoCategorias)) {
        foreach ($pratoCategorias as $categoriaId) {
            $categoriaId = intval($categoriaId);
            $sql = "INSERT INTO PRA_Categoria (fk_Categoria_IdCategoria, fk_P_R_A__IdPRA) VALUES ($categoriaId, ".$_SESSION['ID'].")";
            if ($conn->query($sql) === TRUE) {
                echo "Categoria inserida com sucesso.";
            } else {
                echo "Erro ao inserir categoria: " . $conn->error;
            }
        }
    } else {
        echo "Nenhuma categoria selecionada.";
    }
}


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
