<?php
$this->breadcrumbs=array(
	'Email Newsletters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmailNewsletter', 'url'=>array('index')),
	array('label'=>'Create EmailNewsletter', 'url'=>array('create')),
	array('label'=>'Update EmailNewsletter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmailNewsletter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailNewsletter', 'url'=>array('admin')),
);
?>

<h1>View EmailNewsletter #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'register_date',
	),
)); ?>
