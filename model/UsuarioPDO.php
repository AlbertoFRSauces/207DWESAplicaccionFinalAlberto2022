<?php
/**
 * Class UsuarioPDO
 *
 * Fichero con la clase UsuarioPDO que nos servira para hacer consultas sobre el usuario a la base de datos
 *
 * PHP version 7.4
 */

/**
 * Clase UsuarioPDO
 * 
 * Clase que usaremos para hacer consultas a la base de datos de usuarios
 * 
 * @author Alberto Fernandez Ramirez
 * @package AppFinal
 * @since 21/12/2021
 * @copyright Copyright (c) 2021, Alberto Fernandez Ramirez
 * @version 1.0 Realizacion de UsuarioPDO
*/
class UsuarioPDO implements UsuarioDB{
    /**
     * Metodo validarUsuario()
     * 
     * Metodo que valida si el usuario existe en la base de datos.
     * 
     * @param string $codUsuario Codigo del usuario a validar
     * @param string $password Password del usuario a validar
     * @return \Usuario|null Devuelvo el objeto usuario con todo el contenido si existe en la base de datos,
     * se actualizaran las conexiones sumando una
     */
    public static function validarUsuario($codUsuario, $password){
        $oUsuario = null; // inicializo la variable a null, que tendrá el objeto de clase usuario si existe el usuario
        
        //Consulta SQL para comprobar si existe el usuario
        $consulta = <<<CONSULTA
            SELECT * FROM T01_Usuario 
            WHERE T01_CodUsuario='{$codUsuario}' 
            AND T01_Password=SHA2("{$codUsuario}{$password}", 256); 
        CONSULTA;
        
        $resultado = DBPDO::ejecutarConsulta($consulta); //Ejecuto la consulta
        
        if($resultado->rowCount()>0){ // si la consulta me devuleve algun resultado es que existe el usuario
            $oUsuario = $resultado->fetchObject(); // Guardo en la variable el resultado de la consulta en forma de objeto
            
            if($oUsuario){ //Instancio un nuevo objeto usuario con todos sus datos
                $oUsuario = new Usuario($oUsuario->T01_CodUsuario, $oUsuario->T01_Password, $oUsuario->T01_DescUsuario, $oUsuario->T01_NumConexiones, $oUsuario->T01_FechaHoraUltimaConexion, $oUsuario->T01_FechaHoraUltimaConexionAnterior, $oUsuario->T01_Perfil, $oUsuario->T01_ImagenUsuario);
            }
        }
        return $oUsuario;
    }
    
    /**
     * Metodo registrarUltimaConexion()
     * 
     * Metodo que permite registrar la ultima conexion que ha realizado el usuario y añadir una nueva
     * 
     * @param Object $oUsuario Contenido del objeto usuario
     * @return PDOStatement Devuelve el resultado de la consulta
     */
    public static function registrarUltimaConexion($oUsuario) {
        $oUsuario->setNumConexiones($oUsuario->getNumConexiones()+1);
        $oUsuario->setFechaHoraUltimaConexionAnterior($oUsuario->getFechaHoraUltimaConexion());
        $oUsuario->setFechaHoraUltimaConexion(time());
        
        //Consulta SQL para actualizar la ultima conexion del usuario y las conexiones
        $consultaActualizacionFechaUltimaConexion = <<<CONSULTA
            UPDATE T01_Usuario 
            SET T01_NumConexiones=T01_NumConexiones+1, T01_FechaHoraUltimaConexion=unix_timestamp() 
            WHERE T01_CodUsuario='{$oUsuario->getCodUsuario()}';
        CONSULTA;
            
        DBPDO::ejecutarConsulta($consultaActualizacionFechaUltimaConexion);
        
        return $oUsuario;
    }
    /**
     * Metodo altaUsuario()
     * 
     * Metodo que permite dar de alta un usuario nuevo en la base de datos
     * 
     * @param string $codUsuario El codigo del usuario
     * @param string $password La password del usuario
     * @param string $descUsuario La descripcion del usuario
     * @return boolean|\Usuario Devuelve un usuario nuevo si se ha podido crear, de lo contrario devuelve un boolean que sera false
     */
    public static function altaUsuario($codUsuario, $password, $descUsuario){
        //Consulta SQL para dar de alta un nuevo usuario
        $consultaCrearUsuario = <<<CONSULTA
            INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, T01_FechaHoraUltimaConexion) VALUES ("{$codUsuario}", SHA2("{$codUsuario}{$password}", 256), "{$descUsuario}", 1, UNIX_TIMESTAMP());
        CONSULTA;
        
