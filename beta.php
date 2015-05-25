<?php

if ($handle = opendir('./img/fondos/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {
            $fondos[] = $entry;
        }
    }
    closedir($handle);
}

if ($handle = opendir('./img/marcos/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {
            $marcos[] = $entry;
        }
    }
    closedir($handle);
}

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
      <a class="navbar-brand" href="#"><img src="img/logo.jpg"/></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="generador.php">Generador de Creatividades</a></li>
		<li class=""><a href="compartir.php">Compartir en Redes Sociales</a></li>
		<li class=""><a href="galeria.php">Galería de Imagenes y Descargas</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<section id="home">

	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Selecciona tu imagen a modificar</h1>
                <div class="builderPreview">
                    <img id="imgBgHolder" class="hidden" src="" width="176px" height="219px" />
                    <img id="imgPreviewHolder" class="hidden" src="" width="176px" height="219px" />
                    <img id="imgFrameHolder" class="hidden" src="" width="176px" height="219px" />
                </div>  
                <form id="uploadForm" enctype="multipart/form-data" action="./upload/uploadForm.php" method="post">
                    <input name="imgFile" id="imgFile" type="file" name="Selecciona un archivo" />
                    <input type="submit" name="upload" value="Upload" class="hidden" />
                </form>
            </div>
        </div>
	</div>

</section>

<section id="background">

	<div class="container">
	<h4>Selecciona el fondo de tu preferencia</h4>

        <?php

            foreach ($fondos as $key => $value) {
                
                ?>
                    <div class="col-md-3">
                        <div class="containerImg">
                            <img class="<?php echo $value; ?>" src="img/fondos/<?php echo $value; ?>"/>
                        </div>
                        <input class="btnClassicArcher" type="button" name="Escogeme" value="Escogeme" />
                    </div>
                <?php

            }

        ?>

		<div class="col-md-3">
			<div class="containerImg">
				<img class="hidden" src=""/>
				<p>
					<span>Remover</span>
				</p>
			</div>
			<input class="btnClassicArcher" type="button" name="Escogeme" value="Escogeme" />
		</div>

	</div>

</section>

<section id="frame">

	<div class="container">

		<h4>Selecciona el marco de tu preferencia</h4>

		<?php

            foreach ($marcos as $key => $value) {
                
                ?>
                    <div class="col-md-3">
                        <div class="containerImg">
                            <img class="<?php echo $value; ?>" src="img/marcos/<?php echo $value; ?>"/>
                        </div>
                        <input class="btnClassicArcher" type="button" name="Escogeme" value="Escogeme" />
                    </div>
                <?php

            }

        ?>

        <div class="col-md-3">
            <div class="containerImg">
                <img class="hidden" src=""/>
                <p>
                    <span>Remover</span>
                </p>
            </div>
            <input class="btnClassicArcher" type="button" name="Escogeme" value="Escogeme" />
        </div>

	</div>

</section>

<section id="generator">

	<div class="container">

		<input class="btnClassicArcher" id="generator" type="button" name="Generar" value="Generar" />

	</div>

</section>

<section id="footer">

	<div class="container-fluid">

		<p class="copyright">
			<span>&reg;  ARCHER TROY S.A. DE C.V. LOS USUARIOS SE OBLIGAN A CUMPLIR CON LOS TÉRMINOS Y CONDICIONES DEL WEB. MARCA REGISTRADA. DECLARACIÓN DE PRIVACIDAD DE LA INFORMACIÓN DE MÉXICO (55) 55 39 22 72.</span>
		</p>

	</div>

</section>

<div class="loading hidden">
<i class="fa fa-circle-o-notch fa-spin fa-6"></i>
</div>

<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/cropimg.jquery.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
    $('#uploadForm').on('submit',(function(e) {
        e.preventDefault();
        $(".loading").removeClass("hidden");
        var formData = new FormData(this);
        formData.append("filename", $('#imgFile').get(0).files[0]);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                //console.log("success");
                //console.log(data);
                if(data != 0){
                	$("#imgPreviewHolder").attr("src",data);
                	$("#imgPreviewHolder").removeClass("hidden");
                	$('#imgPreviewHolder').cropimg({
					    resultWidth:600,
					    resultHeight:450
					});
                }else{
                	//console.log("Fatal error");
                }
                $(".loading").addClass("hidden");
                
            },
            error: function(data){
                //console.log("error");
                //console.log(data);
                $(".loading").addClass("hidden");
            }
        });
    }));

    $("#imgFile").on("change", function() {
        $("#uploadForm").submit();
    });

    $("#background input").click(function(){
    	var urlBgPreview = $(this).prev().children().attr("src");
    	if(urlBgPreview == ""){
    		$("#imgBgHolder").attr("src","");
    		$("#imgBgHolder").addClass("hidden");
    	}else{
    		$("#imgBgHolder").attr("src",urlBgPreview);
    		$("#imgBgHolder").removeClass("hidden");
    	}
    });

    $("#frame input").click(function(){
    	var urlFramePreview = $(this).prev().children().attr("src");
    	if(urlFramePreview == ""){
    		$("#imgFrameHolder").attr("src","");
    		$("#imgFrameHolder").addClass("hidden");
    	}else{
    		$("#imgFrameHolder").attr("src",urlFramePreview);
    		$("#imgFrameHolder").removeClass("hidden");
    	}
    });

    $("#generator").click(function(e){
    	e.preventDefault();
        $(".loading").removeClass("hidden");
    	var image = $("#imgPreviewHolder").attr("src");
    	var bg = $("#imgBgHolder").attr("src");
    	var frame = $("#imgFrameHolder").attr("src");
    	var x = $("#imgPreviewHolder").position().left;
    	var y = $("#imgPreviewHolder").position().top;
    	var w = $("#imgPreviewHolder").width();
    	var h = $("#imgPreviewHolder").height();
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

    });

    $("#shrFacebook").click(function(){
    	window.location = "https://www.facebook.com/sharer/sharer.php?u=Archertroy%20Awesomeness";
    });

    $("#shrTwitter").click(function(){
    	window.location = "https://twitter.com/home?status=Archertroy%20Awesomeness";
    });

    

});
</script>
</body>
</html>