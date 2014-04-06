<?php 
$folder = Shop::module()->productImagesFolder;

if( $model->filename ) {
		$path = Yii::app()->baseUrl. '/' . $folder . '/' . $model->filename;
		$pathOri = $folder . '/' . $model->filename; 
	} else {
		$path = Shop::register('no-pic.jpg');
		$pathOri = 'assets/125390da/no-pic.jpg';
	}	

list($width, $height, $type, $attr) = getimagesize($pathOri);	
$widthImg = isset($thumb) && $thumb
			? Shop::module()->imageWidthThumb 
			: Shop::module()->imageWidth;
$getWidth = $widthImg/$width;
$heightImg = $getWidth * $height;

echo CHtml::image($path,
		$model->title,
		array(
			//'title' => $model->title,
			//'style' => 'margin-bottom: 10px;',
			'width' => $widthImg,
			'height'=> $heightImg
			
			)
		); ?>
<?php 

if(Shop::module()->useWithYum && Yii::app()->user->isAdmin()) 
	echo CHtml::link(Yii::t('ShopModule.shop', 'Delete Image'),
			array('delete', 'id' => $model->id)); ?>
