<?php
$this->breadcrumbs=array(
	Shop::t('Products'),
);
Shop::renderFlash();
?>



<div id="container-header-company" style="text-transform: uppercase;color:#069;font-weight:bold;"><?php echo $model->company_name?></div>
<!-- sample modal content -->
<div class="detil-company">
	<!-- main container -->
	<div class="main-content-company">
		<div id="papan-produk">
		<?php /*<h2><?php echo Shop::t('All products'); ?></h2> */?>
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

	</div>	
</div>


