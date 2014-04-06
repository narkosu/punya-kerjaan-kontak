<?php

Yii::import('zii.widgets.CPortlet');

class UserMenu extends CPortlet
{
	public $option;
	public $params;
	public function init()
	{
		$controllerId = Yii::app()->controller;
		$this->params = $controllerId->getParams();
		//$this->title=CHtml::encode(Yii::app()->user->name);
		if ( !$this->option['themes'] )
			$this->option['themes'] = 'userMenu';
		parent::init();
	}

	protected function renderContent()
	{
		
		$this->render($this->option['themes'],array('getParam'=>$this->params));
	}
}