<?php
/*
 * Controlador de BorrarCuenta
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de borrar o cancelar
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 18/01/2022
 * @version: 1.0 Realizacion de cBorrarCuenta
 * @copyright: Copyright (c) 2022, Alberto Fernandez Ramirez
 */
if(isset($_REQUEST['cancelar'])){ //Si el usuario pulsa el boton de cancelar, mando al usuario a la pagina de micuenta
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina anterior que es mi cuenta
    header('Location: index.php'); //Redireciono de nuevo a mi cuenta
    exit;
}
if(isset($_REQUEST['aceptar'])){ //Si el usuario pulsa el boton de cancelar, mando al usuario a la pagina de inicio privado
    UsuarioPDO::borrarUsuario($_SESSION['usuario207DWESAplicaccionFinalAlberto']);
    
    session_destroy(); //Destruyo la session del usuario conectado
    
    $_SESSION['paginaEnCurso'] = 'iniciopublico'; //Asigno a la pagina en curso la pagina inicio publico
    header('Location: index.php'); //Redireciono de nuevo a inicio privado
    exit;
}

$usuarioMiCuenta = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getCodUsuario(); //Variable que contiene el codigo del usuario loggeado
$descripcionMiCuenta = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getDescUsuario(); //Variable que contiene la descripcion del usuario loggeado
$conexionesMiCuenta = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getNumConexiones(); //Variable que contiene el numero total de conexiones del usuario loggeado
$ultimaconexionMiCuenta = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getFechaHoraUltimaConexion(); //Variable que contiene la fecha y hora de la ultima conexion del usuario loggeado
$passwordMiCuenta = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getPassword(); //Variable que contiene la password del usuario loggeado

require_once $vistas['layout']; //Cargo la pagina de BorrarCuenta
?>

