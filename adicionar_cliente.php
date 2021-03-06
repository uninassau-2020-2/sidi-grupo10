<?php
require_once 'php_action/db_connect.php';

//Sessão
session_start();


//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: adicionar_cliente.php');
endif;

//Dados do usuário
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE Id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);  
mysqli_close($connect);

include_once 'includes/header.php';
?>

<div class="row">

<div class="col s12 m8 push-m2">

    <nav class="nav-extended orange darken-2">
        <div class="nav-wrapper orange darken-1">
        <img src="imagem/gerente.png" width="100" heigth="100">
        <div class="chip">  
                Gerente - <?php echo $dados['id']; ?>
                - <?php echo $dados['nome']; ?>  
            </div>
            <img src="imagem/cangaco.png" alt="logotipo" id="logoHome">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="logout.php">Sair</a></li>
        </ul>
        </div>
        <a href="home_adm2.php" class="btn orange darken-1">home</a>
        <a href="cliente.php" class="btn orange darken-1">Lista de Cliente</a>
    </nav>

</div>
</div>

<div class="row">

    <div class="col s12 m8 push-m2">
    
        <h3 class="light">Novo Cliente</h3>
        <hr>
        <form action="php_action/inserir_cliente.php" method="POST">

            <div class="input-field col s6 ">
                <input type="text" name="cpf" id="cpf"placeholder="000.000.000-00">
                <label for="cpf">Cpf</label>
            </div>

            <div class="input-field col s6 ">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s6">
                <input type="email" name="email" id="email" class="validate">
                <label data-error="Email inválido" data-success="Email válido" for="email">Email</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="celular" id="celular" placeholder="(DDD) 00000-0000">
                <label for="celular">Celular</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="endereco" id="endereco" placeholder="Rua, número">
                <label for="endereco">Endereco</label>
            </div>
            
            <div class="input-field col s6">
                <input type="text" name="cep" id="cep" placeholder="00000-000">
                <label for="cep">Cep</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="bairro" id="bairro">
                <label for="bairro">Bairro</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="cidade" id="cidade">
                <label for="cidade">Cidade</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="estado" id="estado">
                <label for="estado">Estado</label>
            </div> 
           
            <div class="col s12">       
                <button type="submit" name="btn-cadastrar" class="btn orange darken-1">Cadastrar</button>
                <a href="cliente.php" class="btn red">Cancelar</a>    
            </div>

        </form>

    </div>

</div>
<?php
include_once 'includes/footer.php';
?>