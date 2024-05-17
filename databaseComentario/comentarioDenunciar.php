<?php
    include("../dbconnection/functions.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idcomentario   = $conn->real_escape_string($_POST['idcomentario']); 

        $mensagem = update($conn, "Comentario", array("DenunciadoComentario" => 1), "IdComentario = $idcomentario");
        }

    $conn->close();

    if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location:');
    }
         
?>
