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
    <form id="cadastroForm">
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
            <input type="text" id="inputNome">
        </div>
        <div class="input-wrapper" id="emailWrapper">
            <p id="inputEmailLabel">Email: </p>
            <input type="text" id="inputEmail">
        </div>
        <div class="input-wrapper" id="senhaWrapper">
            <p id="inputPasswordLabel">Senha: </p>
            <input type="text" id="inputPassword">
        </div>
        
            
        <button class="signUpBtn">Cadastrar</button>
        <button class="goBackBtn" type="button">Voltar</button>
    </form>

    <script src="../js/cadastro.js"></script>
</body>
</html>
