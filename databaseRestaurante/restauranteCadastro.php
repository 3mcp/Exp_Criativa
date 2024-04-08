<?php 
include("../dbconnection/functions.php");

$restauranteNome   = $conn->real_escape_string(trim($_POST['restauranteNome']));   // prepara a string recebida para ser utilizada em comando SQL
$restauranteEmail = $conn->real_escape_string(trim($_POST['restauranteEmail'])); // prepara a string recebida para ser utilizada em comando SQL
$restauranteSenha  = $conn->real_escape_string(trim($_POST['restauranteSenha']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteCEP  = $conn->real_escape_string(trim($_POST['restauranteCEP']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteRua  = $conn->real_escape_string(trim($_POST['restauranteRua']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteNumero  = $conn->real_escape_string(trim($_POST['restauranteNumero']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteCNPJ  = $conn->real_escape_string(trim($_POST['restauranteCNPJ']));  // prepara a string recebida para ser utilizada em comando SQL
$restauranteSite  = NULL;  // prepara a string recebida para ser utilizada em comando SQL
$restauranteFoto = NULL;
//addslashes(file_get_contents($_FILES['Imagem']['tmp_name'])); // Prepara para salvar em BD


//Criptografa Senha
$md5Senha = md5($restauranteSenha);

$aCampos = array("CNPJRestaurante", "Numero_Restaurante", "EmailRestaurante", "FotoRestaurante", "SiteRestaurante", "SenhaRestaurante", "NomeRestaurante", "RuaRestaurante", "CEPRestaurante");
$aValores = array("$restauranteCNPJ", "$restauranteNumero", "$restauranteEmail", "$restauranteFoto", "$restauranteSite", "$md5Senha", "$restauranteNome", "$restauranteRua", "$restauranteCEP");
$tabela = "restaurante";

$result = create($conn, $aCampos, $aValores, $tabela);
session_start();
if($result == "Registro inserido com sucesso.") {
    $_SESSION["ID"] = $conn->insert_id;
    $_SESSION["NOME"] = $usuarioNome;
    $_SESSION["TYPE"] = "Restaurante";
    header('Location: ../index.php');
}else {
    $_SESSION['erro'] = "Erro ao cadastrar";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$conn->close();

?>


