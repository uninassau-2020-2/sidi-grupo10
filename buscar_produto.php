<?php

//Conexão
require_once 'db_connect.php';
include "php_action/buscar_produto.php";




if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sqlBusca = "SELECT * FROM produto WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sqlBusca);
    $item = mysqli_fetch_array($resultado);
endif;
?>