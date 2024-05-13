<?php
include("../dbconnection/functions.php"); 

if(isset($_SESSION["ID"])){
    $id = $_GET["id"];
    $tabela = "prato";
    $aCampos = "*";
    $condicao = "IdPrato = $id"; 

    $pratos = select($conn, $aCampos, $tabela, $condicao);
    foreach ($pratos as $prato) {
        unset($prato["FotoPrato"]);
        
    }

    $tabela1 = "prato_categoria";
    $aCampos1 = "*";
    $condicao1 = "fk_Prato_IdPrato = $id"; 
    $categoriasPrato = select($conn, $aCampos1, $tabela1, $condicao1);
    $prato["CategoriasPrato"] = $categoriasPrato;
    header('Content-Type: application/json');
    $jsonPrato = json_encode($prato);
    echo $jsonPrato;
    $conn->close();    


    
}
?>