<?php
/**
 * buscarDepartamento
 *
 * Fichero que contiene la creacion de la api propia
 *
 * PHP version 7.4
 */

/*
 * REST propio
 * 
 * API REST que dado un codigo de departamento nos devuelve los datos de dicho departamento.
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 07/01/2022
 * @version: 1.0 Realizacion de buscarDepartamento
 * @copyright: Copyright (c) 2022, Alberto Fernandez Ramirez
 */

require_once '../config/configDBPDO.php';
require_once '../model/DB.php';
require_once '../model/DBPDO.php';
require_once '../model/Departamento.php';
require_once '../model/DepartamentoPDO.php';

$aErrores = [ //Creo el array de errores
    'result' => '',
    'mensajeError' => ''
];

if(isset($_REQUEST['codDepartamento'])){
    $dEntradaOK = true; //Inicializo entradaOK a verdadero
    
    $oDepartamento = DepartamentoPDO::buscarDepartamentosPorCod($_REQUEST['codDepartamento']); //Guardo en contenido del departamento en una variable de tipo objeto
    
    if($oDepartamento){
        $aDepartamento = [ //Creo el array con el contenido del departamento obtenido
            'result' => 'success',
            'codDepartamento' => $oDepartamento->getCodDepartamento(),
            'descDepartamento' => $oDepartamento->getDescDepartamento(),
            'fechaCreacionDepartamento' => $oDepartamento->getFechaCreacionDepartamento(),
            'volumenDeNegocio' => $oDepartamento->getVolumenDeNegocio(),
            'fechaBajaDepartamento' => $oDepartamento->getFechaBajaDepartamento()
        ];
    }else{
        $aErrores['result'] = 'unsuccessful'; //Guardo en resultado el valor de incorrecto
        $aErrores['mensajeError'] = 'No existe un departamento con el codigo introducido'; //Guardo en mensaje el error que se ha producido
        $dEntradaOK = false; //Pongo la entrada a falso
    }
}else{
    $aErrores['result'] = 'unsuccessful'; //Guardo en resultado el valor de incorrecto
    $aErrores['mensajeError'] = 'No ha introducido un codigo de departamento'; //Guardo en mensaje el error que se ha producido
    $dEntradaOK = false; //Pongo la entrada a falso
}

if($dEntradaOK){ //Si la entrada es correcta
    echo json_encode($aDepartamento, JSON_PRETTY_PRINT); //Codifico el array en tipo JSON y lo imprimo
}else{ //Si la entrada no es correcta
    echo json_encode($aErrores, JSON_PRETTY_PRINT); //Codifico el array de errores en tipo JSON y lo imprimo
}



