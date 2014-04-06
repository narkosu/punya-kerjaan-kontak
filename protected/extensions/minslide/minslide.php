<?php
class minslide extends CWidget {
 
    public $buttons = array();
    public $delimiter = ' / ';
	protected $path;
	public function init()
    {
		$doScript = '';
        
		$doScript .= "
			 
				
           
		";
			
		$cs = Yii::app()->clientScript;
		
		
		//$cs->registerScript('minslides',$doScript);
		
        $this->path = Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR."assets",false,-1,true);
		//$cs->registerCoreScript('jquery',$this->path . '/jquery-1.7.1.min.js');
		$cs->registerScriptFile($this->path . '/minslide.js',0);
		
        $cs->registerCssFile( $this->path . '/css/style.css?'.time());
		// $cs->registerScriptFile( $this->path . '/jquery.wookmark.js?'.time());
       
        
    }
	
    public function run() {
		/*
		*/
        $this->render('_slideblock');
    }
 
}
?>