<?php
/*
 * Controlador de MiCuenta
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de aceptar, cancelar, eliminarcuenta o cambiarpassword
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 18/01/2022
 * @version: 1.0 Realizacion de cMiCuenta
 * @copyright: Copyright (c) 2022, Alberto Fernandez Ramirez
 */

if(isset($_REQUEST['cancelar'])){ //Si el usuario pulsa el boton de cancelar, mando al usuario a la pagina de inicio privado
    $_SESSION['paginaEnCurso'] = 'inicioprivado'; //Asigno a la pagina en curso la pagina inicio privado
    header('Location: index.php'); //Redireciono de nuevo a inicio privado
    exit;
}

if(isset($_REQUEST['eliminarcuenta'])){ //Si el usuario pulsa el boton de eliminar cuenta, mando al usuario a la pagina de eliminar cuenta
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'borrarcuenta'; //Asigno a la pagina en curso la pagina de eliminar cuenta
    header('Location: index.php'); //Redireciono de nuevo a eliminar cuenta
    exit;
}

if(isset($_REQUEST['cambiarpassword'])){ //Si el usuario pulsa el boton de cambiar password, mando al usuario a la pagina de cambiar password
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'cambiarpassword'; //Asigno a la pagina en curso la pagina de cambiar password
    header('Location: index.php'); //Redireciono de nuevo a cambiar password
    exit;
}

$aErrores = [
    'descUsuario' => null
];

$entradaOK = true;//Variable de entrada correcta inicializada a true

if(isset($_REQUEST['aceptar'])){ //Si el usuario pulsa el boton de aceptar, mando al usuario a la pagina de inicio privado
    $aErrores['descUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['DescUsuario'], 200, 1, OBLIGATORIO);
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErrores as $campo => $error) {//recorro el array errores
        if ($error != null) {//Compruebo si hay algun error
            $entradaOK = false;//Le doy el valor false a entradaOK
            $_REQUEST[$campo] = '';//Limpio el campo del formulario
        }
    }
}else{ //Si el usuario no le ha dado al boton de aceptar
    $entradaOK = false;
}

if($entradaOK){
    $_SESSION['usuario207DWESLoginLogoutMulticapaPOO'] = UsuarioPDO::modificarUsuario($_SESSION['usuario207DWESLoginLogoutMulticapaPOO'], $_REQUEST['DescUsuario']); //Modifico el usuario en la base de datos
    $_SESSION['paginaEnCurso'] = 'inicioprivado'; //Asigno a la pagina en curso la pagina de inicio privado
    header('Location: index.php'); //Redireciono de nuevo a inicio privado
    exit;
}

$usuarioMiCuenta = $_SESSION['usuario207DWESLoginLogoutMulticapaPOO']->getCodUsuario(); //Variable que contiene el codigo del usuario loggeado
$descripcionMiCuenta = $_SESSION['usuario207DWESLoginLogoutMulticapaPOO']->getDescUsuario(); //Variable que contiene la descripcion del usuario loggeado
$conexionesMiCuenta = $_SESSION['usuario207DWESLoginLogoutMulticapaPOO']->getNumConexiones(); //Variable que contiene el numero total de conexiones del usuario loggeado
$ultimaconexionMiCuenta = $_SESSION['usuario207DWESLoginLogoutMulticapaPOO']->getFechaHoraUltimaConexion(); //Variable que contiene la fecha y hora de la ultima conexion del usuario loggeado
$passwordMiCuenta = $_SESSION['usuario207DWESLoginLogoutMulticapaPOO']->getPassword(); //Variable que contiene la password del usuario loggeado

require_once $vistas['layout']; //Cargo la pagina de miCuenta
?>

