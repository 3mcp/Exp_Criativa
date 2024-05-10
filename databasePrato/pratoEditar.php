<?php
include("../dbconnection/functions.php");

// Recupera o ID do prato do formulário
$pratoID = $conn->real_escape_string($_POST['pratoID']);

// Recupera os valores atuais do registro no banco de dados
$registroAtual = select($conn, "*", "prato", "IdPrato = $pratoID");


// Verifica se o registro existe
if ($registroAtual) {
    // Recupera os valores atuais do banco de dados
    $pratoNomeBD = $registroAtual[0]['NomePrato'];
    $pratoDescricaoBD = $registroAtual[0]['DescricaoPrato'];
    $pratoPrecoBD = $registroAtual[0]['PrecoPrato'];
    $pratoFotoBD = $registroAtual[0]['FotoPrato'];

    // Verifica se os campos do formulário estão vazios e mantém os valores existentes do banco de dados, se estiverem
    $pratoNome = !empty($_POST['pratoNomeNEW']) ? $conn->real_escape_string($_POST['pratoNomeNEW']) : $pratoNomeBD;
    $pratoDescricao = !empty($_POST['pratoDescricaoNEW']) ? $conn->real_escape_string($_POST['pratoDescricaoNEW']) : $pratoDescricaoBD;
    $pratoPreco = !empty($_POST['pratoPrecoNEW']) ? ($conn->real_escape_string($_POST['pratoPrecoNEW'])) : $pratoPrecoBD;
    $pratoFoto = !empty($_POST['pratoFotoNEW']) ? $conn->real_escape_string($_POST['pratoFotoNEW']) : $pratoFotoBD;



    $aSet = array(
        "NomePrato" => $pratoNome, 
        "DescricaoPrato" => $pratoDescricao,
        "FotoPrato" => $pratoFoto,
        "PrecoPrato" => $pratoPreco,
        "fk_Restaurante_IdRestaurante" => "fk_Restaurante_IdRestaurante"
    );

    // Realiza a atualização no banco de dados
    $tabela = "prato";
    $condicao = "IdPrato = " . $pratoID;
    echo update($conn, $tabela, $aSet, $condicao);
}

$conn->close();

// Redireciona de volta à página anterior
if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ');
}
