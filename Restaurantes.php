<?php 
    include("inc/header.php");
    include("databaseRestaurante/restauranteBuscar.php");
?>
<main>
    <script src="js/restaurante.js"></script>
    <div class="Restaurantes-pg">
        <div class='Restaurante-txt'>
            <h1>Restaurantes</h1>
        </div>

        <a href="inc/cadastroRestaurante.php" class='btnRegistrar'>Registre seu restaurante</a>

        <form class="search-container">
            <div class="inputSearchWrapper">
                            <input type="text" id="search-bar" placeholder="Pesquise por restaurantes, pratos...">
                            <div class="dropdown">
                                <button class="dropdown-toggle searchBtnFilter" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-funnel" id='searchFilterBtn'></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                        $categorias = select($conn, "*", "Categoria", NULL);
                                        foreach ($categorias as $categoria) {
                                        ?>
                                        <li class='option-wrapper'>
                                            <input class="form-check-input categoria-checkbox" type="checkbox" name="categoria" value="<?php echo $categoria['IdCategoria']; ?>" id="<?php echo $categoria['NomeCategoria']; ?>">
                                            <label><?php echo $categoria['NomeCategoria']; ?></label>
                                        </li>
                                    <?php } ?>                    
                                </ul>
                            </div>
                        </div>
                        <button class="search-button" type="button" onclick="searchRestaurantes()">Pesquisar</button>
                    </form>




        <section class="Restaurantes">
            <?php
                foreach ($restaurantes as $r) {
                    $categorias = [];
                         //Pegando o array e transformando em uma string separada por virgulas
                         foreach ($r["Categorias"] as $categoria) {
                             $categorias[] = $categoria["IdCategoria"];
                         }
                        $categoriaString = implode(",", $categorias);
                         ?>
                    <div class="restaurante" categorias="<?php echo $categoriaString; ?>">
                    
                        <img src="data:image/png;base64,<?= base64_encode($r['FotoRestaurante']) ?>" />
                        <h5><?php echo $r["NomeRestaurante"] ?></h5>
                        <p><?php echo $r["DescricaoRestaurante"] ?></p>
                        <a href="<?php echo $r["SiteRestaurante"] ?>" target="_blank"><button class='btn-vermais'>Ver mais</button></a>
                        <a href="cardapio.php?id=<?php echo $r['IdRestaurante']; ?>"><button class='btn-vermais'>Ver cardápio</button></a>
                    </div>
                <?php } ?>

            </main>

<?php include("inc/footer.php") ?>