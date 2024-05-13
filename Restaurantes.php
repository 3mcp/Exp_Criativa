<?php 
    include("inc/header.php");
    include("dbconnection/functions.php");    
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
                    <button class="btn btn-secondary dropdown-toggle searchBtnFilter" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel" id='searchFilterBtn' onclick='showSelect()'></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li class='option-wrapper'>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label>Categoria1</label>
                        </li>
                        <li class='option-wrapper'>
                            <input class="form-check-input" type="checkbox" value="" id="teste">
                            <label>Categoria2</label>
                        </li>
                        <li class='option-wrapper'>
                            <input class="form-check-input" type="checkbox" value="" id="teste2">
                            <label>Categoria3</label>
                        </li>
                    </ul>
                </div>
            </div>
            <button class="search-button">Pesquisar</button>
        </form>




        <section class="Restaurantes">
            <?php
            $tabela = "restaurante";
            $aCampos = "*";
            $restaurantes = select($conn, $aCampos, $tabela, NULL);
            foreach ($restaurantes as $r) {
            ?>
            <div class="restaurante">
            <img  src="data:image/png;base64,<?= base64_encode($r['FotoRestaurante']) ?>" />
                <h5><?php echo $r["NomeRestaurante"]?></h5>
                <p><?php echo $r["DescricaoRestaurante"]?></p>
                <a href="<?php echo $r["SiteRestaurante"]?>" target="_blank"><button class='btn-vermais'>Ver mais</button></a>
            </div>
            <?php }?>
            
        </section>
    </div>



</main>

        <?php include("inc/footer.php") ?>
    </body>
</html>

