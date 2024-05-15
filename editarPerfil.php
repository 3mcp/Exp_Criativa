<?php
include("inc/header.php");
//verificar se o usuário está logado
//Se a variável de sessão "ID" não estiver definida, significa que o usuário não está logado ou a sessão expirou.
if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
}

?>
<main>

    <div class="mainContainer">
        <div class='mainButtons'>
            <h1>Configurações</h1>
            <!--Botão voltar que quando clicado volta a página anterior-->
            <button type='button' class='goBackBtn' onclick="window.history.back();">Voltar</button>
        </div>
        <hr>
        <!--Botão para as configurações-->
        <div class='container-form' style="display: table-cell">
            <button class='dataButton' style="margin-right: 500px;margin-bottom: 10px">Dados</button>
        </div>

            <div class='container-form' style="display: table-cell">
            <!--verifica se a conta logada é uma pessoa com restrição alimentar-->
                <?php if ($_SESSION["TYPE"] == "P.R.A.") {
                    include("dbconnection/functions.php");
                    //verifica se o ID do usuário está definido na sessão
                    if (isset($_SESSION["ID"])) {
                        //exibir informações do usuário recuperadas do banco de dados.
                        $tabela = "p_r_a_";
                        $aCampos = "*";
                        $condicao = "IdPRA = " . $_SESSION["ID"];
                        $usuarios = select($conn, $aCampos, $tabela, $condicao);
                        $dados;
                        foreach ($usuarios as $usuario) {
                ?>
                            <form action="databasePRA/usuarioEditar.php" method="post" enctype="multipart/form-data" onsubmit="return validateuserForm()">
                                <div class='inputWrapper'>
                                    <p>Imagem:</p>
                                    <img id="imagemSelecionada">
                                    <input type="file" id="Img" class="form-control" name="Img" accept="imagem/*" onchange="validaImagem(this);">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                                </div>
                                <div class='inputWrapper'>
                                    <p>Nome</p>
                                    <!--O valor é preenchido com o nome antigo, que foi recuperado do loop de usuario feito anteriomente, se não tiver nenhum nome é obrigatorio que adicione um nome para enviar o formulario-->
                                    <input type="text" id="inputuserNome" name="usuarioNomeNovo" required value="<?php echo $usuario["NomePRA"] ?>">
                                    <p id="nameuserError" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <p>Username</p>
                                    <input type="text" id="inputuserName" name="usuarioUsernameNovo" required value="<?php echo $usuario["UsernamePRA"] ?>">
                                    <p id="usernameError" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <p>Email</p>
                                    <!--O valor é preenchido com o email antigo que foi recuperado pelo loop de usuario feito anteriomente, se não tiver um email é obrigatorio adicionar um email para enviar o formulario-->
                                    <input type="email" id="inputEmail" name="usuarioEmailNovo" required value="<?php echo $usuario["EmailPRA"] ?>">
                                    <p id="emailuserError" style="color: red;"></p>
                                </div>
                                <label for="categoriaPrato">Categorias do Usuário</label>
                                    <div class="categoria-checkboxes">
                                        <?php
                                        // Obtém todas as categorias disponíveis
                                        $categorias = select($conn, "*", "categoria", NULL);
                                        if (!empty($categorias)) {
                                            foreach ($categorias as $categoria) {
                                                // Verifica se o usuário já possui essa categoria
                                                $isChecked = false;
                                                // Verifica se o usuário possui essa categoria
                                                $usuarioCategorias = select($conn, "*", "PRA_Categoria", "fk_P_R_A__IdPRA = " . $_SESSION["ID"] . " AND fk_Categoria_IdCategoria = " . $categoria['IdCategoria']);
                                                if (!empty($usuarioCategorias)) {
                                                    $isChecked = true;
                                                }
                                                // Exibe a checkbox da categoria
                                                echo "<div><input type='checkbox' id='categoria_".$categoria['IdCategoria']."' name='pratoCategorias[]' value='".$categoria['IdCategoria']."' ". ($isChecked ? "checked" : "") .">";
                                                echo "<label for='categoria_".$categoria['IdCategoria']."'>".$categoria['NomeCategoria']."</label></div>";
                                            }
                                        } else {
                                            echo "<p>Nenhuma categoria encontrada</p>";
                                        }
                                        ?>
                                    </div>                                <!--Serve para fazer uma autenticação, para verificar se o usuario pode mesmo editar os dados, baseando se a senha esta correta-->
                                <div class='inputWrapper'>
                                    <p>Senha Antiga</p>
                                    <input type="password" name="usuarioSenhaAntiga">
                                </div>
                                <!--Caso o usuario deseje altera a senha ele pode fazer isso por aqui mas não é obrigado-->
                                <div class='inputWrapper'>
                                    <p>Senha Nova</p>
                                    <input type="password" id="inputSenha" name="usuarioSenhaNovo">
                                    <p id="passworduserError" style="color: red;"></p>
                                </div>
                                <!--Botão para excluir a conta, e chama a função de confirmar a exclusão--> 
                                <div class="formButtons">
                                    <button onclick="confirmarExcluirPRA()" class="delButton" type="button">Deletar conta</button>
                                    <button class="updateButton" type="submit">Atualizar conta</button>
                                </div>
                            </form>
                <?php }
                    }
                    // agora é no caso de ser um restaurante que vai fazer a edição
                } else if ($_SESSION["TYPE"] == "Restaurante") {
                    include("dbconnection/functions.php");
                    //Este bloco de código verifica se o ID do restaurante está definido na sessão. Se estiver, ele define variáveis para consultar e recuperar informações específicas do restaurante do banco de dados. 
                    if (isset($_SESSION["ID"])) {
                        $tabela = "restaurante";
                        $aCampos = "*";
                        $condicao = "IdRestaurante = " . $_SESSION["ID"];
                        $usuarios = select($conn, $aCampos, $tabela, $condicao);
                        //serve para mostrar as informações do restaurante se basendo no seu id
                        foreach ($usuarios as $usuario) {
                ?>
                <!--Cria um formulario para editar as informações do restaurante-->
                            <form action="databaseRestaurante/restauranteEditar.php" method="post" enctype="multipart/form-data" onsubmit="return validaterestaurantForm()">
                                <div class='inputWrapper'>
                                    <!---->
                                    <p>Imagem:</p>
                                    <img id="imagemSelecionada">
                                    <!-- Este é um campo de entrada de arquivo que permite que o usuário selecione um arquivo de imagem do seu dispositivo, fução de validarimagem é chamada-->
                                    <input type="file" id="Imagem" class="form-control" name="Imagem" accept="imagem/*" onchange="validaImagem(this);">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                                </div>
                                <div class='inputWrapper'>
                                    <p>Nome</p>
                                    <!--O valor é preenchido com o nome antigo, que foi recuperado do loop de usuario feito anteriomente, se não tiver nenhum nome é obrigatorio que adicione um nome para enviar o formulario-->
                                    <input type="text" id="inputNome" name="restauranteNomeNovo" required value="<?php echo $usuario["NomeRestaurante"] ?>">
                                    <p id="nomeRestauranteErro" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <p>Descrição</p>
                                    <!--O valor é preenchido com a descrição antiga, que foi recuperada do banco de dados, se não tiver nenhuma descrição é pbrigatorio escrever -->
                                    <textarea name="restauranteDescricaoNovo"><?php echo $usuario["DescricaoRestaurante"] ?></textarea>
                                    <p id="descricaoRestauranteErro" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <p>Email</p>
                                    <!--O valor é preenchido com o email antigo que foi recuperado pelo loop de usuario feito anteriomente, se não tiver um email é obrigatorio adicionar um email para enviar o formulario-->
                                    <input type="email" id="inputuserEmail" name="restauranteEmailNovo" required value="<?php echo $usuario["EmailRestaurante"] ?>">
                                    <p id="emailRestauranteErro" style="color: red;"></p>
                                </div>
                                <div class='inputWrapper'>
                                    <!--Serve para fazer uma autenticação, para verificar se o usuario pode mesmo editar os dados, baseando se a senha esta correta-->
                                    <p>Senha Antiga</p>
                                    <input type="password" name="restauranteSenhaAntiga">
                                </div>
                                <div class='inputWrapper'>
                                    <!--Caso o usuario deseje altera a senha ele pode fazer isso por aqui mas não é obrigado-->
                                    <p>Senha Nova</p>
                                    <input type="password" id="senhaRestaurante" name="restauranteSenhaNovo">
                                    <p id="senhaRestauranteErro" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>CNPJ</p>
                                    <!--O valor é o cnpj existente anteriormente, no caso de não ter nada é obrigatorio adicionar, chama a mascara de cnpj-->
                                    <input type="text" id="inputCNPJ" name="restauranteCNPJNovo" onkeyup="handleCnpj(event)" maxlength='18' required value="<?php echo $usuario["CNPJRestaurante"] ?>">
                                    <p id="cnpjError" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>CEP</p>
                                    <!--O valor é o cep antigo, se não tiver nada é obrigatorio adicionar algo, chama a mascar de cep-->
                                    <input type="text" id="inputCep" name="restauranteCEPNovo" maxlength='9' onkeyup="handleZipCode(event)" class="ls-mask-cep" required value="<?php echo $usuario["CEPRestaurante"] ?>">
                                    <p id="cepError" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>Rua</p>
                                    <!--O valor é a rua antiga, se não tiver nada é obrigatorio adicionar algo-->
                                    <input type="text" id="inputRua" name="restauranteRuaNovo" required value="<?php echo $usuario["RuaRestaurante"] ?>">
                                    <p id="ruaError" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>Número</p>
                                    <!--O valor é o numero antigo, se não tiver nada é obrigatorio adicionar algo-->
                                    <input type="text" id="inputNumero" name="restauranteNumeroNovo" required value="<?php echo $usuario["Numero_Restaurante"] ?>">
                                    <p id="numeroError" style="color: red;"></p>

                                </div>
                                <div class='inputWrapper'>
                                    <p>Site</p>
                                    <!--o valor é o site antigo, se não tiver nada é obrigatorio adicionar algo-->
                                    <input type="text" id="inputSiteUrl" name="restauranteSiteNovo" value="<?php echo $usuario["SiteRestaurante"] ?>">
                                    <p id="siteUrlError" style="color: red;"></p>

                                </div>
                                <div class="formButtons">
                                    <!--Botão de deletar conta, chamando o javascript confirmar exclusão de restaurante-->
                                    <button onclick="confirmarExcluirRestaurante()" class="delButton" type="button">Deletar conta</button>
                                    <!--Botão para atualizar a conta após editar-->
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
    <!--Chama a pagina de javascript com as mascaras para os restaurantes-->
    <script src="./js/mascarasRestaurante.js"></script>

</main>

<?php include("inc/footer.php");
//exibe uma mensagem de erro se a variável de sessão estiver definida, e em seguida, remove essa variável de sessão.
if (isset($_SESSION['erro'])) {
    echo "<script>alert('" . $_SESSION['erro'] . "');</script>";
    unset($_SESSION['erro']);
} ?>