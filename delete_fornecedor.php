<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):

    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM fornecedor WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Fornecedor excluído com sucesso";
        header('Location: ../fornecedor.php');
    else:
        $_SESSION['mensagem'] = "Erro ao tentar excluir!";
        header('Location: ../fornecedor.php');
    endif;
endif;
?>