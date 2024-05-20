<!--essa parte inclui o header e as funções de banco de dados-->
<?php include("inc/header.php");
    include("dbconnection/functions.php");

    //pega o id do restaurante em questao
    $restauranteId = $_GET["id"];
   
    //Uma query é executada para obter detalhes do restaurante com base no ID.
    $query = "SELECT * FROM Restaurante WHERE IdRestaurante = $restauranteId";
    $result = mysqli_query($conn, $query);
    
    //Se os dados forem encontrados, o nome do restaurante é usado como título da página; caso contrário, um título padrão é definido.
    if ($result && mysqli_num_rows($result) > 0) {
        $restaurante = mysqli_fetch_assoc($result);
        $nomeRestaurante = $restaurante['NomeRestaurante'];
        
        $pageTitle = $nomeRestaurante;
    } else {
        $pageTitle = "Cardápio";
    } 

    //Uma query é executada para obter os comentários do restaurante, incluindo informações do usuário que fez o comentário.
    $queryComentarios = "
    SELECT c.TextoComentario, c.DenunciadoComentario, c.DataComentario,  c.IdComentario, p.UsernamePRA, p.FotoPRA
    FROM Comentario c
    JOIN P_R_A_ p ON c.fk_P_R_A__IdPRA = p.IdPRA
    WHERE c.fk_Restaurante_IdRestaurante = $restauranteId
    ORDER BY c.DataComentario DESC";

    $resultComentarios = mysqli_query($conn, $queryComentarios);
?>


<main>
    <div class='restaurante-pg'>
        <h1 class='restaurante-titulo'><?php echo $pageTitle; ?></h1>
        <div class="restaurante-imagem-container">
            <!--Adiciona a foto do restaurante-->
            <?php if ($restaurante['FotoRestaurante']): ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($restaurante['FotoRestaurante']); ?>" class='restaurante-imagem'>
            <?php else: ?>
                <img src='img/pngDefault.png' class='restaurante-imagem'>
            <?php endif; ?>        
        </div>
        <div class='restaurante-info'>
            <!--Rua e numero do restaurante-->
            <p><?php echo ($restaurante['RuaRestaurante']); ?>, <?php echo ($restaurante['Numero_Restaurante']); ?></p>
            <!--Site do restaurante-->
            <p><?php echo ($restaurante['SiteRestaurante']); ?></p>
            <?php
                            //Pegando o horario do restaurante
                            if (isset($restaurante["HorarioRestaurante"])) {
                                $horario = $restaurante["HorarioRestaurante"];
                            }else{
                                $horario = ",";
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
        <!--Vizualização cardapio do restaurante-->
        <a href="cardapio.php?id=<?php echo $restaurante['IdRestaurante']; ?>">
            <button class='restaurante-botao-cardapio'>Visualizar Cardápio</button>
        </a>

        <h2>Comentários</h2>
        <?php if(isset($_SESSION["TYPE"]))
                if ($_SESSION["TYPE"] == "P.R.A.") { ?>
        <div class="comentario-container">
            <hr>
            <div class="comentario-box-escreva comentario-box">
                <h3>Escreva um comentário:</h3>
                <!--Criar um comentario chama o comentario criar php-->
                <form action="databaseComentario/comentarioCriar.php?id=<?php echo $restauranteId; ?>" method="POST">
                    <div class='comentarioEscrevaDiv'>
                        <textarea name="texto_comentario" placeholder='Escreva aqui o que achou do nosso restaurante...' required></textarea>
                        <!--usuario pode adicionar uma nota ao restaurante-->
                        <label>Que nota você dá para o restaurante?</label>
                        <div class="rating">
                            <input type="radio" id="star1" name="nota" value="1" /><label for="star1" title="Muito ruim">1 estrela</label>
                            <input type="radio" id="star2" name="nota" value="2" /><label for="star2" title="Ruim">2 estrelas</label>
                            <input type="radio" id="star3" name="nota" value="3" /><label for="star3" title="Regular">3 estrelas</label>
                            <input type="radio" id="star4" name="nota" value="4" /><label for="star4" title="Bom">4 estrelas</label>
                            <input type="radio" id="star5" name="nota" value="5" /><label for="star5" title="Muito bom">5 estrelas</label>
                        </div>
                        <button type="submit" class='comentarioEnviarBtn'>Comentar</button>
                    </div>
                </form>
            </div>
            <?php } ?>
            <!--gera dinamicamente a interface de exibição dos comentários de um restaurante específico, garantindo que apenas os comentários que não foram denunciados sejam exibidos-->

            <?php if ($resultComentarios && mysqli_num_rows($resultComentarios) > 0): ?>
                <?php while($comentario = mysqli_fetch_assoc($resultComentarios)): 
                    if($comentario["DenunciadoComentario"] == 0): ?>

                    <div class="comentario-box" data-id="">

                        <div class="comentario-info">
                            <!--Coloca a foto de quem comentou-->
                            <?php if ($comentario['FotoPRA']): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($comentario['FotoPRA']); ?>" style="width: 70px; height: 70px;" class='restaurante-imagem'>
                            <?php else: ?>
                                <img src="./img/profilepic.png" class='comentarioProfilePic' alt="">
                            <?php endif; ?>        
                            <div>
                                <p style="font-weight: bold;"><?php echo htmlspecialchars($comentario['UsernamePRA']); ?></p>
                                <p>Comentou em: <?php echo date('d/m/Y', strtotime($comentario['DataComentario'])); ?></p>
                            </div>
                            <!--para denunciar comentários-->
                            <form action="databaseComentario/comentarioDenunciar.php" method="post">
                                <input type="hidden" name="idcomentario" value="<?php echo $comentario['IdComentario'];?>">
                                <button type="submit" class="denunciar-btn"><i class="bi bi-flag-fill"></i> Denunciar comentário </button>
                            </form>

                        </div>
                        <div class='comentario-content'>
                            <p><?php echo htmlspecialchars($comentario['TextoComentario']); ?></p>
                        </div>
                    </div>
                <?php endif;
                endwhile; 
                 ?>
            <?php else: ?>
                <p>Nenhum comentário disponível.</p>
            <?php endif; ?>
        </div>
    </div>
</main>


<?php include("inc/footer.php") ?>
