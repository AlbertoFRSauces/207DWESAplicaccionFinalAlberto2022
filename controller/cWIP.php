<?php
/*
 * 
 * @package: LoginLogout
 * @author: Alberto Fernandez Ramirez
 * @since: 13/01/2022
 * @version: 1.0 Realizacion de cWIP
 * @copyright: Copyright (c) 2021, Alberto Fernandez Ramirez
 * Controlador de Working Progress
 */

if(isset($_REQUEST['volverwip'])){ //Si el usuario pulsa el boton de volver, mando al usuario a la pagina de inicio publico
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina de inicio publico
    header('Location: index.php'); //Redireciono de nuevo al inicio publico
    exit;
}

require_once $vistas['layout']; //Cargo la pagina de working progress
?>
