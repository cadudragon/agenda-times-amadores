<!DOCTYPE html>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://php-cadudragon.c9users.io/ci/assets/lib/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="https://php-cadudragon.c9users.io/ci/assets/lib/jquery-timepicker/jquery-ui-timepicker-addon.css" type="text/css" />
        
        <link rel="stylesheet" href="https://php-cadudragon.c9users.io/ci/assets/lib/fullcalendar/dist/fullcalendar.css" type="text/css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://php-cadudragon.c9users.io/ci/assets/lib/moment.min.js" ></script>
         <script src="https://php-cadudragon.c9users.io/ci/assets/lib/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://php-cadudragon.c9users.io/ci/assets/lib/jquery-ui.min.js" ></script>
        <script src="https://php-cadudragon.c9users.io/ci/assets/lib/jquery-timepicker/jquery-ui-timepicker-addon.js"></script>

        

        <style type="text/css">
            body {
                padding-top: 5rem;
         		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            }
            .starter-template {
                padding: 3rem 1.5rem;
                text-align: center;
            }
            
            
        
        	#calendar {
        		max-width: 900px;
        		margin: 0 auto;
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
                <li>
		<a href="../dbnome/home" class="hidden-xs">Agenda</a>
 		<a href="#" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Home</a>
		</li>
        <li  class="active">
    		<a href="#products" class="hidden-xs">Calendario</a>
		</li>
        <li>
    		<a href="../dbnome/logout" class="hidden-xs">Sair</a>
		</li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- <img src="https://php-cadudragon.c9users.io/ci/images/jogador.jpg"></img> -->
<div class="container">
        <div class="row">
        <div class="col-md-4 col-md-offset-5">
            <h1>CALENDARIO</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <br>
        <label>Logado:  <?= $nome ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id='calendar'></div>

        </div>
    </div>
    <script>
    

    
	$(document).ready(function() {

    		$('#calendar').fullCalendar({
    			header: {
    				left: 'prev,next today',
    				center: 'title',
    				right: 'month,agendaWeek,agendaDay,listWeek'
    			},
    			defaultDate: new Date(),
    			navLinks: true, // can click day/week names to navigate views
    			editable: true,
    			eventLimit: true, // allow "more" link when too many events
                 timeFormat: 'H(:mm)'
    		});
  
    
//--------------------------
 var response;
    
    $.ajax({

        'url': '../partidacontroller/feedpartidas',
        'type': 'GET',
        'data': {
            'cliente': "",
            'numChamado': ""
        },
        'success': function (data) {
            listChamados = JSON.parse(data);
            
            
            var chamado = {}, chamados = [];
            for (i = 0; i < listChamados.length; i++) {
        
                chamado = {};
                chamado.id = listChamados[i].id;

                var startAux = moment(listChamados[i].start).format('DD-MM-YYYY HH:mm');
                var endAux =  moment(listChamados[i].end).format('DD-MM-YYYY HH:mm');

                chamado.start = startAux;
                chamado.end = endAux;
                chamado.title = listChamados[i].title;
                chamado.editable =  false;
                chamados.push(chamado);
            }
            
            console.log(chamados)
            
            
        $('#calendar').fullCalendar('addEventSource',chamados);
        console.log('entrou')
        },
        'error': function (data) {
        	 waitingDialog.hide();
            alert("Erro de Servidor.")
            return false;
        }
    });
//----------------------
  
        });
        
        
        

    </script>        
    </body>
</html>