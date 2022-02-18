<?php
/*
 * Controlador de MtoUsuarios
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de volver
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 15/02/2022
 * @version: 1.0 Realizacion de cMtoUsuarios
 * @copyright: Copyright (c) 2021, Alberto Fernandez Ramirez
 * Controlador de MtoUsuarios
 */

if(isset($_REQUEST['volverusuarios'])){ //Si el usuario pulsa el boton de volver, mando al usuario a la pagina de inicio privado
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina de inicio privado
    header('Location: index.php'); //Redireciono de nuevo al inicio privado
    exit;
}

require_once $vistas['layout']; //Cargo la pagina de mtousuarios
?>