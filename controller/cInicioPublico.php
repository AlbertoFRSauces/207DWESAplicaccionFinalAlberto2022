<?php
/*
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 13/01/2022
 * @version: 1.0 Realizacion de cInicioPublico
 * @copyright: Copyright (c) 2022, Alberto Fernandez Ramirez
 * Controlador de inicio publico
 */

if(isset($_REQUEST['iniciarsesion'])){ //Si el usuario pulsa el boton de iniciar sesion, mando al usuario a la pagina de login
    $_SESSION['paginaAnterior'] = 'iniciopublico'; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'login'; //Asigno a la pagina en curso la pagina de login
    header('Location: index.php'); //Redireciono de nuevo al login
    exit;
}

require_once $vistas['layout']; //Cargo la pagina de inicio publico
?>
