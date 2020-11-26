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

    $sql = "SELECT * FROM produto WHERE id = '$id'";
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
        <a href="produto.php" class="btn orange darken-1">Lista de Produtos</a>
    </nav>

</div>
</div>
<div class="row">
    <div class="col s12 m8 push-m2">
        <h3 class="light">Editar Produto</h3>
        <hr>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
            <div class="input-field col s6">
                <input type="text" name="referencia" id="referencia"  value="<?php echo $dados['referencia'];?>">
                <label for="referencia">Referência</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="descricao" id="descricao" value="<?php echo $dados['descricao'];?>">
                <label for="descricao">Descrição</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="preco" id="preco" value="<?php echo $dados['preco'];?>">
                <label for="preco">Preço</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="tipo_volume" id="tipo_volume" value="<?php echo $dados['volume'];?>">
                <label for="tipo_volume">Volume</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="fornecedor" id="fornecedor" placeholder="código" value="<?php echo $dados['fornecedor'];?>">
                <label for="fornecedor">Fornecedor</label>
            </div>
            <div class="col s12">
                <button type="submit" name="btn-editar" class="btn orange darken-1">Atualizar</button>
                <a href="produto.php" class="btn red">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>