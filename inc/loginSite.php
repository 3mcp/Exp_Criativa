<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
    if(isset($_SESSION['erroLogin'])){
        $erroLogin = $_SESSION['erroLogin'];
        unset($_SESSION['erroLogin']);
    }else{
        $erroLogin = "pra";
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/entrar.css">
    <title>Safe Dish - Entrar</title>
</head>

<body>

    <div class="elipse">
        <div class="interiorElipse">
            <h1>Safe</h1>
            <h2>Dish</h2>
        </div>
    </div>
    <div class="entrarForm" id="entrarForm" aberto="<?php echo $erroLogin?>">
        <div class="button-wrapper">
            <button class="typeBtn selectedTypeBtn" type="button" id="userButton">Usuario</button>
            <button class="typeBtn" type="button" id="restaurantButton">Restaurante</button>
        </div>
        <?php if (isset($_SESSION['erro'])) { ?>
            <div class="alert-danger">
                <?php echo $_SESSION['erro']; ?>
            </div>
        <?php
            unset($_SESSION['erro']);
            unset($_SESSION['erroLogin']);
        } ?>
        <form id="pra" action="../databasePRA/usuarioLogar.php" method="post">
            <div>
                <h1>Entrar</h1>
                <p>Bem vindo(a) de volta usuário!</p>
            </div>
            <div class="input-wrapper" id="emailWrapper">
                <p id="inputEmailLabel">Email: </p>
                <input type="email" name="usuarioEmail">
            </div>
            <div class="input-wrapper" id="senhaWrapper">
                <p id="inputPasswordLabel">Senha: </p>
                <input type="password" name="usuarioSenha">
            </div>
            <button class="signUpBtn" type="submit">Entrar</button>
            <button class="goBackBtn" type="button"><a href="../index.php">Voltar</a></button>
        </form>
        <form id="restaurante" action="../databaseRestaurante/restauranteLogar.php" method="post">
            <div>
                <h1>Entrar</h1>
                <p>Bem vindo(a) de volta restaurante!</p>
            </div>
            <div class="input-wrapper" id="emailWrapper">
                <p id="inputEmailLabel">Email: </p>
                <input type="email" name="EmailRestaurante" required>
            </div>
            <div class="input-wrapper" id="senhaWrapper">
                <p id="inputPasswordLabel">Senha: </p>
                <input type="password" name="SenhaRestaurante" required>
            </div>
            <button class="signUpBtn" type="submit">Entrar</button>
            <button class="goBackBtn" type="button"><a href="../index.php">Voltar</a></button>
        </form>
    </div>


    <script src="../js/entrar.js"></script>
    <?php
    if(isset($_SESSION['erroLogin'])){
        if ($_SESSION['erroLogin'] == "pra") {
            echo "<script>document.getElementById('userButton').click();</script>";
        } else {
            echo "<script>document.getElementById('restaurantButton').click();</script>";
        }
        unset($_SESSION['erroLogin']);
    }
     ?>
</body>

</html>