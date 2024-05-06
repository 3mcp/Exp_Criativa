<?php
    include("./dbconnection/functions.php");
    session_start(); 

    if (isset($_SESSION["ID"])) {
      unset($_SESSION["ID"]);
      unset($_SESSION["TYPE"]);
      session_destroy();
      header("Location: ./index.php");
    } else {
      header("Location: ./index.php");
    }
