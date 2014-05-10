<?php 
$folder = Shop::module()->productImagesFolder;
$date = new DateTime($model->created_at);

if ( $model->filename ) {
    if ( !empty($size) ){
        $metaSize = json_decode($model->metas);
        $new_size = $metaSize->$size;
        if ( !empty($new_size) ){
            $extension = strstr($model->filename, '.');
            $new_filename   =   str_replace($extension , '_'.$new_size.$extension, $model->filename);
            
            $path           =   Yii::app()->baseUrl. '/' . 
                                $folder . '/' . 
                                $date->format('Y/m/d') . '/' . 
                                $new_filename;
        }else {
            $path = Yii::app()->baseUrl. '/' . $folder . '/' . $date->format('Y/m/d').'/o/'.$model->filename;    
        }
    }else{
        $path = Yii::app()->baseUrl. '/' . $folder . '/' . $date->format('Y/m/d').'/o/'.$model->filename;
    }
    
  
} else {
	$path = Shop::register('no-pic.jpg');
}

if ( $custom ){
				$width = $dWidth;
}else{
		$width = isset($thumb) && $thumb
				? Shop::module()->imageWidthThumb 
				: Shop::module()->imageWidth;
}

echo CHtml::image($path,
		$model->title,
		array(
			'title' => $model->title,
			'style' => 'margin-bottom: 10px;',
			'width' => $width)
		); ?>
<?php 
if( Shop::module()->useWithYum && Yii::app()->user->isAdmin()) 
	echo CHtml::link(Yii::t('ShopModule.shop', 'Delete Image'),
			array('delete', 'id' => $model->id)); ?>
