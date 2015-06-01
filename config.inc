<?php

/*
 * Data base Configuration
 */
DEFINE(DB_SERVERNAME, "localhost");
DEFINE(DB_USERNAME, "root");
DEFINE(DB_PASSWORD, "root");
DEFINE(DB_DBNAME, "www.chromekey.com");
DEFINE(DB_TABLE, "activacion0001");

/*
 * FTP Configuration
 */
DEFINE(FTP_SITENAME, "archermediaworks.com");
DEFINE(FTP_USERNAME, "archerme");
DEFINE(FTP_PASSWORD, "SZr22Ak6caaU");
DEFINE(FTP_ROOTFOLDER, "public_html/greenscreen/");

/*
 * Web Site Configuration
 */
DEFINE(WB_SITENAME, "http://archermediaworks.com/greenscreen/");

/*
 * Init App Configuration
 */
DEFINE(APP_TITLE, "GREEN SCREEN");
DEFINE(APP_TITLE_DESC, "INTERACTIVO WEB");
DEFINE(APP_DESCRIPTION, "La aplicación consta en tomar una foto con un fondo verde (chroma key) para posterior cambiarle el fondo y reemplazarlo por el fondo de la activación y a su vez agregarle un marco a la foto. Una vez que se haya obtenido el resultado final de la foto se procede a subirla para que el usuario pueda compartir su experiencia en sus redes sociales.");
DEFINE(APP_HAS_IMAGES, "1");
DEFINE(APP_COUNT_IMAGES, "3");

/* Definir el número de imágenes segun el contador, por default siempre serán 3 imágenes */
DEFINE(APP_IMAGE_1, "img/preview/green.jpg");
DEFINE(APP_IMAGE_2, "img/preview/blank.png");
DEFINE(APP_IMAGE_3, "img/preview/result.png");

DEFINE(APP_A_URL, "alfa.php");
DEFINE(APP_COPYRIGHT, "&reg; ARCHER TROY S.A. DE C.V.");

/*
 * Alfa page Configuration
 */

DEFINE(ALFA_TITLE, "Nombre de la Activación");
DEFINE(ALFA_TITLE_DESC, "Registro");

/*
 * Beta page Configuration
 */

DEFINE(BETA_TITLE, "Selecciona una imagen");
DEFINE(BETA_FONDOS_TITLE, "Fondos");
DEFINE(BETA_MARCOS_TITLE, "Marcos");

/*
 * Preview Configuration
 */
DEFINE(GAMA_TITLE, "Preview");

/*
 * Galeria Configuration
 */
DEFINE(GALERIA_TITLE, "Galeria");

/*
 * Mailing Configuration
 */
DEFINE(MAIL_ASUNTO, "Activación Green Screen");

?>