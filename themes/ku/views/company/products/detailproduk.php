<div id="detail-product">
	<?php
	$this->breadcrumbs=array(
		Shop::t('Products')=>array('index'),
		$model->title,
	);
	
	?>
	
	<div class="product-images">
		<?php 
		if($model->images) {
			foreach($model->images as $image) {
				$this->renderPartial('/image/view', array( 'model' => $image));
				echo '<br />'; 
			}
		} else 
		$this->renderPartial('/image/view', array( 'model' => new Image()));
		?>	
	</div>
	
	<div class="product-spec">
		<div class="product-owner">
			<a rel="<?php echo Yii::app()->createUrl('members/profile/ajaxprofile/id/'.$model->shop_store->shop_name);?>" href="<?php echo Yii::app()->baseUrl?>/company/factory/view/id/<?php echo $model->shop_store->company->id?>" class="qtipsy">
				<?php echo (isset($model->shop_store->shop_name) ? $model->shop_store->company->company_name : 'Noname')?>
			</a>
		</div>
		<div class="product-header">
			<h2 class="title" style="font-weight:bold;"><?php echo $model->title; ?></h2>
			<?php printf('<h2 class="price" style="font-weight:bold;">%s</h2>',
				Shop::priceFormat($model->price));
			?>
		</div>
		
	</div>
	<div class="clear"></div>
	
	
	<div class="product-description" style="margin-top:10px">
		<div class="product-description-title">Tentang Produk</div>
		<div style="padding:10px 0px;">
		<?php echo nl2br($model->description); ?>
		</div>
	</div>
	
	
	<?php 
	$specs = $model->getSpecifications();
	if($specs) {
		echo '<table>';
		
		printf ('<tr><td colspan="2"><strong>%s</strong></td></tr>',
				Shop::t('Product Specifications'));
				
		foreach($specs as $key => $spec) {
			if($spec != '')
				printf('<tr> <td> %s: </td> <td> %s </td> </td>',
						$key,
						$spec);
		}
		
		echo '</table>';
	} 
	?>
</div>