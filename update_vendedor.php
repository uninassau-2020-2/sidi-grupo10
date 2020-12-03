<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
   
    

    $sql = "UPDATE vendedor SET cpf = '$cpf', nome = '$nome',  email = '$email' WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../vendedor.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../vendedor.php');
    endif;
endif;
?>