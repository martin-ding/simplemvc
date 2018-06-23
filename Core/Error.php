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
		$code = $exception->getCode();
		if($code != 404) {
			$code = 500;
		}
		http_response_code($code);

		if (ENIVERMENT != "production") {
			echo "<h1>Fata Error</h1>";
			echo "<p>Uncaught Exception :". get_class($exception) ."</p>";
			echo "<p>Message: ".$exception->getMessage()."</p>";
			echo "<p>Stack Trace : <pre>".$exception->getTraceAsString()."</pre></p>";
			echo "<p>Thrown in ".$exception->getFile()." on line ".$exception->getLine()."</p>";
		} else {
			$message = "Fata Error".PHP_EOL;
			$message .= "Uncaught Exception :". get_class($exception) ."".PHP_EOL ;
			$message .= "Message: ".$exception->getMessage()."".PHP_EOL;
			$message .= "Stack Trace : ".$exception->getTraceAsString()."".PHP_EOL;
			$message .= "Thrown in ".$exception->getFile()." on line ".$exception->getLine()."".PHP_EOL;
			$log_file = BASEDIR."/App/logs/".date("Y-m-d").".php";
			ini_set("error_log",$log_file);
			error_log($message);

			// if($code == 404) {
			// 	echo "<h1>This Page is Gone</h1>";
			// } else {
			// 	echo "<h1>Server Error</h1>";
			// }
			View::renderTemplate($code.'.html');
		}
	}

}