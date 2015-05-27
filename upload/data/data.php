<?php
session_start();

include_once("../../config.inc");

$servername = DB_SERVERNAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_DBNAME;
$tablename = DB_TABLE;

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$correo = $_POST["correo"];

if($nombre == "" || $edad == "" || $correo == ""){
	die(0);
}else{
	date_default_timezone_set('America/Mexico_City');
	$fecha = date("Y-m-d H:i:s");

	$handle = mysql_connect($servername, $username, $password);
	$found = mysql_select_db($dbname, $handle);

	if ($found) {

		$sqlquery = "INSERT INTO `". $dbname ."`.`". $tablename ."` (`id`, `nombre`, `edad`, `correo`, `fecha`, `imagen`, `qrcode`, `shortlink`) VALUES (NULL, '". $nombre ."', '". $edad ."', '". $correo ."', '". $fecha ."', '', '', '');";
		$resultado = mysql_query($sqlquery);
			if ($resultado)  
			{
				$_SESSION["id"] = mysql_insert_id();
				$_SESSION["nombre"] = $nombre;
				$_SESSION["edad"] = $edad;
				$_SESSION["correo"] = $correo;
				$_SESSION["fecha"] = $fecha;
				echo 0;
			}

	}
}

?>