<?php
/**
 * Class DB
 *
 * Fichero con la interfaz DB que contiene el modelo de los metodos de DBPDO
 *
 * PHP version 7.4
 */

/**
 * Interfaz DB
 * 
 * Interfaz que implementaremos en la clase DBPDO
 * 
 * @author Alberto Fernandez Ramirez
 * @package LoginLogout
 * @since 12/01/2022
 * @copyright Copyright (c) 2022, Alberto Fernandez Ramirez
 * @version 1.0 Realizacion de DB
*/
interface DB{
    /**
     * Metodo ejecutarConsulta()
     * 
     * Metodo que ejecuta una consulta, recibe una sentencia SQL y puede recibir parametros
     * 
     * @param string $sentenciaSQL Sentencia SQL para ejecutar
     * @param array|null $parametros Parametros que se le pueden pasar a la sentencia
     */
    public static function ejecutarConsulta($sentenciaSQL, $parametros = null);
}