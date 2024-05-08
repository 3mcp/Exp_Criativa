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
                <form action="databasePrato/pratoCadastro.php" enctype="multipart/form-data" class='addPratoForm' method='post'>
                    <div class='inputWrapper'>
                        <p>Imagem:</p>
                        <img id="imagemSelecionada">
                        <input type="file" id="img" class="form-control" name="img" accept="imagem/*" onchange="validaImagem(this);">
                        <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                    </div>
                    <label for="nomePrato">Nome do prato</label>
                    <input type="text" id='nomePrato'name="nomeP" placeholder='Ex: Macarrão com Salsicha '>
                    <label for="precoPrato">Preço do Prato</label>
                    <input type="text" id='precoPrato' name="precoP" placeholder='Ex: R$00.00'>
                    <label for="descricaoPrato">Descrição do prato</label>
                    <textarea id='descricaoPrato' name="descricaoP" maxlength="400" placeholder="Ex: uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano..."></textarea>
                    <button class='enviarBtn'>Enviar</button>
                </form>
            </div>
        </div>
        <?php
            $tabela = "prato";
            $aCampos = "*";
            $condicao = $_SESSION["ID"];
            $pratos = select($conn, $aCampos, $tabela, $condicao);
            foreach ($pratos as $r) {
        ?>
        <div class='cardapio-container'>
            <div class="cardapio-item">
            <img  src="data:image/png;base64,<?= base64_encode($r['FotoPrato']) ?>" />
                <div class='cardapio-info'>
                    <p><?php echo $r["DescricaoPrato"]?></p>
                    <i class="bi bi-pencil-square" onclick="on('editForm')"></i>
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
                            <div class='inputWrapper'>
                                <p>Imagem:</p>
                                <img id="imagemSelecionada">
                                <input type="file" id="img" class="form-control" name="img" accept="imagem/*" onchange="validaImagem(this);">
                                <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                            </div>
                            <label for="nomePrato">Nome do prato</label>
                            <input type="text" id='nomePrato' name="pratoNomeNovo" placeholder='Ex: Macarrão com Salsicha '>
                            <label for="precoPrato">Preço do Prato</label>
                            <input type="text" id='precoPrato' name="pratoPrecoNovo" placeholder='Ex: R$00.00'>
                            <label for="descricaoPrato">Descrição do prato</label>
                            <textarea id='descricaoPrato' name="pratoDescricaoNovo" maxlength="400" placeholder="Ex: uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano..."></textarea>
                            <button class='enviarBtn'>Salvar</button>
                        </form>
                    </div>
                    </div>

                    <button class='saibaMaisBtn' onclick="on('entrecot')">Saiba mais</button>
                <div class="overlay" id='entrecot' onclick="off()">
                <div class="cardapio-info-prato">
                    <div class='cardapio-info-texto'>
                        <h1>Entrecot alla Fonduta di Formaggio com Tagliatele</h1>
                        <img src="./img/fotoPrato.png" alt="">
                    </div>
                    <p>Uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano suave e cremoso, com a intensidade do tomate seco, resultando em uma combinação irresistível. Adicionamos uma pitada de manjericão fresco para adicionar um toque aromático e refrescante.</p>
                    <button class='fecharBtn' onclick="off('entrecot')">Fechar</button>
                </div></div>
            </div>
            

            </div>
        </div>
    </div>
    <script src="./js/editar.js"></script>
    <script src='./js/cardapio.js'></script>
</main>

<?php include("inc/footer.php") ?>
