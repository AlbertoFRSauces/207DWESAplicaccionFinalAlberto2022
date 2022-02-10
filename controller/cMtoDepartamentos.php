<?php
/*
 * Controlador de MtoDepartamentos
 * 
 * Controlador que permite controlar la accion que se realiza cuando se pulse el boton de volver, buscar y mostrar todos los departamentos
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 08/02/2022
 * @version: 1.0 Realizacion de cMtoDepartamentos
 * @copyright: Copyright (c) 2021, Alberto Fernandez Ramirez
 * Controlador de MtoDepartamentos
 */

if(isset($_REQUEST['volverdepartamentos'])){ //Si el usuario pulsa el boton de volver, mando al usuario a la pagina de inicio privado
    $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] = ""; //Si el usuario sale de MtoDepartamentos, elimino el valor que hay guardado del campo de busqueda por descripcion
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina de inicio privado
    header('Location: index.php'); //Redireciono de nuevo al inicio privado
    exit;
}

$aErrores = [ //Array de errores
    'descBuscarDepartamento' => null
];

if (isset($_REQUEST['buscar'])) {
    $entradaOK = true; //Variable de entrada correcta inicializada a true
    $aErrores['descBuscarDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, OPCIONAL); //Valido los datos pasados por teclado de la descripcion del departamento
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErrores as $sCampo => $sError) {//recorro el array errores
        if ($sError != null) { //Si ha habido fallos en el array
            $_REQUEST[$sCampo] = ''; //Limpio el campo del formulario
            $entradaOK = false; //Le doy el valor false a bEntradaOK
        }
    }
}else { //Si el usuario no le ha dado al boton de buscar
    $entradaOK = false;
}

if ($entradaOK) {//Si la entrada ha sido correcta
    $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] = $_REQUEST['descDepartamento']; //Guardo en la session el contenido del campo de buscar departamento por descripcion
}

$aDepartamentosVista = []; //Array para guardar el contenido de un departamento
$oResultadoBuscar = DepartamentoPDO::buscaDepartamentosPorDesc($_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada']??''); //Obtengo los datos del departamento con el metodo buscaDepartamentosPorDesc
if ($oResultadoBuscar){ //Si el resultado es correcto
    foreach($oResultadoBuscar as $aDepartamento){//Recorro el objeto del resultado que contiene un array
        array_push($aDepartamentosVista, [//Hago uso del metodo array push para meter los valores en el array $aDepartamentosVista
            'codDepartamento' => $aDepartamento->getCodDepartamento(), //Guardo en el valor codDepartamento el codigo del departamento
            'descDepartamento' => $aDepartamento->getDescDepartamento(), //Guardo en el valor descDepartamento la descripcion del departamento
            'fechaAlta' => date('d/m/Y H:i:s' , $aDepartamento->getFechaCreacionDepartamento()), //Guardo en el valor fechaAlta la fecha de alta del departamento
            'volumenNegocio' => $aDepartamento->getVolumenDeNegocio(), //Guardo en el valor volumenNegocio el volumen de negocio del departamento
            'fechaBaja' => !empty($aDepartamento->getFechaBajaDepartamento()) ? date('d/m/Y H:i:s', $aDepartamento->getFechaBajaDepartamento()) : '' //Guardo en el valor fechaBaja la fecha de baja del departamento
        ]); 
    }
}else{
    $aErrores['descBuscarDepartamento'] = 'El departamento no existe.'; //Si el departamento no existe muestro un error
}

require_once $vistas['layout']; //Cargo la pagina de MtoDepartamentos
?>

