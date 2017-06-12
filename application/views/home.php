<!DOCTYPE html>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://php-cadudragon.c9users.io/ci/assets/lib/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="https://php-cadudragon.c9users.io/ci/assets/lib/jquery-timepicker/jquery-ui-timepicker-addon.css" type="text/css" />
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://php-cadudragon.c9users.io/ci/assets/lib/jquery-ui.min.js" ></script>
        <script type="text/javascript" src="https://php-cadudragon.c9users.io/ci/assets/lib/moment.min.js" ></script>
        <script src="https://php-cadudragon.c9users.io/ci/assets/lib/jquery-timepicker/jquery-ui-timepicker-addon.js"></script>
        

        <style type="text/css">
            body {
                padding-top: 5rem;
            }
            .starter-template {
                padding: 3rem 1.5rem;
                text-align: center;
            }
        </style>
        <title>Autenticado</title>
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
            <a class="navbar-brand" href="#">Agenda de Jogos</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
		<a href="#" class="hidden-xs">Agenda</a>
 		<a href="#" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Home</a>
		</li>
        <li>
    		<a href="../partidacontroller/calendario" class="hidden-xs">Calendario</a>
		</li>
        <li>
    		<a href="logout" class="hidden-xs">Sair</a>
		</li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- <img src="https://php-cadudragon.c9users.io/ci/images/jogador.jpg"></img> -->
<div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <h1>Agenda para o time: <?= $time ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <br>
        <label>Olá!  <?= $nome ?>, seja bem vindo!</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form  method="post" action="/ci/partidacontroller/inserir">
                <div class="form-group">
                  <label for="sel1">Selecione um time adversário:</label>
                  <select class="form-control" name="idUsuario2" id="idUsuario2">
                    <?php foreach($times as $time) { ?>
                            <article class="article_text">
                                <option value="<?php echo $time->getId(); ?>";>Responsável: <?php echo $time->getNome();?> -  Time: <?php echo $time->getTime();?></option><br>
                            </article>
                    <?php } ?>
                  </select><br>
                  <input placeholder="Clique para selecionar a data inicial do jogo" type="text" class="form-control"  name="dtInicial" id="dtInicial" readonly='true'>
                  <br> 
                  <input placeholder="Clique para selecionar a data final do jogo" type="text" class="form-control"  name="dtFinal" id="dtFinal" readonly='true'>
                  <br>
                  <input type="hidden" name="dtInicialHidden" id="dtInicialHidden" />
                  <input type="hidden" name="dtFinalHidden" id="dtFinalHidden" />
              <button type="submit" class="btn btn-default">Adicionar Partida</button>
            </form>
        </div>
    
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <table class="table table-striped">
    <thead>
      <tr>
        <th>Time</th>
        <th>Responsável</th>
        <th>Inicio</th>
        <th>Fim</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($partidas as $partida) { ?>
                  <tr>
                    <td><?php echo $partida['timeUser2'] ?></td>
                    <td><?php echo $partida['nomeUser2'] ?></td>
                    <td><?php echo $partida['dtInicial'] ?></td>
                    <td><?php echo $partida['dtFinal'] ?></td>
                    <td>
                        <form  method="post" action="/ci/partidacontroller/deletar">
                            <input type="hidden" name="idPartida" value="<?php echo $partida['id'] ?>"/>
                            <button type="submit" class="btn btn-default btn-sm">
                              <span class="glyphicon glyphicon-remove"></span> Deletar 
                            </button>
                        </form>
                    </td>
                  </tr>
        <?php } ?>
    </tbody>
  </table>
        </div>
    </div>

    <script>
        $(function () { 
            
            $('#dtInicial').datetimepicker();
            $('#dtFinal').datetimepicker();
            
            $("#dtInicial").change(function(){
                console.log(moment($('#dtInicial').val()).format('YYYY-MM-DD HH:mm:ss').toString());
                $('#dtInicialHidden').val(moment($('#dtInicial').val()).format('YYYY-MM-DD HH:mm:ss').toString());
            });
            
            $("#dtFinal").change(function(){
                $('#dtFinalHidden').val(moment($('#dtFinal').val()).format('YYYY-MM-DD HH:mm:ss').toString());
            });
            

        });
    </script>        
    </body>
</html>