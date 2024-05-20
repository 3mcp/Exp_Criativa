<?php
//chamado em meu perfil do admin
include("../dbconnection/functions.php");

//verifica se o parâmetro id foi fornecido, e se estiver presente, chama a função update para marcar o comentário especificado como não denunciado
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $comentarioID = $_GET['id'];
    $mensagem = update($conn, "Comentario", array("DenunciadoComentario" => 0), "IdComentario = $comentarioID");
}

$conn->close();


//redireciona o usuário para a página anterior, ou, se a informação da página anterior não estiver disponível, redireciona o usuário para uma página padrão
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
header('Location:');
}
 
?>
