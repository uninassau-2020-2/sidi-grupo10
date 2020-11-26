<?php
//Conexão
include_once 'php_action/db_connect.php';
//Header
include_once 'includes/header.php';
//Select
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM vendedor WHERE id = '$id'";
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
                Gerente - <?php echo $dados['id']; ?>
                - <?php echo $dados['nome']; ?>  
            </div>
            <img src="imagem/cangaco.png" alt="logotipo" id="logoHome">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="logout.php">Sair</a></li>
        </ul>
        </div>
        <a href="home_adm2.php" class="btn orange darken-1">home</a>
        <a href="vendedor.php" class="btn orange darken-1">Lista de Vendedores</a>
    </nav>

</div>
</div>

<div class="row">

    <div class="col s12 m8 push-m2">
    
        <h3 class="light">Editar Vendedor</h3>
        <hr>
        <form action="php_action/update_vendedor.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">

            <div class="input-field col s6">
                <input type="text" name="cpf" id="cpf"  value="<?php echo $dados['cpf'];?>">
                <label for="cpd">Cpf</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s6">
                <input type="email" name="email" id="email" class="validate" value="<?php echo $dados['email'];?>">
                <label for="email">Email</label>
            </div>

            <div class="col s12">
                <button type="submit" name="btn-editar" class="btn orange darken-1">Atualizar</button>
                <a href="vendedor.php" class="btn red">Cancelar</a>
            </div>

        </form>

    </div>

</div>

<?php
include_once 'includes/footer.php';
?>