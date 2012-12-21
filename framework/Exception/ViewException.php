<?php
class ViewException extends BaseException {
	const NOT_EXISTS_TEMPLATE = 1;

	public function __construct($code) {
		switch(){
			case ViewException::NOT_EXISTS_TEMPLATE:
				$msg = 'the template file is not exists';
				break;
			default:
				$msg = " unknown exception";
				break;
		}
		parent::__construct($msg,$code);
	}

}
?>