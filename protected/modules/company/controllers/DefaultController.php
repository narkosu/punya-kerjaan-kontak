<?php

class DefaultController extends Controller
{
	//public $layout='layout/magazine';
	//public $dotoc = '';
	public $layout='//layouts/maincompanyhome';
	
	//public $mid;
	public function actionIndex()
	{
    $criteria   = new CDbCriteria;
    $count      = Factory::model()->count($criteria);
    $pages      = new CPagination($count);

    // results per page
    $pages->pageSize    = 5;
    $pages->applyLimit($criteria);
    
    $companies = Factory::model()->findAll($criteria);
		$this->render('companyindex',array(
        'dotoc'=>'prefetch',
        'companies'=>$companies,
        'pages'=>$pages));
	}
	
  
  public function actionAbout($id)
	{
		$data->factory = Factory::model()->findByPk($id);
		CModule::setParams(array('company_id'=>$id,'picture_id'=>$data->factory->picture_id,'picture'=>$data->factory->picture));
		
		//$data->factoryReview 	= AdvisorFactoryReview::model()->find("factory_id ='".$id."'");
		$criteria = new CDbCriteria();
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
		$this->render('view',array('data'=>$data
					//  ,'pages'=>$pages
					));
		
	}
  
  public function actionService($id)
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
  
  /*
  public function actionProducts()
	{
		$companies = Factory::model()->findAll();
		$this->render('index',array('dotoc'=>'prefetch','companies'=>$companies));
	}
  */
	public function actionWritereview()
	{
		$this->render('writereview');
		//echo 'write review';
	}
	
	public function actionMakereview($id)
	{	
		print_r($_GET);
		echo 'asdasd';
		//$this->render('formwritereview');
		//echo 'write review';
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
	
}