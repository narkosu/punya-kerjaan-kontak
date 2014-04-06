<?php
$this->breadcrumbs=array(
	'Email Newsletters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmailNewsletter', 'url'=>array('index')),
	array('label'=>'Manage EmailNewsletter', 'url'=>array('admin')),
);
?>

<h1>Create EmailNewsletter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>