<?php
if (isset($store) )	{ 
	$this->breadcrumbs[$store->shop_name] = array('/@nakos/produk');
}else{
	$this->breadcrumbs[Shop::t('Produk')] = array('index');
}	

Shop::renderFlash();
?>
<?php $this->widget('application.extensions.woomark.woomark', array());?>
<?php /*$this->widget('application.extensions.tooltips.qtip', array());*/?>
<?php if ( isset($dataProvider)){?>
	<div id="papan-produk">
	<div id="products-header"></div>
	<div id="products-body">
		<?php $this->renderpartial('_viewlistproducts',array(
			'dataProvider'=>$dataProvider));
		?>
	</div>
	<div id="products-footer"></div>
	</div>
<?php } else {?>
<div id="papan-produk">
<?php echo Shop::t('Produk belum ada');?>
</div>
<?php } ?>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>
