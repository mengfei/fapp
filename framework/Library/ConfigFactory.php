<?php
//配置文件工厂类
class ConfigFactory {
	const XML = 1;
	const INI = 2;
	const PHP = 3;

	public static function factory($type) {
		switch($type){
			case ConfigFactory::XML:
				return 	XmlConfig::parse(APP_PATH."config/config.xml");
				break;
			case ConfigFactory::INI:
				return 	INIConfig::parse(APP_PATH."config/config.ini");
				break;
			case ConfigFactory::PHP:
				return 	INIConfig::parse(APP_PATH."config/config.php");
				break;
			default :
				return array();
				break;
		}
	}
}

class XmlConfig {
	public static function parse($file) {
		if(!is_file($file)){
			throw new Exception('none exists xml config file');
		}else{
			return parse_xml_file($file,true);
		}

	}

	function parse_xml_file($file) {
		//解析xml文件 并转化为数组
	}
}
?>