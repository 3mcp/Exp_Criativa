<!DOCTYPE html>
<html lang="en">
<head>
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
            <button class="userBtn" type="button">Usuario</button>
            <button class="restaurantBtn" type="button">Restaurante</button>
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
                <input type="text" id='inputNumero' name="restauranteNumero">
                <p id="numeroError" style="color: red;"></p>
            </div>
            <div class="input-wrapper" id="cnpjWrapper">
                <p id="inputCNPJLabel">CNPJ:</p>
                <input type="text" id='inputCNPJ' name="restauranteCNPJ" onkeyup="handleCnpj(event)" maxlength='18'>
                <p id="cnpjError" style="color: red;"></p>
            </div>
        </div>
        <button class="signUpBtn" type="submit">Cadastrar</button>
        <button class="goBackBtn" type="button">Voltar</button>
    </form>

    <script src="../js/cadastroRestaurante.js"></script>
    <script src="../js/mascarasRestaurante.js"></script>

    <script>
        function validateForm() {
            var nameValue = document.getElementById("inputNome").value;
            var nameError = document.getElementById("nameError");
            var emailValue = document.getElementById("inputEmail").value;
            var passwordValue = document.getElementById("inputPassword").value;
            var emailError = document.getElementById("emailError");
            var passwordError = document.getElementById("passwordError");
            var cepValue = document.getElementById("inputCep").value;
            var cepError = document.getElementById("cepError");
            var ruaValue = document.getElementById("inputRua").value;
            var ruaError = document.getElementById("ruaError");
            var numeroValue = document.getElementById("inputNumero").value;
            var numeroError = document.getElementById("numeroError");
            var cnpjValue = document.getElementById("inputCNPJ").value;
            var cnpjError = document.getElementById("cnpjError");

            if (nameValue.length <= 2) {
                nameError.textContent = "Insira o nome completo";
                return false;
            } else {
                nameError.textContent = "";
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(emailValue)) {
                emailError.textContent = "Por favor, insira um email válido.";
                return false; 
            } else {
                emailError.textContent = ""; 
            }

            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!passwordPattern.test(passwordValue)) {
                passwordError.innerHTML = "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
                return false; 
            } else {
                passwordError.textContent = ""; 
            }

            if (cepValue.length < 9) {
                cepError.textContent = "Insira um CEP válido";
                return false;
            } else {
                cepError.textContent = "";
            }

            if (ruaValue.length < 1) {
                ruaError.textContent = "Insira o nome da rua";
                return false;
            } else {
                ruaError.textContent = "";
            }

            if (numeroValue.length < 1) {
                numeroError.textContent = "Insira o número do endereço";
                return false;
            } else {
                numeroError.textContent = "";
            }

            if (cnpjValue.length < 14) {
                cnpjError.textContent = "Insira um CNPJ válido";
                return false;
            } else {
                cnpjError.textContent = "";
            }

            return true; 
        }
    </script>

</body>
</html>
