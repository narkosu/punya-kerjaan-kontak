<?php
$this->breadcrumbs=array(
	Yii::t('shop', 'Product')=>array('index'),
	Yii::t('shop', 'Create'),
);
?>

<div id="shopcontent">

	<h1><?echo Yii::t('ShopModule.shop', 'Tambah produk baru'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
