<?php
/*
 * Controlador de InfoApiRest
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de volver
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 08/02/2022
 * @version: 1.0 Realizacion de cInfoApiRest
 * @copyright: Copyright (c) 2021, Alberto Fernandez Ramirez
 * Controlador de InfoApiRest
 */

if(isset($_REQUEST['volverinforest'])){ //Si el usuario pulsa el boton de volverinfo, mando al usuario a la pagina de rest
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina de rest
    header('Location: index.php'); //Redireciono de nuevo al rest
    exit;
}

require_once $vistas['layout']; //Cargo la pagina de InfoApiRest
?>
