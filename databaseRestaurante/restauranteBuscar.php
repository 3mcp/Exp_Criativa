<?php
include("dbconnection/functions.php");

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
//Pegando todos os restaurantes
$tabelaRestaurante = "restaurante";
//Campos que serão selecionados
$aCampos = "*";
//Condição para a seleção
$condicao = NULL;
//Selecionando os restaurantes
$restaurantes = select($conn, $aCampos, $tabela, $condicao);
//Passando por cada restaurante para associar as categorias
foreach ($restaurantes as $restaurante) {
    $idRestaurante = $restaurante["IdRestaurante"];
    //Associando as categorias ao restaurante caso ele nao tenha deixar um array vazio
    $restaurante["Categorias"] = $restaurantesAgrupados[$idRestaurante] ?? [];
}

