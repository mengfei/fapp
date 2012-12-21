<?php
class View {
	private static $_data = array();

	public static function assign($arr) {
		foreach($arr as $key=>$val){
			if(!is_int($key)){
				self::$_data[$key] = $val;
			}
		}
	}

	public static function display($file) {
		if(file_exists($file)){
			extract(self::$_data);
			include $file;
		}else{
			throw new ViewException(ViewException::NOT_EXISTS_TEMPLATE);
		}
	}
}
?>