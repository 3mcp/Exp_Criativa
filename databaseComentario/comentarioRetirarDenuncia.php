<?php
include("../dbconnection/functions.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $comentarioID = $_GET['id'];
    $mensagem = update($conn, "Comentario", array("DenunciadoComentario" => 0), "IdComentario = $comentarioID");
}

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
header('Location:');
}
 
?>
