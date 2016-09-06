<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		
		$model = new User;
		$user = User::model()->findByAttributes(array('username'=>$_POST["username"]));

		$model->attributes=$_POST;
		// validate user input and redirect to the previous page if valid
		if($model->validate() && $model->login()){

			$load = array("status"=>true , "user"=> $user->attributes);
			echo json_encode($load);
		}
	
		
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}