<?php
session_start();
session_destroy();

include_once("config.inc");


?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" container="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="./css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
<link href="./css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<link href="./css/main.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="alfa.php"><img src="img/logo.jpg"/></a>
    </div>
    	<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a data-ref="galeria" href="galeria.php">Galería</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<section id="obtener">

	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo ALFA_TITLE; ?></h1>
                <h4><?php echo ALFA_TITLE_DESC; ?></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

            <form id="registro" action="" method="post" data-parsley-errors-messages-disabled>
                <input id="nombre" class="inputText" type="text" name="nombre" placeholder="Nombre" minlength="6" required />
                <input id="edad" class="inputText" type="number" name="edad" placeholder="Edad" minlength="2" data-parsley-type="digits" required/>
                <input id="correo" class="inputText" type="email" name="correo" placeholder="Correo" required data-parsley-type="email" />

                <input type="submit" name="alfaEnviar" id="alfaEnviar" value="Enviar" class="btnClassicArcher"/>
            </form>

            </div>
        </div>
	</div>

</section>

<section id="footer">

	<div class="container-fluid">

		<p class="copyright">
			<span><?php echo APP_COPYRIGHT; ?></span>
		</p>

	</div>

</section>

<div class="loading hidden">
<i class="fa fa-circle-o-notch fa-spin fa-6"></i>
</div>

<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/parsley.min.js"></script>

<script type="text/javascript">
$(document).ready(function (e) {
    jQuery.noConflict();
    if(jQuery("#registro").length){
		jQuery('#registro').parsley();
	}

	jQuery("#registro").submit(function(e){
		e.preventDefault();
		return false;
	});
    
    jQuery("#alfaEnviar").click(function(){
        if(jQuery('#registro').parsley().isValid()){
        	console.log("Excelente es valido");
        	jQuery(".loading").addClass("hidden");
        	var nombre = jQuery("#nombre").val();
        	var edad = jQuery("#edad").val();
        	var correo = jQuery("#correo").val();
        	jQuery.ajax({
	            method: "POST",
	            url: "./upload/data/data.php",
	            data: { nombre: nombre, edad: edad, correo: correo }
	        })
	        .done(function( data ) {
	            //console.log("success");
	            //console.log(data);
	            jQuery(".loading").addClass("hidden");
	            if(data == 0){
	            	window.open("beta.php", '_self');
	            }
	            
	        });
        }else{
        	console.log("Espera, hubo un error. Estamos verificando.");
        }
    });

});
</script>
</body>
</html>