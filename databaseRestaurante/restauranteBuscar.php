<?php
include("../dbconnection/functions.php");

//Pegando as categorias de cada restaurante
$tabela = "prato";
//Campos que serão selecionados
$aCampos = array(
    "r.IdRestaurante",
    "c.IdCategoria"
);
//Condição para a seleção
$condicao = " as p 
    inner join 
        prato_categoria as pc on p.IdPrato = pc.fk_Prato_IdPrato
    inner join 
        categoria as c on pc.fk_Categoria_IdCategoria = c.IdCategoria
    inner join 
        restaurante as r on p.fk_Restaurante_IdRestaurante = r.IdRestaurante
    order by r.IdRestaurante,c.IdCategoria";
//Selecionando os restaurantes
$restaurantes = selectComposto($conn, $aCampos, $tabela, $condicao);

//Função para agrupar os restaurantes pelo id
function agruparPorCampo($array, $field) {
    $result = [];
    foreach ($array as $item) {
        $key = $item[$field];
        unset($item[$field]);
        if (!array_key_exists($key, $result)) {
            $result[$key] = [];
        }
        $result[$key][] = $item;
    }
    return $result;
}

// Agrupando os linha pelo id do restaurante
$restaurantesAgrupados = agruparPorCampo($restaurantes, 'IdRestaurante');
header('Content-Type: application/json');

//Convertendo o array em JSON
$json = json_encode($restaurantesAgrupados);
echo $json;
$conn->close();
