<?php

session_start();
//Conexão
require_once 'db_connect.php';

include_once 'includes/message.php';



if(isset($_POST['btn-cadastrar'])):

    //captura dos valores inseridos no formulário
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $nivelDeAcesso = mysqli_escape_string($connect, $_POST['nivelDeAcesso']);
    
    
    $senha = md5($senha); //no ato do cadastro via formulário a senha é criptografada

    //Esse trecho verifica no banco se já existe um nome igual ao que o está tentando cadastrar.
    $query_select = "SELECT nome FROM usuario WHERE nome = '$nome'";
    $select = mysqli_query($query_select, $connect);
    $array = mysqli_fetch_array($select);
    $logarray = $array['nome'];

    if($logarray == $nome):
        $_SESSION['mensagem'] = "Esse nome já existe!";
        header('Location: ../adicionar_usuario.php');
    endif;
    //final da verificação

    $sql = "INSERT INTO usuario (nome, senha, email, nivelDeAcesso) 
    VALUES ('$nome', '$senha', '$email', '$nivelDeAcesso')";
    
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
        header('Location: ../usuario.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../usuario.php');
    endif;
endif;
?>