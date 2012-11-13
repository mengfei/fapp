<?php

class DefaultController extends Controller
{
	public $layout = "application.modules.admin.views.layouts.layout_login";
	
	public function actionIndex()
	{
		if(!Yii::app()->user->getId()){
			$this->layout = "application.modules.admin.views.layouts.layout_login";
			$this->render('index');
		}else{
			$this->actionLogin();
		}
	}
	
	public function actionLogin()
	{
		$this->layout = "application.modules.admin.views.layouts.main";
		$model=new LoginForm;
		if(!Yii::app()->user->getId()){
			if(isset($_POST['LoginForm'])){			
				$model->attributes = $_POST['LoginForm'];
				if($model->validate() && $model->login()){
					$this->render("main");
				}else{
					$this->actionIndex();
				}
			}else{
				$this->actionIndex();
			}
		}else{
			$this->render("main");
		}
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->actionIndex();
	}
}