<?php
include("dbconnection/functions.php"); 
if(isset($_SESSION["ID"])){
    $tabela = "p_r_a_";
    $aCampos = "*";
    $condicao = "IdPRA = ".$_SESSION["ID"]; 
    $usuarios = select($conn, $aCampos, $tabela, $condicao);
    $dados;
    foreach ($usuarios as $usuario) {
        $dados = $usuario;
        foreach($usuario as $campo => $valor){
            echo $campo.": " . $valor."<br>";
            
        }
    }


    $conn->close();
}
?>