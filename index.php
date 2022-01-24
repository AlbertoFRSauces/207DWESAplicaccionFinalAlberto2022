<?php
/*
 * @author: Alberto Fernandez Ramirez
 * @since: 25/11/2021
 * @version: 1.0 Realizacion del index
 * @copyright: Copyright (c) 2021, Alberto Fernandez Ramirez
 * Index principal de la aplicacion
 */
require_once 'config/configAPP.php'; //Incluyo la configuracion de la app
require_once 'config/configDBPDO.php'; //Incluyo la configuracion de la base de datos

session_start(); //Creo o recupero la sesion

if(!isset($_SESSION['paginaEnCurso'])){ //Si no hay una pagina en curso
    $_SESSION['paginaEnCurso'] = 'iniciopublico'; //Asigno a la pagina en curso la pagina de inicio publico
}

require_once $controladores[$_SESSION['paginaEnCurso']]; //Cargo la pagina en curso
?>
