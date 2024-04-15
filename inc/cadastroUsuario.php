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
            <input type="text" id="inputNome" name="usuarioNome" required>
            <p id="namePRAError" style="color: red;"></p>
            <?php 
            if (isset($_SESSION["erroNome"])){
                echo('<p style="color: red;">' . $_SESSION["erroNome"] . '</p>');
                unset($_SESSION["erroNome"]);
            }
            ?>

        </div>
        <div class="input-wrapper" id="emailWrapper">
            <p id="inputEmailLabel">Email: </p>
            <input type="email" id="inputEmail" name="usuarioEmail" required>
            <p id="emailPRAError" style="color: red;"></p>
            <?php 
            if (isset($_SESSION["erroEmail"])){
                echo('<p style="color: red;">' . $_SESSION["erroEmail"] . '</p>');
                unset($_SESSION["erroEmail"]);
            }
            ?>

        </div>
        <div class="input-wrapper" id="senhaWrapper">
            <p id="inputPasswordLabel">Senha: </p>
            <input type="password" id="inputPassword" name="usuarioSenha" required>
            <p id="passwordPRAError" style="color: red;"></p>
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
            var namePRAValue = document.getElementById("inputNome").value;
            var namePRAError = document.getElementById("namePRAError");
            var emailPRAValue = document.getElementById("inputEmail").value;
            var passwordPRAValue = document.getElementById("inputPassword").value;
            var emailPRAError = document.getElementById("emailPRAError");
            var passwordPRAError = document.getElementById("passwordPRAError");

            if (namePRAValue.split(' ').length < 2) {
                namePRAError.textContent = "Insira seu nome completo";
                return false;
            } else {
                namePRAError.textContent = "";
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(emailPRAValue)) {
                emailPRAError.textContent = "Por favor, insira um email válido.";
                return false; 
            } else {
                emailPRAError.textContent = ""; 
            }

            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!passwordPattern.test(passwordPRAValue)) {
                passwordPRAError.innerHTML = "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
                return false; 
            } else {
                passwordPRAError.textContent = ""; 
            }

            return true; 
        }
    </script>
</body>
</html>
