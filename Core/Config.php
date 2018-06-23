<?php

namespace Core;

/*配置文件类*/
class Config implements \ArrayAccess
{
	protected $configs;
	protected $path;

	public function __construct($config_path)
	{
		$this->path =  $config_path; 		
	}

	public function offsetExists ( $offset ) 
	{

	}

	public function offsetGet ( $key )
	{
		if(empty($this->configs[$key]))
        {
            $file_path = $this->path ."/". $key . ".php";
            $config = require $file_path;
            $this->configs[$key] = $config;
        }
        return $this->configs[$key];
	}

	public function offsetSet ( $offset , $value )
	{

	}

	public function offsetUnset ( $offset )
	{

	}
}