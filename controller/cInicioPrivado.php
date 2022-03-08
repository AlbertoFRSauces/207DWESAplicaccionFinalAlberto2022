<?php
/*
 * Controlador de InicioPrivado
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de cerrarsesion, editarperfil, mtodepartamentos, detalle, rest, mtocuestiones, mtousuarios y mtoopiniones
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 25/11/2021
 * @version: 1.0 Realizacion de cInicio
 * @copyright: Copyright (c) 2021, Alberto Fernandez Ramirez
 * Controlador de inicio
 */
if(isset($_REQUEST['cerrarsesion'])){ //Si el usuario pulsa el boton de cerrar sesion, cierro la sesion y mando al usuario al login de nuevo
    session_unset(); //Elimino la sesion
    header('Location: index.php'); //Redireciono de nuevo al login
    exit;
}

if(isset($_REQUEST['editarperfil'])){ //Si el usuario pulsa el boton de editarperfil, mando al usuario a la pagina de MiCuenta
    $_SESSION['paginaAnterior'] = 'inicioprivado'; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'micuenta'; //Asigno a la pagina en curso la pagina de MiCuenta
    header('Location: index.php'); //Redireciono de nuevo a MiCuenta
    exit;
}

if(isset($_REQUEST['mtodepartamentos'])){ //Si el usuario pulsa el boton de mtodepartamentos, mando al usuario a la pagina de mtodepartamentos
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'mtodepartamentos'; //Asigno a la pagina en curso la pagina de working progress
    $_SESSION['numPaginacionDepartamentos'] = 1; //Asigno la pagina de departamentos a 1 para que sea la primera
    $_SESSION['criterioBusquedaDepartamentos']['estado'] = ESTADO_TODOS; //Asigno la muestra de todos los departamentos al entrar en mtodepartamentos
    header('Location: index.php'); //Redireciono de nuevo al working progress
    exit;
}

if(isset($_REQUEST['detalle'])){ //Si el usuario logeado pulsa el boton de detalle
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Asigno a la pagina anterior la pagina en curso
    $_SESSION['paginaEnCurso'] = 'detalle'; //Asigno a la pagina en curso la pagina de detalle
    header('Location: index.php'); //Redirecciono a detalle
    exit;
}

if(isset($_REQUEST['rest'])){ //Si el usuario pulsa el boton de rest, mando al usuario a la pagina de rest
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'rest'; //Asigno a la pagina en curso la pagina de rest
    header('Location: index.php'); //Redireciono de nuevo a rest
    exit;
}

if(isset($_REQUEST['mtocuestiones'])){ //Si el usuario pulsa el boton de mtocuestiones, mando al usuario a la pagina de WorkingProgress
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'wip'; //Asigno a la pagina en curso la pagina de working progress
    header('Location: index.php'); //Redireciono de nuevo al working progress
    exit;
}

if(isset($_REQUEST['mtousuarios'])){ //Si el usuario pulsa el boton de mtousuarios, mando al usuario a la pagina de MtoUsuarios
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'mtousuarios'; //Asigno a la pagina en curso la pagina de mtousuarios
    header('Location: index.php'); //Redireciono de nuevo al mtousuarios
    exit;
}

if(isset($_REQUEST['mtoopiniones'])){ //Si el usuario pulsa el boton de mtoopiniones, mando al usuario a la pagina de WorkingProgress
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'wip'; //Asigno a la pagina en curso la pagina de working progress
    header('Location: index.php'); //Redireciono de nuevo al working progress
    exit;
}

$sCodUsuario = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getCodUsuario(); //Variable que contiene el codigo del usuario loggeado
$sDescUsuario = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getDescUsuario(); //Variable que contiene la descripcion del usuario loggeado
$iNumConexiones = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getNumConexiones(); //Variable que contiene el numero total de conexiones del usuario loggeado
$sFechaHoraUltimaConexionAnterior = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getFechaHoraUltimaConexionAnterior(); //Variable que contiene la fecha de la ultima conexion del usuario loggeado
$sImagenUsuario = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getImagenUsuario(); //Variable que contiene la imagen del usuario loggeado

require_once $vistas['layout']; //Cargo la pagina de inicio privado
?>
