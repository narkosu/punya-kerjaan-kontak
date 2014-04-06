<?php

Yii::import('zii.widgets.CPortlet');

class TokoMenu extends CPortlet
{
	public function init()
	{
		$this->title= 'Toko';
		parent::init();
	}

	protected function renderContent()
	{
		$this->render('TokoMenu');
	}
}