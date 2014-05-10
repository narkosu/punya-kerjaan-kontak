<?php

class ImageController extends Controller
{
	public $_model;

	public function beforeAction($action) {
		$this->layout = Shop::module()->layout;
		return parent::beforeAction($action);
	}

	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	public function actionCreate()
	{
    $product = Products::model()->findByPk($_GET['product_id']);
    $now = new \DateTime;
    $this->layout = '//layouts/main_account';  
		$model=new Image;
    
		if(isset($_POST['Image']))
		{
        Yii::app()->thumb->setThumbsDirectory('/productimages');
        $folder = Yii::getPathOfAlias('webroot')."/productimages";
        $folderDate = $now->format('Y/m/d');
        $folder_destination = $folder.'/'.$folderDate;
        @mkdir($folder_destination, 0777, true);
        
			  $model->attributes=$_POST['Image'];
        $model->filename = CUploadedFile::getInstance($model, 'filename');
        $model->created_at = $now->format('Y-m-d H:i:s'); 
        if($model->save()) {
            @mkdir($folder_destination.'/o', 0777, true);
            //$folder = Yii::app()->controller->module->productImagesFolder.'/'; 
            $folder = $folder_destination.'/o'; 
            $time = time();
            $newfilename = $time.'.'.$model->filename->getExtensionName();
            $extension = $model->filename->getExtensionName();
            $model->filename->saveAs($folder . '/' . $newfilename); 
            $model->filename = $newfilename;
            $model->save();
            $loadImage = Yii::app()->thumb
                        ->load($folder.'/'.$newfilename);
            $optionImage = Yii::app()->thumb->options;
            
            chmod($folder_destination,0777);
            $metaThumb = array();
            if (!empty($optionImage)){
                foreach( $optionImage['thumbnail'] as $typeThumbnail => $value ){
                  $newThumbnail = $loadImage->resize($value['width'],$value['height']); 
                  $resolution = $value['width']."x".$value['height'];
                 
                  $newThumbnail->save(  $folderDate.'/'.
                                        $time."_".$resolution.
                                        ".".$extension, strtoupper($extension)
                                    );
                  $metaThumb[$resolution] = $resolution;
                }
            }
            chmod($folder_destination,0755);
            $model->metas = json_encode($metaThumb);
            $model->save();
            /*->resize(650,450)
            ->save($folder_destination.'/'.$time."_650x450.".$extension, strtoupper($extension));
             * 
             */
            /* save to info thumbnail */
            
            /* make thumbnail */
            $this->redirect(array('//shop/image/product/product_id/'.$product->product_id));
        }
        
        
                
        /*
        Yii::app()->thumb
            ->load(Yii::getPathOfAlias('webroot')."/productimages/".$filename)
            ->crop($area['x'],$area['y'],$area['width'],$area['height'])
            ->save($area['name'].".gif", "GIF");
        */    
      
        
		}

		$this->render('create',array(
			'model'=>$model,
       'product'=>$product
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();

		// $this->performAjaxValidation($model);

		if(isset($_POST['Image']))
		{
			$model->attributes=$_POST['Image'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete()
	{
			$this->loadModel()->delete();

			if(!isset($_POST['ajax']))
				$this->redirect(array('//shop/products/admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Image');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$product = Products::model()->findByPk($_GET['product_id']);

		$images = $product->images;

		$this->render('admin',array( 'images'=>$images, 'product' => $product));
	}

  
  public function actionProduct()
	{
    $this->layout = '//layouts/main_account';  
		$product = Products::model()->findByPk($_GET['product_id']);

		$images = $product->images;

		$this->render('productimage',array( 'images'=>$images, 'product' => $product));
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
				$this->_model=Image::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
  
}
