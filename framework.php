 <?php
 //应用路径
defined('APP_PATH') ||
define('APP_PATH',dirname(__FILE__)."/framework/");
define('FRAMEWORK_PATH',dirname(__FILE__)."/framework/");
//导入前端控制器
//include  APP_PATH.'framework//Library/Toper/Core/FrontController.class.php';
//$frontController = Tp_FrontController::getInstance();
include  APP_PATH. '/route.php';
//Route::run();
//$frontController->run();
 ?>