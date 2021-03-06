<?php

class ProductsController extends Controller
{
	public $_model;
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
					'actions'=>array('view', 'index','store'),
					'users' => array('*'),
					),
				array('allow',
					'actions'=>array('admin','delete','create','update', 'view'),
					'users' => array('@'),
					),
				array('deny',  // deny all other users
						'users'=>array('*'),
						),
				);
	}

 
  
	public function beforeAction($action) {
		$this->layout = Shop::module()->layout;
		return parent::beforeAction($action);
	}

	public function actionView()
	{
		$this->layout = '//layouts/maincompany';
		$this->render('detailproduk',array(
			'model'=>$this->loadModel(),
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
		$model= Products::model()->find("product_id = '".$id."' AND store_id ='".Yii::app()->user->getState("storeLogin")->id."'");

		$this->performAjaxValidation($model);
		
		if(isset($_POST['Products']))
		{
			
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);
			if(isset($_POST['Variations']))
				$model->setVariations($_POST['Variations']);
			if(isset($_POST['ShippingProduct'])){
				$model->setShipping($_POST['ShippingProduct']);	
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
	public function actionIndex($id)
	{	
		/*$this->layout = '//layouts/maincompany';
		$dataProvider = Products::model()->findAll() ;

		$this->render('fullproduct',array(
			'dataProvider'=>$dataProvider,
		));
     * 
     */
    $this->layout='//layouts/maindefault';
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
		
		$criteria=new CDbCriteria;

		$criteria->compare('store_id',Yii::app()->user->getState("storeLogin")->id);

		$model = Products::model()->findAll($criteria);
		

		$this->render('admin',array(
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
