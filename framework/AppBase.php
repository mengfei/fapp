<?php
class AppBase{
	private static $_instance = null;

	private function __construct() {
	}

	private function __clone() {
	}

	public static function getInstance() {
		if(!(self::$_instance instanceof self)){
			self::$_instance = new AppBase();
		}
		return self::$_instance;
	}

	public function run(){
		Route::run();
	}

	public static function my_autoload($className){
		$frameworkFileName = FRAMEWORK_PATH."/".$className.'.php';
		if(is_file($frameworkFileName)){
			include	$frameworkFileName;
		}else{
			$controllerFileName	= APP_PATH . "controller/" .$className.".php";
			//var_dump(is_file($controllerFileName));exit;
			if(is_file($controllerFileName)){
				include	$controllerFileName;
			}else{
				$modelFileName = APP_PATH .	"models/".$className.".php";
				//echo $modelFileName;exit;
				if(is_file($modelFileName)){
					include	$modelFileName;
				}else{
					$helperFileName	 = APP_PATH	. 'help/' .	$className . '.php';
					if(is_file($helperFileName)){
						include	$helperFileName;
					}else{
						throw new Exception("class not found");
					}
				}
			}
		}
	}

	public static function registerAutoloader(){
		spl_autoload_unregister(array("AppBase","my_autoload"));
		spl_autoload_register(array("AppBase","my_autoload"));
	}
}
AppBase::registerAutoloader();
?>