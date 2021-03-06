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
        
        $resultadoConsulta = DBPDO::ejecutarConsulta($consultaBuscarDepartamento);
        $oResultado = $resultadoConsulta->fetchObject();
                
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
    /**
     * Metodo buscaDepartamentosPorEstado()
     * 
     * Metodo que nos sirve para buscar un departamento mediante la descripcion del departamento en la base de datos y filtrar su busqueda por todos, altas o bajas
     * 
     * @param string $descDepartamento Descripcion del departamento
     * @param int $sEstado Estado del filtrado de la busqueda por altas o bajas
     * @param int $iPagina Numero de pagina que ha solicitado el usuario
     * @return boolean|\Departamento Si no ha sido correcta la consulta devuelvo false, si ha sido correcta devuelvo un nuevo Departamento
     */
    public static function buscaDepartamentosPorEstado($descDepartamento = '', $sEstado = 0, $iPagina = 0){
        $iPagina = $iPagina*3; //Variable para obtener el resultado cada vez que se pasa una pagina y hay que hacer la consulta
        switch ($sEstado){
            case 0:
                $sEstado = '';
                break;
            case 1: 
                $sEstado = 'AND T02_FechaBajaDepartamento IS NULL';
                break;
            case 2:
                $sEstado = 'AND T02_FechaBajaDepartamento IS NOT NULL';
                break;
        }
        
        $aRespuesta = [];
        //Consulta SQL para validar si la descripcion del departamento existe, filtrar por estado, y comprobar el numero de pagina
        $consultaBuscarDepartamentoDesc = <<<CONSULTA
            SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$descDepartamento}%' {$sEstado} LIMIT {$iPagina}, 3;
        CONSULTA;
        
        $oResultado = DBPDO::ejecutarConsulta($consultaBuscarDepartamentoDesc); //Realizo la consulta con la consulta
        $aDepartamentos = $oResultado->fetchAll(); //Guardo en un array el conjunto de resultados del objeto resultado
                
        if($aDepartamentos){ //Si el array no esta vacio, lo recorro y creo un nuevo departamento
            foreach ($aDepartamentos as $oDepartamento) {
                $aRespuesta[$oDepartamento['T02_CodDepartamento']] = new Departamento(
                    $oDepartamento['T02_CodDepartamento'],
                    $oDepartamento['T02_DescDepartamento'],
                    $oDepartamento['T02_FechaCreacionDepartamento'],
                    $oDepartamento['T02_VolumenDeNegocio'],
                    $oDepartamento['T02_FechaBajaDepartamento']
                );
            }
            return $aRespuesta; //Devuelvo el departamento
        }else{
            return false; //Devuelvo false
        }
    }
    /**
     * Metodo buscaDepartamentosTotales()
     * 
     * Metodo que permite devolver el total de departamentos que existen en la base de datos
     * 
     * @return int El numero total de departamentos
     */
    public static function buscaDepartamentosTotales($sBusqueda = '', $sEstado = 0){
        switch ($sEstado){
            case 0:
                $sEstado = '';
                break;
            case 1: 
                $sEstado = 'AND T02_FechaBajaDepartamento IS NULL';
                break;
            case 2:
                $sEstado = 'AND T02_FechaBajaDepartamento IS NOT NULL';
                break;
        }
        //Consulta SQL para obtener el total de departamentos que hay en la base de datos
        $consultaBuscarDepartamentoTotales = <<<CONSULTA
            SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$sBusqueda}%' {$sEstado};
        CONSULTA;
        
        $resultadoConsulta = DBPDO::ejecutarConsulta($consultaBuscarDepartamentoTotales); //Ejecuto la consulta
        $iDepartamentos = $resultadoConsulta->rowCount(); //Cuento el total de departamentos que tiene la consulta
        
        return $iDepartamentos; //Devuelvo el total de departamentos
    }
    /**
     * Metodo altaDepartamento()
     * 
     * Metodo que permite dar de alta un nuevo departamento en la base de datos
     * 
     * @param string $codDepartamento codigo del departamento
     * @param string $descDepartamento descripcion del departamento
     * @param float $volumenNegocio volumen de negocio del departamento
     */
    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenNegocio){
        $fechaCreacionDepartamento = time(); //Variable con la fecha actual en formato int
        //Consulta SQL para dar de alta el nuevo departamento en la base de datos
        $consultaAltaDepartamento = <<<CONSULTA
            INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio) 
            VALUES ('{$codDepartamento}','{$descDepartamento}',{$fechaCreacionDepartamento},{$volumenNegocio});
        CONSULTA;
            
        $resultadoConsulta = DBPDO::ejecutarConsulta($consultaAltaDepartamento); //Ejecuto la consulta
    }
    /**
     * Metodo validaCodNoExiste()
     * 
     * Metodo que permite validar si existe un codigo de departamento en la base de datos
     * 
     * @param string $codDepartamento codigo del departamento
     * @return object Si el codigo de departamento existe devuelve un objeto
     */
    public static function validaCodNoExiste($codDepartamento){
        //Consulta SQL para comprobar si existe el codigo del departamento en la base de datos
        $consultaValidarCodDepartamento = <<<CONSULTA
            SELECT * FROM T02_Departamento WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;
        
        return DBPDO::ejecutarConsulta($consultaValidarCodDepartamento)->fetchObject(); //Ejecuto la consulta y devuelve un objeto si existe el codigo de departamento
    }
    /**
     * Metodo bajaFisicaDepartamento()
     * 
     * Metodo que permite eliminar un departamento de la base de datos
     * 
     * @param string $codDepartamento codigo del departamento
     * @return PDOStatment El resultado de la consulta
     */
    public static function bajaFisicaDepartamento($codDepartamento){
        //Consulta SQL para eliminar un departamento de la base de datos
        $consultaEliminarCodDepartamento = <<<CONSULTA
            DELETE FROM T02_Departamento WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;
            
        return DBPDO::ejecutarConsulta($consultaEliminarCodDepartamento); //Ejecuto y devuelvo el resultado de la consulta
    }
    /**
     * Metodo bajaLogicaDepartamento()
     * 
     * Metodo que permite dar de baja un departamento de la base de datos
     * 
     * @param string $codDepartamento codigo del departamento
     * @return PDOStatment El resultado de la consulta
     */
    public static function bajaLogicaDepartamento($codDepartamento){
        //Consulta SQL para dar de baja un departamento de la base de datos
        $consultaBajaCodDepartamento = <<<CONSULTA
            UPDATE T02_Departamento SET T02_FechaBajaDepartamento = UNIX_TIMESTAMP()
            WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;
            
        return DBPDO::ejecutarConsulta($consultaBajaCodDepartamento); //Ejecuto y devuelvo el resultado de la consulta
    }
    /**
     * Metodo modificaDepartamento()
     * 
     * Metodo que permite modificar un departamento en la base de datos
     * 
     * @param string $codDepartamento codigo del departamento
     * @param string $descDepartamento nueva descripcion del departamento
     * @param float $volumenNegocio nuevo volumen del negocio
     * @return PDOStatment El resultado de la consulta
     */
    public static function modificaDepartamento($codDepartamento, $descDepartamento, $volumenNegocio){
        //Consulta SQL para actualizar la descripcion del departamento y el volumen de negocio
        $consultaModificarDepartamento = <<<CONSULTA
            UPDATE T02_Departamento SET T02_DescDepartamento = '{$descDepartamento}', 
            T02_VolumenDeNegocio = {$volumenNegocio}
            WHERE T02_CodDepartamento = '{$codDepartamento}';
        CONSULTA;
            
        return DBPDO::ejecutarConsulta($consultaModificarDepartamento); //Ejecuto y devuelvo el resultado de la consulta    
    }
}
