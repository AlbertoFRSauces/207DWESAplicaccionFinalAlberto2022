<?php
/*
 * Controlador de REST
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de volver, infoapirest y los distintos botones de busqueda de cada API REST configurada
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

if(isset($_REQUEST['infoapirest'])){ //Si el usuario pulsa el boton de volver, le mando a la ventana de Inicio privado de nuevo
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Guardo la pagina actual en paginaAnterior para recordarla
    $_SESSION['paginaEnCurso'] = 'infoapirest'; //Asigno a la pagina el curso la pagina de inicio privado
    header('Location: index.php'); //Redireciono de nuevo al login
    exit;
}

//API Conversor de Moneda

$aErrores = [ //Array de errores
    'miDivisa' => null,
    'otraDivisa' => null,
    'errorServidor' => null
];

$entradaOK = true; //Variable de entrada correcta inicializada a true

$iDevolucion = 0; //Variable para almacenar el resultado de la conversion

if(isset($_REQUEST['convertir'])){ //Si el usuario pulsa el boton de convertir valido los datos pasados por teclado
    $aErrores['miDivisa'] = validacionFormularios::comprobarAlfabetico($_REQUEST['miDivisa'], 3, 3, OBLIGATORIO); //Valido los datos pasados por teclado de mi divisa
    $aErrores['otraDivisa'] = validacionFormularios::comprobarAlfabetico($_REQUEST['otraDivisa'], 3, 3, OBLIGATORIO); //Valido los datos pasados por teclado de pasar a
    
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
    $iDevolucion = REST::conversorMoneda($_REQUEST['miDivisa'], $_REQUEST['otraDivisa']); //Convierto la moneda con el metodo conversorMoneda
    
    if($iDevolucion == 0){
        $aErrores['otraDivisa'] = "Las divisas no son correctas"; //Si la devolucion es 0 es que la divisa no existe y no es correcta
    }
}

//API Tiempo de provincia

$bEntradaOK = true; //Variable de entrada correcta inicializada a true

$aErroresTiempo = [ //Array de errores
    'eBuscarInput' => null,
    'eResultado' => null
];

if (isset($_REQUEST['buscar'])) {
    $aErroresTiempo['eBuscarInput'] = validacionFormularios::comprobarEntero($_REQUEST['buscarInput'], 52, 1, OBLIGATORIO); //Valido los datos pasados por teclado de el codigo de provincia

    if ($aErroresTiempo['eBuscarInput'] != null) { //Si ha habido fallos en el array
        $_REQUEST['buscarInput'] = ""; //Limpio el campo del formulario
        $bEntradaOK = false; //Le doy el valor false a bEntradaOK
    }
}else { //Si el usuario no le ha dado al boton de buscar
    $bEntradaOK = false;
}
if ($bEntradaOK) {//utilizacion de la web service cuando bEntrada=true
    $oResultadoProv= REST::provincia($_REQUEST['buscarInput']); //Obtengo los datos del tiempo de la provincia introducida con el metodo provincia
    
    if ($oResultadoProv == null){ //Si el resultado a devolver esta vacio
      $aErroresTiempo["eResultado"] = "Provincia no encontrada.";
    }else{
        $nombreProvincia = $oResultadoProv->getProvincia(); //Obtengo la provincia del Objeto provincia
        $idProvincia = $oResultadoProv->getIdProvincia(); //Obtengo la id del Objeto provincia
        $descripcionProvincia = $oResultadoProv->getDescripcion(); //Obtengo la descripcion del Objeto provincia
        $tiempoProvincia = $oResultadoProv->getTiempo(); //Obtengo el tiempo del Objeto provincia
        $temmaximaProvincia = $oResultadoProv->getTemperaturaMax(); //Obtengo la temperatura maxima del Objeto provincia
        $temminimaProvincia = $oResultadoProv->getTemperaturaMin(); //Obtengo la temperatura minima del Objeto provincia
    }
}

//API Buscar departamento Propio

$dEntradaOK = true; //Variable de entrada correcta inicializada a true

$aErroresDepartamento = [ //Array de errores
    'eBuscarDepartamento' => null,
    'eResultado' => null
];

if (isset($_REQUEST['buscarDepartamento'])) {
    $aErroresDepartamento['eBuscarDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, OBLIGATORIO); //Valido los datos pasados por teclado de codigo departamento
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErroresDepartamento as $campo => $error) {//recorro el array errores
        if ($error != null) {//Compruebo si hay algun error
            $dEntradaOK = false;//Le doy el valor false a entradaOK
            $_REQUEST[$campo] = '';//Limpio el campo del formulario
        }
    }
}else{ //Si el usuario no le ha dado al boton de buscar
    $dEntradaOK = false;
}

if($dEntradaOK){
    $oResultadoDep = REST::buscarDepartamento($_REQUEST['codDepartamento']);
    if(is_object($oResultadoDep)){
        $aDepartamento = [
            'codDepartamento' => $oResultadoDep->getCodDepartamento(),
            'descDepartamento' => $oResultadoDep->getDescDepartamento(),
            'fechaCreacionDepartamento' => $oResultadoDep->getFechaCreacionDepartamento(),
            'volumenDeNegocio' => $oResultadoDep->getVolumenDeNegocio(),
            'fechaBajaDepartamento' => $oResultadoDep->getFechaBajaDepartamento()
        ];
    }else{
        $aErroresDepartamento['eResultado'] = $oResultadoDep;
    }
}

//API Buscar departamento Ajeno


$dAjenoEntradaOK = true; //Variable de entrada correcta inicializada a true

$aErroresDepartamentoAjeno = [ //Array de errores
    'eBuscarDepartamento' => null,
    'eResultado' => null
];

if (isset($_REQUEST['buscarDepartamentoAjeno'])) {
    $aErroresDepartamentoAjeno['eBuscarDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamentoAjeno'], 3, 3, OBLIGATORIO); //Valido los datos pasados por teclado de codigo departamento
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErroresDepartamentoAjeno as $campo => $error) {//recorro el array errores
        if ($error != null) {//Compruebo si hay algun error
            $dAjenoEntradaOK = false;//Le doy el valor false a entradaOK
            $_REQUEST[$campo] = '';//Limpio el campo del formulario
        }
    }
}else{ //Si el usuario no le ha dado al boton de buscar
    $dAjenoEntradaOK = false;
}

if($dAjenoEntradaOK){
    $oResultadoDepAjeno = REST::buscarDepartamentoAjeno($_REQUEST['codDepartamentoAjeno']);
    if(is_object($oResultadoDepAjeno)){
        $aDepartamentoAjeno = [
            'codDepartamento' => $oResultadoDepAjeno->getCodDepartamento(),
            'descDepartamento' => $oResultadoDepAjeno->getDescDepartamento(),
            'fechaCreacionDepartamento' => $oResultadoDepAjeno->getFechaCreacionDepartamento(),
            'volumenDeNegocio' => $oResultadoDepAjeno->getVolumenDeNegocio(),
            'fechaBajaDepartamento' => $oResultadoDepAjeno->getFechaBajaDepartamento()
        ];
    }else{
        $aErroresDepartamentoAjeno['eResultado'] = $oResultadoDepAjeno;
    }
}

require_once $vistas['layout']; //Cargo la pagina de REST
?>

