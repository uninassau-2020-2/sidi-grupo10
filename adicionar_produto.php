<?php
//Conexão
require_once 'php_action/db_connect.php';

//Sessão
session_start();


//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: home_adm2.php');
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
            <a href="produto.php" class="btn orange darken-1">Lista de Produtos</a>
        </nav>

    </div>
</div>

<div class="row">
    <div class="col s12 m8 push-m2">

        <h3 class="light">Novo Produto</h3>
        <hr>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s6">
                <input type="text" name="referencia" id="referencia">
                <label for="referencia">Referência</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="descricao" id="descricao">
                <label for="descricao">Descrição</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="preco" id="preco">
                <label for="preco">Preço</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="tipo_volume" id="tipo_volume">
                <label for="tipo_volume">Volume</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="fornecedor" id="fornecedor" placeholder="código">
                <label for="fornecedor">Fornecedor</label>
            </div>
            <div class="col s12">
                <button type="submit" name="btn-cadastrar" class="btn orange darken-1">Cadastrar</button>
                <a href="produto.php" class="btn red">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>