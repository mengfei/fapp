<?php
class IndexController extends Controller
{
    public function index() {
        //$index = new Index();
        //$index->test();

		$this->_assign(array(
			'arr'=>array('test','test2'),
			'str'=>'it is a str'));

		$this->_display('test');
    }
}
?>