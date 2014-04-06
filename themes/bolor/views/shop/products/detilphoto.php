<?php 
$folder = Shop::module()->productImagesFolder;
$first = false;
foreach($model as $images) {
	/* main photo */
	if ( !$first) {
	?>
		<div class="photo-utama">
		<?php	
			if( $images->filename ) 
				$path = Yii::app()->baseUrl. '/' . $folder . '/' . $images->filename;
			else
				$path = Shop::register('no-pic.jpg');

		list($width, $height, $type, $attr) = getimagesize($folder . '/' . $images->filename);	
		$widthImg = isset($thumb) && $thumb
					? Shop::module()->imageWidthThumb 
					: Shop::module()->imageWidth;
		$getWidth = $widthImg/$width;
		$heightImg = $getWidth * $height;

		echo CHtml::image($path,
				$images->title,
				array(
					//'title' => $images->title,
					//'style' => 'margin-bottom: 10px;',
					'width' => $widthImg,
					'height'=> $heightImg
					
					)
				); 
		if(Shop::module()->useWithYum && Yii::app()->user->isAdmin()) 
			echo CHtml::link(Yii::t('ShopModule.shop', 'Delete Image'),
					array('delete', 'id' => $images->id)); 
	?>
		</div>
<?php
	$first = true;
	} else{ // thumb
		?>
		<div class="photo-thumb">
		<?php	
			if( $images->filename ) 
				$path = Yii::app()->baseUrl. '/' . $folder . '/' . $images->filename;
			else
				$path = Shop::register('no-pic.jpg');

		list($width, $height, $type, $attr) = getimagesize($folder . '/' . $images->filename);	
		$widthImg = isset($thumb) && $thumb
					? Shop::module()->imageWidthThumb 
					: Shop::module()->imageWidth;
		$getWidth = $widthImg/$width;
		$heightImg = $getWidth * $height;

		echo CHtml::image($path,
				$images->title,
				array(
					//'title' => $images->title,
					//'style' => 'margin-bottom: 10px;',
					'width' => 100,
					//'height'=> 100
					
					)
				); 
		if(Shop::module()->useWithYum && Yii::app()->user->isAdmin()) 
			echo CHtml::link(Yii::t('ShopModule.shop', 'Delete Image'),
					array('delete', 'id' => $images->id)); 
	?>
		</div>
	<?php 
	}
}
?>	
