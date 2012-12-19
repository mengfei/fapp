<?php
function __autoload($className) {
    $frameworkFileName = FRAMEWORK_PATH."/".$className.'class.php';
    if(is_file($frameworkFileName)){
        include $frameworkFileName;
    }else{
        $controllerFileName = APP_PATH . "controller/" .$className.".php";
        //var_dump(is_file($controllerFileName));exit;
        if(is_file($controllerFileName)){
            include $controllerFileName;
        }else{
            $modelFileName = APP_PATH . "models/".$className.".php";
            //echo $modelFileName;exit;
            if(is_file($modelFileName)){
                include $modelFileName;
            }else{
                $helperFileName  = APP_PATH . 'help/' . $className . '.php';
                if(is_file($helperFileName)){
                    include $helperFileName;
                }else{
                    throw new Exception("class not found");
                }
            }
        }
    }
}
//设置了默认的控制器
$controller = empty($_GET['c'])?'Index':trim($_GET['c']);

//设置了默认的Action
$action = empty($_GET['a']) ? 'index' : trim($_GET['a']);
$controller = new IndexController();
$controller->index();

?>