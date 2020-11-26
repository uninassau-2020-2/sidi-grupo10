<?php
//Conexão
require_once 'php_action/db_connect.php';

//Sessão
session_start();


//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

//Dados do usuário
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE Id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);  
mysqli_close($connect);
 
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <title>Sistema Rei Do Cangaço</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script>
      
      <style>
        body{ background-image: url('./img/reidocang3.jpg');}
        img{
          height:100px;
          width:100px;
        }
        #logoHome{
          position: absolute;
          left: 74%;
          top:3%;
          height: 150px;
          width: 150px;
        }
      </style>             
      
   </head>
   <body>
   
    <div class = "card-panel teal orange darken-1 lef white-text">
    <a href="logout.php" class="btn orange darken-1">Sair</a>
        <img src="imagem/gerente.png">
        <img src="imagem/cangaco.png" alt="logotipo" id="logoHome">
          <div class="chip">  
              Gerente - <?php echo $dados['id']; ?>
              - <?php echo $dados['nome']; ?>  
          </div>       
       
    </div>

   <body class = "container" background="#ff8F30 amber darken-3">

   <br>
  
   <div class="row">
    <div class="col s2 center">
      <div class="card branco center">
        <div class="card-content center">
          <img class="imgCard" src="imagem/cliente.png">            
        </div>
        <div class="card-action">
          <a href="cliente.php" >Clientes</a>
        </div>
      </div>
    </div>

   <div class="col s2 center">
      <div class="card branco">
        <div class="card-content">
        <img class="imgCard"  src="imagem/fornecedores.png">            
        </div>
        <div class="card-action">
          <a href="fornecedor.php">Fornecedores</a>
        </div>
      </div>
    </div>

   <div class="col s12 m2 center">
      <div class="card branco">
          <div class="card-content">
              <img class="imgCard"src="imagem/produtos.jpg">            
          </div>
        <div class="card-action">
          <a href="produto.php">Produtos</a>
        </div>
      </div>
    </div>

   <div class="col s12 m2 center">
      <div class="card branco">
        <div class="card-content">
        <img class="imgCard" src="imagem/vendedor2.png">            
        </div>
        <div class="card-action">
          <a href="vendedor.php">Vendedores</a>
        </div>
      </div>
    </div>

    <div class="col s12 m2 center">
      <div class="card branco">
        <div class="card-content">
        <img class="imgCard" src="imagem/usuario.png">            
        </div>
        <div class="card-action">
          <a href="usuario.php">Usuários</a>
        </div>
      </div>
    </div>

    <div class="col s12 m2 center">
      <div class="card branco">
        <div class="card-content">
        <img class="imgCard" src="imagem/relatorio.png">            
        </div>
        <div class="card-action">
          <a href="#">Relatórios</a>
        </div>
      </div>
    </div>

    <div class="row">
    <div class="col s2 center">
      <div class="card branco center">
        <div class="card-content center">
          <img class="imgCard" src="imagem/abrirPedido.png">            
        </div>
        <div class="card-action">
          <a href="novo_pedido.php">Abrir Novo Pedido</a>
        </div>
      </div>
    </div>

    <div class="col s2 center">
      <div class="card branco">
        <div class="card-content">
        <img class="imgCard"  src="imagem/pedidos.png">            
        </div>
        <div class="card-action">
          <a href="pedidos.php">Pedidos Finalizados</a>
        </div>
      </div>
    </div>

    <div class="col s12 m2 center">
      <div class="card branco">
          <div class="card-content">
              <img class="imgCard"src="imagem/pedidoCancelado.png">            
          </div>
        <div class="card-action">
          <a href="pedido_cancelado.php">Pedidos Cancelados</a>
        </div>
      </div>
    </div>
  
  
  </div>
      </body>
</html>