        if(DBPDO::ejecutarConsulta($consultaCrearUsuario)){
            return new Usuario($codUsuario, $password, $descUsuario, 1, time(), null, 'usuario', null);
        }else{
            return false;
        }
    }
    /**
     * Metodo validarCodNoExiste()
     * 
     * Metodo que nos permite si el codigo de un usuario existe en la base de datos
     * 
     * @param string $codUsuario El codigo del usuario
     * @return Un objeto con el primer resultado de la consulta ejecutada
     */
    public static function validarCodNoExiste($codUsuario){
        //Consulta SQL para validar si el codigo de usuario existe
        $consultaExisteUsuario = <<<CONSULTA
            SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario='{$codUsuario}';
        CONSULTA;
        return DBPDO::ejecutarConsulta($consultaExisteUsuario)->fetchObject();
    }
    /**
     * Metodo modificarUsuario()
     * 
     * Metodo que nos permite modificar la descripcion de un usuario existente en la base de datos
     * 
     * @param object $oUsuario Objeto usuario
     * @param string $descUsuario La nueva descripcion
     * @return boolean|object Un objeto usuario si el usuario existe y se puede cambiar, de lo contrario un boolean a false
     */
    public static function modificarUsuario($oUsuario, $descUsuario, $imagenUsuario = ''){
        $oUsuario->setDescUsuario($descUsuario);
        $oUsuario->setImagenUsuario($imagenUsuario);

        //Consulta SQL para modificar la descripcion de un usuario
        $consultaModificarUsuario = <<<CONSULTA
            UPDATE T01_Usuario SET T01_DescUsuario="{$descUsuario}", T01_ImagenUsuario="{$imagenUsuario}" WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
        CONSULTA;
            
        if(DBPDO::ejecutarConsulta($consultaModificarUsuario)){
            return $oUsuario;
        }else{
            return false;
        }
    }
    /**
     * Metodo cambiarPassword()
     * 
     * Metodo que nos permite cambiar la password anterior por una nueva
     * 
     * @param object $oUsuario Objeto usuario
     * @param string $password La password nueva
     * @return boolean Un objeto usuario si el usuario existe y se puede cambiar la password, de lo contrario un boolean a false
     */
    public static function cambiarPassword($oUsuario, $password){
        //Consulta SQL para modificar la password de un usuario
        $consultaModificarPassword = <<<CONSULTA
            UPDATE T01_Usuario SET T01_Password=SHA2("{$oUsuario->getCodUsuario()}{$password}", 256) WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
        CONSULTA;
            
        $oUsuario->setPassword($password);
        
        if(DBPDO::ejecutarConsulta($consultaModificarPassword)){
            return $oUsuario;
        }else{
            return false;
        }
    }
    /**
     * Metodo borrarUsuario()
     * 
     * Metodo que nos permite eliminar un usuario
     * 
     * @param object $oUsuario Objeto usuario
     * @return PDOStatement El resultado de la consulta ejecutada
     */
    public static function borrarUsuario($oUsuario){
        //Consulta SQL para borrar el usuario
        $consultaEliminarUsuario = <<<CONSULTA
            DELETE FROM T01_Usuario WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
        CONSULTA;
        
        return DBPDO::ejecutarConsulta($consultaEliminarUsuario);
    }
    /**
     * Metodo buscaUsuariosPorDesc
     * 
     * Metodo que nos sirve para buscar un usuario mediante la descripcion del usuario en la base de datos
     * 
     * @param string $descUsuario Descripcion del usuario
     * @return boolean|\Usuario Si no ha sido correcta devuelvo false, de lo contrario devuelvo un array con el usuario encontrado
     */
    public static function buscaUsuariosPorDesc($descUsuario){
        $aRespuesta = [];
        //Consulta SQL para buscar el usuario con limite de 3 usuarios
        $consultaBuscarUsuarioPorDesc = <<<CONSULTA
            SELECT * FROM T01_Usuario WHERE T01_DescUsuario LIKE '%{$descUsuario}%' LIMIT 18;
        CONSULTA;
        
        $resultadoConsulta = DBPDO::ejecutarConsulta($consultaBuscarUsuarioPorDesc); //Ejecuto la consulta y guardo el resultado en una variable
        $aUsuario = $resultadoConsulta->fetchAll(); //Guardo en un array el conjunto de resultados del objeto resultado
        
        if($aUsuario){ //Si el array tiene valores, lo recorro y creo el objeto usuario
            foreach($aUsuario as $oUsuario){
                $aRespuesta[$oUsuario['T01_DescUsuario']] = new Usuario(
                    $oUsuario['T01_CodUsuario'], 
                    $oUsuario['T01_Password'], 
                    $oUsuario['T01_DescUsuario'], 
                    $oUsuario['T01_NumConexiones'], 
                    $oUsuario['T01_FechaHoraUltimaConexion'], 
                    $oUsuario['T01_FechaHoraUltimaConexion'], 
                    $oUsuario['T01_Perfil'], 
                    $oUsuario['T01_ImagenUsuario']
                );
            }
            return $aRespuesta; //Devuelvo el nuevo usuario
        }else{
            return false; //Devuelvo false
        }
    }
}
?>