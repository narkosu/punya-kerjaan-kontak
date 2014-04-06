<?php
/**
 * additionalpriceWidget class file.
 *
 */

/**
 * Base class for allmodule widgets
 *
 * @version 1.0
 * @package shop module
 */
Yii::import('zii.widgets.jui.CJuiWidget');

class updatestatusWidget extends CJuiWidget
{       
        /**
         * @var model for displaying comments
         */
        public $model;
        public $data;
        public $view = array('modify'=>'updatestatusWidget','view'=>'updatestatusWidget'); // render views modify , view
        public $show = 'view';// view, modify
		
        public $product_id;
        public $store_id;
        public $option;
        
        /**
         * If only registered users can post comments
         * @var registeredOnly
         */
        public $registeredOnly = false;
        
        
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
			$this->data = ShopOrderStatus::model()->findAll();
			
			$this->registerScripts();
        }

        /**
         * Registers the JS and CSS Files
         */
        protected function registerScripts() 
        {
			$assets = Yii::app()->assetManager->publish(Yii::getPathOfAlias('shop') . '/assets/',false,-1,true );
            $cs = Yii::app()->getClientScript();
            $cs->registerScriptFile($assets . '/js/additionalPrice.js');
        }
        
		public function run()
		{
			$this->render($this->view['modify'],array('id'=>$this->id,
															'order_id'=>$this->option['order_id'],
															'store_id'=>$this->option['store_id'],
															'data'=>$this->data
															));
			$js = "jQuery('#{$this->id}').additionalPrice();";
            Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$this->id, $js);
		}
}
?>
