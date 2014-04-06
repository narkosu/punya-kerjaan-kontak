<?php

class GeneralController extends Controller
{
	public $layout='maindefault';

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

	
	public function actionUpload(){
		$file = CUploadedFile::getInstanceByName('file');
		// Do your business ... save on file system for example,
		// and/or do some db operations for example
		$file->saveAs('photos/avatar/'.$file->getName());
		// return the new file path
		echo Yii::app()->baseUrl.'/photos/avatar/'.$file->getName();
	}
}