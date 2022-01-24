<?php
/**
 * Class UsuarioDB
 *
 * Fichero con la interfaz usuarioDB que contiene el modelo de los metodos de UsuarioPDO
 *
 * PHP version 7.4
 */

/**
 * Interfaz UsuarioDB
 * 
 * Interfaz que implementaremos en la clase UsuarioPDO
 * 
 * @author Alberto Fernandez Ramirez
 * @package LoginLogout
 * @since 12/01/2022
 * @copyright Copyright (c) 2022, Alberto Fernandez Ramirez
 * @version 1.0 Realizacion de UsuarioDB
*/
interface UsuarioDB{
    /**
     * Metodo validarUsuario()
     * 
     * Validar datos del usuario en la base de datos
     * 
     * @param string $codUsuario Codigo del usuario a validar
     * @param string $password Password del usuario a validar
     */
    public static function validarUsuario($codUsuario, $password);
}
