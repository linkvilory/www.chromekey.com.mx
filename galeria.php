<?php
session_start();
include_once("config.inc");
include_once("upload/data/data-galeria.php");
$data_galeria = getDataGaleriaInit();
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
				<li class="active"><a data-ref="galeria" href="galeria.php">Galería</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<section id="gal" class="sectionPreview">

	<div class="container gal">
        <div class="row gal">
            <div id="galeria" class="col-md-12 gal">
                
            	<div class="col-md-12 header">

					<h1><?php echo GALERIA_TITLE; ?></h1>

				</div>

				<?php

					foreach ($data_galeria as $key => $value) {
						$id = $data_galeria[$key][0];
						$nombre = $data_galeria[$key][1];
						$edad = $data_galeria[$key][2];
						$img = $data_galeria[$key][3];
				?>

				<div class="col-md-3 box-gal">
					<h6 data-id-ref="<?php echo $id; ?>" class="headerImg"><?php echo $nombre; ?></h6>
					<p class="detailImg"><?php echo $edad; ?></p>
					<a href="<?php echo $img; ?>">
						<img class="galImg" src="<?php echo WB_SITENAME.$img; ?>"/>
					</a>
				</div>

				<?php
					}

				?>

            </div>

            <div class="col-md-12 gal">

            	<div class="col-md-4 col-md-offset-4">
            		<input type="button" class="btnClassicArcher" name="Cargar más" value="Cargar más" id="galMore"/>
            	</div>

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
<script type="text/javascript">
$(document).ready(function (e) {
    
    $("#galMore").click(function(){
    	$(".loading").removeClass("hidden");
    	$.ajax({
            method: "POST",
            url: "./upload/data/data-galeria-post.php"
        })
        .done(function( data ) {
            $(".loading").addClass("hidden");
            $("#galeria").append(data);
        });
    });

});
</script>
</body>
</html>