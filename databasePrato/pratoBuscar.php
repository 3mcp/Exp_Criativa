<?php
include("../dbconnection/functions.php"); 

if(isset($_SESSION["ID"])){
    // Mostrar todos os pratos cadastrados
    $tabela = "prato";
    $aCampos = "*";
    $condicao = null; // Nenhuma condição, queremos todos os pratos

    $pratos = select($conn, $aCampos, $tabela, $condicao);
    foreach ($pratos as $prato) {
        foreach($prato as $campo => $valor){
            echo $campo.": " . $valor."<br>";
        }
    }


    $conn->close();
}
?>