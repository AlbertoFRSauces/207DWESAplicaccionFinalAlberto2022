<?php
/*
 * 
 * @package: AppFinal
 * @author: Alberto Fernandez Ramirez
 * @since: 08/02/2022
 * @version: 1.0 Realizacion de cWIP
 * @copyright: Copyright (c) 2021, Alberto Fernandez Ramirez
 * Controlador de ApiRest
 */

if(isset($_REQUEST['volverdepartamentos'])){ //Si el usuario pulsa el boton de volver, mando al usuario a la pagina de inicio publico
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina de inicio publico
    header('Location: index.php'); //Redireciono de nuevo al inicio publico
    exit;
}

$bEntradaOK = true; 
define('OPCIONAL', 0);

$aErrores = [
    'descDepartamento' => null
];

if (isset($_REQUEST['enviar'])) {
    $aErrores['descDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, OPCIONAL); //Valido los datos pasados por teclado de el codigo de provincia
    
    if ($aErrores['descDepartamento'] != null) { //Si ha habido fallos en el array
        $_REQUEST['descDepartamento'] = ""; //Limpio el campo del formulario
        $bEntradaOK = false; //Le doy el valor false a bEntradaOK
    }
}else { //Si el usuario no le ha dado al boton de buscar
    $bEntradaOK = false;
}
if ($bEntradaOK) {//utilizacion de la web service cuando bEntrada=true
    $oResultadoBuscar = DepartamentoPDO::buscaDepartamentosPorDesc($_REQUEST['descDepartamento']); //Obtengo los datos del tiempo de la provincia introducida con el metodo provincia
    
    if ($oResultadoBuscar == null){ //Si el resultado a devolver esta vacio
        $aErrores["descDepartamento"] = "Descripcion no encontrada.";
    }else{
        $codDepartamento = $oResultadoBuscar->getCodDepartamento(); //Obtengo la provincia del Objeto provincia
        $descDepartamento = $oResultadoBuscar->getDescDepartamento();
        $fechaBaja = $oResultadoBuscar->getFechaBajaDepartamento();
        $volumenNegocio = $oResultadoBuscar->getVolumenDeNegocio();
    }
}

require_once $vistas['layout']; //Cargo la pagina de inicio privado
?>

