<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):

    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM relatorio WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Relatorios excluído com sucesso";
        header('Location: ../relatorio.php');
    else:
        $_SESSION['mensagem'] = "Erro ao tentar excluir!";
        header('Location: ../relatorio.php');
    endif;
endif;
?>