<?php
include("../dbconnection/functions.php");

$usuarioID   = $conn->real_escape_string($_SESSION['ID']); 

$tabela = "p_r_a_";
$condicao = "IdPRA = ".$usuarioID;

echo deleteByCondition($conn, $tabela, $condicao);
session_start();
session_destroy();
header('Location: ../index.php');
