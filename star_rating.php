<?php
include("inc/header.php");
//aqui serve para negar ou permitir acesso a um usuario baseado no seu id 
//assim não tem como acessar a página apenas por um link
if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
}

?>

<main>
    <!--Cria uma estrutura de estrela que quando a estrela é clicada sua avaliação é salva-->
        <div class="card">
            <div class="stars">
                <span onclick="gfg(1)"
                    class="star">★
                </span>
                <span onclick="gfg(2)"
                    class="star">★
                </span>
                <span onclick="gfg(3)"
                    class="star">★
                </span>
                <span onclick="gfg(4)"
                    class="star">★
                </span>
                <span onclick="gfg(5)"
                    class="star">★
                </span>
            </div>
            <!--Mostra a avalaição do usuario-->
            <p id="output">Avaliação: 0/5</p>
        </div>

    <script>
//array de todos os elementos star
let stars = 
    document.getElementsByClassName("star");
//variavel que salva a nota atual
let output = 
    document.getElementById("output");
 
function gfg(n) {
    //remove qualquer formatação ou estilo anteriormente aplicado às estrelas de avaliação.
    remove();
    //loop que itera sobre o numero de estrelas que foi clicado
    for (let i = 0; i < n; i++) {
        //e pinta ate as que foram clicadas
        stars[i].className = "star " + 'starColor';
    }
    //atualiza o output
    output.innerText = "Avaliação: " + n + "/5";
}
// garante que apenas as estrelas relevantes sejam estilizadas corretamente.
function remove() {
    let i = 0;
    while (i < 5) {
        stars[i].className = "star";
        i++;
    }
}
    </script>
</main>