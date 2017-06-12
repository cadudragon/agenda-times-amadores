<!DOCTYPE html>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <style type="text/css">
            body {
                padding-top: 5rem;
            }
            .starter-template {
                padding: 3rem 1.5rem;
                text-align: center;
            }
        </style>
    </head>
    <body>
        
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Placar Jogos</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
        <li>
		    <a href="autentica" class="hidden-xs">Login</a>
		</li>
        <li class="active">
		    <a href="#" class="hidden-xs">Cadastro</a>
		</li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- <img src="https://php-cadudragon.c9users.io/ci/images/jogador.jpg"></img> -->
<div class="container">
        <div class="row">
        <div class="col-md-4 col-md-offset-5">
            <h1>CADASTRO</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <br><br>
            <form method="post" action="/ci/dbnome/inserir">
                <div class="form-group">
                    <label for="Nome">Nome:</label>
                    <input type="text" class="form-control" name="nome1"/>
                </div>
                <div class="form-group">
                    <label for="Nome"> E-mail:</label>
                    <input type="email" class="form-control" name="email"/>
                </div>  
                <div class="form-group">
                    <label for="Nome"> Time:</label>
                    <input type="text" class="form-control" name="time"/>
                </div> 
                <div class="form-group">
                    <label for="Nome"> Senha:</label>
                    <input type="password" class="form-control" name="senha"/>
                </div>  
              <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
    </div>
</div>
    </body>
</html>
