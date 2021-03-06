<?php
/**
 * buscarUsuario
 *
 * Fichero que contiene la creacion de la api para buscar usuarios
 *
 * PHP version 7.4
 */

/*
 * API para usar en Ajax
 * 
 * API que dado una descripcion de usuario nos devuelve los datos de dicho usuario.
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 15/02/2022
 * @version: 1.0 Realizacion de buscarUsuario
 * @copyright: Copyright (c) 2022, Alberto Fernandez Ramirez
 */

require_once '../core/libreriaValidacion.php';
require_once '../config/configDBPDO.php';
require_once '../model/DB.php';
require_once '../model/DBPDO.php';
require_once '../model/Usuario.php';
require_once '../model/UsuarioDB.php';
require_once '../model/UsuarioPDO.php';

$entradaOK = true; //Inicializo entradaOK a verdadero

$aErrores = [ //Creo el array de errores
    'result' => '',
    'mensajeError' => ''
];

if(isset($_GET['descUsuario'])){ //Si hay una descripcion de usuario
    $aErrores['mensajeError'] = validacionFormularios::comprobarAlfabetico($_GET['descUsuario'], 255); //Valido el campo que contiene la descripcion del usuario
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErrores as $sCampo => $sError) {//recorro el array errores
        if ($sError != null) { //Si ha habido fallos en el array
            $aErrores['result'] = 'unsuccessful';
            $_GET[$sCampo] = ''; //Limpio el campo del formulario
            $entradaOK = false; //Le doy el valor false a entradaOK
        }
    }
}else{ //Si la entrada no es correcta
    $entradaOK = false; //Pongo la entrada a falso
}

if($entradaOK){ //Si la entrada es correcta
    $oUsuarios = UsuarioPDO::buscaUsuariosPorDesc($_GET['descUsuario']); //Busco la descripcion de usuario
    $aUsuario['usuarios'] = [];
    
    if($oUsuarios){
        foreach ($oUsuarios as $oUsuario) {
            array_push($aUsuario['usuarios'], [//Creo el array con el contenido del usuario obtenido
                'result' => 'success',
                'codUsuario' => $oUsuario->getCodUsuario(),
                'password' => $oUsuario->getPassword(),
                'descUsuario' => $oUsuario->getDescUsuario(),
                'numconexiones' => $oUsuario->getNumConexiones(),
                'fechaHoraUltimaConexion' => $oUsuario->getFechaHoraUltimaConexion(),
                'perfil' => $oUsuario->getPerfil(),
                'imagenUsuario' => $oUsuario->getImagenUsuario()
            ]);
        }
    }else{
        array_push($aUsuario['usuarios'], [//Creo el array con el contenido del usuario obtenido
            'result' => 'unsuccessful', //Guardo en resultado el valor de incorrecto
            'mensajeError' => 'No existe un usuario con esa descripcion' //Guardo en mensaje de error el mensaje del error producido
        ]);
    }
}

if($entradaOK){ //Si la entrada es correcta
    echo json_encode($aUsuario, JSON_PRETTY_PRINT); //Codifico el array en tipo JSON y lo imprimo
}else{ //Si la entrada no es correcta o surge algun error
    echo json_encode($aErrores, JSON_PRETTY_PRINT); //Codifico el array en tipo JSON y lo imprimo
}
