<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start() ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
   
    <div class="elipse">
        <div class="interiorElipse">
            <h1>Safe</h1>
            <h2>Dish</h2>
        </div>
    </div>
    <form id="cadastroForm" action="../databaseRestaurante/restauranteCadastro.php" method="post" onsubmit="return validateForm()">
        <div class="button-wrapper">
            <button class="userBtn typeBtn" type="button">Usuario</button>
            <button class="restaurantBtn typeBtn selectedTypeBtn" type="button">Restaurante</button>
        </div>
        <div>
            <h1>Cadastre-se</h1>
            <p>Faça parte da nossa família</p>
        </div>
        <div class="input-wrapper" id="nomeWrapper">
            <p id="inputNomeLabel">Nome completo: </p>
            <input type="text" id="inputNome" name="restauranteNome">
            <p id="nameError" style="color: red;"></p>
        </div>
        <div class="input-wrapper" id="emailWrapper">
            <p id="inputEmailLabel">Email: </p>
            <input type="text" id="inputEmail" name="restauranteEmail">
            <p id="emailError" style="color: red;"></p>
        </div>
        <div class="input-wrapper" id="senhaWrapper">
            <p id="inputPasswordLabel">Senha: </p>
            <input type="password" id="inputPassword" name="restauranteSenha">
            <p id="passwordError" style="color: red;"></p>
        </div>
        
        <div class="enderecoInputs" id="enderecoWrapper">

            <div class="input-wrapper" id="cepWrapper">
                <p id="inputCepLabel">CEP:</p>
                <input type="text" id='inputCep' name="restauranteCEP" maxlength='9' onkeyup="handleZipCode(event)" class="ls-mask-cep">
                <p id="cepError" style="color: red;"></p>
            </div>
            <div class="input-wrapper" id="ruaWrapper">
                <p id="inputRuaLabel">Rua:</p>
                <input type="text" id='inputRua' name="restauranteRua">
                <p id="ruaError" style="color: red;"></p>
            </div>
            <div class="input-wrapper" id="numeroWrapper">
                <p id="inputNumeroLabel">Número:</p>
                <input type="text" id='inputNumero' maxlength='9' name="restauranteNumero">
                <p id="numeroError" style="color: red;"></p>
            </div>
            <div class="input-wrapper" id="cnpjWrapper">
                <p id="inputCNPJLabel">CNPJ:</p>
                <input type="text" id='inputCNPJ' name="restauranteCNPJ" onkeyup="handleCnpj(event)" maxlength='18'>
                <p id="cnpjError" style="color: red;"></p>
            </div>
        </div>
        <?php 
            if (isset($_SESSION["erroCadastro"])){
                echo('<p style="color: red;">' . $_SESSION["erroCadastro"] . '</p>');
                unset($_SESSION["erroCadastro"]);
                
            }
        ?>
        <button class="signUpBtn" type="submit">Cadastrar</button>
        <button class="goBackBtn" type="button">Voltar</button>
    </form>

    <script src="../js/cadastroRestaurante.js"></script>
    <script src="../js/mascarasRestaurante.js"></script>

</body>
</html>
