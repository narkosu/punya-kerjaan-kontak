<div id="columns" style="display: inline-block;">	
<?php 
foreach ( (array) $dataProvider as $idx =>$data){
?>
<div class="pin">
	<div class="kotak-penjual"><a href="<?php echo Yii::app()->baseUrl?>/@<?php echo (isset($data->shop_store->shop_name) ? $data->shop_store->shop_name : 'Noname')?>"><?php echo (isset($data->shop_store->shop_name) ? $data->shop_store->shop_name : 'Noname')?></a></div>
	<div class="product-overview-image">	
	<?php 
		if($data->images){
			$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
		}else {
			echo CHtml::image(Shop::register('no-pic.jpg'));
		}
	?>
	</div>
	<div class="papan-menu">
		<span class="favorite icon-heart" title="Favorite"></span>
		<span class="japri icon-comments" title="Japri" onclick="japri('kotak-pesan_<?php echo $data->product_id?>',<?php echo $data->product_id?>);"></span>
		<span class="komentar icon-comment" title="Komentar"  onclick="komentar('kotak-komentar-<?php echo $data->product_id?>',<?php echo $data->product_id?>);"><span><?php echo rand(0,10)?></span></span>
		<span class="belanja icon-shopping-cart" title="Order"></span>
	</div>
	<div class="kotak-harga"><?php echo Shop::priceFormat($data->price); ?></div>
	<h3><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?></h3>
    <div class="product-overview-description">
			<?php /*<p><?php echo CHtml::encode($data->description); ?></p>
			<?php /*<p><?php echo Shop::pricingInfo(); ?></p>*/?>
			<p><?php echo CHtml::link(Shop::t('show product'), array('products/view', 'id' => $data->product_id), array('class' =>'show-product')); ?></p>
    </div>
	<?php /* japri */ ?>
	<div class="kotak-pesan" id="kotak-pesan_<?php echo $data->product_id?>" style="display:none;">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input type="text" placeholder="Subject" id="inputIcon" class="span2" value="<?php echo $data->title?>">
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
		<div class="kotak-komentar" id="kotak-komentar-<?php echo $data->product_id?>" style="display:none;">
		<?php $this->widget('comments.widgets.ECommentsListWidget', array(
		'model' => $data,
		));?>
		</div>
	</div>
</div>
<?php } ?>
</div>
