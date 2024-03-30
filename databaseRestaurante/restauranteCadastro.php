<?php 
include("../dbconnection/functions.php");

$restauranteNome   = $conn->real_escape_string(trim($_POST['restauranteNome']));   // prepara a string recebida para ser utilizada em comando SQL
$restauranteEmail = $conn->real_escape_string(trim($_POST['restauranteEmail'])); // prepara a string recebida para ser utilizada em comando SQL
$restauranteSenha  = $conn->real_escape_string(trim($_POST['restauranteSenha']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteCEP  = $conn->real_escape_string(trim($_POST['restauranteCEP']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteRua  = $conn->real_escape_string(trim($_POST['restauranteRua']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteNumero  = $conn->real_escape_string(trim($_POST['restauranteNumero']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteCNPJ  = $conn->real_escape_string(trim($_POST['restauranteCNPJ']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteSite  = $conn->real_escape_string(trim($_POST['restauranteSite']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteFoto = addslashes(file_get_contents($_FILES['Imagem']['tmp_name'])); // Prepara para salvar em BD


//Criptografa Senha
$md5Senha = md5($restauranteSenha);

$aCampos = array("NomeRestaurante", "EmailRestaurante", "SenhaRestaurante", "CEPRestaurante", "RuaRestaurante", "Numero_Restaurante", "CNPJRestaurante", "SiteRestaurante", "FotoRestaurante");
$aValores = array("$restauranteNome", "$restauranteEmail","$md5Senha", "$restauranteCEP", "$restauranteRua", "$restauranteNumero", "$restauranteCNPJ", "$restauranteSite", "$restauranteFoto");
$tabela = "restaurante";

$result = create($conn, $aCampos, $aValores, $tabela);

if($result == "Registro inserido com sucesso.") {
    session_start();
    $_SESSION["ID"] = $conn->insert_id;
}

$conn->close();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:');
}

?>
