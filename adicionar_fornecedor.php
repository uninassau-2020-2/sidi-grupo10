<?php
//conexão
include_once 'php_action/db_connect.php';

include_once 'includes/message.php';

//Sessão
session_start();

//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: fornecedor.php');
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
        <a href="fornecedor.php" class="btn orange darken-1">lista de Fornecedores</a>
    </nav>

</div>
</div>
    
<div class="row">
    <div class="col s12 m8 push-m2">
    
        <h3 class="light">Novo Fornecedor</h3>
        <hr>
        <form action="php_action/inserir_fornecedor.php" method="POST">
            <div class="input-field col s6 ">
                <input type="text" name="Cnpj_Cpf" id="Cnpj_Cpf">
                <label for="Cnpj_Cpf">Cnpj_Cpf</label>
            </div>
            <div class="input-field col s6 ">
                <input type="text" name="Empresa" id="Empresa">
                <label for="Empresa">Empresa</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="Contato" id="Contato">
                <label for="Contato">Contato</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="TipoContato" id="TipoContato">
                <label for="TipoContato">TipoContato</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="Telefone" id="Telefone">
                <label for="Telefone">Telefone</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="Celular" id="Celular">
                <label for="Celular">Celular</label>
            </div>
            <div class="input-field col s6">
                <input type="email" name="Email" id="Email" class="validate">
                <label data-error="Email inválido" data-success="Email válido" for="Email">Email</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="Endereco" id="Endereco">
                <label for="Endereco">Endereco</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="Cep" id="Cep">
                <label for="Cep">Cep</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="Bairro" id="Bairro">
                <label for="Bairro">Bairro</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="Cidade" id="Cidade">
                <label for="Cidade">Cidade</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="Estado" id="Estado">
                <label for="Estado">Estado</label>
            </div>                          
            <div class="col s12">
                
                    <button type="submit" name="btn-cadastrar" class="btn orange darken-1">Cadastrar</button>
                    <a href="fornecedor.php" class="btn red">Cancelar</a>
            
            </div>
        </form>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>