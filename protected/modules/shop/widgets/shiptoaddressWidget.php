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

class shiptoaddressWidget extends CJuiWidget
{       
        /**
         * @var model for displaying comments
         */
        public $model;
        public $data;
        public $view = array('modify'=>'ShiptoaddressFormWidget','view'=>'ShiptoaddressViewWidget'); // render views modify , view
        public $show = 'view';// view, modify
		
        public $product_id;
        public $store_id;
        
        
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
			$this->data = Address::model()->findAll("user_id = '".Yii::app()->user->id."'");
			
			$this->registerScripts();
        }

        /**
         * Registers the JS and CSS Files
         */
        protected function registerScripts() 
        {
			$assets = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('shop') . '/assets',false,-1,true);
            $cs = Yii::app()->getClientScript();
            $cs->registerScriptFile($assets . '/js/shiptoaddress.js?'.time());
			
        }
        
		public function run()
		{
			$this->render('shiptoaddressViewWidget',array('shipaddress'=>$this->data,'store_id'=>$this->store_id));
			$js = "jQuery('#{$this->id}').shiptoaddress();";
            Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$this->id, $js);
			
		}
}
?>
