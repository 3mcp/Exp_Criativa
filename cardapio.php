<?php include("inc/header.php") ?>

<main>
    <div class='restaurante-pg'>
        <h1 class='restaurante-titulo'>Restaurante</h1>
        <p>Cardápio</p>
        <div class='cardapio-container'>
            <div class="cardapio-item">
                <img src='img/fotoPrato.png'>
                <div class='cardapio-info'>Entrecot alla Fonduta di Formaggio
com Tagliatele</div>
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
            <div class="cardapio-item">
                <img src='img/burrata.png'>
                <div class='cardapio-info'>Burrata ao Pesto Rosso</div>
                <button class='saibaMaisBtn' onclick="on('burrata')">Saiba mais</button>
                <div class="overlay" id='burrata' onclick="off()">
                <div class="cardapio-info-prato">
                    <div class='cardapio-info-texto'>
                        <h1>Burrata ao Pesto Rosso</h1>
                        <img src="./img/burrata.png" alt="">
                    </div>
                    <p>Uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano suave e cremoso, com a intensidade do tomate seco, resultando em uma combinação irresistível. Adicionamos uma pitada de manjericão fresco para adicionar um toque aromático e refrescante.</p>
                    <button class='fecharBtn' onclick="off('burrata')">Fechar</button>
                </div></div>
            </div>
            <div class="cardapio-item">
                <img src='img/bruschetta.png'>
                <div class='cardapio-info'>Bruschetta burrata, tomate seco e manejericão</div>
                <button class='saibaMaisBtn' onclick="on('bruschetta')">Saiba mais</button>
                <div class="overlay" id='bruschetta' onclick="off()">
                <div class="cardapio-info-prato">
                    <div class='cardapio-info-texto'>
                        <h1>Bruschetta burrata, tomate seco e manejericão</h1>
                        <img src="./img/bruschetta.png" alt="">
                    </div>
                    <p>Uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano suave e cremoso, com a intensidade do tomate seco, resultando em uma combinação irresistível. Adicionamos uma pitada de manjericão fresco para adicionar um toque aromático e refrescante.</p>
                    <button class='fecharBtn' onclick="off('bruschetta')">Fechar</button>
                </div></div>
                
            </div>
            <div class="cardapio-item">
                <img src='img/tagliatta.png'>
                <div class='cardapio-info'>Tagliata de Entrecot Alla Cacciatora com Tagliatele</div>
                <button class='saibaMaisBtn' onclick="on('tagliata')">Saiba mais</button>
                <div class="overlay" id='tagliata' onclick="off()">
                <div class="cardapio-info-prato">
                    <div class='cardapio-info-texto'>
                        <h1>Tagliata de Entrecot Alla Cacciatora com Tagliatele</h1>
                        <img src="./img/tagliatta.png" alt="">
                    </div>
                    <p>Uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano suave e cremoso, com a intensidade do tomate seco, resultando em uma combinação irresistível. Adicionamos uma pitada de manjericão fresco para adicionar um toque aromático e refrescante.</p>
                    <button class='fecharBtn' onclick="off('tagliata')">Fechar</button>
                </div></div>

            </div>
            <div class="cardapio-item">
                <img src='img/fillet.png'>
                <div class='cardapio-info'>Filetto al Pepe Verde com Tagliatele</div>
                <button class='saibaMaisBtn' onclick="on('filetto')">Saiba mais</button>
                <div class="overlay" id='filetto' onclick="off()">
                <div class="cardapio-info-prato">
                    <div class='cardapio-info-texto'>
                        <h1>Filetto al Pepe Verde com Tagliatele</h1>
                        <img src="./img/fillet.png" alt="">
                    </div>
                    <p>Uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano suave e cremoso, com a intensidade do tomate seco, resultando em uma combinação irresistível. Adicionamos uma pitada de manjericão fresco para adicionar um toque aromático e refrescante.</p>
                    <button class='fecharBtn' onclick="off('filetto')">Fechar</button>
                </div></div>
            </div>
            <div class="cardapio-item">
                <img src='img/burrata2.png'>
                <div class='cardapio-info'>Burrata com Cebola Caramelizada</div>
                <button class='saibaMaisBtn' onclick="on('burrata2')">Saiba mais</button>
                <div class="overlay" id='burrata2' onclick="off()">
                <div class="cardapio-info-prato">
                    <div class='cardapio-info-texto'>
                        <h1>Burrata com Cebola Caramelizada</h1>
                        <img src="./img/burrata2.png" alt="">
                    </div>
                    <p>Uma entrada que é uma autêntica explosão de sabores. Combinamos a riqueza da burrata, um queijo italiano suave e cremoso, com a intensidade do tomate seco, resultando em uma combinação irresistível. Adicionamos uma pitada de manjericão fresco para adicionar um toque aromático e refrescante.</p>
                    <button class='fecharBtn' onclick="off('burrata2')">Fechar</button>
                </div></div>

            </div>
        </div>
    </div>

    <script src='./js/cardapio.js'></script>
</main>

<?php include("inc/footer.php") ?>
