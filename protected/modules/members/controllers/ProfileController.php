<?php

class ProfileController extends Controller
{
	public $layout = '//layouts/main';
	
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
		echo Yii::app()->request->getQuery('user');
		
		$this->render('profile',array('user'=>Yii::app()->request->getQuery('user')));
	}
	
	public function actionAjaxprofile($id)
	{
		$this->renderpartial('_ajaxprofile');
	}
	
	public function actionLoadAvatar(){
		$model =  Image::model()->findByPk(1);
		
		$model->renderImage('small');
	}
	
	public function actionUploadAvatar(){
		$file = CUploadedFile::getInstanceByName('file');
		// Do your business ... save on file system for example,
		// and/or do some db operations for example
		/*if ($file->saveAs('photos/avatar/'.$file->getName())){
			$model = User::model()->findByPk(Yii::app()->user->id);
			$model->picture = Yii::app()->baseUrl.'/photos/avatar/'.$file->getName();
			$model->save();
		}*/
		$group = 'avatar';
		$filename = 'av_'.Yii::app()->user->id.'_'.time();
		$return = Yii::app()->image->save($file,$filename,'users',$group,Yii::app()->user->id);
		if ($return){
      
			$model = User::model()->findByPk(Yii::app()->user->id);
			$model->picture_id = $return->id;
			$model->picture = $filename.'-'.$return->id.'.'.$return->extension;
			$model->save();
		}else{
      print_r($return);
    }
		// return the new file path
		echo Yii::app()->baseUrl.'/photo/view/id/'.$return->id.'/version/avatar';
	}
}