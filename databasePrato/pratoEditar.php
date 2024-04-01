<?php
$campos = array(
    'pratoNomeNovo' => 'NomePrato',
    'pratoDescricaoNovo' => 'DescricaoPrato',
    'pratoFotoNovo' => 'FotoPrato',
    'pratoPrecoNovo' => 'PrecoPrato'
);

$aSet = array();

foreach ($campos as $campo_post => $campo_bd) {
    if (isset($_POST[$campo_post]) && !empty($_POST[$campo_post])) {
        $valor = $conn->real_escape_string($_POST[$campo_post]);
        $aSet[$campo_bd] = $valor;
    }
}

if (!empty($aSet)) {
    $tabela = "prato";
    $condicao = "IdPrato = " . $pratoID;
    echo update($conn, $tabela, $aSet, $condicao);
}

$conn->close();

if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ');
}
?>