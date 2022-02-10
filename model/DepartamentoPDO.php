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
    /**
     * Metodo buscarDepartamentosPorDesc()
     * 
     * Metodo que nos sirve para buscar un departamento mediante la descripcion del departamento en la base de datos
     * 
     * @param string $descDepartamento Descripcion del departamento
     * @return boolean|\Departamento Si no ha sido correcta la consulta devuelvo false, si ha sido correcta devuelvo un nuevo Departamento
     */
    public static function buscaDepartamentosPorDesc($descDepartamento = ''){
        $aRespuesta = [];
        //Consulta SQL para validar si la descripcion del departamento existe
        $consultaBuscarDepartamentoDesc = <<<CONSULTA
            SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$descDepartamento}%';
        CONSULTA;
        
        $oResultado = DBPDO::ejecutarConsulta($consultaBuscarDepartamentoDesc);
        $aDepartamentos = $oResultado->fetchAll();
                
        if($aDepartamentos){
            foreach ($aDepartamentos as $oDepartamento) {
                $aRespuesta[$oDepartamento['T02_CodDepartamento']] = new Departamento(
                    $oDepartamento['T02_CodDepartamento'],
                    $oDepartamento['T02_DescDepartamento'],
                    $oDepartamento['T02_FechaCreacionDepartamento'],
                        $oDepartamento['T02_VolumenDeNegocio'],
                    $oDepartamento['T02_FechaBajaDepartamento']
                );
            }
            return $aRespuesta;
        }else{
            return false;
        }
    }
}
