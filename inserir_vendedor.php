<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);

    $sql = "INSERT INTO vendedor (cpf, nome, email) VALUES ('$cpf', '$nome', '$email')";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Vendedor cadastrado com sucesso!";
        header('Location: ../vendedor.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../vendedor.php');
    endif;
endif;
?>