<?php include("inc/header.php") ?>

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
                <form action="" class='addPratoForm'>
                    <label for="nomePrato">Nome do prato</label>
                    <input type="text" id='nomePrato' placeholder='Ex: Macarrão com Salsicha '>
                    <label for="precoPrato">Preço do Prato</label>
                    <input type="text" id='precoPrato' placeholder='Ex: R$00.00'>
                    <label for="descricaoPrato">Descrição do prato</label>
                    <textarea id='descricaoPrato' maxlength="400" placeholder="Ex: uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano..."></textarea>
                    <button class='enviarBtn'>Enviar</button>
                </form>
            </div>
        </div>
        <div class='cardapio-container'>
            <div class="cardapio-item">
                <img src='img/fotoPrato.png'>
                <div class='cardapio-info'>Entrecot alla Fonduta di Formaggio
                com Tagliatele <i class="bi bi-pencil-square" onclick="on('editForm')"></i></div>
                <div class="overlay" id='editForm'>
                    <div class='editPrato'>
                        <div>
                            <h1>Editar</h1>
                            <i class="bi bi-x" onclick="off('editForm')"></i>
                        </div>
                        <form action="" class='editPratoForm'>
                            <label for="nomePrato">Nome do prato</label>
                            <input type="text" id='nomePrato' placeholder='Ex: Macarrão com Salsicha '>
                            <label for="precoPrato">Preço do Prato</label>
                            <input type="text" id='precoPrato' placeholder='Ex: R$00.00'>
                            <label for="descricaoPrato">Descrição do prato</label>
                            <textarea id='descricaoPrato' maxlength="400" placeholder="Ex: uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano..."></textarea>
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

    <script src='./js/cardapio.js'></script>
</main>

<?php include("inc/footer.php") ?>
