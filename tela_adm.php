<?php
//Sessão
session_start();

//Conexão
require_once 'php_action/db_connect.php';

//Header
include_once 'includes/header.php';

//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

//Dados do usuário
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);  
mysqli_close($connect);
?>

    <div class="row">
            <div class="col s12 m6 push-m3">
                <div class="chip">
                    <img src="imagem/user.png"> 
                    Adm: <?php echo $dados['nome']; ?>
                </div>        
            </div>
    </div>
        <div class="row">
            <div class="col s12 m6 push-m3">                    
                <a href="logout.php" class="btn red">Sair</a>
            </div>
        </div>

<?php
include_once 'includes/footer.php';
?>


      