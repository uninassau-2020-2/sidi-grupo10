<?php
//conexão
include_once 'php_action/db_connect.php';

//Sessão
session_start();

//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: produto.php');
endif;

//Dados do usuário
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE Id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);  

//include_once 'includes/message.php';

//Header
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
        <a href="adicionar_produto.php" class="btn orange darken-1">Adicionar Produto</a>
    </nav>

</div>
</div>
    
<div class="row">

    <div class="col s12 m8 push-m2">

        <h3 class="light"> Produtos</h3>
        <hr>

        <table class="striped">
            <thead>
                <tr>
                    <th>Ref</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Volume</th>
                    <th>Fornecedor</th>
                    <th>Data</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM produto";
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) > 0):

                while($dados = mysqli_fetch_array($resultado)):
                ?>
                    <tr>
                        <td><?php echo $dados['referencia']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['preco']; ?></td>
                        <td><?php echo $dados['volume']; ?></td>
                        <td><?php echo $dados['fornecedor']; ?></td>
                        <td><?php echo $dados['data']; ?></td>
                        <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                    
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                            <div class="modal-content">
                            <h4>Ops!!</h4>
                            <p>Deseja realmente excluir esse produto?</p>
                            </div>
                            <div class="modal-footer">

                            <form action="php_action/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                <button type="submit" name="btn-deletar" class="btn red">Excluir</button>

                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                
                            </form>
                            </div>
                        </div>
                    </tr>
                <?php 
                endwhile;
                else: ?>

                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                <?php
                endif;
                ?>
            </tbody>
            
        </table>
        <br>
        
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>