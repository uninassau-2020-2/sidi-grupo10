<?php
require_once 'php_action/db_connect.php';



if (!isset($_SESSION)){
    session_start();
}

//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
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
                    <a href="pedidos.php" class="btn orange darken-1">Pedidos Finalizados</a>
                    <a href="pedido_cancelado.php" class="btn orange darken-1">Pedidos Cancelados</a>
                </nav>
    <br>         
    </div> 
    
    <div class="col s12 m8 push-m2">
            <div class="row">
            <form class="col s12">
            <div class="row">
                <div class="input-field col s2">
                <label for="gsearch">Código do produto</label>
                <input type="search" id="gsearch" name="gsearch">
                </div>
                <div class="input-field col s3">
                    <button type="submit" name="btn-buscar" class="btn orange darken-1">Buscar</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    

    <div class="row">
    

    <div class="col s12 m8 push-m2">
    <h1>não finalizada!</h1>
    
        <form action="" method="POST">

            <div class="input-field col s5">
                <input type="text" name="descricao" id="descricao"  value="<?php echo $dados['descricao'];?>">
                <label for="descricao">Descrição</label>
            </div>

            <div class="input-field col s2">
                <input type="text" name="volume" id="volume" value="<?php echo $dados['volume'];?>">
                <label for="volume">Volume</label>
            </div>

            <div class="input-field col s1">
                <input type="number" name="preco" id="preco" value="<?php echo $dados['preco'];?>">
                <label for="preco">Preço</label>
            </div>
            
            <div class="input-field col s1">
                <input type="number" name="qntd" id="qntd" value="">
                <label for="qntd">Qntd</label>
            </div>

            <div class="input-field col s1">
                <input type="number" name="total" id="total" value="">
                <label for="total">Total</label>
            </div>

            <div class="col s2">
                <button type="submit" name="btn-editar" class="btn orange darken-1">Inserir</button>
            </div>

        </form>
        
        <table>
        <thead>
          <tr>
              <th>Produto</th>
              <th>Volume</th>
              <th>Preço</th>
              <th>Qntd</th>
              <th>Total</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
          </tr>
         
        </tbody>
      </table>
            

    </div>

    

</div>
    


<?php
include_once 'includes/footer.php';
?>