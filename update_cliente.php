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
    $celular = mysqli_escape_string($connect, $_POST['celular']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $bairro = mysqli_escape_string($connect, $_POST['bairro']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);
    

    $sql = "UPDATE cliente SET cpf = '$cpf', nome = '$nome', email = '$email', celular = '$celular',
    endereco = '$endereco', cep = '$cep', bairro = '$bairro', cidade = '$cidade', estado = '$estado' WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cliente tualizado com sucesso!";
        header('Location: ../cliente.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../cliente.php');
    endif;
endif;
?>