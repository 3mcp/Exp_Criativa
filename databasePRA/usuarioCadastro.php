<?php
include("../dbconnection/functions.php");

if (isset($_POST['usuarioNome'], $_POST['usuarioEmail'], $_POST['usuarioSenha'])) {

    $usuarioNome   = trim($conn->real_escape_string($_POST['usuarioNome']));
    $usuarioEmail = trim($conn->real_escape_string($_POST['usuarioEmail']));
    $usuarioSenha  = trim($conn->real_escape_string($_POST['usuarioSenha']));

    $usuarioNome = ucwords(strtolower($usuarioNome));

    $md5Senha = md5($usuarioSenha);

    $aCampos = array("NomePRA", "EmailPRA", "SenhaPRA");
    $aValores = array("$usuarioNome", "$usuarioEmail", "$md5Senha");
    $tabela = "p_r_a_";

    if (isset($aValores)) {
        $result = create($conn, $aCampos, $aValores, $tabela);
    } else {
        $_SESSION["erroCadastro"] = "Erro ao cadastrar.";
    }

    if ($result == "Registro inserido com sucesso.") {
        $_SESSION["ID"] = $conn->insert_id;
        $_SESSION["NOME"] = $usuarioNome;
        $_SESSION["SENHA"] = $md5Senha;
        $_SESSION["TYPE"] = "P.R.A.";
        header('Location: ../index.php');
    } else {
        $_SESSION["erroCadastro"] = $result;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    $conn->close();
} else {
    $_SESSION["erroCadastro"] = "Campos obrigatórios não foram preenchidos.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
