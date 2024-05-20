<?php
include("../dbconnection/functions.php"); 

//Verifica se a variável de sessão $_SESSION["ID"] está definida, o que indica que o usuário está logado.
if(isset($_SESSION["ID"])){
    $id = $_GET["id"];
    //na tabela pega todos os pratos daquele restaurante
    $tabela = "prato";
    $aCampos = "*";
    $condicao = "IdPrato = $id"; 

    //Chama a função select para buscar os dados do prato com o ID especificado.
    $pratos = select($conn, $aCampos, $tabela, $condicao);
    //remove a foto do prato
    foreach ($pratos as $prato) {
        unset($prato["FotoPrato"]);
        
    }

    $tabela1 = "prato_categoria";
    $aCampos1 = "*";
    $condicao1 = "fk_Prato_IdPrato = $id"; 
    //buscar as categorias do prato com base no ID do prato.
    $categoriasPrato = select($conn, $aCampos1, $tabela1, $condicao1);
    //Adiciona as categorias do prato ao array $prato sob a chave CategoriasPrato.
    $prato["CategoriasPrato"] = $categoriasPrato;
    header('Content-Type: application/json');
    $jsonPrato = json_encode($prato);
    //Envia a string JSON ao cliente.
    echo $jsonPrato;
    $conn->close();    


    
}
?>