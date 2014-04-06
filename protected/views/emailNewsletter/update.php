<?php
$this->breadcrumbs=array(
	'Email Newsletters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmailNewsletter', 'url'=>array('index')),
	array('label'=>'Create EmailNewsletter', 'url'=>array('create')),
	array('label'=>'View EmailNewsletter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EmailNewsletter', 'url'=>array('admin')),
);
?>

<h1>Update EmailNewsletter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>