<?php

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
<link href="./css/cropimg.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<section class="full" id="obtener">

	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo ALFA_TITLE; ?></h1>
                <h4><?php echo ALFA_TITLE_DESC; ?></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

            <form id="registro" action="" method="post">
                <input id="nombre" class="inputText" type="text" name="nombre" placeholder="Nombre" minlength="5" required=""/>
                <input id="edad" class="inputText" type="number" name="edad" placeholder="Edad" minlength="2" required=""/>
                <input id="correo" class="inputText" type="email" name="correo" placeholder="Correo" required=""/>

                <input type="button" name="alfaEnviar" id="alfaEnviar" value="Enviar" class="btnClassicArcher"/>
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
<script type="text/javascript" src="./js/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function (e) {
    
    
    $("#registro").validate({
        submitHandler: function(form) {
            // do other things for a valid form
            form.submit();
        }
    });

    $("#alfaEnviar").click(function(){
        
        /*

        $.ajax({
            method: "POST",
            url: "./upload/generator.php",
            data: { image: image, bg: bg, frame: frame, x: x, y: y, w: w, h: h }
        })
        .done(function( data ) {
            //console.log("success");
            //console.log(data);
            $(".loading").addClass("hidden");
            window.open(data, '_blank');
        });

        */

    });

});
</script>
</body>
</html>