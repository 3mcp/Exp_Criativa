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
        <div class='container-form' style="display: table-cell">
            <button class='dataButton' style="margin-right: 500px;margin-bottom: 10px">Dados</button>
        </div>

            <div class='container-form' style="display: table-cell">
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
                            <form action="databasePRA/usuarioEditar.php" method="post" onsubmit="return validateuserForm()">
                                <div class='inputWrapper'>
                                    <p>Nome</p>
                                    <input type="text" id="inputuserNome" name="usuarioNomeNovo" required value="<?php echo $usuario["NomePRA"] ?>">
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
                } else if ($_SESSION["TYPE"] == "Restaurante") {
                    include("dbconnection/functions.php");
                    if (isset($_SESSION["ID"])) {
                        $tabela = "restaurante";
                        $aCampos = "*";
                        $condicao = "IdRestaurante = " . $_SESSION["ID"];
                        $usuarios = select($conn, $aCampos, $tabela, $condicao);
                        foreach ($usuarios as $usuario) {
                ?>
                            <form action="databaseRestaurante/restauranteEditar.php" method="post" enctype="multipart/form-data" onsubmit="return validaterestaurantForm()">
                                <div class='inputWrapper'>
                                    <p>Imagem:</p>
                                    <img id="imagemSelecionada">
                                    <input type="file" id="Imagem" class="form-control" name="Imagem" accept="imagem/*" onchange="validaImagem(this);">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />


                                </div>
                                <div class='inputWrapper'>
                                    <p>Nome</p>
                                    <input type="text" id="inputNome" name="restauranteNomeNovo" required value="<?php echo $usuario["NomeRestaurante"] ?>">
                                    <p id="nomeRestauranteErro" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <p>Email</p>
                                    <input type="email" id="inputuserEmail" name="restauranteEmailNovo" required value="<?php echo $usuario["EmailRestaurante"] ?>">
                                    <p id="emailRestauranteErro" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <p>Senha Antiga</p>
                                    <input type="password" name="restauranteSenhaAntiga">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Senha Nova</p>
                                    <input type="password" id="senhaRestaurante" name="restauranteSenhaNovo">
                                    <p id="senhaRestauranteErro" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>CNPJ</p>
                                    <input type="text" id="inputCNPJ" name="restauranteCNPJNovo" onkeyup="handleCnpj(event)" maxlength='18' required value="<?php echo $usuario["CNPJRestaurante"] ?>">
                                    <p id="cnpjError" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>CEP</p>
                                    <input type="text" id="inputCep" name="restauranteCEPNovo" maxlength='9' onkeyup="handleZipCode(event)" class="ls-mask-cep" required value="<?php echo $usuario["CEPRestaurante"] ?>">
                                    <p id="cepError" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>Rua</p>
                                    <input type="text" id="inputRua" name="restauranteRuaNovo" required value="<?php echo $usuario["RuaRestaurante"] ?>">
                                    <p id="ruaError" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>Número</p>
                                    <input type="text" id="inputNumero" name="restauranteNumeroNovo" required value="<?php echo $usuario["Numero_Restaurante"] ?>">
                                    <p id="numeroError" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>Site</p>
                                    <input type="text" id="inputSiteUrl" name="restauranteSiteNovo" value="<?php echo $usuario["SiteRestaurante"] ?>">
                                    <p id="siteUrlError" style="color: red;"></p>

                                </div>
                                <div class="formButtons">
                                    <button onclick="confirmarExcluirRestaurante()" class="delButton" type="button">Deletar conta</button>
                                    <button class="updateButton" type="submit">Atualizar conta</button>
                                </div>
                            </form>
                <?php }
                    }
                } 
                ?>
            </div>
        </div>
    </div>

    <script src="./js/editar.js"></script>
    <script src="./js/mascarasRestaurante.js"></script>

</main>

<?php include("inc/footer.php");
if (isset($_SESSION['erro'])) {
    echo "<script>alert('" . $_SESSION['erro'] . "');</script>";
    unset($_SESSION['erro']);
} ?>