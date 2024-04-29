<?php
include("../dbconnection/functions.php");

// Verifica se os campos POST foram enviados
if(isset($_POST['EmailAdmin']) && isset($_POST['SenhaAdmin'])) {
    $email = $conn->real_escape_string($_POST['EmailAdmin']);
    $senha = $conn->real_escape_string($_POST['SenhaAdmin']);

    $tabela = "admin";
    $aCampos = ["IdAdmin", "NomeAdmin", "EmailAdmin","SenhaAdmin"];

    // Use aspas simples para valores de string em SQL
    $condicao = "EmailAdmin = '".$email."' AND SenhaAdmin = '".$senha."'";

    // Execute a consulta SQL
    $usuarios = select($conn, $aCampos, $tabela, $condicao);

    // Verifica se o usuário foi encontrado
    if ($usuarios) {
        // Inicia a sessão apenas uma vez
        session_start();
        foreach($usuarios as $usuario){
            // Define as variáveis de sessão
            $_SESSION["ID"] = $usuario["IdAdmin"];
            $_SESSION["NOME"] = $usuario["NomeAdmin"];
            $_SESSION["SENHA"] = md5($senha);
            $_SESSION["TYPE"] = "ADMIN";
        }
        // Redireciona para a página inicial
        header('Location: ../index.php');
        exit(); // Termina o script após redirecionamento
    } else {
        // Usuário não encontrado, define mensagem de erro e redireciona de volta
        session_start();
        $_SESSION['erro'] = "Email ou senha incorretos!";
        $_SESSION['erroLogin'] = "admin";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(); // Termina o script após redirecionamento
    }
} else {
    // Se os campos não foram enviados, redireciona para a página anterior
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit(); // Termina o script após redirecionamento
}
?>
