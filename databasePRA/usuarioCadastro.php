<?php
include("../dbconnection/functions.php");

if (isset($_POST['usuarioNome'], $_POST['usuarioEmail'], $_POST['usuarioSenha'])) {

    $usuarioNome   = $conn->real_escape_string($_POST['usuarioNome']);
    $usuarioEmail = $conn->real_escape_string($_POST['usuarioEmail']);
    $usuarioSenha  = $conn->real_escape_string($_POST['usuarioSenha']);

    if (strlen($usuarioNome) >= 5) {
        $sql = "SELECT NomePRA FROM p_r_a_ WHERE NomePRA = '$usuarioNome'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $_SESSION["erroNome"] = "Este nome já está em uso.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $sql = "SELECT EmailPRA FROM p_r_a_ WHERE EmailPRA = '$usuarioEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $_SESSION["erroEmail"] = "Este e-mail já está em uso.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

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
            session_start();
            $_SESSION["ID"] = $conn->insert_id;
            $_SESSION["NOME"] = $usuarioNome;
            $_SESSION["SENHA"] = $md5Senha;
            $_SESSION["TYPE"] = "P.R.A.";
            header('Location: ../index.php');
        } else {
            session_start();
            $_SESSION["erroCadastro"] = "Erro ao cadastrar.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        session_start();
        $_SESSION["erroNome"] = "O nome deve ter pelo menos 5 caracteres.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $conn->close();
} else {
    $_SESSION["erroCadastro"] = "Campos obrigatórios não foram preenchidos.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
