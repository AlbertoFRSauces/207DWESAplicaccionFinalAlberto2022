<?php
    /**
     * configAPP
     *
     * Fichero con la configuracion de la aplicacion configAPP
     *
     * PHP version 7.4
     */

    /**
     * configAPP
     * 
     * Fichero que usaremos para configurar la aplicacion configAPP
     * 
     * @author Alberto Fernandez Ramirez
     * @package AppFinal
     * @since 13/01/2022
     * @copyright Copyright (c) 2022, Alberto Fernandez Ramirez
     * @version 1.0 Realizacion de configAPP
    */
    require_once 'core/libreriaValidacion.php';

    require_once 'model/DB.php';
    require_once 'model/UsuarioDB.php';
    require_once 'model/Usuario.php';
    require_once 'model/UsuarioPDO.php';
    require_once 'model/DBPDO.php';
    require_once 'model/AppError.php';
    require_once 'model/REST.php';
    require_once 'model/Provincia.php';
    require_once 'model/Departamento.php';
    require_once 'model/DepartamentoPDO.php';
    
    define("OBLIGATORIO", 1);
    define("OPCIONAL", 0);
    
    $controladores = [
        "login" => "controller/cLogin.php",
        "iniciopublico" => "controller/cInicioPublico.php",
        "inicioprivado" => "controller/cInicioPrivado.php",
        "wip" => "controller/cWIP.php",
        "error" => "controller/cError.php",
        "detalle" => "controller/cDetalle.php",
        "registro" => "controller/cRegistro.php",
        "micuenta" => "controller/cMiCuenta.php",
        "cambiarpassword" => "controller/cCambiarPassword.php",
        "borrarcuenta" => "controller/cBorrarCuenta.php",
        "rest" => "controller/cREST.php",
        "tecnologias" => "controller/cTecnologias.php",
        "altadepartamento" => "controller/cAltaDepartamento.php",
        "eliminardepartamento" => "controller/cEliminarDepartamento.php",
        "mtodepartamentos" => "controller/cMtoDepartamentos.php",
        "consultarmodificardepartamento" => "controller/cConsultarModificarDepartamento.php",
        "infoapirest" => "controller/cInfoApiRest.php"
    ];
    $vistas = [
        "layout" => "view/layout.php",
        "login" => "view/vLogin.php",
        "iniciopublico" => "view/vInicioPublico.php",
        "inicioprivado" => "view/vInicioPrivado.php",
        "wip" => "view/vWIP.php",
        "error" => "view/vError.php",
        "detalle" => "view/vDetalle.php",
        "registro" => "view/vRegistro.php",
        "micuenta" => "view/vMiCuenta.php",
        "cambiarpassword" => "view/vCambiarPassword.php",
        "borrarcuenta" => "view/vBorrarCuenta.php",
        "rest" => "view/vREST.php",
        "tecnologias" => "view/vTecnologias.php",
        "altadepartamento" => "view/vAltaDepartamento.php",
        "eliminardepartamento" => "view/vEliminarDepartamento.php",
        "mtodepartamentos" => "view/vMtoDepartamentos.php",
        "consultarmodificardepartamento" => "view/vConsultarModificarDepartamento.php",
        "infoapirest" => "view/vInfoApiRest.php"
    ]
?>