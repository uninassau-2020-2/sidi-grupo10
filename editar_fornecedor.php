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

    $sql = "SELECT * FROM fornecedor WHERE id = '$id'";
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
        <a href="fornecedor.php" class="btn orange darken-1">lista de Fornecedores</a>
    </nav>

</div>
</div>

<div class="row">

    <div class="col s12 m8 push-m2">

        <h3 class="light">Editar Fornecedor</h3>
        <hr>
        <form action="php_action/update_fornecedor.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">

            <div class="input-field col s6">
                <input type="text" name="Cnpj_Cpf" id="Cnpj_Cpf"  value="<?php echo $dados['Cnpj_Cpf'];?>">
                <label for="Cnpj_Cpf">Cnpj/Cpf</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="Empresa" id="Empresa" value="<?php echo $dados['Empresa'];?>">
                <label for="Empresa">Empresa</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="Contato" id="Contato" value="<?php echo $dados['Contato'];?>">
                <label for="Contato">Contato</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="TipoContato" id="TipoContato" value="<?php echo $dados['TipoContato'];?>">
                <label for="TipoContato">TipoContato</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="numContato" id="numContato" value="<?php echo $dados['numContato'];?>">
                <label for="numContato">nº Contato</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="Email" id="Email" value="<?php echo $dados['Email'];?>">
                <label for="Email">Email</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="Endereco" id="Endereco" value="<?php echo $dados['Endereco'];?>">
                <label for="Endereco">Endereço</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="Cep" id="Cep" value="<?php echo $dados['Cep'];?>">
                <label for="Cep">Cep</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="Bairro" id="Bairro" value="<?php echo $dados['Bairro'];?>">
                <label for="Bairro">Bairro</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="Cidade" id="Cidade" value="<?php echo $dados['Cidade'];?>">
                <label for="Cidade">Cidade</label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="Estado" id="Estado" value="<?php echo $dados['Estado'];?>">
                <label for="Estado">Estado</label>
            </div>

            <div class="col s12">
                <button type="submit" name="btn-editar" class="btn orange darken-1">Atualizar</button>
                <a href="fornecedor.php" class="btn red">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>