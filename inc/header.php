<html lang="pt-br">
<?php session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Código Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Safe dish</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/estiloFooter.css">
    <link rel="stylesheet" href="css/Restaurantes.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="css/meuPerfil.css">
    <link rel="stylesheet" href="css/editarPerfil.css">
    <link rel="stylesheet" href="css/sobre.css">
    <link rel="stylesheet" href="css/star.css">
    <link rel="stylesheet" thref="path/to/star-rating-svg.css">

</head>

<body>
    <header>
        <nav>
            <div class="nav-links">
                <img src="img/logo2.png" alt="Logo">
                <a href="index.php" class='navLink'>Home</a>
                <a href="sobre.php" class='navLink'>Sobre</a>
                <a href="Restaurantes.php" class='navLink'>Restaurantes</a>
                <a href="faq.php" class='navLink'>FAQ</a>
            </div>
            <?php if (isset($_SESSION['ID'])) { ?>
                <div class="signUpIn">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="./meuPerfil.php" class="profile-link"><i class="bi bi-house-door fs-4"></i></a>
                        </div>
                        <div class="col-auto">
                            <a href="./editarPerfil.php" class="profile-link"><i class="bi bi-gear fs-4"></i></a>
                        </div>
                        <div class="col-auto">
                            <a href="./logout.php" class="profile-link"><i class="bi bi-box-arrow-right fs-4"></i></a>
                        </div>
                        <div class="col-auto">
                            <?php if (isset($_SESSION['FOTO'])) { ?>
                                <img class="profile-avatar" src="data:image/png;base64,<?= base64_encode($_SESSION['FOTO']) ?>" />
                            <?php
                            } else {
                            ?>
                                <img src="img/logo2.png" alt="Avatar do usuario" class="profile-avatar">
                            <?php
                            } ?>
                            
                        </div>
                        <div class="col-auto">
                            <p class="mb-0 profile-text fw-bold"><?php echo $_SESSION['NOME'] ?></p>
                            <p class="mb-0 profile-text"><?php echo $_SESSION['TYPE'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="signUpIn">
                    <a href="inc/entrar.php" class='btnLogar'>Entrar</a>
                    <a href="inc/cadastroUsuario.php" class='btnRegistrar'>Registre-se</a>
                </div>
            <?php } ?>
        </nav>
    </header>