<?php

class ProductsController extends Controller
{
	public $_model;
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
					'actions'=>array('view', 'index','store'),
					'users' => array('*'),
					),
				array('allow',
					'actions'=>array('admin','company','delete','create','update', 'view'),
					'users' => array('@'),
					),
				array('deny',  // deny all other users
						'users'=>array('*'),
						),
				);
	}

	public function beforeAction($action) {
		$this->layout = Shop::module()->layout;
    //CModule::setParams(array('company_id'=>$id,'picture_id'=>$data->factory->picture_id,'picture'=>$data->factory->picture));
		return parent::beforeAction($action);
	}

	public function actionView()
	{
		$this->layout = '//layouts/mainproduk';
    
		$this->render('detailproduk',array(
			'model' => $this->loadModel(),
		));
	}

	public function actionCreate()
	{
		 $model=new Products;
     

		 $this->performAjaxValidation($model);
		//print_r($_POST);
		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);


			if($model->save())
				$this->redirect(array('products/view/id/'.$model->product_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id, $return = null)
	{
      
    $this->layout = '//layouts/main_account';  
		$model= Products::model()->find("product_id = '".$id."' AND store_id ='".Yii::app()->user->getState("storeLogin")->id."'");
    $customSpec = $model->custom_spec;
		$this->performAjaxValidation($model);
		
		if(isset($_POST['Products']))
		{
			
			$model->attributes=$_POST['Products'];
			/*if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);
       
			if(isset($_POST['Variations']))
				$model->setVariations($_POST['Variations']);
			if(isset($_POST['ShippingProduct'])){
				$model->setShipping($_POST['ShippingProduct']);	
			}	
      * 
      */
      
      if(isset($_POST['ShopProductCustomSpecification'])){
				$model->setShopProductCustomSpecification($_POST['ShopProductCustomSpecification']);	
			}	
      
			if($model->save()){
				if($return == 'product')
					$this->redirect(array('products/update', 'id' => $model->product_id));
				else
					$this->redirect(array('products/admin'));
					
			}		
		}

		$this->render('update',array(
			'model'=>$model,
        
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	
		$this->layout = '//layouts/mainproduk';
    
    $criteria   = new CDbCriteria;
    $count      = Products::model()->count($criteria);
    $pages      = new CPagination($count);

    // results per page
    $pages->pageSize    = 5;
    $pages->applyLimit($criteria);
    
		$dataProvider = Products::model()->findAll($criteria) ;

		$this->render('fullproduct',array(
			'dataProvider' => $dataProvider,
      'pages' => $pages  
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionStore($store_id)
	{
		$this->layout = '//layouts/maincompany';
		//$dataProvider = new CActiveDataProvider('Products');
		$store = Shopstore::model()->find("company_id = '".$store_id."'");
		$dataProvider = null;
		if ( $store ) {
			//$this->layout = '//layouts/maingrid';
			$dataProvider = Products::model()->findAll("store_id = '".$store->id."'") ;
		}
		$this->render('companyproduct',array(
			'dataProvider'=>$dataProvider,
			'store'=>$store
		));
	}
	
  /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	  $this->layout='//layouts/main_account';	
		$criteria=new CDbCriteria;

		$criteria->compare('store_id',Yii::app()->user->getState("storeLogin")->id);

		$model = Products::model()->findAll($criteria);
		

		$this->render('adminproduct',array(
			'model'=>$model,
		));
	}

  
  /**
	 * companies product
	 */
	public function actionCompany()
	{
	  $this->layout='//layouts/main_account';	
		$criteria=new CDbCriteria;
    
    $criteria->condition = "store_id = '".Yii::app()->user->getState("storeLogin")->id."'";
		$model = Products::model()->findAll($criteria);
		

		$this->render('adminproduct',array(
			'model'=>$model,
		));
	}
  
  
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Products::model()->findByPk((int)$_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
  
  public function getParams(){
		return CModule::getParams();
	}
}
