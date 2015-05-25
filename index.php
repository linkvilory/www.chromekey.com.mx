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
</head>
<body>

<section id="intro">

	<div class="container">
		<h1><?php echo APP_TITLE; ?></h1>
        <h4><?php echo APP_TITLE_DESC; ?></h4>
		<img src="img/logo.jpg"/>
        <p><em><b>Descripción: </b></em><?php echo APP_DESCRIPTION; ?></p>
        <input type="button" name="entrar" id="entrar" value="Entrar" class="btnClassicArcher"/>

        <?php

            if(APP_HAS_IMAGES == 1){

        ?>

        <div class="row">
            <div class="col-md-6">
                <img class="previewApp" src="<?php echo APP_IMAGE_1; ?>"/>
            </div>
            <div class="col-md-6">
                <img class="previewApp" src="<?php echo APP_IMAGE_2; ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <img class="previewApp" src="<?php echo APP_IMAGE_3; ?>"/>
            </div>
        </div>

        <?php

            }else{

            }

        ?>
	</div>

</section>

<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<script type="text/javascript">
    $("#entrar").click(function(){
        window.location = "<?php echo APP_A_URL; ?>";
    });
</script>
</body>
</html>