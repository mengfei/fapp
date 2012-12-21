<?php
class Controller {
	protected function _redirect(Array $arr) {
		$config = Config::initConfig();
		//设置了默认的控制器
		$controller	= empty($_GET['c'])?$config['defaultController']:trim($_GET['c']);
		$controller = $controller."Controller";
		//设置了默认的Action
		$action=empty($_GET['a'])?$config['defaultAction'] :trim($_GET['a']);

		array_key_exists('controller',$arr) || $arr['controller'] = $controller;

		array_key_exists('action',$arr) || $arr['action'] = $action;

		$str = '/?';

		foreach($arr as $key=>$val)
		{
			if(!is_int($key)){
				$str .= ($key."=".$val.'&');
			}
			$str = substr($str,0,strlen($str) - 1);
			Response::redirect($str);
		}

	}

	protected function _fowward(Array $arr) {
		$config = Config::initConfig();
		//设置了默认的控制器
		$controller	= empty($_GET['c'])?$config['defaultController']:trim($_GET['c']);
		$controller = $controller."Controller";
		//设置了默认的Action
		$action=empty($_GET['a'])?$config['defaultAction'] :trim($_GET['a']);

		if(array_key_exists('controller',$arr)){
			$controller = $arr['controller'];
		}

		if(array_key_exists('action',$arr)){
			$action = $arr['action'];
		}

		$controller .= 'Controller';

		if($controller === get_class()){
			if(method_exists($this,$action)){
				$this->$action();
			}else{

			}
		}else{
			if(class_exists($controller)){
				$class  = new $controller();
				if(method_exists($class,$action)){
					$class->$action();
				}else{

				}
			}else{

			}
		}
	}

	protected function _assign(Array $arr) {
		View::assign($arr);
	}

	protected function _display($str) {
		if(is_string($str)){
			$str = str_replace(array('.','$'),array('/','.'),$str);
			View::display(APP_PATH."view/".$str.".php");
		}
	}
}
?>