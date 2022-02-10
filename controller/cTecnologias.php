<?php
/*
 * Controlador de Tecnologias
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de volver
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 31/01/2022
 * @version: 1.0 Realizacion de cTecnologias
 * @copyright: Copyright (c) 2021, Alberto Fernandez Ramirez
 * Controlador de Tecnologias
 */

if(isset($_REQUEST['volvertecnologias'])){ //Si el usuario pulsa el boton de volver, mando al usuario a la pagina anterior
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina anterior
    header('Location: index.php'); //Redireciono de nuevo a la pagina anterior
    exit;
}

require_once $vistas['layout']; //Cargo la pagina de tecnologias
?>