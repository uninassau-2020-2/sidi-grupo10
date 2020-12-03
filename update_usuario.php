<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $nivelDeAcesso = mysqli_escape_string($connect, $_POST['nivelDeAcesso']); 
   

    $senha = md5($senha);

    $sql = "UPDATE usuario SET nome = '$nome', senha = '$senha', email = '$email', 
    nivelDeAcesso = '$nivelDeAcesso' WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Usuario atualizado com sucesso!";
        header('Location: ../usuario.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../usuario.php');
    endif;
endif;
?>