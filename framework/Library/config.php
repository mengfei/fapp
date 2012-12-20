<?php
class Config {

	function __construct() {
	}

	public static function initConfig()
	{
		$config = include  APP_PATH. '/config/config.php';
		return $config;
	}

	public static function setConfigItem($item,$value) {
		$config = self::initConfig();
		if(isset($config[$item])){
			$config[$item] = $value;
			return true;
		}else
			return false; //该属性不存在
	}

	public static function getConfigItem($item){
		$config = self::initConfig();
		if(isset($config[$item])){
			return $config[$item];
		}else
			return "";
	}
}
?>