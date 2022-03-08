<?php

require_once "../config/configDBPDO.php";
require_once "../model/AppError.php";
require_once "../core/libreriaValidacion.php";

$aUsuarios = [];

if (isset($_GET["dni"])) {
    $dni = validacionFormularios::validarDni($_GET["dni"]);  
  
    if ($dni!=" El DNI no es válido.") {
        $aUsuarios = [
            'respuesta' => true,
            'msg' => "El dni es valido"];
        
    } else {
        $aUsuarios = [
            'respuesta' => false,
            'msg' => "El dni no es valido"];
    }
} else {
    $aUsuarios = [
        'respuesta' => false,
        'msg' => "No se han encontrado datos o no tienes acceso a la API"];
}

$myJSON = json_encode($aUsuarios);
echo $myJSON;
?>