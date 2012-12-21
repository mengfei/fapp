 <?php
 //应用路径
defined('APP_PATH') ||
define('APP_PATH',dirname(__FILE__)."/protected/");
define('FRAMEWORK_PATH',dirname(__FILE__)."/../framework/");

defined('APP_DEBUG') or define('APP_DEBUG',true);

//导入前端控制器
//include  APP_PATH.'framework//Library/Toper/Core/FrontController.class.php';
//$frontController = Tp_FrontController::getInstance();
include  APP_PATH. '/../../framework/AppBase.php';
//include  APP_PATH. 'Library/Config.php';
//include  APP_PATH. 'Library/tool.php';
$app = AppBase::getInstance();
$app->run();
//$frontController->run();
 ?>