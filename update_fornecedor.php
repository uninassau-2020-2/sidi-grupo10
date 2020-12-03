<?php
//Conexão
require_once 'db_connect.php';

include_once 'includes/message.php';
//Sessão
session_start();


if(isset($_POST['btn-editar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);
    $Cnpj_Cpf = mysqli_escape_string($connect, $_POST['Cnpj_Cpf']);
    $Empresa = mysqli_escape_string($connect, $_POST['Empresa']);
    $Contato = mysqli_escape_string($connect, $_POST['Contato']);
    $TipoContato = mysqli_escape_string($connect, $_POST['TipoContato']);
    $numContato = mysqli_escape_string($connect, $_POST['numContato']);
    $Email = mysqli_escape_string($connect, $_POST['Email']);
    $Endereco = mysqli_escape_string($connect, $_POST['Endereco']);
    $Cep = mysqli_escape_string($connect, $_POST['Cep']);
    $Bairro = mysqli_escape_string($connect, $_POST['Bairro']);
    $Cidade = mysqli_escape_string($connect, $_POST['Cidade']);
    $Estado = mysqli_escape_string($connect, $_POST['Estado']);
    
    

    $sql = "UPDATE fornecedor SET Cnpj_Cpf = '$Cnpj_Cpf', Empresa = '$Empresa', Contato = '$Contato', 
    TipoContato = '$TipoContato', numContato = '$numContato',  Email = '$Email', Endereco = '$Endereco', 
    Cep = '$Cep', Bairro = '$Bairro', Cidade = '$Cidade', Estado = '$Estado' WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../fornecedor.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../fornecedor.php');
    endif;
endif;
?>