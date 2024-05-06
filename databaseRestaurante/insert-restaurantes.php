<?php
include("../dbconnection/functions.php");

$restaurantes = array(
    array(
        "CNPJRestaurante" => "12345678901234",
        "Numero_Restaurante" => 1,
        "EmailRestaurante" => "restaurante1@example.com",
        "FotoRestaurante" => "",
        "SiteRestaurante" => "http://www.restaurante1.com",
        "SenhaRestaurante" => "Teste12@",
        "NomeRestaurante" => "Restaurante 1",
        "RuaRestaurante" => "Rua do Restaurante 1",
        "CEPRestaurante" => "12345-678"
    ),
    array(
        "CNPJRestaurante" => "23456789012345",
        "Numero_Restaurante" => 2,
        "EmailRestaurante" => "restaurante2@example.com",
        "FotoRestaurante" => "",
        "SiteRestaurante" => "http://www.restaurante2.com",
        "SenhaRestaurante" => "Teste12@",
        "NomeRestaurante" => "Restaurante 2",
        "RuaRestaurante" => "Rua do Restaurante 2",
        "CEPRestaurante" => "23456-789"
    ),
    array(
        "CNPJRestaurante" => "34567890123456",
        "Numero_Restaurante" => 3,
        "EmailRestaurante" => "restaurante3@example.com",
        "FotoRestaurante" => "",
        "SiteRestaurante" => "http://www.restaurante3.com",
        "SenhaRestaurante" => "Teste12@",
        "NomeRestaurante" => "Restaurante 3",
        "RuaRestaurante" => "Rua do Restaurante 3",
        "CEPRestaurante" => "34567-890"
    ),
    array(
        "CNPJRestaurante" => "45678901234567",
        "Numero_Restaurante" => 4,
        "EmailRestaurante" => "restaurante4@example.com",
        "FotoRestaurante" => "",
        "SiteRestaurante" => "http://www.restaurante4.com",
        "SenhaRestaurante" => "Teste12@",
        "NomeRestaurante" => "Restaurante 4",
        "RuaRestaurante" => "Rua do Restaurante 4",
        "CEPRestaurante" => "45678-901"
    ),
    array(
        "CNPJRestaurante" => "56789012345678",
        "Numero_Restaurante" => 5,
        "EmailRestaurante" => "restaurante5@example.com",
        "FotoRestaurante" => "",
        "SiteRestaurante" => "http://www.restaurante5.com",
        "SenhaRestaurante" => "Teste12@",
        "NomeRestaurante" => "Restaurante 5",
        "RuaRestaurante" => "Rua do Restaurante 5",
        "CEPRestaurante" => "56789-012"
    )
);

foreach ($restaurantes as $restaurante) {
    $aCampos = array_keys($restaurante);
    $tabela = "restaurante";
    $aValores = array_map(function($value) use ($conn) {
        return "'" . $conn->real_escape_string($value) . "'";
    }, array_values($restaurante));

    // Verifica se o restaurante já existe antes de inserir
    $existeRestaurante = checkRestauranteExists($conn, $restaurante['CNPJRestaurante'], $restaurante['EmailRestaurante']);

    if ($existeRestaurante) {
        echo "O restaurante com CNPJ " . $restaurante['CNPJRestaurante'] . " e Email " . $restaurante['EmailRestaurante'] . " já existe no banco de dados.<br>";
    } else {
        $result = create($conn, $aCampos, $aValores, $tabela);

        if ($result === true) {
            echo "Registro inserido com sucesso.<br>";
        } else {
            echo $result . "<br>";
        }
    }
}

$conn->close();

function checkRestauranteExists($conn, $cnpj, $email) {
    $consulta = "SELECT * FROM restaurante WHERE CNPJRestaurante = '$cnpj' OR EmailRestaurante = '$email'";
    $resultado = $conn->query($consulta);
    return $resultado->num_rows > 0;
}