<?php
//Conexão
require_once 'php_action/db_connect.php';

//Sessão
session_start();


//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: home_adm.php');
endif;

//Dados do usuário
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE Id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);  
mysqli_close($connect);

//Header
include_once 'includes/header.php';  
?>

    <div class="row">

            <div class="col s12 m6 push-m3">

                <div class="card" >
                    <div class="card-action  orange darken-1 white-text">
                        <img src="imagem/user.png" width="15%" heigth="15%">

                        <h4 class="light">Adm. <?php echo $dados['nome']; ?></h4>
                    </div>

                </div>

                <br>  
                
                <br>

                <div class="card branco center">
                  <div class="card-content center">
                  <img class="materialboxed" height="100"width="100" src="imagem/clientes.png">            
                  </div>
                  <div class="card-action">
                    <a href="#">Clientes</a>
                  </div>
                </div>  
              </div>
                <div class="col s2">
                    <a href="produto.php">
                    <img src="imagem/produto.png"  width="50" height="50" />
                    Produto
                </div>

                <div class="col s2">
                    <a href="fornecedor.php">
                    <img src="imagem/fornecedores.png"  width="50" height="50" />
                    Fornecedor
                </div>

                <div class="col s2">
                    <a href="vendedor.php">
                    <img src="imagem/vendedor2.png"  width="50" height="50" />
                    Vendedor
                </div>

                <div class="col s2">
                    <a href="cliente.php">
                    <img src="imagem/clientes.png"  width="50" height="50" />
                    Cliente
                </div>

                <div class="col s2">
                    <a href="usuario.php">
                    <img src="imagem/usuario.png"  width="50" height="50" />
                    Usuario
                </div>

                <div class="col s2">
                    <a href="pedidos.php">
                    <img src="imagem/pedidos.png"  width="50" height="50" />
                    Pedidos
                </div>

                <div class="col s2">
                    <a href="relatorio.php">
                    <img src="imagem/relatorio.png"  width="50" height="50" />
                    Relatório
                </div>

                

                

            

    </div>

</div>
<?php
include_once 'includes/footer.php';
?>

      