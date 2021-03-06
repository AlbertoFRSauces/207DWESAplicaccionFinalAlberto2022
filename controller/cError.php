<?php
/*
 * Controlador de Error
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de volver y mostrar el contenido del error producido por la base de datos
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 13/01/2022
 * @version: 1.0 Realizacion de cError
 * @copyright: Copyright (c) 2022, Alberto Fernandez Ramirez
 * Controlador de Error
 */

if(isset($_REQUEST['volvererror'])){ //Si el usuario pulsa el boton de volver, mando al usuario a la pagina de inicio publico
    $_SESSION['paginaEnCurso'] = $_SESSION['error']->getPaginaSiguiente(); //Asigno a la pagina en curso la pagina de inicio publico
    unset($_SESSION['error']);
    header('Location: index.php'); //Redireciono de nuevo al inicio publico
    exit;
}

$sCodError = $_SESSION['error']->getCodError();
$sDescError = $_SESSION['error']->getDescError();
$sArchivoError = $_SESSION['error']->getArchivoError();
$iLineaError = $_SESSION['error']->getLineaError();

require_once $vistas['layout']; //Cargo la pagina de error

