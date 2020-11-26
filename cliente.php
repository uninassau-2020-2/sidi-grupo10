<?php

//conexão
include_once 'php_action/db_connect.php';

//Sessão
session_start();

//verifica se o usuário está logado.
if(!isset($_SESSION['logado'])):
    header('Location: cliente.php');
endif;

//Dados do usuário
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE Id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);  
//mysqli_close($connect);

//Message
//include_once 'message.php';

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
        <a href="adicionar_cliente.php" class="btn orange darken-1">Adicionar cliente</a>
    </nav>

</div>
</div>

<div class="row">
    <div class="col s12 m10 push-m1" id="cont">

        <h3 class="light"> Clientes</h3>
        <hr>
        <table class="striped" id="tabela">
            <thead>
                <tr>
                    <th>Cpf</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Endereço</th>
                    <th>Cep</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Data</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM cliente";
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) > 0):

                while($dados = mysqli_fetch_array($resultado)):
                ?>
                    <tr>
                        <td><?php echo $dados['cpf']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><?php echo $dados['celular']; ?></td>
                        <td><?php echo $dados['endereco']; ?></td>
                        <td><?php echo $dados['cep']; ?></td>
                        <td><?php echo $dados['bairro']; ?></td>
                        <td><?php echo $dados['cidade']; ?></td>
                        <td><?php echo $dados['estado']; ?></td>
                        <td><?php echo $dados['data']; ?></td>

                        
                        <td><a href="editar_cliente.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                    
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                            <div class="modal-content">
                            <h4>Ops!!</h4>
                            <p>Deseja realmente excluir esse cliente?</p>
                            </div>
                            <div class="modal-footer">

                            <form action="php_action/delete_cliente.php" method="POST">
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