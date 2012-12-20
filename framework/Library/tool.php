<?php
function C($name=null,$value=null) {
	static $_config = array();
	if(empty($name)){
		return $_config;
	}else if(is_string($name)){
		if(empty($val)){
			if(!strpos($name,"=>")){
				return isset($_config[$name])?$_config[$name]:null;
			}else{
				$name = explode('=>',$name);
				return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : null;
			}
		}else{
			if(!strpos($name,"=>")){
				$_config[$name] = $value;
			}else{
				$name = explode("=>",$name);
				$_config[$name[0]][$name[1]] = $value;
			}
		}
	}else if(is_array($name)){
		foreach($name as $key=>$v){
			$_config[$key] = $v;
		}
		return ;
	}else{
		throw New Exception('参数类型出错');
	}
}
?>