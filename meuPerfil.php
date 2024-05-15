<?php 
include("inc/header.php");

if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
    exit; // Encerra o script para evitar a execução do restante do código desnecessariamente
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
                foreach ($usuario as $key => $value) {
                    if($key == "FotoPRA"){
                        echo "<script>console.log('" . $value . "')</script>";
                    }
                    
                }
        ?>
                <div class='container-banner'>
                    <div class='container-info'>
                        <div>
                        <?php if ($usuario['FotoPRA'] != "") { ?>
                                <img class="profilePic" src="data:image/png;base64,<?= base64_encode($usuario['FotoPRA']) ?>" />
                            <?php } else { ?>
                                <img src="img/profilepic.png" alt="" class='profilePic'>
                            <?php } ?>
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
                        <h1>Seus Comentários</h1>
                        
                        <hr>
                        <?php 
                            // Consulta para buscar os comentários feitos pelo P.R.A.
                            $sql = "SELECT * FROM Comentario WHERE fk_P_R_A__IdPRA = " . $_SESSION["ID"];
                            $result = $conn->query($sql);

                            // Verifica se existem comentários
                            if ($result->num_rows > 0) {
                                // Exibe cada comentário
                                while($row = $result->fetch_assoc()) {
                                    echo "<div class='review'>";
                                    echo "<div>";
                                    echo "<img src='img/profilepic.png' alt='' class='profilePicReview'>";
                                    echo "<div class='review-info'>";
                                    echo "<h2>Nome do restaurante</h2>"; // Aqui você pode exibir o nome do restaurante ao qual o comentário foi feito
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<p>" . $row['TextoComentario'] . "</p>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<p>Você ainda não fez nenhum comentário.</p>";
                            }
                        ?>
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
                        <?php 
                            // Consulta para buscar os comentários relacionados ao restaurante
                            $sql = "SELECT * FROM Comentario WHERE fk_Restaurante_IdRestaurante = " . $_SESSION["ID"];
                            $result = $conn->query($sql);

                            // Verifica se existem comentários
                            if ($result->num_rows > 0) {
                                // Exibe cada comentário
                                echo "<h1>Reviews mais recentes no seu restaurante</h1>";
                                echo "<hr>";
                                while($row = $result->fetch_assoc()) {
                                    echo "<div class='review'>";
                                    echo "<div>";
                                    echo "<img src='img/profilepic.png' alt='' class='profilePicReview'>";
                                    echo "<div class='review-info'>";
                                    echo "<h2>Nome do usuário</h2>"; // Aqui você pode exibir o nome do usuário que fez o comentário
                                    echo "<p>Comentou no restaurante: " . $_SESSION['NOME'] . "</p>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<p>" . $row['TextoComentario'] . "</p>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<h1>Reviews mais recentes no seu restaurante</h1>";
                                echo "<hr>";
                                echo "<p>Nenhum comentário encontrado.</p>";
                            }
                        ?>
                    </div>
                </div>
        <?php }
       } else if ($_SESSION["TYPE"] == "ADMIN") {
        include("dbconnection/functions.php");
        $tabela = "p_r_a_";
        $aCampos = "*";
        $condicao = "AdminUser = 1";
        $usuarios = select($conn, $aCampos, $tabela, $condicao);
        $dados;
        foreach ($usuarios as $usuario) {
                
        ?>
        <div class='container-banner'>
            <div class='container-info'>
                <div>
                    <img src="img/admin.png" alt="" class='profilePic'>
                    <div class='container-info-content'>
                        <h1 class='profileTitle'><?php echo $usuario['UsernamePRA'] ?></h1>
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
                <h1>Denúncias para Avaliar</h1>
                <hr>
            <?php
                $sql = "SELECT * FROM Comentario WHERE DenunciadoComentario = 1";
                $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                ?>
                <div class='container-banner'>
                    <div class='container-info'>
                        <div>
                            <img src="img/admin.png" alt="" class='profilePic'>
                            <div class='container-info-content'>
                                <h1 class='profileTitle'>Área Administrativa</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='wrapper-profile'>
                    <div class="container-reviews">
                        <h1>Comentários Denunciados</h1>
                        <hr>
                        <?php 
                            // Exibe cada comentário denunciado
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='review'>";
                                echo "<div>";
                                echo "<img src='img/profilepic.png' alt='' class='profilePicReview'>";
                                echo "<div class='review-info'>";
                                echo "<h2>Nome do restaurante</h2>";
                                echo "</div>";
                                echo "</div>";
                                echo "<p>" . $row['TextoComentario'] . "</p>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                echo "<p>Nenhum comentário denunciado encontrado.</p>";
            }
        }
    }
        ?>
    </div>

</main>

<?php include("inc/footer.php") ?>
