<?php

require_once('Googl.class.php');

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
	echo 'http://archermediaworks.com/greenscreen/' . $htmlName;

/*
 * Generador de Qrcode
 */
include('phpqrcode/qrlib.php');
// outputs image directly into browser, as PNG stream
$pngAbsoluteFilePath = "qrcode/" . "QR" . $timeName; 
QRcode::png('http://archermediaworks.com/greenscreen/'.$htmlName, $pngAbsoluteFilePath);

/*
 * Generador de archivos para compartir
 */

$googl = new Googl('AIzaSyClouSi3CxyQZ9rSJWijuyXluQugfKRU2c');
$ruta = $googl->shorten('http://archermediaworks.com/greenscreen/'.$htmlName);

	$htmlGenerator = fopen("share/" . $htmlName, "w") or die("Imposible de abrir!");
	$htmlTemplate = <<<EOF

	<!DOCTYPE>
	<html>
		<head>
		<meta charset="UTF-8">
		<meta content="http://archermediaworks.com/greenscreen/{$htmlName}" property="og:url">
		<meta content="Archer Troy - Activación" property="og:title">
		<meta content="Archer Troy es una agencia integral e independiente. Nuestra arma de conquista son las ideas, entre mas grandes, más poderosas: Ideas que Conquistan." property="og:description">
		<meta content="archertroy activacion" property="og:site_name">
		<meta content="http://archermediaworks.com/greenscreen/{$timeName}" property="og:image">
		</head>
		<body>
		<center>
		<img src="http://archermediaworks.com/greenscreen/{$timeName}"/>
		<br><br>
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$ruta}">Facebook</a>
		<a target="_blank" href="https://twitter.com/home?status={$ruta}">Twitter</a>
		<br><br>
		<h1>{$ruta}</h1>
		<br><br>
		<img src="http://archermediaworks.com/greenscreen/QR{$timeName}"/>
		</center>
		</body>
	</html>

EOF;

	fwrite($htmlGenerator, $htmlTemplate);
	fclose($htmlGenerator);


	$ftpFile = "share/" . $htmlName;
	$remote_file = "public_html/greenscreen/" . $htmlName;
	// establecer una conexión básica
	$conn_id = ftp_connect("archermediaworks.com");
	// iniciar sesión con nombre de usuario y contraseña
	$login_result = ftp_login($conn_id, "archerme", "SZr22Ak6caaU");
	// cargar un archivo
	ftp_put($conn_id, $remote_file, $ftpFile, FTP_ASCII);

	$ftpImgFile = "build/" . $timeName;
	$remote_Imgfile = "public_html/greenscreen/" . $timeName;
	ftp_put($conn_id, $remote_Imgfile, $ftpImgFile, FTP_BINARY);

	$ftpQrFile = "qrcode/" . "QR" . $timeName;
	$remote_Qrfile = "public_html/greenscreen/" . "QR" . $timeName;
	ftp_put($conn_id, $remote_Qrfile, $ftpQrFile, FTP_BINARY);
	// cerrar la conexión ftp
	ftp_close($conn_id);

}else{
	echo 0;
}
?>