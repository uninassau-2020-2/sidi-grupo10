<?php
//conexão
require_once 'php_action/db_connect.php';

//sessão 
session_start();

//botão enviar
if(isset($_POST['btn-entrar'])):
    $erros = array();
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($nome) or empty($senha)):
        $erros[] = "O campo usuário/senha deve ser preenchido";
    else:
        $sql = "SELECT nome FROM usuario WHERE nome = '$nome'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):

            $senha = md5($senha);//realiza a criptografia da senha
            $sql = "SELECT * FROM usuario WHERE nome = '$nome' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);  
            
            if(mysqli_num_rows($resultado) == 1):
                
                    $dados = mysqli_fetch_array($resultado);
                    mysqli_close($connect);                     
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    $_SESSION['nivel_acesso'] = $dados['nivelDeAcesso'];
                    //redirecionamento de acordo com o nivel de
                    if($dados['nivelDeAcesso'] == 1):
                        header('Location: home_adm2.php');
                    endif;
                    if($dados['nivelDeAcesso'] == 2):    
                        header('Location: home_vendedor.php');
                    endif;
            else:

                $erros[] = "Usuário e senha não conferem.";
            
            endif;

        else:
             $erros[] = "Usuário não existe.";
        endif;

    endif;
endif;    

?>
<html>
<head>
    <meta charset="utf-8">
        <title>Sistema Rei Do Cangaço</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <style>
        #telaLogin{
          padding: 6% 0px 0px 16%;
          left: 
        }
        #logo{
            position: absolute;
            left: 7%;
            top: 12%;
        }
      </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        
        
        <div class="row">
        <img src="imagem/cangaco.jpeg" alt="Logotipo" id="logo">
            <div class="col s12 m5 offset-m5" id="telaLogin">
                <div class="card" >
                    <div class="card-action  orange darken-1 white-text">
                        <h3>Login</h3>
                    </div>
                    
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                            <div class="card-content"  >
                            
                                <?php 
                                    if(!empty($erros)):
                                        foreach($erros as $erro):
                                            echo $erro;
                                        endforeach;
                                    endif;
                                ?>
                                </label>
                                <div class="input-field">
                                    <label for="nome">Usuario</label>
                                    <input type="text" name="nome" id="nome">
                                </div><br>

                                <div class="input-field">
                                    <label for="senha">Senha</label>
                                    <input type="password" name="senha" id="senha">
                                </div><br>

                                
                                <button type="submit" name="btn-entrar" class="btn-large waves-effect  orange darken-1" style="width:100%; ">Entrar</button>
                                
                            </div>
                        </form>              
                </div> 
            </div>
            </div>
        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
     </body>
</html>