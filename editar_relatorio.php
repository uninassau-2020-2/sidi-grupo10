<?php
//Conexão
include_once 'php_action/db_connect.php';

//Sessão
session_start();


//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: home_adm2.php');
endif;

//Dados do usuário
$idse = $_SESSION['id_usuario'];
$sqlse = "SELECT * FROM usuario WHERE id = '$idse'";
$resultadose = mysqli_query($connect, $sqlse);
$dadosse = mysqli_fetch_array($resultadose); 

//Header
include_once 'includes/header.php';

//Select
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM relatorio WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>
<div class="row">

<div class="col s12 m8 push-m2">

    <nav class="nav-extended orange darken-2">
        <div class="nav-wrapper orange darken-1">
        <img src="imagem/gerente.png" width="100" heigth="100">
        <div class="chip">  
                Gerente - <?php echo $dadosse['id']; ?>
                - <?php echo $dadosse['nome']; ?>  
            </div>
            <img src="imagem/cangaco.png" alt="logotipo" id="logoHome">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="logout.php">Sair</a></li>
        </ul>
        </div>
        <a href="home_adm2.php" class="btn orange darken-1">home</a>
        <a href="adicionar_relatorio.php" class="btn orange darken-1">Adicionar Relatorios</a>
    </nav>

</div>
</div>

<div class="row">
    <div class="col s12 m8 push-m2">
        <h3 class="light">Editar Relatotio</h3>
        <hr>
        <form action="php_action/update_relatorio.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">

            <div class="input-field col s6">
                <input type="text" name="id" id="id"  value="<?php echo $dados['id'];?>">
                <label for="id">ID</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="cliente" id="cliente" value="<?php echo $dados['cliente'];?>">
                <label for="cliente">Cliente</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="produto" id="produto"  value="<?php echo $dados['produto'];?>">
                <label for="produto">Produto</label>
            </div> 
            
            <div class="input-field col s6">
                <input type="text" name="data" id="data" value="<?php echo $dados['data'];?>">
                <label for="data">Data</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="situacao" id="situacao" value="<?php echo $dados['situacao'];?>">
                <label for="situacao">Situacao</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="numero" id="numero" value="<?php echo $dados['numero'];?>">
                <label for="numero">Numero</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="representantes" id="representantes" value="<?php echo $dados['representantes'];?>">
                <label for="representantes">Representantes</label>
            </div>


            <div class="input-field col s6">
                <input type="text" name="desativado" id="desativado" placeholder="0 - ativo / 1 - inativo" value="<?php echo $dados['desativado'];?>">
                <label for="email">Desativado</label>
            </div> 

            <div class="col s12">
                <button type="submit" name="btn-editar" class="btn orange darken-1">Atualizar</button>
                <a href="relatorio.php" class="btn red">Cancelar</a>
            </div>

        </form>

    </div>

</div>

<?php
include_once 'includes/footer.php';
?>