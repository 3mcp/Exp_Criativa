<?php include("inc/header.php") ?>
<main>
    <script src="js/restaurante.js"></script>
    <div class="Restaurantes-pg">
        <div class='Restaurante-txt'>
            <h1>Restaurantes</h1>
        </div>

        <a href="inc/cadastroRestaurante.php" class='btnRegistrar'>Registre seu restaurante</a>

        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Pesquise por restaurantes, pratos...">
            <button class="search-button">Pesquisar</button>
        </form>


        <section class="Restaurantes">
            <div class="restaurante">
                <img src="img/suli2.png" alt="">
                <p>Suli Confeitaria</p>
                <h5>Essa é uma confeitaria repleta de doces e salgados deliciciosos que são seguros para alimentação celiaca e sem lactose.</h5>
                <a href="https://www.instagram.com/suliconfeitaria/" target="_blank"><button class='btn-vermais'>Ver mais</button></a>
            </div>
            <div class="restaurante">
                <img src="img/semculpared.png" alt="">
                <p>Sem culpa</p>
                <h5>Esse é um restaurante com comidas caseiras e maravilhosas, tendo hamburguers e pratos prontos perfeitos para celiacos.</h5>
                <a href="https://www.instagram.com/semculpacozinha/" target="_blank"><button class='btn-vermais'>Ver mais</button></a>
            </div>
            <div class="restaurante">
                <img src="img/funfit.png" alt="">
                <p>Funfit</p>
                <h5>É um quiosque localizado em diversos shoppings, que possuem alimentos simples para pegar e comer rapidamente, e é seguro para celíacos.</h5>
                <a href="https://www.instagram.com/funfitfazbem/" target="_blank"><button class='btn-vermais'>Ver mais</button></a>
            </div>
            <div class="restaurante">
                <img src="img/viva la vegan.jpg" alt="">
                <p>Viva la vegan</p>
                <h5>Almoço vegano com diversas combinações, sanduíches e cafés, em atmosfera moderna e entrega em domicílio.</h5>
                <a href="https://www.instagram.com/vlvcwb/" target="_blank"><button class='btn-vermais'>Ver mais</button></a>
            </div>
        </section>
    </div>
    </body>

    </html>