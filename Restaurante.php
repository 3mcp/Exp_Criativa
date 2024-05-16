<?php include("inc/header.php") ?>

<main>
    <div class='restaurante-pg'>
        <h1 class='restaurante-titulo'>Restaurante</h1>
        <div class="restaurante-imagem-container">
            <img src='img/pngDefault.png' class='restaurante-imagem'>
        </div>
        <div class='restaurante-info'>
            <p>Endereço: Rua Polenta Brasil, 123 </p>
            <p>Site: www.polentabrasil.com.br</p>
        </div>
        <button class='restaurante-botao-cardapio'>Visualizar Cardápio</button>
        <div class="comentario-container">

            <h2>Comentários</h2>
            <hr>
            <div class="comentario-box-escreva comentario-box">
                <h3>Escreva um comentário:</h3>
                <div class='comentarioEscrevaDiv'>
                    <textarea placeholder='Escreva aqui o que achou do nosso restaurante...'></textarea>
                    <button class='comentarioEnviarBtn'>Enviar</button>
                </div>
            </div>
            <div class="comentario-box">
                <div class="comentario-info">
                    <img src="./img/profilepic.png" class='comentarioProfilePic' alt="">
                    <div>
                        <p style="font-weight: bold;">Nome do usuário</p>
                        <p>Comentou em: 10/10/2010</p>
                    </div>
                </div>
                <div class='comentario-content'>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt atque quia nulla quaerat blanditiis sequi qui consectetur accusamus, iusto, quam officia odit fugiat dolores vel? Incidunt aperiam fuga veritatis. Illo. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure dolor minima error reiciendis magni dolore, optio nobis pariatur nam vel provident? Hic dignissimos incidunt odio alias doloribus. Hic, sed asperiores!</p>
                </div>
            </div>
        </div>
    </div>


</main>

<?php include("inc/footer.php") ?>
