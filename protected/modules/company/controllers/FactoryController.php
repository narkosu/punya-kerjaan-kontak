<?php

class FactoryController extends Controller
{
	
	public $layout='//layouts/maincompany';
	public $_params;
  
  public function filters()
	{
		return array(
			'accessControl',
		);
	}	

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('baru',
              'view','products','detailproduct'),
					'users' => array('*'),
					),
        array('allow',
					'actions'=>array('UpdateMyProfile','Uploadlogo','coverpicture'),
					'users' => array('@'),
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
		$this->render('index',array('dotoc'=>'prefetch'));
	}
	
  public function actionBaru()
	{
      $id = '';
    $data->factory = Factory::model()->findByPk($id);
		CModule::setParams(array('company_id'=>$id,'picture_id'=>$data->factory->picture_id,'picture'=>$data->factory->picture));
		$this->render('newcompany');
	}
	
  
	public function actionInclude()
	{
		/* check company */
		
		$model = Factory::model()->findByUser(Yii::app()->user->id);
		if ( !$model )
			$model = new Factory;
		// uncomment the following code to enable ajax-based validation
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='factory-factory-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		

		if(isset($_POST['Factory']))
		{
			$model->attributes=$_POST['Factory'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				$result = $this->saveFactory($model);
				if ($result['status'] == 'success' ) {
					Yii::app()->user->setFlash('factorysuccess','Your factory has been saved. <a href="'.Yii::app()->createUrl('advisor/factory/view/id/'.$factory->id).'">see it</a>');
					$this->redirect(Yii::app()->createUrl('advisor/factory/include'));
				}
			}
		}
		//$this->render('factory',array('model'=>$model));
	}

	public function actionUpdate($id)
	{
		$model = Factory::model()->findByPk($id);

		// uncomment the following code to enable ajax-based validation
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='factory-factory-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		

		if(isset($_POST['Factory']))
		{
			$model->attributes=$_POST['Factory'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
		}
		$this->render('factory',array('model'=>$model));
	}
	
  public function actionUpdateMyProfile()
	{
    $this->layout = '//layouts/main_account';
    $isNew = false;
    $myFactoryId = UserFactory::model()->find('user_id = :uid', array(':uid'=> Yii::app()->user->id));  
    if ( $myFactoryId ){
        $model = Factory::model()->findByPk($myFactoryId->company_id);
    } else {
        $model = new Factory;
        $isNew = true;
    }

		// uncomment the following code to enable ajax-based validation
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='factory-factory-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		

		if(isset($_POST['Factory']))
		{
			$model->attributes = $_POST['Factory'];
      
			if( $model->validate() )
			{
				// form inputs are valid, do something here
				$model->save();
        
        /* create user factory */
        if ( $isNew ){
            $userFactory = new \UserFactory;
            $userFactory->user_id = Yii::app()->user->id;
            $userFactory->company_id = $model->id;
            $userFactory->level_as = 'admin';
            $userFactory->status = 'active';
            $userFactory->save();
        }
            
			}
		}
    
		$this->render('myfactory',array('model'=>$model));
	}
  
	public function actionDelete($id)
	{
		if ( !empty($id) && ( !Yii::app()->user->isGuest )  ) {
			
			
			
			$deleteFactory = Factory::model()->find("id = '".$id."' AND user_created = '".Yii::app()->user->id."'");
			
			if ( $deleteFactory ) {
				$AdvisorFactoryReview = AdvisorFactoryReview::model()->find("factory_id ='".$deleteFactory->id."'");
				if ( $AdvisorFactoryReview ) {
					$getReviews = AdvisorReviews::model()->findAll("reference_code = '".$AdvisorFactoryReview->reference_code."'");
					if ( $getReviews )	
					foreach ( $getReviews as $deleteReview ){
					
						$deleteReview->deletePhotos();
						AdvisorReviewrating::model()->deleteAllByReviewId($deleteReview->id);
						$deleteReview->delete();
					}
					$AdvisorFactoryReview->delete();	
				}	
				$deleteFactory->delete();	
			}
			
		}
		
		echo $this->redirect(Yii::app()->createUrl('/members/factories/'.Yii::app()->user->name));
	}
	
	public function actionView($id)
	{
		$data->factory = Factory::model()->findByPk($id);
		CModule::setParams(
            array(
                'company_id'=>$id, 
                'company_name'=>$data->factory->company_name, 
                'picture_id'=>$data->factory->picture_id, 
                'picture'=>$data->factory->picture,
                'cover_picture_id'=>$data->factory->cover_picture_id, 
                'cover_picture'=>$data->factory->cover_picture
            ));
		
		//$data->factoryReview 	= AdvisorFactoryReview::model()->find("factory_id ='".$id."'");
		//$criteria = new CDbCriteria();
		/*
		if ( $data->factoryReview->reference_code ){
			$criteria->compare("reference_code",$data->factoryReview->reference_code);
			$criteria->order = 'create_date desc';
		
			$count = AdvisorReviews::model()->count($criteria);
			$data->factoryReview->num_reviews = $count;
			$pages=new CPagination($count);

			// results per page
			$pages->pageSize=5;
			$pages->applyLimit($criteria);
		
			$data->show_reviews 	= AdvisorReviews::model()->findAll($criteria);
		}
		*/
		$this->render('about',array('data'=>$data
					//  ,'pages'=>$pages
					));
		
	}
	
	
	public function actionWrite($id)
	{	
		$factory = Factory::model()->findByPk($id);
		if ( isset($_POST['AdvisorReview']) ){
			
			$modelReview = new AdvisorReviews;
			$_POST['AdvisorReview']['reference_code'] = md5($id);
			$_POST['AdvisorReview']['user_id'] = Yii::app()->user->id;
			$modelReview->attributes = $_POST['AdvisorReview'];
			if ($modelReview->save()){
			}else{
				echo 'error';
			}
		}
		$this->render('formwritereview',array('factory'=>$factory));
	}	
	
	public function actionSavefactory(){
		if(Yii::app()->request->isPostRequest)
		{
			if (empty($_POST['Factory']['id'])){
				$factory = new Factory;
			
			}else {
			
				$factory = Factory::model()->find("id = '".$_POST['Factory']['id']."' AND user_created = '".Yii::app()->user->id."'");
				if ( !$factory ){
					$return['status'] = 'notallowed';
					echo json_encode($return);
					return;
				}
			}
			
			$result = $this->saveFactory($factory);
			
			if ( $result['status'] == 'success' ) {
				Yii::app()->user->setFlash('factorysuccess','Your factory has been saved. <a href="'.Yii::app()->createUrl('advisor/factory/view/id/'.$factory->id).'">see it</a>');
				echo json_encode($result);

			} else if ( $result['status'] == 'needlogin' ) { 
				
				echo json_encode($result);
			
			} else if ( $result['status'] == 'error' ) {
				echo json_encode($result);
			}			
		}
	}
	
	protected function Savefactory($factory){
		$factory->attributes = $_POST['Factory'];
		if ( $factory->validate() ) {
			if ( !Yii::app()->user->isGuest ){
				
				$factory->user_created = Yii::app()->user->id;
				$factory->save();
				$return['status'] = 'success';
				
				$return['param']['id'] = $factory->id;
				
			} else {
				$return['status'] = 'needlogin';
				
			}
		} else {
			$return['status'] = 'error';
			$return['errors'] = $factory->getErrors();
				
		}
		return $return;		 
	}
	
	/* search company by using ajax */
	public function actionSearchAjax()
	{
		if ( !empty($_POST['query']) ) {
			$criteria = new CDbCriteria;
			$criteria->compare('company_name',$_POST['query'],true);
			$searchQuery = Factory::model()->findAll($criteria);
		}
		echo $this->renderPartial('search_company',array('searchQuery'=>$searchQuery));
		
	}
	
	/* search company by using ajax */
	public function actionSearch()
	{
		if ( !empty($_GET['query']) ) {
			$criteria = new CDbCriteria;
			$criteria->compare('company_name',$_GET['query'],true);
			$searchQuery = Factory::model()->findAll($criteria);
		}
		echo $this->render('search_company',array('searchQuery'=>$searchQuery));
		
	}
	
	public function actionProducts($id)
	{
		
		$model = Factory::model()->findByPk($id);
		CModule::setParams(array('company_id'=>$id,'picture'=>$model->picture,'picture_id'=>$model->picture_id));
		// uncomment the following code to enable ajax-based validation
		
		$store = Shopstore::model()->find("company_id = '".$id."'");
		$dataProvider = null;
		if ( $store ) {
			//$this->layout = '//layouts/maingrid';
			$dataProvider = Products::model()->findAll("store_id = '".$store->id."'") ;
		}
		$this->render('companyproduct',array(
			'dataProvider'=>$dataProvider,
			'store'=>$store,
			'model'=>$model
		));
		
		//$this->render('factory',array('model'=>$model));
	}
	
  
  public function actionDetailproduct($cid,$id)
	{
    $model = Factory::model()->findByPk($cid);
		CModule::setParams(array('company_id'=>$cid,
        'cover_picture'=>$model->cover_picture,
        'cover_picture_id'=>$model->cover_picture_id,
        'picture'=>$model->picture,
        'picture_id'=>$model->picture_id)
        );
		// uncomment the following code to enable ajax-based validation
    
			$criteria = new CDbCriteria;
			$criteria->compare('product_id',$id,true);
			$searchQuery = Products::model()->find($criteria);
		
		echo $this->render('detailproduk',array('model'=>$searchQuery));
		
	}
  
	public function actionContactinfo($id)
	{
		//CModule::setParams(array('company_id'=>$id));
		$data->factory = Factory::model()->findByPk($id);
		CModule::setParams(array('company_id'=>$id,'picture'=>$data->factory->picture,'picture_id'=>$data->factory->picture_id));
		// uncomment the following code to enable ajax-based validation
		
		$this->render('contactinfo',array(
			'data'=>$data
		));
		
		//$this->render('factory',array('model'=>$model));
	}
	
	public function getParams(){
		return CModule::getParams();
	}
	
	public function actionUploadlogo($cid = ''){
		if (empty($cid)) return;
		if (Yii::app()->user->getState('storeLogin')->company_id != $cid ){
        return;
    }
    
    $model = Factory::model()->findByPk($cid);
    
    $oldLogo_id         = $model->picture_id;
    $oldLogo_picture    = $model->picture;
    
		$file = CUploadedFile::getInstanceByName('file');
		
		$group = 'logo';
		$filename = 'logo_'.$cid.'_'.time();
		$return = Yii::app()->image->save($file,$filename,'company',$group,$cid);
		if ( !empty($return) ){
    	$model->picture_id = $return->id;
			$model->picture = $filename.'-'.$return->id.'.'.$return->extension;
			if ( !$model->save() ){
         return;
      }
		}
		// return the new file path
		echo Yii::app()->baseUrl.'/photo/view/id/'.$return->id.'/version/logo';
	}
  
  
  public function actionCoverpicture($cid = ''){
		if (empty($cid)) return;
		if (Yii::app()->user->getState('storeLogin')->company_id != $cid ){
        return;
    }
    
    $model = Factory::model()->findByPk($cid);
    
    $cover_picture_id   = $model->cover_picture_id;
    $cover_picture      = $model->cover_picture;
    
		$file = CUploadedFile::getInstanceByName('file');
		
		$group = 'cover';
		$filename = 'cover_'.$cid.'_'.time();
		$return = Yii::app()->image->save($file,$filename,'company',$group,$cid);
		if ( !empty($return) ){
    	$model->cover_picture_id = $return->id;
			$model->cover_picture = $filename.'-'.$return->id.'.'.$return->extension;
			if ( !$model->save() ){
         return;
      }
		}
    
		// return the new file path
		echo Yii::app()->baseUrl.'/photo/view/id/'.$return->id.'/version/cover';
	}
}
