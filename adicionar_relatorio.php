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
        //<a href="home_adm2.php" class="btn orange darken-1">home</a>
        //<a href="relatorio.php" class="btn orange darken-1">Lista de Relatorio</a>
    </nav>

</div>
</div>

<div class="row">

    <div class="col s12 m8 push-m2">
    
        <h3 class="light">Novo Relatorio</h3>
        <hr>
        <form action="php_action/inserir_relatorio.php" method="POST">

            <div class="input-field col s6 ">
                <input type="text" name="id" id="id"placeholder="000000">
                <label for="id">ID</label>
            </div>

            <div class="input-field col s6 ">
                <input type="text" name="clinte" id="cliente">
                <label for="cliente">Cliente</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="produto" id="produto" placeholder="produto">
                <label  for="produto">Produto</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="data" id="data" placeholder="00/00/0000">
                <label for="data">Data</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="situacao" id="situacao" placeholder="situacao">
                <label for="situacao">Situacao</label>
            </div>
            
            <div class="input-field col s6">
                <input type="text" name="valor" id="valor" placeholder="valor">
                <label for="valor">Valor</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="numero" id="numero" placeholder="numero">
                <label for="numero">Numero</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="representantes" id="representantes"  placeholder="representantes ">
                <label for="representantes">Representantes</label>
            </div>

            <div class="col s12">       
                <button type="submit" name="btn-cadastrar" class="btn orange darken-1">Cadastrar</button>
                <a href="relatorio.php" class="btn red">Cancelar</a>    
            </div>

        </form>

    </div>

</div>
<?php
include_once 'includes/footer.php';
?>