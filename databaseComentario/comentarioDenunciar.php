<?php
//chamado em restaurante php
    include("../dbconnection/functions.php");

    //recebe um pedido POST, extrai o ID do comentário a ser denunciado, atualiza o campo DenunciadoComentario na tabela Comentario para marcar o comentário como denunciado, e depois fecha a conexão com o banco de dados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idcomentario   = $conn->real_escape_string($_POST['idcomentario']); 

        $mensagem = update($conn, "Comentario", array("DenunciadoComentario" => 1), "IdComentario = $idcomentario");
        }

    $conn->close();

    //redireciona o usuário para a página anterior, ou, se a informação da página anterior não estiver disponível, redireciona o usuário para uma página padrão
    if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location:');
    }
         
?>
