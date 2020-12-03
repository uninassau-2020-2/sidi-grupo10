<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);
    $referencia = mysqli_escape_string($connect, $_POST['referencia']);
    $descricao = mysqli_escape_string($connect, $_POST['descricao']);
    $preco = mysqli_escape_string($connect, $_POST['preco']);
    $tipo_volume = mysqli_escape_string($connect, $_POST['tipo_volume']);
    $fornecedor = mysqli_escape_string($connect, $_POST['fornecedor']);

    $sql = "UPDATE produto SET referencia = '$referencia', descricao = '$descricao', preco = '$preco', volume = '$tipo_volume', fornecedor = '$fornecedor' WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../produto.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../produto.php');
    endif;
endif;
?>