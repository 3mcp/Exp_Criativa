<?php
include("../dbconnection/functions.php");

// Verifica se os campos necessários estão definidos em $_POST
if(isset($_POST['usuarioNome'], $_POST['usuarioEmail'], $_POST['usuarioSenha'])) {
    
    $usuarioNome   = $conn->real_escape_string($_POST['usuarioNome']);
    $usuarioEmail = $conn->real_escape_string($_POST['usuarioEmail']);
    $usuarioSenha  = $conn->real_escape_string($_POST['usuarioSenha']);

    //Criptografa Senha
    $md5Senha = md5($usuarioSenha);

    $aCampos = array("NomePRA", "EmailPRA", "SenhaPRA");
    $aValores = array("$usuarioNome", "$usuarioEmail","$md5Senha");
    $tabela = "p_r_a_";

    if (isset($aValores)) {
        $result = create($conn, $aCampos, $aValores, $tabela);
    } else {
        $_SESSION["erroCadastro"] = "Erro ao cadastrar.";
    }

    if($result == "Registro inserido com sucesso.") {
        session_start();
        $_SESSION["ID"] = $conn->insert_id;
        $_SESSION["NOME"] = $usuarioNome;
        $_SESSION["TYPE"] = "P.R.A.";
        header('Location: ../index.php');
    }else {
        session_start();
        $_SESSION["erro"] = $result;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $conn->close();

} else {
    $_SESSION["erroCadastro"] = "Campos obrigatórios não foram preenchidos.";
}
?>
