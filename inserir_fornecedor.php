<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $Cnpj_Cpf = mysqli_escape_string($connect, $_POST['Cnpj_Cpf']);
    $Empresa = mysqli_escape_string($connect, $_POST['Empresa']);
    $Contato = mysqli_escape_string($connect, $_POST['Contato']);
    $TipoContato = mysqli_escape_string($connect, $_POST['TipoContato']);
    $Telefone = mysqli_escape_string($connect, $_POST['Telefone']);
    $Celular = mysqli_escape_string($connect, $_POST['Celular']);
    $Email = mysqli_escape_string($connect, $_POST['Email']);
    $Endereco = mysqli_escape_string($connect, $_POST['Endereco']);
    $Cep = mysqli_escape_string($connect, $_POST['Cep']);
    $Bairro = mysqli_escape_string($connect, $_POST['Bairro']);
    $Cidade = mysqli_escape_string($connect, $_POST['Cidade']);
    $Estado = mysqli_escape_string($connect, $_POST['Estado']);

    $sql = "INSERT INTO fornecedor (Cnpj_Cpf, Empresa, Contato, TipoContato, Telefone, Celular,
    Email, Endereco, Cep, Bairro, Cidade, Estado) VALUES ('$Cnpj_Cpf', '$Empresa', '$Contato',
    '$TipoContato', '$Telefone', '$Celular', '$Email', '$Endereco', '$Cep', '$Bairro', '$Cidade', 
    '$Estado')";
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Fornecedor cadastrado com sucesso!";
        header('Location: ../fornecedor.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../fornecedor.php');
    endif;
endif;
?>