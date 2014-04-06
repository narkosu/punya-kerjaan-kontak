<?php
$this->breadcrumbs=array(
	'Email Newsletters',
);

$this->menu=array(
	array('label'=>'Create EmailNewsletter', 'url'=>array('create')),
	array('label'=>'Manage EmailNewsletter', 'url'=>array('admin')),
);
?>

<h1>Email Newsletters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
