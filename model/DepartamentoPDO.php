<?php
/**
 * Class DepartamentoPDO
 *
 * Fichero con la clase DepartamentoPDO que nos servira para hacer consultas sobre el departamento a la base de datos
 *
 * PHP version 7.4
 */

/**
 * Clase DepartamentoPDO
 * 
 * Clase que usaremos para hacer consultas a la base de datos de departamentos
 * 
 * @author Alberto Fernandez Ramirez
 * @package AppFinal
 * @since 31/01/2022
 * @copyright Copyright (c) 2021, Alberto Fernandez Ramirez
 * @version 1.0 Realizacion de DepartamentoPDO
*/
class DepartamentoPDO {
    /**
     * Metodo buscarDepartamentosPorCod
     * 
     * Metodo que nos sirve para buscar un departamento mediante el codigo del departamento en la base de datos
     * 
     * @param string $codDepartamento Codigo del departamento
     * @return boolean|\Departamento Si existe, un objeto con el contenido del departamento, si no existe false
     */
    public static function buscarDepartamentosPorCod($codDepartamento){
        //Consulta SQL para validar si el codigo de departamento existe
        $consultaBuscarDepartamento = <<<CONSULTA
            SELECT * FROM T02_Departamento WHERE T02_CodDepartamento='{$codDepartamento}';
        CONSULTA;
        
        $oResultado = DBPDO::ejecutarConsulta($consultaBuscarDepartamento);
        $oResultado = $oResultado->fetchObject();
                
        if($oResultado){
            return new Departamento(
                $oResultado->T02_CodDepartamento,
                $oResultado->T02_DescDepartamento,
                $oResultado->T02_FechaCreacionDepartamento,
                $oResultado->T02_VolumenDeNegocio
            );
        }else{
            return false;
        }
    }
    public static function buscaDepartamentosPorDesc($descDepartamento){
        //Consulta SQL para validar si la descripcion del departamento existe
        $consultaBuscarDepartamentoDesc = <<<CONSULTA
            SELECT * FROM T02_Departamento WHERE T02_DescDepartamento='{$descDepartamento}';
        CONSULTA;
        
        $oResultado = DBPDO::ejecutarConsulta($consultaBuscarDepartamentoDesc);
        $oResultado = $oResultado->fetchObject();
                
        if($oResultado){
            return new Departamento(
                $oResultado->T02_CodDepartamento,
                $oResultado->T02_DescDepartamento,
                $oResultado->T02_FechaCreacionDepartamento,
                $oResultado->T02_VolumenDeNegocio
            );
        }else{
            return false;
        }
    }
    public static function altaDepartamentos(){
        
    }
    public static function bajaFisicaDepartamento(){
        
    }
    public static function bajaLogicaDepartamento(){
        
    }
    public static function modificaDepartamento(){
        
    }
    public static function rehabilitaDepartamento(){
        
    }
    public static function validaCodNoExiste(){
        
    }
}
