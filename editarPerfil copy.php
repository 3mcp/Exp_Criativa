<?php
include("inc/header.php");
if(!isset($_SESSION["ID"])){
    header('Location: index.php');
}
?>
<main>


    <div class='mainButtons'>
        <h1>Configurações</h1>
        <button type='button' class='goBackBtn'>Voltar</button>
    </div>
    <hr>
    <div class='container-form'>
        <button class='dataButton'>Dados</button>
        <div>
            <?php if($_SESSION["TYPE"]=="P.R.A."){
                include("dbconnection/functions.php"); 
                if(isset($_SESSION["ID"])){
                    $tabela = "p_r_a_";
                    $aCampos = "*";
                    $condicao = "IdPRA = ".$_SESSION["ID"]; 
                    $usuarios = select($conn, $aCampos, $tabela, $condicao);
                    $dados;
                    foreach ($usuarios as $usuario) {
                        ?>
            <form action="databasePRA/usuarioEditar.php" method="post">
                <div class='inputWrapper'>
                    <p>Nome</p>
                    <input type="text" id="nome" name="usuarioNomeNovo" required value="<?php echo $usuario["NomePRA"]?>">
                </div>
                <div class='inputWrapper'>
                    <p>Email</p>
                    <input type="email" id="email" name="usuarioEmailNovo" required value="<?php echo $usuario["EmailPRA"]?>">
                </div>
                <div class='inputWrapper'>
                    <p>Senha</p>
                    <input type="password" id="password" name="usuarioSenhaNovo" required value="<?php echo $usuario["SenhaPRA"]?>">
                </div>
                <button onclick="confirmarExcluirPRA()" class="btn btn-danger">Deletar conta</button>
                <button class="btn btn-outline-warning"type="submit">Atualizar conta</button>
            </form> 
            <?php }}} ?>
            <?php if($_SESSION["TYPE"]=="Restaurante"){?>
            <form action="databaseRestaurante/restauranteEditar.php" method="post">
                <div class='inputWrapper'>
                    <p>Nome</p>
                    <input type="text" id="nome" name="" required value="<?php echo $usuario["NOME"]?>">
                </div>
                <div class='inputWrapper'>
                    <p>Email</p>
                    <input type="email" id="email" name="" required value="<?php echo $usuario["NOME"]?>">
                </div>
                <div class='inputWrapper'>
                    <p>Senha</p>
                    <input type="password" id="password" name="" required value="<?php echo $usuario["NOME"]?>">
                </div>
            <div class = "formButtons">
                <button onclick="confirmarExcluir()" class="delButton">Deletar conta</button>
                <button class="updateButton" type="submit">Atualizar conta</button>
            </div>
            </form> 
            <?php } ?>
        </div>
    </div>
    

    <p id='demo'></p>

    <script src="./js/editar.js"></script>

</main>