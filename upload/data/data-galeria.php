<?php
session_start();

$_SESSION["initDBLimit"] = 0;
$initLimit = ($_SESSION["initDBLimit"] * 20);
$servername = DB_SERVERNAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_DBNAME;
$tablename = DB_TABLE;

$handle = mysql_connect($servername, $username, $password);
$found = mysql_select_db($dbname, $handle);

function getDataGaleriaInit(){


	$servername = $GLOBALS['servername'];
	$username = $GLOBALS['username'];
	$password = $GLOBALS['password'];
	$dbname = $GLOBALS['dbname'];
	$tablename = $GLOBALS['tablename'];
	$handle = $GLOBALS['handle'];
	$found = $GLOBALS['found'];
	$initLimit = $GLOBALS['initLimit'];

	if ($found) {
		$sqlquery = "SELECT `id`, `nombre`, `edad`, `imagen` FROM `". $dbname ."`.`". $tablename ."` WHERE 1 ORDER BY `id` DESC LIMIT ". $initLimit .", 20;";
		$resultado = mysql_query($sqlquery);
			if ($resultado)  
			{
				while($field = mysql_fetch_array($resultado)){

					$arrayGaleria[] = array($field['id'], $field['nombre'], $field['edad'], $field['imagen']);

				}				
			}
	}

	return $arrayGaleria;

}


?>