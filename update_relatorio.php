<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);
    $cliente = mysqli_escape_string($connect, $_POST['cliente']);
    $produto = mysqli_escape_string($connect, $_POST['produto']);
    $data = mysqli_escape_string($connect, $_POST['data']);
    $situacao = mysqli_escape_string($connect, $_POST['situacao']);
    $valor = mysqli_escape_string($connect, $_POST['valor']);
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $representantes = mysqli_escape_string($connect, $_POST['representantes']);
 

    $sql = "UPDATE relatorio SET , cliente = '$cliente', produto = '$produto', data = '$data',
    situacao = '$situacao', valor = '$valor', numero = '$numero', representantes = '$representantes', 
    WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Relatorio tualizado com sucesso!";
        header('Location: ../relatorio.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../relatorio.php');
    endif;
endif;
?>