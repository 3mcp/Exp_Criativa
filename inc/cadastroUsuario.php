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
    <form id="cadastroForm" action="../databasePRA/usuarioCadastro.php" method="post" onsubmit="return validateForm()">
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
            <input type="text" id="inputNome" name="usuarioNome">
            <p id="nameError" style="color: red;"></p>
            <?php 
            if (isset($_SESSION["erroNome"])){
                echo('<p style="color: red;">' . $_SESSION["erroNome"] . '</p>');
                unset($_SESSION["erroNome"]);
            }
            ?>

        </div>
        <div class="input-wrapper" id="emailWrapper">
            <p id="inputEmailLabel">Email: </p>
            <input type="email" id="inputEmail" name="usuarioEmail">
            <p id="emailError" style="color: red;"></p>
            <?php 
            if (isset($_SESSION["erroEmail"])){
                echo('<p style="color: red;">' . $_SESSION["erroEmail"] . '</p>');
                unset($_SESSION["erroEmail"]);
            }
            ?>

        </div>
        <div class="input-wrapper" id="senhaWrapper">
            <p id="inputPasswordLabel">Senha: </p>
            <input type="password" id="inputPassword" name="usuarioSenha">
            <p id="passwordError" style="color: red;"></p>
        </div>
        <?php 
            if (isset($_SESSION["erroCadastro"])){
                echo('<p style="color: red;">' . $_SESSION["erroCadastro"] . '</p>');
                unset($_SESSION["erroCadastro"]);
            }
        ?>
        
        <button class="signUpBtn">Cadastrar</button>
        <button class="goBackBtn" type="button">Voltar</button>
    </form>

    <script src="../js/cadastro.js"></script>
    <script src="../js/mascarasUsuarios.js"></script>

    <script>
        function validateForm() {
            var nameValue = document.getElementById("inputNome").value;
            var nameError = document.getElementById("nameError");
            var emailValue = document.getElementById("inputEmail").value;
            var passwordValue = document.getElementById("inputPassword").value;
            var emailError = document.getElementById("emailError");
            var passwordError = document.getElementById("passwordError");

            if (nameValue.split(' ').length < 2) {
                nameError.textContent = "Insira seu nome completo";
                return false;
            } else {
                nomeError.textContent = "";
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

            return true; 
        }
    </script>
</body>
</html>
