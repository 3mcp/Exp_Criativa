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
    <!--Formulario de cadastro que utiliza o validar formulario de cadastro.js-->
    <form id="cadastroForm" action="../databasePRA/usuarioCadastro.php" method="post" onsubmit="return validateForm()">
        <div class="button-wrapper">
            <button class="userBtn typeBtn selectedTypeBtn" type="button">Usuario</button>
            <button class="restaurantBtn typeBtn" type="button">Restaurante</button>
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
        <div class="input-wrapper" id="nomeWrapper">
            <p id="inputNomeLabel">Username (visível para os outros): </p>
            <input type="text" id="inputUsername" name="userName" required>
            <p id="userNamePRAerror" style="color: red;"></p>
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
</body>
</html>
