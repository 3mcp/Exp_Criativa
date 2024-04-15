<?php include("inc/header.php");
if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
}
?>

<main>

    <div class='containerPrincipal'>
        <?php if ($_SESSION["TYPE"] == "P.R.A.") {
            include("dbconnection/functions.php");
            $tabela = "p_r_a_";
            $aCampos = "*";
            $condicao = "IdPRA = " . $_SESSION["ID"];
            $usuarios = select($conn, $aCampos, $tabela, $condicao);
            $dados;
            foreach ($usuarios as $usuario) {
        ?>
                <div class='container-banner'>
                    <div class='container-info'>
                        <div>
                            <img src="img/profilepic.png" alt="" class='profilePic'>
                            <div class='container-info-content'>
                                <h1 class='profileTitle'><?php echo $_SESSION['NOME'] ?></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='wrapper-profile'>
                    <div class='container-sobre'>
                        <h1>Sobre</h1>
                        <hr>
                        <div class='sobre-info'>
                            <p>Email: <span><?php echo $usuario['EmailPRA'] ?></span></p>
                        </div>
                    </div>

                    <div class="container-reviews">
                        <h1>Reviews mais recentes</h1>
                        
                        <hr>
                        <div class='review'>
                            <div>
                                <img src="img/profilepic.png" alt="" class='profilePicReview'>
                                <div class='review-info'>
                                    <h2><?php echo $_SESSION['NOME'] ?></h2>
                                    <p>Comentou no restaurante: Lorem ipsum</p>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id quam tortor nec arcu. Euismod neque ultricies eget adipiscing condimentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id quam tortor nec arcu. Euismod neque ultricies eget adipiscing condimentum.</p>
                        </div>
                        <div class='review'>
                            <div>
                                <img src="img/profilepic.png" alt="" class='profilePicReview'>
                                <div class='review-info'>
                                    <h2><?php echo $_SESSION['NOME'] ?></h2>
                                    <p>Comentou no restaurante: Lorem ipsum</p>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id quam tortor nec arcu. Euismod neque ultricies eget adipiscing condimentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id quam tortor nec arcu. Euismod neque ultricies eget adipiscing condimentum.</p>
                        </div>
                    </div>


                </div>
            <?php }
        } else if ($_SESSION["TYPE"] == "Restaurante") {
            include("dbconnection/functions.php");
            $tabela = "Restaurante";
            $aCampos = "*";
            $condicao = "IdRestaurante = " . $_SESSION["ID"];
            $usuarios = select($conn, $aCampos, $tabela, $condicao);
            $dados;
            foreach ($usuarios as $usuario) {
                foreach ($usuario as $key => $value) {
                    if($key == "FotoRestaurante"){
                        echo "<script>console.log('" . $value . "')</script>";
                    }
                    
                }
            ?>
                <div class='container-banner'>
                    <div class='container-info'>
                        <div>
                            <?php if ($usuario['FotoRestaurante'] != "") { ?>
                                <img class="profilePic" src="data:image/png;base64,<?= base64_encode($usuario['FotoRestaurante']) ?>" />
                            <?php } else { ?>
                                <img src="img/profilepic.png" alt="" class='profilePic'>
                            <?php } ?>
                            <div class='container-info-content'>
                                <h1 class='profileTitle'><?php echo $usuario['NomeRestaurante'] ?></h1>
                                <p class='profileLocation'>
                                    <img src="img/location.svg" alt="">
                                    <?php echo $usuario['RuaRestaurante'] ?>, <?php echo $usuario['Numero_Restaurante'] ?>, <?php echo $usuario['CEPRestaurante'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='wrapper-profile'>
                    <div class='container-sobre'>
                        <h1>Sobre</h1>
                        <hr>
                        <div class='sobre-info'>
                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>-->
                            <p>Email: <span><?php echo $usuario['EmailRestaurante'] ?></span></p>
                            <p>CNPJ: <span><?php echo $usuario['CNPJRestaurante'] ?></span></p>
                            <p>CEP: <span><?php echo $usuario['CEPRestaurante'] ?></span></p>
                            <p>Rua: <span><?php echo $usuario['RuaRestaurante'] ?></span></p>
                            <p>Número: <span><?php echo $usuario['Numero_Restaurante'] ?></span></p>
                        </div>
                    </div>

                    <div class="container-reviews">
                        <h1>Reviews mais recentes no seu restaurante</h1>
                        <hr>
                        <div class='review'>
                            <div>
                                <img src="img/profilepic.png" alt="" class='profilePicReview'>
                                <div class='review-info'>
                                    <h2>Nome do usuário</h2>
                                    <p>Comentou no restaurante: <?php echo $_SESSION['NOME'] ?></p>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id quam tortor nec arcu. Euismod neque ultricies eget adipiscing condimentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id quam tortor nec arcu. Euismod neque ultricies eget adipiscing condimentum.</p>
                        </div>
                        <div class='review'>
                            <div>
                                <img src="img/profilepic.png" alt="" class='profilePicReview'>
                                <div class='review-info'>
                                    <h2>Nome do usuário</h2>
                                    <p>Comentou no restaurante: <?php echo $_SESSION['NOME'] ?></p>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id quam tortor nec arcu. Euismod neque ultricies eget adipiscing condimentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id quam tortor nec arcu. Euismod neque ultricies eget adipiscing condimentum.</p>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>


</main>

<?php include("inc/footer.php") ?>