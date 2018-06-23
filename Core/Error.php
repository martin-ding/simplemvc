<?php

namespace Core;

class Error
{
	/**
	* 这个是error 转换成异常的函数
	*/
	public static function error_handler( $errno ,  $errstr , $errfile , $errline)
	{
		if(error_reporting() !== 0)
		{
			throw new \ErrorException( $errstr , 0, $errno , $errfile, $errline); 
		}
	}

	/**
	* 这个是自定义用来处理一行的handler，就不必项像原生的PHP那样一大段东西直接输出想要的内容
	*/
	public static function exception_handler($exception)
	{
		echo "<h1>Fata Error</h1>";
		echo "<p>Uncaught Exception :". get_class($exception) ."</p>";
		echo "<p>Message: ".$exception->getMessage()."</p>";
		echo "<p>Stack Trace : <pre>".$exception->getTraceAsString()."</pre></p>";
		echo "<p>Thrown in ".$exception->getFile()." on line ".$exception->getLine()."</p>";
	}

}