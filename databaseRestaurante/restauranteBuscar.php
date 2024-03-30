<?php
include("../dbconnection/functions.php"); 

if(isset($_SESSION["ID"])){
    // Mostrar todos os usuários cadastrados
    $tabela = "restaurante";
    $aCampos = "*";
    $condicao = null; // Nenhuma condição, queremos todos os usuários

    $usuarios = select($conn, $aCampos, $tabela, $condicao);
    foreach ($usuarios as $usuario) {
        foreach($usuario as $campo => $valor){
            echo $campo.": " . $valor."<br>";
        }
    }


    $conn->close();
}
?>