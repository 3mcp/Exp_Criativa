<!--essa parte inclui o header e as funções de banco de dados-->
<?php include("inc/header.php");
    include("dbconnection/functions.php");
    //aqui serve para negar ou permitir acesso a um usuario baseado no seu id 
    //assim não tem como acessar a página apenas por um link
    $restauranteId = $_GET["id"];
    $donoRestaurante = FALSE;
    if($_SESSION["TYPE"] == "Restaurante")
        if($restauranteId==$_SESSION["ID"]) 
        $donoRestaurante = TRUE;

?>

<!--inicia a pagina dos cardápios-->
<main>
    <div class='restaurante-pg'>
        <h1 class='restaurante-titulo'>Restaurante</h1>
        <p>Cardápio</p>
        <!--Se o id do dono for o id da sessão então realiza o que está em {}-->
        <?php if($donoRestaurante == TRUE) {?>
            <!--botão para adicionar um prato, inicializando o formulario-->
        <button class='addBtn' onclick="on('form')">+</button>
        <?php } ?>
        <div class="overlay" id='form'>
            <div class='addPrato'>
                <div>
                    <h1>Adicione um prato</h1>
                    <!--Descarte de um elemento do formulario-->
                    <i class="bi bi-x" onclick="off('form')"></i>
                </div>
                <!--actions: indica onde os dados seram enviados. enctype: indica que tem imagem no formulario
                onsubmir: o retorno dessa função determina se o formulário será submetido ou não (valida formulario)-->
                <form action="databasePrato/pratoCadastro.php" enctype="multipart/form-data" class='addPratoForm' method='post' onsubmit="return validarFormulario()">
                    <div class='container1'>
                        <div class='inputWrapper'>
                            <p>Imagem:</p>
                            <img id="imagemSelecionada">
                            <!--accept: indica que apenas imagens podem ser aceitas. oncharge: chama a função de validar imagem-->
                            <input type="file" id="img" class="form-control" name="img" accept="imagem/*" onchange="validaImagem(this);">
                            <!--serve para limitar o tamanho da imagem selecionada-->
                            <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                        </div>
                        <!--Outras entradas para o formulario como nome do prato, preço e descrição-->
                        <div class='inputWrapper'>
                        <label for="nomePrato">Nome do prato</label>
                        <input type="text" id='nomePrato'name="nomeP" placeholder='Ex: Macarrão com Salsicha '>
                        </div>
                        <div class='inputWrapper'>
                        <label for="precoPrato">Preço do Prato</label>
                        <input type="text" id='precoPrato' name="precoP" placeholder='Ex: R$00.00'>
                        </div>
                        <div class='inputWrapper'>
                        <label for="descricaoPrato">Descrição do prato</label>
                        <textarea id='descricaoPrato' name="descricaoP" maxlength="400" placeholder="Ex: uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano..."></textarea>
                        </div>
                    <!--adicionar categorias para os pratos-->
                    </div>
                    <div class='inputWrapperCategoria'>
                    <label for="categoriaPrato">Categorias do prato</label>
                        <div class="categoria-checkboxes">
                            <?php
                            $categorias = select($conn, "*", "categoria", NULL);
                            if (!empty($categorias)) {
                                foreach ($categorias as $categoria) {
                                    echo "<div><input type='checkbox' id='categoria_".$categoria['IdCategoria']."' name='pratoCategorias[]' value='".$categoria['IdCategoria']."'>";
                                    echo "<label for='categoria_".$categoria['IdCategoria']."'>".$categoria['NomeCategoria']."</label></div>";
                                }
                            } else {
                                echo "<p>Nenhuma categoria encontrada</p>";
                            }
                            ?>
                        </div>     
                        <button class='enviarBtn'>Enviar</button>
                    </div>               
                </form>
            </div>
        </div>
        <?php
            $tabela = "prato";
            $aCampos = "*";
            $condicao = 'fk_Restaurante_IdRestaurante ='. $restauranteId;
            $pratos = select($conn, $aCampos, $tabela, $condicao);

            $tabela1 = "prato_categoria";
            $aCampos1 = "*";
            $condicao1 = 'fk_Prato_IdPrato';
            $categorias = select($conn, $aCampos, $tabela, $condicao);
        ?>
        <div class='cardapio-container'>
        <?php             
            foreach ($pratos as $r) {
                $pratoID = $r['IdPrato'];
            ?>
            <div class="cardapio-item">


            <img  src="data:image/png;base64,<?= base64_encode($r['FotoPrato']) ?> "style="width: 300px; height: 300px;" />
                <div class='cardapio-info'>
                    <p><?php echo $r["DescricaoPrato"]?></p>

                    <button class='saibaMaisBtn' onclick="on('entrecot_<?php echo $pratoID; ?>')">Saiba mais</button>
                    <i class="bi bi-pencil-square" onclick="on('editForm',<?php echo $pratoID; ?>)"></i> <!-- Botão de editar -->
                </div>
            </div>
            <div class="overlay" id='entrecot_<?php echo $pratoID; ?>' onclick="off()">
                <div class="cardapio-info-prato">
                    <div class='cardapio-info-texto'>
                        <h1><?php echo $r["NomePrato"]; ?></h1>
                        <p><?php echo $r["PrecoPrato"]; ?></p>
                        <img src="data:image/png;base64,<?= base64_encode($r['FotoPrato']) ?>" alt="" class='imgSaibaMais'>
                    </div>
                    <p class='cardapio-info-descricao'><?php echo $r["DescricaoPrato"]; ?></p>
                    <button class='fecharBtn' onclick="off('entrecot_<?php echo $pratoID; ?>')">Fechar</button>
                </div>
            </div>
        <?php }?>
                <div class="overlay" id='editForm'>
                <div class='editPrato'>
                    <div>
                    <h1>Editar</h1>
                        <i class="bi bi-x" onclick="off('editForm')"></i>
                    </div>
                    <form action="databasePrato/pratoEditar.php" enctype="multipart/form-data" class='editPratoForm' method="post">
                        <div>

                            <div class='inputWrapper'>
                                <p>Imagem:</p>
                                <img id="imagemSelecionada">
                                <input type="file" id="pratoFotoN" class="form-control" name="pratoFotoNovo" accept="imagem/*" style="width: 300ppx; height:300px;" onchange="validaImagem(this);">
                                <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                            </div>
                            <label for="nomePrato">Nome do prato</label>
                            <input type="text" id='pratoNomeN' name="pratoNomeNovo" placeholder='Ex: Macarrão com Salsicha '>
                            <label for="precoPrato">Preço do Prato</label>
                            <input type="text" id='pratoPrecoN' name="pratoPrecoNovo" placeholder='Ex: R$00.00'>
                            <label for="descricaoPrato">Descrição do prato</label>
                            <div class='inputWrapper'>

                                <textarea id='pratoDescricaoN' name="pratoDescricaoNovo" maxlength="400" placeholder="Ex: uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano..."></textarea>
                            </div>
                        </div>
                        <div class='inputWrapperCategoria'>

                            <label for="categoriaPrato">Categorias do prato</label>
                            <div class="categoria-checkboxes">
                                <?php
                                $categorias = select($conn, "*", "categoria", NULL);
                                if (!empty($categorias)) {
                                    foreach ($categorias as $categoria) {
                                        echo "<div><input type='checkbox' id='categoriaN_".$categoria['IdCategoria']."' name='pratoCategorias[]' value='".$categoria['IdCategoria']."'>";
                                        echo "<label for='categoriaN_".$categoria['IdCategoria']."'>".$categoria['NomeCategoria']."</label></div>";
                                    }
                                } else {
                                    echo "<p>Nenhuma categoria encontrada</p>";
                                }
                                ?>
                            </div>
                            <input type="hidden" name="pratoID" id="idPratoEditado">
                            <div class="buttons">
                                <button class="buttonDeletar" type="button" onclick="confirmarExclusao()">Excluir Prato</button>
                                <button class='enviarBtn' type="submit">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>            

            </div>
        </div>
    </div>
    <script src="./js/editar.js"></script>
    <script src='./js/cardapio.js'></script>
</main>

<?php include("inc/footer.php") ?>