<?PHP
/**
 * A Registry pattern used to recieve singleton instance of any object
 *
 * @author Hasan Hameed <hasan.hameed07@gmail.com>
 * @see https://github.com/hasanhameed07/bee-php-registry
 */
class Bee_Registry
{

	/**
	 * _loaded - Loaded objects
	 * @var array
	 * @static
	 */	
	private static $_loaded = array();



	// --- Public static methods ---

	/**
	 * Checks if an object is loaded in registry
	 *
	 * @param string	$name [obj name]
	 * @return boolean
	 */
	public static function has ($name)
	{
		return (array_key_exists($name, self::$_loaded))? 1 : 0 ;
	}


	/**
	 * Recieve an already loaded object from registry.
	 *
	 * @param string	$name [obj name]
	 * @return obj		[only if loaded else throw exception]
	 */
	public static function &get ($name)
	{
		if (self::has($name))
			return self::$_loaded[$name];
		else
			Bee_Exceptiom::throwE('Unable to get '.$name.' object from registry.');
	}


	/**
	 * Stores new object in registry.
	 *
	 * @param obj		&$obj [object]
	 * @param string	$name [optional name for object otherwise object's class name is used]
	 */
	public static function set (&$obj, $name=NULL)
	{
		$name = (is_null($name))? get_class($obj) : $name ;
		self::$_loaded[$name] = $obj;
	}


	/**
	 * Get a single instance of any object
	 *
	 * @param string	$name [class name of object]
	 * @return obj		[singleton instance]
	 */
	public static function getInstance ($name)
	{
		if (self::has($name))
			return self::get($name);

		$obj = new $name();
		self::set($obj, $name);
		return $obj;
	}

} // Bee_Registry end
?>
