<!--essa parte inclui o header e as funções de banco de dados-->
<?php include("inc/header.php");
    include("dbconnection/functions.php");
    
    //aqui serve para negar ou permitir acesso a um usuario baseado no seu id 
    //assim não tem como acessar a página apenas por um link
    if (!isset($_GET['id'])) {
        header("Location: index.php");
    }
    $restauranteId = $_GET["id"];
    $donoRestaurante = FALSE;
    if(isset($_SESSION["TYPE"]))
        if($_SESSION["TYPE"] == "Restaurante")
            if($restauranteId==$_SESSION["ID"]) 
            $donoRestaurante = TRUE;
        
            
    $query = "SELECT NomeRestaurante FROM Restaurante WHERE IdRestaurante = $restauranteId";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $restaurante = mysqli_fetch_assoc($result);
        $nomeRestaurante = $restaurante['NomeRestaurante'];
        
        $pageTitle = $nomeRestaurante;
    } else {
        $pageTitle = "Cardápio";
    } 

?>

<!--inicia a pagina dos cardápios-->
<main>
    <div class='restaurante-pg'>
        <h1 class='restaurante-titulo'><?php echo $pageTitle; ?></h1>
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
                            <p class='inputWrapperImagem'>Imagem:</p>
                            <img id="imagemSelecionada">
                            <!--accept: indica que apenas imagens podem ser aceitas. oncharge: chama a função de validar imagem-->
                            <input type="file" id="img" class="form-control" name="img" accept="imagem/*" onchange="validaImagem(this);" required>
                            <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                        </div>
                        <!--Outras entradas para o formulario como nome do prato, preço e descrição-->
                        <div class='inputWrapper'>
                        <label for="nomePrato">Nome do prato</label>
                        <input type="text" id='nomePrato'name="nomeP" placeholder='Ex: Macarrão com Salsicha ' required>
                        </div>
                        <div class='inputWrapper'>
                        <label for="precoPrato">Preço do Prato</label>
                        <input type="number" id='precoPrato' name="precoP" placeholder='Ex: R$00.00' required>
                        </div>
                        <div class='inputWrapper'>
                        <label for="descricaoPrato">Descrição do prato</label>
                        <textarea id='descricaoPrato' name="descricaoP" maxlength="400" placeholder="Ex: uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano..." required></textarea>
                        </div>
                    <!--adicionar categorias para os pratos-->
                    </div>
                    <div class='inputWrapperCategoria'>
                    <label for="categoriaPrato">Categorias do prato</label>
                        <div class="categoria-checkboxes row">
                            <?php
                            //executa consultas ao banco de dados para obter todas as categorias disponíveis e, em seguida, itera sobre elas para exibi-las como checkboxes.
                            $categorias = select($conn, "*", "categoria", NULL);
                            if (!empty($categorias)) {
                                foreach ($categorias as $categoria) {
                                    echo "<div class='categoriaContainer'><input class='form-check-input' type='checkbox' id='categoria_".$categoria['IdCategoria']."' name='pratoCategorias[]' value='".$categoria['IdCategoria']."'>";
                                    echo "<label class='form-check-label' for='categoria_".$categoria['IdCategoria']."'>".$categoria['NomeCategoria']."</label></div>";
                                } 
                                //se não encontrar nenhuma categoria exibe uma mensagem
                            } else {
                                echo "<p>Nenhuma categoria encontrada</p>";
                            }
                            ?>
                        </div>    
                        <!--Botão para enviar o formulario--> 
                        <button class='enviarBtn'>Enviar</button>
                    </div>               
                </form>
            </div>
        </div>
        <?php
        //na tabela prato é selecionado todas as colunas
            $tabela = "prato";
            $aCampos = "*";
        //quando a chave estrangeira id restaurante é igual ao id de restaurante que foi pego no inicio desta página
            $condicao = 'fk_Restaurante_IdRestaurante ='. $restauranteId;
        //assim, realiza a função select do dbconnection, salvando esse dados para serem salvos em uma variavel
            $pratos = select($conn, $aCampos, $tabela, $condicao);

        //na tabela prato categoria é selecionada todas as colunas
            $tabela1 = "prato_categoria";
            $aCampos1 = "*";
        //quando id prato na tabela prato for = 
            $condicao1 = 'fk_Prato_IdPrato';
        //assim, realiza a função select do dbconnection, salvando esse dados para serem salvos em uma variavel
            $categorias = select($conn, $aCampos, $tabela, $condicao);
        ?>
        <div class='cardapio-container'>
        <?php        
        //armazena o id de cada prato na variavel pratoID      
            foreach ($pratos as $r) {
                $pratoID = $r['IdPrato'];
                // Consulta SQL para obter as categorias de cada prato
                $queryCategorias = "SELECT Categoria.NomeCategoria 
                                    FROM Prato_Categoria 
                                    INNER JOIN Categoria 
                                    ON Prato_Categoria.fk_Categoria_IdCategoria = Categoria.IdCategoria 
                                    WHERE Prato_Categoria.fk_Prato_IdPrato = $pratoID";

            $resultCategorias = mysqli_query($conn, $queryCategorias);

            $categoriasPrato = array();

            if ($resultCategorias && mysqli_num_rows($resultCategorias) > 0) {
                while ($rowCategoria = mysqli_fetch_assoc($resultCategorias)) {
                $categoriasPrato[] = $rowCategoria['NomeCategoria'];
                }
                }
            ?>
<!--Aqui vai mostrar o prato após o formulario, como ficará sua formatação-->
            <div class="cardapio-item">

            <!--Mostra a imagem que foi selecionada, imagem é codificada em base64-->
            <img  src="data:image/png;base64,<?= base64_encode($r['FotoPrato']) ?> "style="width: 300px; height: 300px;" />
                <div class='cardapio-info'>
                    <!--Exibe a descrição do prato que é obtida na coluna descricao prato-->
                    <p><?php echo $r["DescricaoPrato"]?></p>
                
                    <!--Esse é um botão de saiba mais que mostra mais informações sobre o prato-->
                    <button class='saibaMaisBtn' onclick="on('entrecot_<?php echo $pratoID; ?>')">Saiba mais</button>
                    <?php if($donoRestaurante == TRUE) {?>

                    <i class="bi bi-pencil-square text-light" onclick="on('editForm',<?php echo $pratoID; ?>)"></i> <!-- Botão de editar -->
                    <?php } ?>
                </div>
            </div>
            <!--O onclick serve para que quando o usuario clica fora da sobreposição ele sai do saiba mais-->
            <div class="overlay" id='entrecot_<?php echo $pratoID; ?>' onclick="off()">
                <div class="cardapio-info-prato">
                    <div class='cardapio-info-texto'>
                        <!--Irá aparecer o nome, preço, imagem, descrição-->
                        <h1><?php echo $r["NomePrato"]; ?></h1>
                        <p class='cardapio-info-descricao'>R$<?php echo $r["PrecoPrato"] ?></p>
                        <img src="data:image/png;base64,<?= base64_encode($r['FotoPrato']) ?>" alt="" class='imgSaibaMais'>
                    </div>
                    <p class='cardapio-info-descricao'><?php echo $r["DescricaoPrato"]; ?></p>
                    <p class='cardapio-info-categoria'>Categorias: <?php echo implode(", ", $categoriasPrato); ?></p>
                    <button class='fecharBtn' onclick="off('entrecot_<?php echo $pratoID; ?>')">Fechar</button>
                    
                </div>
            </div>
        <?php }?>
        <!--Aqui é a parte para editar o prato-->
                <div class="overlay" id='editForm'>
                <div class='editPrato'>
                    <div>
                    <h1>Editar</h1>
                        <i class="bi bi-x" onclick="off('editForm')"></i>
                    </div>
                    <!--Inicia um formulario para a edição do prato-->
                    <!--Onde os dados são enviados para pratoEditar.php-->
                    <form action="databasePrato/pratoEditar.php" enctype="multipart/form-data" class='editPratoForm' method="post">
                        <div class='infoContainer'>
                        <!--Aqui adiciona a nova imagem utilizando o js de validarImagem-->
                            <div class='inputWrapper'>
                                <p>Imagem:</p>
                                <img id="imagemSelecionada">
                                <input type="file" id="pratoFotoN" class="form-control" name="pratoFotoNovo" accept="imagem/*" onchange="validaImagem(this);">
                                <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                            </div>
                            <div class="inputWrapper">

                                <label for="nomePrato">Nome do prato</label>
                                <input type="text" id='pratoNomeN' name="pratoNomeNovo" placeholder='Ex: Macarrão com Salsicha ' required>
                            </div>
                        <!--Aqui adiciona o novo nome do prato-->
                        <!--Aqui adiciona o novo preço do prato-->
                            <label for="precoPrato">Preço do Prato</label>
                            <input type="text" id='pratoPrecoN' name="pratoPrecoNovo" placeholder='Ex: R$00.00' required>
                        <!--Aqui adiciona a nova descrição do prato-->
                            <label for="descricaoPrato">Descrição do prato</label>
                            <div class='inputWrapper'>
                            <!--textarea serve para algo com muitas linhas-->
                                <textarea id='pratoDescricaoN' name="pratoDescricaoNovo" maxlength="400" placeholder="Ex: uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano..." required></textarea>
                            </div>
                        </div>
                        <div class='inputWrapperCategoria'>
                        <!--Aqui serve para editar as categorias dos pratos-->
                            <label for="categoriaPrato">Categorias do prato</label>
                            <div class="categoria-checkboxes row">
                                <?php
                                $categorias = select($conn, "*", "categoria", NULL);
                                if (!empty($categorias)) {
                                    foreach ($categorias as $categoria) {
                                        //cria um checkbox para cada categoria baseada no seu id, e mais de uma categoria pode ser selecionada
                                        echo "<div class='categoriaContainer'><input class='form-check-input' type='checkbox' id='categoriaN_".$categoria['IdCategoria']."' name='pratoCategorias[]' value='".$categoria['IdCategoria']."'>";
                                        echo "<label class='form-check-label' for='categoriaN_".$categoria['IdCategoria']."'>".$categoria['NomeCategoria']."</label></div>";
                                    }
                                } else {
                                    echo "<p>Nenhuma categoria encontrada</p>";
                                }
                                ?>
                            </div>
                            <input type="hidden" name="pratoID" id="idPratoEditado">
                            <div class="buttons">
                                <!--Chama o javascript para confirmar se deseja escluir-->
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