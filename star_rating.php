<?php
include("inc/header.php");
if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
}

?>

<main>
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
            <p id="output">Avaliação: 0/5</p>
        </div>

    <script>
       
let stars = 
    document.getElementsByClassName("star");
let output = 
    document.getElementById("output");
 
function gfg(n) {
    remove();
    for (let i = 0; i < n; i++) {
        stars[i].className = "star " + 'starColor';
    }
    output.innerText = "Avaliação: " + n + "/5";
}
 
function remove() {
    let i = 0;
    while (i < 5) {
        stars[i].className = "star";
        i++;
    }
}
    </script>
</main>