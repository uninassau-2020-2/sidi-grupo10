<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
        <title>Sistema Rei Do Cangaço</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
</head>
<body>
		 <div class="row">
            <div class="col s12 m4 offset-m4">
                <div class="card">
                    
                    <div class="card-action  orange darken-1 white-text">
                        <h3>Login</h3>
                    </div>
                    
                        <form action="validação.php" method="POST">

                            <div class="card-content"  >

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>