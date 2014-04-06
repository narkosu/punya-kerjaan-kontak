<?php
/**
 * ShippingproductWidget class file.
 *
 */

/**
 * Base class for allmodule widgets
 *
 * @version 1.0
 * @package shop module
 */
Yii::import('zii.widgets.jui.CJuiWidget');

class paymentWidget extends CJuiWidget
{       
        /**
         * @var model for displaying comments
         */
        public $model;
        public $data;
        public $view = array('modify'=>'ShippingproductFormWidget','view'=>'ShippingproductViewWidget'); // render views modify , view
        public $show = 'view';// view, modify
		
        public $product_id;
        public $store_id;
        public $name;
        public $checked;
        
        
        /**
         * If only registered users can post comments
         * @var registeredOnly
         */
        public $registeredOnly = false;
        
        /**
         * Use captcha validation on posting
         * @var registeredOnly
         */
        public $useCaptcha = false;
        
        /**
         * Action for posting comments, where add comment form is submited
         * @var postCommentAction
         */
        
        
        /**
         * @var array
         */
        protected $_config;
        
        /**
         * Initializes the widget.
         */
        public function init() 
        {
            parent::init();
			//$this->data = ShippingProduct::model()->findAll("product_id = '".$this->model->product_id."'");
			
			//$this->registerScripts();
        }

        /**
         * Registers the JS and CSS Files
         */
        protected function registerScripts() 
        {
			$assets = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('shop') . '/assets',false,-1,true);
            $cs = Yii::app()->getClientScript();
            $cs->registerScriptFile($assets . '/js/shippingForm.js?'.time());
			
        }
        
       		
		public function run()
		{
			$this->render('paymentWidget',array('element_name'=>$this->name,'checked'=>$this->checked,'store_id'=>$this->store_id));
			/*$js = "jQuery('#{$this->id}').shippingForm();";
            Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$this->id, $js);*/
			
		}
}
?>
