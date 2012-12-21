<?php
class BaseException {

	//调用printStack方法就是输出堆栈信息
	public function printStack() {
		if(APP_DEBUG){
			echo parent::getTraceAsString();
		}else{
			$this->_toLogFile(parent::getTraceAsString());
			$this->_outputErrorPage();
		}
	}

	//throw new Exception()时自动调用__toString方法
	public function __toString() {
		if(!APP_DEBUG){
			$this->_toLogFile(parent::getTraceAsString());
			$this->_outputErrorPage();
			exit();
		}
		return parent::__toString();
	}

	//记录调试信息到日志文件
	protected function _toLogFile($str) {
		file_put_contents(APP_PATH.'/log'.$str,FILE_APPEND);
	}


	protected function _outputErrorPage() {
		header("content-type:text/html");
		echo file_get_contents(APP_PATH.'/error.html');
	}



}
?>