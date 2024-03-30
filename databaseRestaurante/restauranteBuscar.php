<?php
include("../dbconnection/functions.php"); 

if(isset($_SESSION["ID"])){
    // Mostrar todos os restaurantes cadastrados
    $tabela = "restaurante";
    $aCampos = "*";
    $condicao = null; // Nenhuma condição, queremos todos os restaurantes

    $restaurantes = select($conn, $aCampos, $tabela, $condicao);
    foreach ($restaurantes as $restaurante) {
        foreach($restaurante as $campo => $valor){
            echo $campo.": " . $valor."<br>";
        }
    }


    $conn->close();
}
?>