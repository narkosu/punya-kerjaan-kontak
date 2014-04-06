<?php
$this->breadcrumbs=array(
	Shop::t('Products'),
);
Shop::renderFlash();
?>


<div id="papan-produk">
<h2><?php echo Shop::t('All products'); ?></h2>
<div id="products-header"></div>
<div id="products-body">
<?php $this->renderpartial('_viewlistproducts',array(
	'dataProvider'=>$dataProvider));
?>
</div>
<div id="products-footer"></div>
</div>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>
