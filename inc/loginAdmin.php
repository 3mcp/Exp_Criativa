<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

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
    <div class="entrarForm">
        <div class="button-wrapper">
            <button class="typeBtn selectedTypeBtn" type="button" id="userButton">Admin</button>
        </div>
        <?php if (isset($_SESSION['erro'])) { ?>
            <div class="alert-danger">
                <?php echo $_SESSION['erro']; ?>
            </div>
        <?php
            unset($_SESSION['erro']);
            unset($_SESSION['erroLogin']);
        } ?>
        <form id="" action="../databaseAdmin/adminLogar.php" method="post">
            <div>
                <h1>Entrar</h1>
                <p>Bem vindo(a) Admin!</p>
            </div>
            <div class="input-wrapper" id="emailWrapper">
                <p id="inputEmailLabel">Email: </p>
                <input type="email" name="EmailAdmin">
            </div>
            <div class="input-wrapper" id="senhaWrapper">
                <p id="inputPasswordLabel">Senha: </p>
                <input type="password" name="SenhaAdmin">
            </div>
            <button class="signUpBtn" type="submit">Entrar</button>
            <button class="goBackBtn" type="button"><a href="../index.php">Site</a></button>
        </form>
    </div>


    <script src="../js/entrar.js"></script>
    <?php
    if(isset($_SESSION['erroLogin'])){
        if ($_SESSION['erroLogin'] == "admin") {
            echo "<script>document.getElementById('userButton').click();</script>";
        } else {
            echo "<script>document.getElementById('restaurantButton').click();</script>";
        }
        unset($_SESSION['erroLogin']);
    }
     ?>
</body>

</html>