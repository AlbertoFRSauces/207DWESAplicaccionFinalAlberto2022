<?php
/*
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 26/01/2022
 * @version: 1.0 Realizacion de cREST
 * @copyright: Copyright (c) 2022, Alberto Fernandez Ramirez
 * Controlador de REST
 */
if(isset($_REQUEST['volver'])){ //Si el usuario pulsa el boton de volver, le mando a la ventana de Inicio privado de nuevo
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'inicioprivado'; //Asigno a la pagina el curso la pagina de inicio privado
    header('Location: index.php'); //Redireciono de nuevo al login
    exit;
}

$aErrores = [ //Array de errores
    'miDivisa' => null,
    'otraDivisa' => null
];

$entradaOK = true; //Variable de entrada correcta inicializada a true
$fDevolucion = 0; //Variable de el resultado

if(isset($_REQUEST['convertir'])){ //Si el usuario pulsa el boton de convertir valido los datos pasados por teclado
    $aErrores['miDivisa'] = validacionFormularios::comprobarAlfabetico($_REQUEST['MiDivisa'], 3, 3, OBLIGATORIO); //Valido los datos pasados por teclado de mi divisa
    $aErrores['otraDivisa'] = validacionFormularios::comprobarAlfabetico($_REQUEST['OtraDivisa'], 3, 3, OBLIGATORIO); //Valido los datos pasados por teclado de pasar a
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErrores as $campo => $error) {//recorro el array errores
        if ($error != null) {//Compruebo si hay algun error
            $entradaOK = false;//Le doy el valor false a entradaOK
            $_REQUEST[$campo] = '';//Limpio el campo del formulario
        }
    }
}else{ //Si el usuario no le ha dado al boton de convertir
    $entradaOK = false;
}

if($entradaOK){ //Si la entrada ha sido correcta
    $fDevolucion = REST::conversorMoneda($_REQUEST['MiDivisa'], $_REQUEST['OtraDivisa']); //Convierto la moneda con el metodo conversorMoneda
}

require_once $vistas['layout']; //Cargo la pagina de REST
?>

