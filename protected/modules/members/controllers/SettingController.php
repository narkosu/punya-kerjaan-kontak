<?php

class SettingController extends Controller
{
	public $layout = '//layouts/main_account';
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}	

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('index','ajaxprofile','uploadavatar','loadavatar'),
					'users' => array('*'),
					),
				array('allow',
					'actions'=>array('admin','delete', 'view', 'slip', 'invoice'),
					'users' => array('admin'),
					),
				array('deny',  // deny all other users
						'users'=>array('*'),
						),
				);
	}
	
	public function actionIndex()
	{
		$model = User::model()->findByPk(Yii::app()->user->id);
		$this->render('profile',array('model'=>$model));
	}
	
}