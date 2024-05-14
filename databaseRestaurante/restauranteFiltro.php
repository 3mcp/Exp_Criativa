<?php
require("connection.php");

if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    $query = "SELECT DISTINCT r.* FROM Restaurante r 
              JOIN Prato p ON r.IdRestaurante = p.fk_Restaurante_IdRestaurante 
              JOIN Prato_Categoria pc ON p.IdPrato = pc.fk_Prato_IdPrato 
              JOIN Categoria c ON pc.fk_Categoria_IdCategoria = c.IdCategoria 
              WHERE c.NomeCategoria = '$categoria'";

    $restaurantes = select($conn, "*", $query, NULL);

    $html = '';
    foreach ($restaurantes as $restaurante) {
        $html .= '<div class="restaurante">';
        $html .= '<img src="data:image/png;base64,'.base64_encode($restaurante['FotoRestaurante']).'" />';
        $html .= '<h5>'.$restaurante["NomeRestaurante"].'</h5>';
        $html .= '<p>'.$restaurante["DescricaoRestaurante"].'</p>';
        $html .= '<a href="'.$restaurante["SiteRestaurante"].'" target="_blank"><button class="btn-vermais">Ver mais</button></a>';
        $html .= '</div>';
    }

    echo $html;
} else {
    echo 'Erro: Categoria não especificada.';
}
?>
