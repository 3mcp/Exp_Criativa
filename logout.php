<?php
    include("./dbconnection/functions.php");
    session_start(); 

    //verifica se a ssessão está definida 
    if (isset($_SESSION["ID"])) {
      //se estiver destroi o id da pessoa e o tipo
      unset($_SESSION["ID"]);
      unset($_SESSION["TYPE"]);
      session_destroy();
      //volta para a pagina inicial
      header("Location: ./index.php");

      //se a sessão não estiver definida volta para a pagina inicial
    } else {
      header("Location: ./index.php");
    }
