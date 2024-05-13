<?php include("inc/header.php");
    include("dbconnection/functions.php");    
?>

<main>
    <div class='restaurante-pg'>
        <h1 class='restaurante-titulo'>Restaurante</h1>
        <p>Cardápio</p>
        <button class='addBtn' onclick="on('form')">+</button>
        <div class="overlay" id='form'>
            <div class='addPrato'>
                <div>
                    <h1>Adicione um prato</h1>
                    <i class="bi bi-x" onclick="off('form')"></i>
                </div>
                <form action="databasePrato/pratoCadastro.php" enctype="multipart/form-data" class='addPratoForm' method='post' onsubmit="return validarFormulario()">
                    <div class='container1'>
                        <div class='inputWrapper'>
                            <p>Imagem:</p>
                            <img id="imagemSelecionada">
                            <input type="file" id="img" class="form-control" name="img" accept="imagem/*" onchange="validaImagem(this);">
                            <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                        </div>
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
            $condicao = 'IDPrato';
            $pratos = select($conn, $aCampos, $tabela, $condicao);
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
                                <input type="file" id="pratoFotoN" class="form-control" name="pratoFotoNovo" accept="imagem/*" onchange="validaImagem(this);">
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
                                        echo "<div><input type='checkbox' id='categoria_".$categoria['IdCategoria']."' name='pratoCategorias[]' value='".$categoria['IdCategoria']."'>";
                                        echo "<label for='categoria_".$categoria['IdCategoria']."'>".$categoria['NomeCategoria']."</label></div>";
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