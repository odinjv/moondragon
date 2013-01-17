<?php

/**
 * @brief Clase núcleo del sistema
 *
 * @author Andrés Javier López <ajavier.lopez@gmail.com>
 * @copyright Klan Estudio (www.klanestudio.com) - GNU Lesser General Public License
 * @ingroup MoonDragon
 *
 */


class MoonDragon
{
	/**
	 * Registro de variables del sistema 
	 * @var array $registry
	 */
	public static $registry = array();

	/**
	 * Corre un objeto ejecutable del framework
	 * @param Runnable $object
	 * @return void
	 * @throws HeadersException
	 * @throws MoonDragonException
	 */
	public static function run(Runnable $object) {
		try {
			$object->run();
				
			if(isset(self::$registry['redirection'])) {
				if(!headers_sent()) {
					header('Location: '.self::$registry['redirection']);
				}
				else {
					throw new HeadersException();
				}
			}
		}
		catch(Status404Exception $e) {
			$e->show404();
		}
	}

	/**
	 * Redirige un proceso en ejecución hacia un nueva url a través de headers
	 * @todo la implementación de esta función puede mejorarse
	 * @param string $url
	 * @return void
	 */
	public static function redirect($url) {
		self::$registry['redirection'] = $url;
	}
}

// Fin de archivo
