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
                <img src="img/fachada (teste).jpg" alt="">
                <p>Swadisht</p>
                <h5>Restaurante indiano elegante que combina pratos e vinho, com destaque para o chana masala e as samosas.</h5>
                <a href="https://www.swadisht.com.br/" target="_blank"><button class='btn-vermais'>Ver mais</button></a>
            </div>
            <div class="restaurante">
                <img src="img/fachada2 (teste).jpg" alt="">
                <p>Zapata</p>
                <h5>Bar colorido e animado com comida e música mexicanas e pista de dança aberta para iniciantes e profissionais.</h5>
                <a href="https://zapatabrasil.com.br/" target="_blank"><button class='btn-vermais'>Ver mais</button></a>
            </div>
            <div class="restaurante">
                <img src="img/fachada2 (teste).jpg" alt="">
                <p>Zapata</p>
                <h5>Bar colorido e animado com comida e música mexicanas e pista de dança aberta para iniciantes e profissionais.</h5>
                <button class='btn-vermais'>Ver mais</button>
            </div>
            <div class="restaurante">
                <img src="img/fachada2 (teste).jpg" alt="">
                <p>Zapata</p>
                <h5>Bar colorido e animado com comida e música mexicanas e pista de dança aberta para iniciantes e profissionais.</h5>
                <button class='btn-vermais'>Ver mais</button>
            </div>
        </section>
    </div>
    </body>

    </html>