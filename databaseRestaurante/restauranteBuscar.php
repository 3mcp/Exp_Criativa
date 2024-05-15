<?php
include("dbconnection/functions.php");

//Pegando as categorias de cada restaurante
$tabela = "prato";
//Campos que serão selecionados
$aCampos = array(
    "r.IdRestaurante",
    "c.IdCategoria",
    "c.NomeCategoria"
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
$restaurantesComCategorias = selectComposto($conn, $aCampos, $tabela, $condicao);

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
$restaurantesAgrupados = agruparPorCampo($restaurantesComCategorias, 'IdRestaurante');
//Pegando todos os restaurantes
$tabela2 = "restaurante";
//Campos que serão selecionados
$campos = "*";
//Condição para a seleção
$condicao2 = NULL;
//Selecionando os restaurantes
$restaurantes = select($conn, $campos, $tabela2, $condicao2);
//Passando por cada restaurante para associar as categorias
foreach ($restaurantes as $key => $restaurante) {
    $idRestaurante = $restaurante["IdRestaurante"];
    // Associating the categories with the restaurant, if it doesn't exist, leave an empty array
    $restaurantes[$key]["Categorias"] = $restaurantesAgrupados[$idRestaurante] ?? [];  
}

