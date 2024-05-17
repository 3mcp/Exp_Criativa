<!--essa parte inclui o header e as funções de banco de dados-->
<?php include("inc/header.php");
    include("dbconnection/functions.php");

    $restauranteId = $_GET["id"];
   
    $query = "SELECT * FROM Restaurante WHERE IdRestaurante = $restauranteId";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $restaurante = mysqli_fetch_assoc($result);
        $nomeRestaurante = $restaurante['NomeRestaurante'];
        
        $pageTitle = $nomeRestaurante;
    } else {
        $pageTitle = "Cardápio";
    } 

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
            <?php if ($restaurante['FotoRestaurante']): ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($restaurante['FotoRestaurante']); ?>" class='restaurante-imagem'>
            <?php else: ?>
                <img src='img/pngDefault.png' class='restaurante-imagem'>
            <?php endif; ?>        
        </div>
        <div class='restaurante-info'>
            <p><?php echo ($restaurante['RuaRestaurante']); ?>, <?php echo ($restaurante['Numero_Restaurante']); ?></p>
            <p><?php echo ($restaurante['SiteRestaurante']); ?></p>
        </div>
        <a href="cardapio.php?id=<?php echo $restaurante['IdRestaurante']; ?>">
            <button class='restaurante-botao-cardapio'>Visualizar Cardápio</button>
        </a>

        <div class="comentario-container">
            <h2>Comentários</h2>
            <hr>
            <div class="comentario-box-escreva comentario-box">
                <h3>Escreva um comentário:</h3>
                <form action="databaseComentario/comentarioCriar.php?id=<?php echo $restauranteId; ?>" method="POST">
                    <div class='comentarioEscrevaDiv'>
                        <textarea name="texto_comentario" placeholder='Escreva aqui o que achou do nosso restaurante...' required></textarea>
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


            <?php if ($resultComentarios && mysqli_num_rows($resultComentarios) > 0): ?>
                <?php while($comentario = mysqli_fetch_assoc($resultComentarios)): 
                    if($comentario["DenunciadoComentario"] == 0): ?>

                    <div class="comentario-box" data-id="">

                        <div class="comentario-info">
                            <?php if ($comentario['FotoPRA']): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($comentario['FotoPRA']); ?>" class='restaurante-imagem'>
                            <?php else: ?>
                                <img src="./img/profilepic.png" class='comentarioProfilePic' alt="">
                            <?php endif; ?>        
                            <div>
                                <p style="font-weight: bold;"><?php echo htmlspecialchars($comentario['UsernamePRA']); ?></p>
                                <p>Comentou em: <?php echo date('d/m/Y', strtotime($comentario['DataComentario'])); ?></p>
                            </div>
                            <form action="databaseComentario/comentarioDenunciar.php" method="post">
                                <input type="hidden" name="idcomentario" value="<?php echo $comentario['IdComentario'];?>">
                                <button type="submit" class="denunciar-btn"><i class="bi bi-flag-fill"></i> Denunciar comentário </button>
                            </form>
                            <a href="databaseComentario/comentarioExcluir.php?id=<?php echo $comentario['IdComentario']; ?>"><button class='comentarioEnviarBtn'>Excluir comentário</button><a>

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
