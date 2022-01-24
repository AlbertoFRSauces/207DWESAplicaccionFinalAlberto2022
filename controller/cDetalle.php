<?php
/*
 * 
 * @package: LoginLogout
 * @author: Alberto Fernandez Ramirez
 * @since: 12/01/2022
 * @version: 1.0 Realizacion de cDetalle
 * @copyright: Copyright (c) 2022, Alberto Fernandez Ramirez
 * Controlador de detalle
 */
if(isset($_REQUEST['volver'])){ //Si el usuario pulsa el boton de volver, le mando a la ventana de Inicio privado de nuevo
    $_SESSION['paginaAnterior'] = 'inicioprivado'; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'inicioprivado'; //Asigno a la pagina el curso la pagina de inicio privado
    header('Location: index.php'); //Redireciono de nuevo al login
    exit;
}

require_once $vistas['layout']; //Cargo la pagina de detalle
?>
