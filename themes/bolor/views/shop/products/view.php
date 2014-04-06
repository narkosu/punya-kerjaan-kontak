<?php
if (isset($model->shop_store) )	{ 
	$this->breadcrumbs[$model->shop_store->shop_name] = array('/@'.$model->shop_store->shop_name.'/produk');
}	

//$this->breadcrumbs[Shop::t('Produk')] = array('index');
$this->breadcrumbs[] = $model->title;

?>

<div class="product-header">
    <h2 class="title"><?php echo $model->title; ?></h2>
    
</div>

<div class="clear"></div>
<div class="detil-produk">
	<div class="product-images">
	<?php 
	if($model->images) {
		//foreach($model->images as $image) {
			$this->renderPartial('detilphoto', array( 'model' => $model->images));
			//echo '<br />'; 
		//}
	} else 
	$this->renderPartial('/image/view', array( 'model' => new Image()));
	?>	
	</div>

	<div style="clear: both;"></div>
	<div class="product-description">
		<p> <?php echo nl2br($model->description); ?> </p>
	</div>

	<div class="produk-spesifikasi">
	<?php 
	$specs = $model->getSpecifications();
	if(!empty($specs)) {
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
	<?php if ( !empty($model->price)) { ?>
		<div class="produk-shipping">
		<?php $this->widget('shop.widgets.ShippingproductWidget',array('model'=>$model));?>
		</div>
	<?php } ?>	
</div>
<!---- support owner---->
<div class="kotak-pendukung-produk">
	<div class="kotak-penjual"><a href="<?php echo Yii::app()->baseUrl?>/@<?php echo (isset($model->shop_store->shop_name) ? $model->shop_store->shop_name : 'Noname')?>"><?php echo (isset($model->shop_store->shop_name) ? $model->shop_store->shop_name : 'Noname')?></a></div>
	<?php if ( !empty($model->price)) { ?>
		<?php printf('<h2 class="price">%s</h2>',Shop::priceFormat($model->price));  ?>
	
		<div class="product-options clear"> 
			<?php 
				$this->renderPartial('/products/addToCart', array(
					'model' => $model)); 
			?>
		</div>
	<?php 
		} else { 
	?>
		<h2 class="price"><?php echo "Hubungi Kami" ?></h2>
	<?php
		} 
	?>
	<div class="papan-menu">
		<span class="favorite icon-heart box-menu" title="Favorite"></span>
		<span class="japri icon-comments box-menu" title="Japri" onclick="japri('kotak-pesan_<?php echo $model->product_id?>',<?php echo $model->product_id?>);"></span>
		<span class="komentar icon-comment box-menu" title="Komentar"  onclick="komentar('kotak-komentar-<?php echo $model->product_id?>',<?php echo $model->product_id?>);"></span>
		<span class="belanja icon-shopping-cart last-box-menu" title="Order"></span>
	</div>
	
	<div class="kotak-pesan" id="kotak-pesan_<?php echo $model->product_id?>" style="display:block;">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input type="text" placeholder="Subject" id="inputIcon" class="span2" value="<?php echo $model->title?>">
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<textarea  placeholder="Body"></textarea>
		</div>
		<div>
			<a href="#" class="btn btn-small">
			<i class="icon-share"></i> Kirim</a>
		</div>
	</div>
	<div style="position:relative;height:100%;">
		<div class="kotak-komentar" id="kotak-komentar-<?php echo $model->product_id?>" style="display:block;">
		<?php $this->widget('comments.widgets.ECommentsListWidget', array(
		'model' => $model,
		));?>
		</div>
	</div>
</div>
	
