<?php
include("inc/header.php");

if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
    exit; // Encerra o script para evitar a execução do restante do código desnecessariamente
}

?>

<main>

    <div class='containerPrincipal'>
        <!--Verifica se o usuario atual é uma pessoarestrição alimentar-->
        <?php if ($_SESSION["TYPE"] == "P.R.A.") {
            include("dbconnection/functions.php");
            //na tabela p.r.a, seleciona todos os usuarios, em que a condição seja o id do usuario da sessão atual
            $tabela = "p_r_a_";
            $aCampos = "*";
            $condicao = "IdPRA = " . $_SESSION["ID"];
            $usuarios = select($conn, $aCampos, $tabela, $condicao);
            $dados;

            //serve para pegar a foto do usuario 
            foreach ($usuarios as $usuario) {
                foreach ($usuario as $key => $value) {
                    if ($key == "FotoPRA") {
                        echo "<script>console.log('" . $value . "')</script>";
                    }
                }
        ?>
                <div class='container-banner'>
                    <div class='container-info'>
                        <div>
                            <!--Se a foto do usuario estiver vazia então aparece um avatar generico-->
                            <?php if ($usuario['FotoPRA'] != "") { ?>
                                <img class="profilePic" src="data:image/png;base64,<?= base64_encode($usuario['FotoPRA']) ?>" />
                                <!--Se não aparece a imagem que o usuario escolheu-->
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
                        $sql = "SELECT Comentario.*, Restaurante.NomeRestaurante 
                                    FROM Comentario 
                                    INNER JOIN Restaurante ON Comentario.fk_Restaurante_IdRestaurante = Restaurante.IdRestaurante 
                                    WHERE Comentario.fk_P_R_A__IdPRA = " . $_SESSION["ID"];
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class='review'>
                                    <div>
                                        <?php if ($usuario['FotoPRA']) { ?>
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($usuario['FotoPRA']); ?>" alt='' class='profilePicReview'>
                                        <?php } else { ?>
                                            <img src='img/profilepic.png' alt='' class='profilePicReview'>
                                        <?php } ?>
                                        <div class='review-info'>
                                            <h2><?php echo $row["NomeRestaurante"]; ?></h2> <!-- Aqui exibimos o nome do restaurante -->
                                        </div>
                                    </div>
                                    <p><?php echo $row['TextoComentario']; ?></p>
                                </div>
                        <?php }
                        } else {
                            echo "<p>Você ainda não fez nenhum comentário.</p>";
                        }
                        ?>
                    </div>

                </div>
            <?php }
            //no caso de ser um restaurante o tipo de usuario
        } else if ($_SESSION["TYPE"] == "Restaurante") {
            include("dbconnection/functions.php");
            //seleciona todos da tabela restaurante
            $tabela = "Restaurante";
            $aCampos = "*";
            //no caso do id ser da sessão iniciada
            $condicao = "IdRestaurante = " . $_SESSION["ID"];
            $usuarios = select($conn, $aCampos, $tabela, $condicao);
            $dados;

            //serve para pegar a imgame que o restaurante selecionou
            foreach ($usuarios as $usuario) {
            ?>
                <div class='container-banner'>
                    <div class='container-info'>
                        <div>
                            <!--Se o restaurante não tiver nenhuma imagem coloca um avatar generico-->
                            <?php if ($usuario['FotoRestaurante'] != "") { ?>
                                <img class="profilePic" src="data:image/png;base64,<?= base64_encode($usuario['FotoRestaurante']) ?>" />
                            <?php } else { ?>
                                <!--Coloca a imagem selecionada-->
                                <img src="img/profilepic.png" alt="" class='profilePic'>
                            <?php } ?>
                            <div class='container-info-content'>
                                <!--Coloca como titulo do perfil o nome do restaurante-->
                                <h1 class='profileTitle'><?php echo $usuario['NomeRestaurante'] ?></h1>
                                <!--E adiciona a localização do restaurante em baixo-->
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
                            <?php
                            //Pegando o horario do restaurante
                            if (isset($usuario["HorarioRestaurante"])) {
                                $horario = $usuario["HorarioRestaurante"];
                            }
                            //Transformando csv em array
                            $horario = explode(",", $horario);
                            //Confirmando se o horario é valido
                            if (count($horario) != 14) {
                                $horario = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
                            } ?>
                            <!-- Exibindo horários de funcionamento: -->
                            <p>Horário de funcionamento:</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Dia</th>
                                        <th scope="col">Abre</th>
                                        <th scope="col">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Segunda</th>
                                        <td><?php echo $horario[0] ?></td>
                                        <td><?php echo $horario[1] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Terça</th>
                                        <td><?php echo $horario[2] ?></td>
                                        <td><?php echo $horario[3] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Quarta</th>
                                        <td><?php echo $horario[4] ?></td>
                                        <td><?php echo $horario[5] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Quinta</th>
                                        <td><?php echo $horario[6] ?></td>
                                        <td><?php echo $horario[7] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sexta</th>
                                        <td><?php echo $horario[8] ?></td>
                                        <td><?php echo $horario[9] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sábado</th>
                                        <td><?php echo $horario[10] ?></td>
                                        <td><?php echo $horario[11] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Domingo</th>
                                        <td><?php echo $horario[12] ?></td>
                                        <td><?php echo $horario[13] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container-reviews">
                        <?php
                        $sql = "SELECT Comentario.*, P_R_A_.NomePRA, P_R_A_.FotoPRA
                            FROM Comentario 
                            INNER JOIN P_R_A_ ON Comentario.fk_P_R_A__IdPRA = P_R_A_.IdPRA 
                            WHERE Comentario.fk_Restaurante_IdRestaurante = " . $_SESSION["ID"];
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class='review'>
                                    <div>
                                        <?php if ($row['FotoPRA']) : ?>
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['FotoPRA']); ?>" class='profilePicReview'>
                                        <?php else : ?>
                                            <img src="./img/profilepic.png" class='profilePicReview' alt="">
                                        <?php endif; ?>
                                        <div class='review-info'>
                                            <h2><?php echo $row["NomePRA"]; ?></h2> <!-- Aqui exibimos o nome do usuário -->
                                        </div>
                                    </div>
                                    <p><?php echo $row['TextoComentario']; ?></p>
                                </div>
                        <?php }
                        } else {
                            echo "<p>Nenhum comentário encontrado.</p>";
                        }
                        ?>
                    </div>
                </div>
            <?php }
            //no caso do usuario ser um administrador
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
                    <?php
                    //para mostrar os comemntarios que foram denunciados
                    $sql = "SELECT Comentario.*, P_R_A_.NomePRA, P_R_A_.FotoPRA, Restaurante.NomeRestaurante
                    FROM Comentario 
                    INNER JOIN P_R_A_ ON Comentario.fk_P_R_A__IdPRA = P_R_A_.IdPRA 
                    INNER JOIN Restaurante ON Comentario.fk_Restaurante_IdRestaurante = Restaurante.IdRestaurante
                    WHERE Comentario.fk_Restaurante_IdRestaurante = " . $_SESSION["ID"] . " AND Comentario.DenunciadoComentario = 1";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    ?>

                        <div class='wrapper-profile'>
                            <div class="container-reviews">
                                <h1>Comentários Denunciados</h1>
                                <hr>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <div class='review'>
                                        <div>
                                            <?php if ($row['FotoPRA']) : ?>
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['FotoPRA']); ?>" class='profilePicReview'>
                                            <?php else : ?>
                                                <img src="./img/profilepic.png" class='profilePicReview' alt="">
                                            <?php endif; ?>
                                            <div class='review-info'>
                                                <h2><?php echo $row['NomePRA'] ?> Comentou no Restaurante "<?php echo $row['NomeRestaurante'] ?>"</h2>
                                            </div>
                                        </div>
                                        <p><?php echo $row['TextoComentario'] ?></p>
                                        <a href="databaseComentario/comentarioRetirarDenuncia.php?id=<?php echo $row['IdComentario']; ?>"><button class="denunciar-btn"><i class="bi bi-flag-fill"></i> Retirar denúncia </button></a>
                                        <a href="databaseComentario/comentarioExcluir.php?id=<?php echo $row['IdComentario']; ?>"><button class="denunciar-btn"><i class=""></i> Excluir comentário </button></a>
                                    </div>
                                <?php
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