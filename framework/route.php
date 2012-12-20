<?php

class Route{

	public static function createWebApplication(){

	}
	public static function run(){
		//引入配置文件
		$config = Config::initConfig();
		//设置了默认的控制器
		$controller	= empty($_GET['c'])?$config['defaultController']:trim($_GET['c']);
		$controller = $controller."Controller";
		//设置了默认的Action
		$action=empty($_GET['a'])?$config['defaultAction'] :trim($_GET['a']);
		//调用自动加载类方法

		$controller=new $controller();
		$controller->$action();
	}

}

?>