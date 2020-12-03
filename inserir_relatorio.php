<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);
    $cliente = mysqli_escape_string($connect, $_POST['cliente']);
    $produto = mysqli_escape_string($connect, $_POST['produto']);
    $data = mysqli_escape_string($connect, $_POST['data']);
    $situacao = mysqli_escape_string($connect, $_POST['situacao']);
    $valor = mysqli_escape_string($connect, $_POST['valor']);
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $representantes = mysqli_escape_string($connect, $_POST['representantes']);
     

    $sql = "INSERT INTO relatorio (id, cliente, produto, data , situacao , valor , numero , representantes) 
    VALUES ( '$id', '$cliente', '$produto', '$data', '$situacao', '$valor', '$numero', '$representantes')";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Relatorio cadastrado com sucesso!";
        header('Location: ../relatorio.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../relatorio.php');
    endif;
endif;
?>