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
        <a href="adicionar_usuario.php" class="btn orange darken-1">Adicionar Usuário</a>
    </nav>

</div>
</div>

<div class="row">

    <div class="col s12 m8 push-m2">

        <h3 class="light">Novo Usário</h3>
        <hr>
        <form action="php_action/inserir_usuario.php" method="POST">

            <div class="input-field col s6">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s6">
                <input type="password" name="senha" id="senha">
                <label for="senha">Senha</label>
            </div>

            <div class="input-field col s6">
                <input type="email" name="email" id="email" class="validate">
                <label for="email">Email</label>
                <span class="helper-text" data-error="E-mail inválido." data-success="certo"></span>
            </div>

            <div class="input-field col s3">
                <input type="text" name="nivelDeAcesso" id="nivelDeAcesso" placeholder="1 - adm / 2 - vendedor">
                <label for="nivelDeAcesso">Nível de acesso</label>
            </div>

            

            <div class="col s12">
                <button type="submit" name="btn-cadastrar" class="btn orange darken-1">Cadastrar</button>
                <a href="usuario.php" class="btn red">Cancelar</a>
            </div>

        </form>

    </div>

</div>
<?php
include_once 'includes/footer.php';
?>