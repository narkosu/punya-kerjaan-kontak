<?php
class qtip extends CWidget {
 
    public $buttons = array();
    public $delimiter = ' / ';
	protected $path;
	public function init()
    {
		$doScript = '';
        
				$doScript .= "
					$('.qtipsy').each(function()
					{
						$(this).qtip(
						{
							content: {
								
								text: '<img class=\"throbber\" src=\"/projects/qtip/images/throbber.gif\" alt=\"Loading...\" />',
								ajax: {
									url: $(this).attr('rel') 
								},
								title: {
									text: 'Profil ' + $(this).text(), 
									button: true
								}
							},
							position: {
								at: 'top center', // Position the tooltip above the link
								my: 'bottom right',
								viewport: $(window), // Keep the tooltip on-screen at all times
								effect: false // Disable positioning animation
							},
							show: {
								event: 'hover',
								delay: 1000,
								solo: true // Only show one tooltip at a time
							},
							hide: 'unfocus',
							style: {
								classes: 'ui-tooltip-wiki ui-tooltip-light ui-tooltip-shadow'
							}
						})
					})

					// Make sure it doesn't follow the link when we click it
					.click(function(event) { event.preventDefault(); });
				";
			
		$cs = Yii::app()->clientScript;
		
		
		$cs->registerScript('qtip2',$doScript);
		
        $this->path = Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR."assets",false,-1,true);

		
        $cs->registerCssFile( $this->path . '/jquery.qtip.css?'.time());
        $cs->registerScriptFile( $this->path . '/jquery.qtip.min.js?'.time());
       
        
    }
	
    public function run() {
		/*
		*/
       // $this->render();
    }
 
}
?>