<?php
session_start();
include_once("../config.inc");
require_once('Googl.class.php');

$servername = DB_SERVERNAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_DBNAME;
$tablename = DB_TABLE;
$websitename = WB_SITENAME;

$image = $_POST['image'];
$bg = "../".$_POST['bg'];
$frame = "../".$_POST['frame'];
$x = $_POST['x'];
$y = $_POST['y'];
$w = $_POST['w'];
$h = $_POST['h'];
if($x > 0)
{
	$x = "+" . $x;
}
if($y > 0)
{
	$y = "+" . $y;
}
//echo "x: " . $x;
//echo "y: " . $y;
if(isset($_POST['image']) && $image != "")
{
	$image = str_replace("./", "", $image);
	$image = "./" . $image;
	$temporary = explode(".", $image);
	$file_extension = end($temporary);
	$timeName = str_replace(" ","",str_replace(".","",microtime())) . "." . $file_extension;
	$htmlName = str_replace($file_extension, "html", $timeName);
	$build = "build/" . $timeName;
	$resize = str_replace("build", "resize", $build);
	$image = str_replace("./upload/temp", "temp", $image);
	$sourcePath = $image; // Storing source path of the file in a variable
	$targetPath = $build; // Target path where file is to be stored
	//move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
	shell_exec("./convert " . $image . " -scale 100% -scale " . $w . "x" . $h . "\! -gravity center " . $resize);
	shell_exec("./convert " . $bg . " " . $resize . " -geometry " . $x . $y . " -compose over -composite " . $frame . " -gravity center -compose over -composite ". $build . "");
	$build = str_replace("build", "./upload/build", $build);
	echo $websitename . $htmlName;

/*
 * Generador de Qrcode
 */
include('phpqrcode/qrlib.php');
// outputs image directly into browser, as PNG stream
$pngAbsoluteFilePath = "qrcode/" . "QR" . $timeName; 
QRcode::png($websitename.$htmlName, $pngAbsoluteFilePath);

/*
 * Generador de archivos para compartir
 */

$googl = new Googl('AIzaSyClouSi3CxyQZ9rSJWijuyXluQugfKRU2c');
$ruta = $googl->shorten($websitename.$htmlName);

	$htmlGenerator = fopen("share/" . $htmlName, "w") or die("Imposible de abrir!");
	$htmlTemplate = <<<EOF

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" container="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="./css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
	<link href="./css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
	<meta content="http://archermediaworks.com/greenscreen/{$htmlName}" property="og:url">
	<meta content="Archer Troy - Activación" property="og:title">
	<meta content="Archer Troy es una agencia integral e independiente. Nuestra arma de conquista son las ideas, entre mas grandes, más poderosas: Ideas que Conquistan." property="og:description">
	<meta content="archertroy activacion" property="og:site_name">
	<meta content="http://archermediaworks.com/greenscreen/{$timeName}" property="og:image">
	<style type="text/css">
		@font-face {
		    font-family: "textB";
		    src: url(./fonts/Optima-Bold-webfont.eot);
		    src: url(./fonts/Optima-Bold-webfont.eot?#iefix) format("embedded-opentype"), url(./fonts/Optima-Bold-webfont.woff2) format("woff2"), url(./fonts/Optima-Bold-webfont.woff) format("woff"), url(./fonts/Optima-Bold-webfont.ttf) format("truetype"), url(./fonts/Optima-Bold-webfont.svg#optimabold) format("svg");
		    font-weight: normal;
		    font-style: normal
		    }

		@font-face {
		    font-family: "textR";
		    src: url(./fonts/Optima-Regular-webfont.eot);
		    src: url(./fonts/Optima-Regular-webfont.eot?#iefix) format("embedded-opentype"), url(./fonts/Optima-Regular-webfont.woff2) format("woff2"), url(./fonts/Optima-Regular-webfont.woff) format("woff"), url(./fonts/Optima-Regular-webfont.ttf) format("truetype"), url(./fonts/Optima-Regular-webfont.svg#optimaregular) format("svg");
		    font-weight: normal;
		    font-style: normal
		    }

		@font-face {
		    font-family: "titleB";
		    src: url(./fonts/Trajan-Bold-webfont.eot);
		    src: url(./fonts/Trajan-Bold-webfont.eot?#iefix) format("embedded-opentype"), url(./fonts/Trajan-Bold-webfont.woff2) format("woff2"), url(./fonts/Trajan-Bold-webfont.woff) format("woff"), url(./fonts/Trajan-Bold-webfont.ttf) format("truetype"), url(./fonts/Trajan-Bold-webfont.svg#trajanbold) format("svg");
		    font-weight: normal;
		    font-style: normal
		    }

		@font-face {
		    font-family: "titleR";
		    src: url(./fonts/Trajan-Regular-webfont.eot);
		    src: url(./fonts/Trajan-Regular-webfont.eot?#iefix) format("embedded-opentype"), url(./fonts/Trajan-Regular-webfont.woff2) format("woff2"), url(./fonts/Trajan-Regular-webfont.woff) format("woff"), url(./fonts/Trajan-Regular-webfont.ttf) format("truetype"), url(./fonts/Trajan-Regular-webfont.svg#trajanregular) format("svg");
		    font-weight: normal;
		    font-style: normal
		    }

		body{
		    font-family: textR;
		    font-size: 16px;
		}

		h1, h4{
		    font-family: titleR;
		    text-align: center;
		    text-transform: uppercase;
		} 

		.container {
		    margin-top: 40px;
		}

		.header{
			margin-bottom: 60px;
		}
		.share, .shortlink{
			margin-bottom: 40px;
		}
		.principalImg{
			max-width: 600px;
			width: 100%;
			height: auto;
			display: block;
			margin: auto;
		}

		.qrcodeImg{
			max-width: 123px;
			width: 100%;
			display: block;
			margin: 0 auto 30px;
			height:auto;
		}

		.redes, .website{
			text-align: center;
			color: black;
		}

		.btnClassicArcher:focus {
		    outline: 0
		    }

		.btnClassicArcher::before {
		    content: "";
		    position: absolute;
		    top: 0;
		    left: 0
		    }

		.btnClassicArcher {
		    background-color: #ccc;
		    border: medium none;
		    color: white;
		    margin: auto;
		    display: block;
		    font-family: textR;
		    font-size: 18px;
		    letter-spacing: 2px;
		    min-height: 32px;
		    min-width: 211px;
		    text-transform: uppercase;
		    position: relative;
		    -moz-transition: background-color 0.5s ease 0s;
		    -o-transition: background-color 0.5s ease 0s;
		    -webkit-transition: background-color 0.5s ease 0s;
		    transition: background-color 0.5s ease 0s;
		    vertical-align: middle
		    }

		.btnClassicArcher:hover {
		    background-color: #7F7F7F
		    }
	</style>
	</head>
	<body>
	<div class="container">

		<div class="row">

			<div class="col-md-12 header">

				<h1>Activación ...</h1>

			</div>

			<div class="col-md-6">
				<a href="{$websitename}{$timeName}"><img class="principalImg" src="{$websitename}{$timeName}"/></a>
			</div>

			<div class="col-md-6">

				<h1 class="website shortlink"><a class="website" href="{$ruta}" target="_blank">{$ruta}</a></h1>
				<img class="qrcodeImg" src="{$websitename}QR{$timeName}"/>

				<div class="col-md-12 share">

					<div class="col-md-6 redes">
						<a class="redes" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$ruta}"><i class="fa fa-facebook fa-4x"></i></a>
					</div>
					<div class="col-md-6 redes">
						<a class="redes" target="_blank" href="https://twitter.com/home?status={$ruta}"><i class="fa fa-twitter fa-4x"></i></a>
					</div>
					
				</div>
				
			</div>

		</div>

	</div>

	<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	</body>
</html>

EOF;

	fwrite($htmlGenerator, $htmlTemplate);
	fclose($htmlGenerator);


	$ftpFile = "share/" . $htmlName;
	$remote_file = FTP_ROOTFOLDER . $htmlName;
	// establecer una conexión básica
	$conn_id = ftp_connect(FTP_SITENAME);
	// iniciar sesión con nombre de usuario y contraseña
	$login_result = ftp_login($conn_id, FTP_USERNAME, FTP_PASSWORD);
	// cargar un archivo
	ftp_put($conn_id, $remote_file, $ftpFile, FTP_ASCII);

	$ftpImgFile = "build/" . $timeName;
	$remote_Imgfile = FTP_ROOTFOLDER . $timeName;
	ftp_put($conn_id, $remote_Imgfile, $ftpImgFile, FTP_BINARY);

	$ftpQrFile = "qrcode/" . "QR" . $timeName;
	$remote_Qrfile = FTP_ROOTFOLDER . "QR" . $timeName;
	ftp_put($conn_id, $remote_Qrfile, $ftpQrFile, FTP_BINARY);
	// cerrar la conexión ftp
	ftp_close($conn_id);

	$_SESSION["shorturl"] = $ruta;
	$_SESSION["qrcode"] = "QR" . $timeName;
	$_SESSION["img"] = $timeName;

	$handle = mysql_connect($servername, $username, $password);
	$found = mysql_select_db($dbname, $handle);

	if ($found) {
		$sqlquery = "UPDATE `". $dbname ."`.`". $tablename ."` SET `imagen` = '". $timeName ."', `qrcode` = 'QR". $timeName ."', `shortlink` = '". $ruta ."' WHERE `id` = '". $_SESSION["id"] ."';";
		$resultado = mysql_query($sqlquery);
		if ($resultado)  {}
	}

}else{
	echo 0;
}
?>