<?php
class Response extends Base{
	public static function redirect($url) {
		if(!is_string($url)){
			if(!headers_send()){
				header("Location:".$url);
				exit();
			}else{
				$str = '<meta http-equiv="Refresh" contect ="0;url='.$url.'">';
				exit($str);
			}
		}else{
			throw new Exception("error request");
		}
	}
}
?>