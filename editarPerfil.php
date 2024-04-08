<?php include("inc/header.php") ?>

<main>


    <div class='mainButtons'>
        <h1>Configurações</h1>
        <button type='button' class='goBackBtn'>Voltar</button>
    </div>
    <hr>
    <div class='container-form'>
        <button class='dataButton'>Dados</button>
        <div>
            <form action="">
                <div class='inputWrapper'>
                    <p>Nome completo</p>
                    <input type="text" id="nome" name="nome">
                </div>
                <div class='inputWrapper'>
                    <p>Email</p>
                    <input type="email" id="email" name="email">
                </div>
                <div class='inputWrapper'>
                    <p>Foto</p>
                    <input type="text" id="profilePic" name="profilePic">
                </div>
                <div class='inputWrapper'>
                    <p>Senha</p>
                    <input type="password" id="password" name="password">
                </div>
            </form>                
            <div class='formButtons'>
                <button onclick="confirmarExcluir()" class='delButton'>Deletar conta</button>
                <button class='updateButton'>Atualizar conta</button>
            </div>
        </div>
    </div>

    <p id='demo'></p>

    <script src="./js/editar.js"></script>

</main>

<?php include("inc/footer.php") ?>
