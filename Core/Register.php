<?php

namespace Core;

class Register
{
	private static $objects;

	public static function get($key)
	{
		if (isset(self::$objects[$key]))
		{
			return self::$objects[$key];
		}
	}

	public static function _set($key, $obj) 
	{
		self::$objects[$key] = $obj;
	}

	public static function _unset($key)
	{
		unset(self::$objects[$key]);
	}	
}