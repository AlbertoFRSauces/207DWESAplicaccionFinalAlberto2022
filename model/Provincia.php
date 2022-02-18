<?php
/**
 * Class Provincia
 *
 * Fichero con la clase Provincia que nos servira para crear un objeto Provincia
 *
 * PHP version 7.4
 */

/**
 * Clase Provincia
 * 
 * Clase que usaremos para crear un objeto Provincia
 * 
 * @author Alberto Fernandez Ramirez
 * @package AppFinal
 * @since 31/01/2022
 * @copyright Copyright (c) 2022, Alberto Fernandez Ramirez
 * @version 1.0 Realizacion de Provincia
 */
class Provincia{
    /**
     * Nombre de la provincia
     * 
     * @var string
     */
    private $provincia;
    /**
     * Id de la provincia
     * 
     * @var int 
     */
    private $idProvincia;
    /**
     * Descripcion de la provincia
     * 
     * @var string 
     */
    private $descripcion;
    /**
     * Tiempo de la provincia
     * 
     * @var string 
     */
    private $tiempo;
    /**
     * Temperatura maxima de la provincia
     * 
     * @var int
     */
    private $temperaturaMax;
    /**
     * Temperatura maxima de la provincia
     * 
     * @var int
     */
    private $temperaturaMin;

    /**
     * Metodo magico __construct()
     * 
     * Metodo constructor de la clase Provincia
     * 
     * @param string $provincia
     * @param int $idProvincia
     * @param string $descripcion
     * @param string $tiempo
     * @param int $temperaturaMax
     * @param int $temperaturaMin
     */
    function __construct($provincia, $idProvincia, $descripcion, $tiempo, $temperaturaMax, $temperaturaMin) {
        $this->provincia = $provincia;
        $this->idProvincia = $idProvincia;
        $this->descripcion = $descripcion;
        $this->tiempo = $tiempo;
        $this->temperaturaMax = $temperaturaMax;
        $this->temperaturaMin = $temperaturaMin;
    }
    /**
     * Metodo getProvincia()
     * 
     * Metodo get que devuelve el nombre de la provincia
     * 
     * @return string nombre de la provincia
     */
    function getProvincia() {
        return $this->provincia;
    }
    /**
     * Metodo getIdProvincia()
     * 
     * Metodo get que devuelve el id de la provincia
     * 
     * @return int id de la provincia
     */
    function getIdProvincia() {
        return $this->idProvincia;
    }
    /**
     * Metodo getDescripcion()
     * 
     * Metodo get que devuelve la descripcion de la provincia
     * 
     * @return string descripcion de la provincia
     */
    function getDescripcion() {
        return $this->descripcion;
    }
    /**
     * Metodo getTiempo()
     * 
     * Metodo get que devuelve el tiempo de la provincia
     * 
     * @return string tiempo de la provincia
     */
    function getTiempo() {
        return $this->tiempo;
    }
    /**
     * Metodo getTemperaturaMax()
     * 
     * Metodo get que devuelve la temperatura maxima de la provincia
     * 
     * @return int temperatura maxima de la provincia
     */
    function getTemperaturaMax() {
        return $this->temperaturaMax;
    }
    /**
     * Metodo getTemperaturaMin()
     * 
     * Metodo get que devuelve la temperatura minima de la provincia
     * 
     * @return int temperatura minima de la provincia
     */
    function getTemperaturaMin() {
        return $this->temperaturaMin;
    }
}
