<?php
include("inc/header.php");
if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
}

?>
<main>

    <div class="mainContainer">
        <div class='mainButtons'>
            <h1>Configurações</h1>
            <button type='button' class='goBackBtn' onclick="window.history.back();">Voltar</button>
        </div>
        <hr>
        <div class='container-form'>
            <button class='dataButton'>Dados</button>
            <div>
                <?php if ($_SESSION["TYPE"] == "P.R.A.") {
                    include("dbconnection/functions.php");
                    if (isset($_SESSION["ID"])) {
                        $tabela = "p_r_a_";
                        $aCampos = "*";
                        $condicao = "IdPRA = " . $_SESSION["ID"];
                        $usuarios = select($conn, $aCampos, $tabela, $condicao);
                        $dados;
                        foreach ($usuarios as $usuario) {
                ?>
                            <form action="databasePRA/usuarioEditar.php" method="post" onsubmit="return validateForm()">
                                <div class='inputWrapper'>
                                    <p>Nome</p>
                                    <input type="text" id="inputNome" name="usuarioNomeNovo" required value="<?php echo $usuario["NomePRA"] ?>">
                                    <p id="nameuserError" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <p>Email</p>
                                    <input type="email" id="inputEmail" name="usuarioEmailNovo" required value="<?php echo $usuario["EmailPRA"] ?>">
                                    <p id="emailuserError" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <p>Senha Antiga</p>
                                    <input type="password" name="usuarioSenhaAntiga">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Senha Nova</p>
                                    <input type="password" id="inputSenha" name="usuarioSenhaNovo">
                                    <p id="passworduserError" style="color: red;"></p>
                                </div>
                                <div class="formButtons">
                                    <button onclick="confirmarExcluirPRA()" class="delButton" type="button">Deletar conta</button>
                                    <button class="updateButton" type="submit">Atualizar conta</button>
                                </div>
                            </form>
                <?php }
                    }
                } ?>
                <?php if ($_SESSION["TYPE"] == "Restaurante") {
                    include("dbconnection/functions.php");
                    if (isset($_SESSION["ID"])) {
                        $tabela = "restaurante";
                        $aCampos = "*";
                        $condicao = "IdRestaurante = " . $_SESSION["ID"];
                        $usuarios = select($conn, $aCampos, $tabela, $condicao);
                        foreach ($usuarios as $usuario) {
                ?>
                            <form action="databaseRestaurante/restauranteEditar.php" method="post" enctype="multipart/form-data">
                                <div class='inputWrapper'>
                                    <label for="formFile" class="form-label">Imagem:</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                                    <input type="file" id="Imagem" class="form-control" name="Imagem" accept="imagem/*" onchange="validaImagem(this);">
                                    <img src="img/logo2.png"  id="imagemSelecionada" class="edit-profile-avatar">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Nome</p>
                                    <input type="text" id ="a" name="restauranteNomeNovo" required value="<?php echo $usuario["NomeRestaurante"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Email</p>
                                    <input type="email"  id ="b" name="restauranteEmailNovo" required value="<?php echo $usuario["EmailRestaurante"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Senha Antiga</p>
                                    <input type="password" name="restauranteSenhaAntiga">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Senha Nova</p>
                                    <input type="password" id ="c"  name="restauranteSenhaNovo">
                                </div>
                                <div class='inputWrapper'>
                                    <p>CNPJ</p>
                                    <input type="text" name="restauranteCNPJNovo" required value="<?php echo $usuario["CNPJRestaurante"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>CEP</p>
                                    <input type="text" name="restauranteCEPNovo" required value="<?php echo $usuario["CEPRestaurante"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Rua</p>
                                    <input type="text" name="restauranteRuaNovo" required value="<?php echo $usuario["RuaRestaurante"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Número</p>
                                    <input type="text" name="restauranteNumeroNovo" required value="<?php echo $usuario["Numero_Restaurante"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Site</p>
                                    <input type="text" name="restauranteSiteNovo" value="<?php echo $usuario["SiteRestaurante"] ?>">
                                </div>
                                <div class="formButtons">
                                    <button onclick="confirmarExcluirRestaurante()" class="delButton" type="button">Deletar conta</button>
                                    <button class="updateButton" type="submit">Atualizar conta</button>
                                </div>
                            </form>
                <?php }
                    }
                } ?>
            </div>
        </div>
    </div>

    <script src="./js/editar.js"></script>
    

</main>

<?php include("inc/footer.php");
if (isset($_SESSION['erro'])) {
    echo "<script>alert('" . $_SESSION['erro'] . "');</script>";
    unset($_SESSION['erro']);
} ?>