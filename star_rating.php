<?php
include("inc/header.php");
if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
}

?>

<main>
<div class="star-rating">
        <span class="star" data-value="5">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="1">&#9733;</span>
    </div>

    <script src='js/star.rating.js'></script>
</main>