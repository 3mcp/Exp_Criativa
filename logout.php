<?php
    include("../dbconnection/functions.php");

    if (!isset($_SESSION["ID"])) {
      unset($_SESSION["ID"]);
      session_destroy();
      header("Location: ./index.php");
    }
