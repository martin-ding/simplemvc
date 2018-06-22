<?php 

namespace Core;

/*单例模式*/

abstract class Singleton
{
    protected static $instance;
    protected static $_flag = false;

    private function __construct()
    {
        /*防止反射*/
        if ( static::$_flag ) {  
            trigger_error('Cloning forbidden.', E_USER_ERROR);
        } else {
            static::$_flag = true;
        }
    }

    /*防止clone*/
    protected final function __clone()
    {
        trigger_error('Cloning forbidden.', E_USER_ERROR);
    }

    /*防止seralize*/
    protected final function __wakeup()
    {
        trigger_error("can not be seralize", E_ERROR);
    }

    /*使用动态加载*/
    public static function getInstance()
    {
        if (! static::$instance instanceof static) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}