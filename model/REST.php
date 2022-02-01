<?php

/**
 * Class REST
 *
 * Fichero con la clase REST que contendra funciones de las APIs REST usadas
 *
 * PHP version 7.4
 */

/**
 * Clase REST
 * 
 * Clase que usaremos para hacer los metodos de las APIs
 * 
 * @author Alberto Fernandez Ramirez
 * @package AppFinal
 * @since 27/01/2022
 * @copyright Copyright (c) 2022, Alberto Fernandez Ramirez
 * @version 1.0 Realizacion de REST
 */
class REST {

    /**
     * Metodo conversorMoneda()
     * 
     * Metodo que permite obtener el valor de mi moneda en el de la que le pase como parametro
     * 
     * @param string $sDivisaPrincipal Moneda a convertir
     * @param string $sOtraDivisa Divisa a la que convertir
     * @return float Resultado de la conversion
     */
    public static function conversorMoneda($sDivisaPrincipal, $sOtraDivisa) {
        $iDevolucion = 0; //Inicializo el valor de la devolucion a 0
        $claveAPI = "2fb5f0e8f0ce47116b050ae0"; //La clave generada para poder usar la API
        $resultadoAPI = @file_get_contents("https://v6.exchangerate-api.com/v6/{$claveAPI}/latest/{$sDivisaPrincipal}"); //La respuesta de la api en formato json

        $JSONDecodificado = json_decode($resultadoAPI, true); //Almaceno la informacion decodificada obtenida de la url como un array
        if (isset($JSONDecodificado['result']) == "success") { //Si la respuesta ha sido correcta
            foreach ($JSONDecodificado['conversion_rates'] as $campo => $valor) { //Recorremos el array de la respuesta
                if ($campo == $sOtraDivisa) {
                    $iDevolucion = $valor; //Almaceno el valor correspondiente en la variable de devolucion
                }
            }
        }
        if (isset($JSONDecodificado['result']) == "error") { //Si la respuesta ha sido incorrecta
            return $iDevolucion;
        }

        return $iDevolucion; //Devuelvo el resultado
    }

    /**
     * Metodo provincia()
     * 
     * Metodo que permite obtener el tiempo de una provincia pasandole el codigo de la provincia como parametro
     * 
     * @param int $codProvincia Codigo de la provincia
     * @return \Provincia Objeto provincia con los datos
     */
    public static function provincia($codProvincia) {
        $oProvincia = null; //Inicializo a null el objeto provincia

        $sResultadoRawData = @file_get_contents("https://www.el-tiempo.net/api/json/v2/provincias/{$codProvincia}"); //La respuesta de la api en formato json

        if ($sResultadoRawData) {
            $aJson = json_decode($sResultadoRawData, true); //Decodificamos el json y lo guardamos en un array

            $oProvincia = new Provincia(
                    $aJson['title'],
                    $aJson['ciudades']['0']['idProvince'],
                    $aJson['ciudades']['0']['stateSky']['description'],
                    $aJson['today']['p'],
                    $aJson['ciudades']['0']['temperatures']['max'],
                    $aJson['ciudades']['0']['temperatures']['min']
            );
        }

        return $oProvincia; //Devuelvo el resultado
    }
}
