<?php
class woomark extends CWidget {
 
    public $buttons = array();
    public $delimiter = ' / ';
	protected $path;
	public function init()
    {
		$doScript = '';
        
		$doScript .= "
			var options = {
				autoResize: true, // This will auto-update the layout when the browser window is resized.
				container: $('#main'), // Optional, used for some extra CSS styling
				offset: 5, // Optional, the distance between grid items
				itemWidth: 200 // Optional, the width of a grid item
			  };
			  
			  // Get a reference to your grid items.
			  var handler = $('#tiles .boxitem');
			  
			  // Call the layout function.
			  handler.wookmark(options);
			  
			  // Capture clicks on grid items.
			  handler.click(function(){
				// Randomize the height of the clicked item.
				/*var newHeight = $('img', this).height() + Math.round(Math.random()*300+30);
				$(this).css('height', newHeight+'px');
				
				// Update the layout.
				handler.wookmark();
				*/
			  });
		";
			
		$cs = Yii::app()->clientScript;
		
		
		$cs->registerScript('woomark',$doScript);
		
        $this->path = Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR."assets",false,-1,true);
		$cs->registerCoreScript('jquery',$this->path . '/jquery-1.7.1.min.js');
		$cs->registerScriptFile($this->path . '/jquery-1.7.1.min.js',0);
		
        $cs->registerCssFile( $this->path . '/woomark.css?'.time());
        $cs->registerScriptFile( $this->path . '/jquery.wookmark.js?'.time());
       
        
    }
	
    public function run() {
		/*
		*/
       // $this->render();
    }
 
}
?>