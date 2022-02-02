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
    private $provincia;
    private $idProvincia;
    private $descripcion;
    private $tiempo;
    private $temperaturaMax;
    private $temperaturaMin;

    function __construct($provincia, $idProvincia, $descripcion, $tiempo, $temperaturaMax, $temperaturaMin) {
        $this->provincia = $provincia;
        $this->idProvincia = $idProvincia;
        $this->descripcion = $descripcion;
        $this->tiempo = $tiempo;
        $this->temperaturaMax = $temperaturaMax;
        $this->temperaturaMin = $temperaturaMin;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getIdProvincia() {
        return $this->idProvincia;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function getTemperaturaMax() {
        return $this->temperaturaMax;
    }

    function getTemperaturaMin() {
        return $this->temperaturaMin;
    }

}
