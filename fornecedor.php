<?php
//conexão
include_once 'php_action/db_connect.php';

//include_once 'includes/message.php';
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
        <a href="adicionar_fornecedor.php" class="btn orange darken-1">Adicionar Fornecedor</a>
    </nav>

</div>
</div>

<div class="row">
    <div class="col s12 ">
        <h3 class="light"> Fornecedores</h3>
        <hr>
        <table class="striped">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Cnpj/Cpf</th>
                    <th>Empresa</th>
                    <th>Contato</th>
                    <th>TipoContato</th>
                    <th>nº contato</th>
                    <th>Email</th>
                    <th>Endereco</th>
                    <th>Cep</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Data</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM fornecedor";
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) > 0):

                while($dados = mysqli_fetch_array($resultado)):
                ?>
                    <tr>
                        <td>
                            <form action="status.php" method="POST">
                                    <!-- Switch -->
                                    <div class="switch">
                                        <label>
                                        
                                        <input type="checkbox" name="status" id="status" value="1">
                                        <span class="lever" style="color:green"></span>
                                        
                                        </label>
                                    </div>
                            </form>
                        </td>
                        <td><?php echo $dados['Cnpj_Cpf']; ?></td>
                        <td><?php echo $dados['Empresa']; ?></td>
                        <td><?php echo $dados['Contato']; ?></td>
                        <td><?php echo $dados['TipoContato']; ?></td>
                        <td><?php echo $dados['numContato']; ?></td>
                        <td><?php echo $dados['Email']; ?></td>
                        <td><?php echo $dados['Endereco']; ?></td>
                        <td><?php echo $dados['Cep']; ?></td>
                        <td><?php echo $dados['Bairro']; ?></td>
                        <td><?php echo $dados['Cidade']; ?></td>
                        <td><?php echo $dados['Estado']; ?></td>
                        <td><?php echo $dados['data']; ?></td>
                        <td><a href="editar_fornecedor.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                    
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                            <div class="modal-content">
                            <h4>Ops!!</h4>
                            <p>Deseja realmente excluir esse fornecedor?</p>
                            </div>
                            <div class="modal-footer">

                            <form action="php_action/delete_fornecedor.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                <button type="submit" name="btn-deletar" class="btn red">Excluir.</button>

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
                        <td>-</td>
                        <td>-</td>
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
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>