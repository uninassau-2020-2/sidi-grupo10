<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $celular = mysqli_escape_string($connect, $_POST['celular']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $bairro = mysqli_escape_string($connect, $_POST['bairro']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);

    $sql = "INSERT INTO cliente (cpf, nome, email, celular, endereco, cep, bairro, cidade, estado) 
    VALUES ('$cpf', '$nome', '$email', '$celular', '$endereco', '$cep', '$bairro', '$cidade', '$estado')";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../cliente.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../cliente.php');
    endif;
endif;
?>