<?php
session_start();
include_once("../../config.inc");

$_SESSION["initDBLimit"] = $_SESSION["initDBLimit"] + 1;
$initLimit = $_SESSION["initDBLimit"] * 20;
$servername = DB_SERVERNAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_DBNAME;
$tablename = DB_TABLE;
$sitename = WB_SITENAME;

$handle = mysql_connect($servername, $username, $password);
$found = mysql_select_db($dbname, $handle);

if ($found) {
	$sqlquery = "SELECT `id`, `nombre`, `edad`, `imagen` FROM `". $dbname ."`.`". $tablename ."` WHERE 1 ORDER BY `id` DESC LIMIT ". $initLimit .", 20;";
	$resultado = mysql_query($sqlquery);
		if ($resultado)  
		{
			while($field = mysql_fetch_array($resultado)){

				$arrayGaleria .= <<<EOF

				<div class="col-md-3 box-gal">
					<h6 data-id-ref="{$field['id']}" class="headerImg">{$field['nombre']}</h6>
					<p class="detailImg">{$field['edad']}</p>
					<a href="{$field['imagen']}"><img class="galImg" src="{$sitename}{$field['imagen']}" /></a>
				</div>

EOF;

			}				
		}
}

echo $arrayGaleria;



?>