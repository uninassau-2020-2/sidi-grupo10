<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $referencia = mysqli_escape_string($connect, $_POST['referencia']);
    $descricao = mysqli_escape_string($connect, $_POST['descricao']);
    $preco = mysqli_escape_string($connect, $_POST['preco']);
    $tipo_volume = mysqli_escape_string($connect, $_POST['tipo_volume']);
    $fornecedor = mysqli_escape_string($connect, $_POST['fornecedor']);

    $sql = "INSERT INTO produto (referencia, descricao, preco, volume, fornecedor) VALUES ('$referencia', 
    '$descricao', '$preco', '$tipo_volume', '$fornecedor')";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../produto.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../produto.php');
    endif;
endif;
?>