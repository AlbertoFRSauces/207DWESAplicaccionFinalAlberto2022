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

$aUsuario = [
    'usuarioMiCuenta' => $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getCodUsuario(), //Variable que contiene el codigo del usuario loggeado
    'descripcionMiCuenta' => $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getDescUsuario(), //Variable que contiene la descripcion del usuario loggeado
    'conexionesMiCuenta' => $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getNumConexiones(), //Variable que contiene el numero total de conexiones del usuario loggeado
    'ultimaconexionMiCuenta' => $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getFechaHoraUltimaConexion(), //Variable que contiene la fecha y hora de la ultima conexion del usuario loggeado
    'passwordMiCuenta' => $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getPassword(), //Variable que contiene la password del usuario loggeado
    'perfilMiCuenta' => $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getPerfil(), //Variable que contiene el perfil del usuario loggeado
    'imagenUsuario' => $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getImagenUsuario() //Variable que contiene la imagen del usuario loggeado
];


$aErrores = [
    'descUsuario' => null,
    'imagenUsuario' => null
];

$aRespuestas = [
    'descripcionMiCuenta' => null,
    'imagenUsuario' => null
];

$entradaOK = true;//Variable de entrada correcta inicializada a true

if(isset($_REQUEST['aceptar'])){ //Si el usuario pulsa el boton de aceptar, mando al usuario a la pagina de inicio privado
    $aErrores['descUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['DescUsuario'], 200, 1, OBLIGATORIO); //Validacion del campo descripcion
    $aErrores['imagenUsuario'] = validacionFormularios::comprobarAlfaNumerico($_FILES['imagenUsuario']['name'], 255, 3, 0); //Validacion de la imagen
    
    if($aErrores['imagenUsuario'] == null && !empty($_FILES['imagenUsuario']['name'])){
        $aExtensiones = ['jpg', 'jpeg', 'png']; //Array de extensiones válidas
        $extension = substr($_FILES['imagenUsuario']['name'], strpos($_FILES['imagenUsuario']['name'], '.') + 1); //Se extrae la extensión del nombre del archivo
        //Si la extensión extraída no coincide con ninguna de las del array
        if (!in_array($extension, $aExtensiones)) {
            $aErrores['imagenUsuario'] = "El archivo no tiene una extensión válida. Sólo se admite ".implode(', ', $aExtensiones)."."; //Creación del mensaje de error 
        }
    }
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErrores as $campo => $error) {//recorro el array errores
        if ($error != null) {//Compruebo si hay algun error
            $entradaOK = false;//Le doy el valor false a entradaOK
        }
    }
}else{ //Si el usuario no le ha dado al boton de aceptar
    $entradaOK = false;
}

if($entradaOK){
    $aRespuestas['descripcionMiCuenta'] = $_REQUEST['DescUsuario'];
    
    if(isset($_FILES['imagenUsuario']['name'])){
        $aRespuestas['imagenUsuario'] = base64_encode(file_get_contents($_FILES['imagenUsuario']['tmp_name'])); //Almacenamiento del fichero enviado
    }else{
        $aRespuestas['imagenUsuario'] = $_SESSION['usuario207DWESAplicaccionFinalAlberto']->getImagenUsuario();
    }
    
    $_SESSION['usuario207DWESAplicaccionFinalAlberto'] = UsuarioPDO::modificarUsuario($_SESSION['usuario207DWESAplicaccionFinalAlberto'], $aRespuestas['descripcionMiCuenta'], $aRespuestas['imagenUsuario']); //Modifico el usuario y la imagen en la base de datos
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicioprivado'; //Asigno a la pagina en curso la pagina de inicio privado
    header('Location: index.php'); //Redireciono de nuevo a inicio privado
    exit;
}

require_once $vistas['layout']; //Cargo la pagina de miCuenta
?>

