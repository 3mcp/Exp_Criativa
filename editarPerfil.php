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
                            <form action="databasePRA/usuarioEditar.php" method="post">
                                <div class='inputWrapper'>
                                    <p>Nome</p>
                                    <input type="text" id="nome" name="usuarioNomeNovo" required value="<?php echo $usuario["NomePRA"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Email</p>
                                    <input type="email" id="email" name="usuarioEmailNovo" required value="<?php echo $usuario["EmailPRA"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Senha</p>
                                    <input type="password" id="password" name="usuarioSenhaNovo" required value="<?php echo $usuario["SenhaPRA"] ?>">
                                </div>
                                <div class="formButtons">
                                    <button onclick="confirmarExcluirPRA()" class="delButton">Deletar conta</button>
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
                            <form action="databaseRestaurante/restauranteEditar.php" method="post">
                                <div class='inputWrapper'>
                                    <p>Nome</p>
                                    <input type="text" id="nome" name="restauranteNomeNovo" required value="<?php echo $usuario["NomeRestaurante"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Email</p>
                                    <input type="email" id="email" name="restauranteEmailNovo" required value="<?php echo $usuario["EmailRestaurante"] ?>">
                                </div>
                                <div class='inputWrapper'>
                                    <p>Senha</p>
                                    <input type="password" id="password" name="restauranteSenhaNovo" required value="<?php echo $usuario["SenhaRestaurante"] ?>">
                                </div>
                                <div class="formButtons">
                                    <button onclick="confirmarExcluirRestaurante()" class="delButton">Deletar conta</button>
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

<?php include("inc/footer.php") ?>