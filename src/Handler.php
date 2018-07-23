<?php
namespace ClasScheduler;
/**
 * @desc   : Handler for php auto function.
 * @author : lordshadowcz@gmail.com
 * @license: Apache License 2.0
 *
 */

class Handler
{
	/**
	 * Set error handler method.
	 */
	public function __construct()
	{
		//error_reporting(__DEBUGLEVEL__);
		spl_autoload_register(array($this, "LoadClass"));

		//set_error_handler(array($this, "errorHandler"));

		//set_exception_handler(array($this, "exceptionHandler"));

		register_shutdown_function(array($this, "endPage"));
	}


	/**
	 * Method for class auto loading.
	 * @param $className
	 * @return mixed
	 */
	public function LoadClass ($className)
	{
		$types = array("./%s.php", "./objects/%s.php");

		$ns = explode("\\", $className);
		$class = $ns[count($ns)-1];

		$f = str_replace("\\", "/", $className);

		for ($i = 0; $i < count($types); $i++)
		{
			$f = str_replace("%s", $class, $types[$i]);
			if (file_exists($f))
			{
				include_once ($f);
				return;
			}

		}
		echo ("Class $className nenalezena!");
	}

	/**
	 * error handler
	 * @param $cErrno
	 * @param string   $sErrStr
	 * @param string   $sErrFile
	 * @param int      $iErrLine
	 * @param mixed    $mVars
	 */
/* 	public function errorHandler($cErrno, $sErrStr, $sErrFile, $iErrLine)
	{
		$stackTrace = debug_backtrace();
		array_shift($stackTrace);

		$exception = new ErrorException($sErrStr, $cErrno);
		$exception->setFile($sErrFile)
				  ->setLine($iErrLine)
				  ->setTrace($stackTrace);

		throw $exception;
		return;
	} */


	/**
	 * Handles uncaught exceptions
	 * @param $exception
	 */
/* 	public function exceptionHandler($exception)
	{
		$exception->execute();
	} */

	function endPage ()
	{

	}
}




