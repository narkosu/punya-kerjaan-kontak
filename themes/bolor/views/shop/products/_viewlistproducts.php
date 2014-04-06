 <div id="main" role="main" style="width:940px;">
<div id="tiles">	
<div class="boxitem">
 <div style="" class="tile hometile"> 
	<div id="intro">Etalase dan ruang promosi
	<span class="nolkmcall">Nolkm</span>
	 <div class="options"> 
		<a href="" class="actionButton">Sign up</a> <a href="http://www.wookmark.com/about/about" class="actionButton">Learn more</a> 
	 </div> 
	</div> 
  </div> 
</div>
<?php 
foreach ( (array) $dataProvider as $idx =>$data){
?>
 <div  class="boxitem">
	<div class="kotak-penjual">
		<img class="avatar" src="http://cdn.viddy.com/images/users/thumb/85ea5f42-2968-47bd-a9e8-0adfa40c28dc_150x150.jpg">
		<a rel="<?php echo Yii::app()->createUrl('members/profile/ajaxprofile/id/'.$data->shop_store->shop_name);?>" href="<?php echo Yii::app()->baseUrl?>/@<?php echo (isset($data->shop_store->shop_name) ? $data->shop_store->shop_name : 'Noname')?>/produk" class="qtipsy">
		<?php echo (isset($data->shop_store->shop_name) ? $data->shop_store->shop_name : 'Noname')?></a>
		<div class="clear"></div>
	</div>
	<div class="photo-produk">
	<?php 
		if($data->images){
			$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
		}else {
			echo '<div class="nophoto smallrounded">Tidak ada photo</div>';
		}
	?>
	</div>
	<div class="papan-menu">
		<span class="favorite icon-heart box-menu" title="Favorite"></span>
		<span class="japri icon-comments box-menu" title="Japri" onclick="japri('kotak-pesan_<?php echo $data->product_id?>',<?php echo $data->product_id?>);"></span>
		<span class="komentar icon-comment box-menu" title="Komentar"  onclick="komentar('kotak-komentar-<?php echo $data->product_id?>',<?php echo $data->product_id?>);"></span>
		<?php if ( !empty($data->price)){ ?><span class="belanja icon-shopping-cart last-box-menu" title="Order"></span><?php } ?>
	</div>
	<?php if ( !empty($data->price)){ ?>
	<div class="kotak-harga"><?php echo Shop::priceFormat($data->price); ?></div>
	<?php } else {?>
	<div class="kotak-harga"><?php echo "Hubungi Kami" ?></div>
	<?php } ?>
	<div class="title"><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?></div>
   
	<?php /* japri */ ?>
	<div class="kotak-pesan-komentar" >
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
	
		<div class="kotak-komentar" id="kotak-komentar-<?php echo $data->product_id?>" style="display:none;">
		<?php $this->widget('comments.widgets.ECommentsListWidget', array(
		'model' => $data,
		));?>
		</div>
	</div>
</div>
	

<?php } ?>

</div>

</div>
