<?php
$campos = array(
    'restauranteNomeNovo' => 'NomeRestaurante',
    'restauranteEmailNovo' => 'EmailRestaurante',
    'restauranteSenhaNovo' => 'SenhaRestaurante',
    'restauranteCEPNovo' => 'CEPRestaurante',
    'restauranteRuaNovo' => 'RuaRestaurante',
    'restauranteNumeroNovo' => 'Numero_Restaurante',
    'restauranteSiteNovo' => 'SiteRestaurante',
    'restauranteFotoNovo' => 'FotoRestaurante'
);

$aSet = array();

foreach ($campos as $campo_post => $campo_bd) {
    if (isset($_POST[$campo_post]) && !empty($_POST[$campo_post])) {
        $valor = $conn->real_escape_string($_POST[$campo_post]);
        $aSet[$campo_bd] = $valor;
    }
}

if (!empty($aSet)) {
    $tabela = "restaurante";
    $condicao = "IdRestaurante = " . $restauranteID;
    echo update($conn, $tabela, $aSet, $condicao);
}

$conn->close();

if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ');
}
?>