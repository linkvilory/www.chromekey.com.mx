<?php
session_start();
include_once("config.inc");

$data = $_GET["data"];
$shorturl = $_SESSION["shorturl"];
$qrcode = $_SESSION["qrcode"];
$img = $_SESSION["img"];

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
  </div><!-- /.container-fluid -->
</nav>

<section id="prev" class="sectionPreview">

	<div class="container prev">
        <div class="row prev">
            <div class="col-md-12 prev">
                
            	<div class="col-md-12 header">

					<h1><?php echo GAMA_TITLE; ?></h1>

				</div>

				<div class="col-md-6">
					<a href="http://archermediaworks.com/greenscreen/<?php echo $img; ?>">
						<img class="principalImg" src="http://archermediaworks.com/greenscreen/<?php echo $img; ?>"/>
					</a>
				</div>

				<div class="col-md-6">

					<h1 class="website shortlink"><a class="website" href="<?php echo $shorturl; ?>" target="_blank"><?php echo $shorturl; ?></a></h1>
					<img class="qrcodeImg" src="http://archermediaworks.com/greenscreen/<?php echo $qrcode; ?>"/>

					<div class="col-md-12 share">

						<div class="col-md-6 redes">
							<a class="redes" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $shorturl; ?>"><i class="fa fa-facebook fa-1x"></i></a>
						</div>
						<div class="col-md-6 redes">
							<a class="redes" target="_blank" href="https://twitter.com/home?status=<?php echo $shorturl; ?>"><i class="fa fa-twitter fa-1x"></i></a>
						</div>
						
					</div>
					
				</div>

				<div class="col-md-12 mailing">
					<input class="btnClassicArcher" id="mailbtn" type="button" name="Enviar x correo" value="Enviar x correo" />
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
    
    $("#mailbtn").click(function(){
    	$(".loading").removeClass("hidden");
    	$.ajax({
		  	method: "POST",
		  	url: "./upload/mailing/mailing.php"
		})
		.done(function( data ) {
            $(".loading").addClass("hidden");
		});
    });

});
</script>
</body>
</html>