<?php

/**
 * Almacenamiento de variables globales del sistema
 * 
 * @author Andrés Javier López <ajavier.lopez@gmail.com>
 * @copyright TuApp.net - GNU Lesser General Public License
 * @date Feb 2012
 * @version 3.2
 * @ingroup Core
 */
 
class Vars
{
	/**
	 * Variables globales del sistema
	 * @var array $vars
	 */
	private static $vars = array();

	/**
	 * Modifica una variable global
	 * @param string $name
	 * @param string $value
	 * @return void
	 */
	
	public static function set( $name, $value )
	{
		self::$vars[$name] = $value;
	}
	
	/**
	 * Obtiene el valor de la variable seleccionada
	 * @param string $name
	 * @return mixed
	 */
	
	public static function get( $name )
	{
		return self::$vars[$name];
   	}	
   	
   	/**
   	 * Devuelve todas las variables globales
   	 * @return array
   	 */
   	
   	public static function getVars()
   	{
   		return self::$vars;
   	}
}

// Fin de archivo