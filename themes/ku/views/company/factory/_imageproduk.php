<?php 

$folder = Shop::module()->productImagesFolder;

/*if($model->filename) 
	$path = Yii::app()->baseUrl. '/' . $folder . '/' . $model->filename;
	else
	$path = Shop::register('no-pic.jpg');

	if ($custom){
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
			'width' => $width,
      'class' => $class)
		); ?>
<?php 

if(Shop::module()->useWithYum && Yii::app()->user->isAdmin()) 
	echo CHtml::link(Yii::t('ShopModule.shop', 'Delete Image'),
			array('delete', 'id' => $model->id));
 *  ?>
 */
if($model->images) {
			foreach($model->images as $key=>$image) {
        if ( $image->filename)
          $path = Yii::app()->baseUrl. '/' . $folder . '/' . $image->filename;
        else
          $path = Shop::register('no-pic.jpg');
        
				$images .= <<<LINKEMAGE
                <a href='{$path}' class='cloud-zoom-gallery'
       title='Thumbnail 1'
       rel="useZoom: 'zoom1', smallImage: '{$path}' ">
        <img src="{$path}" alt="Thumbnail 1" width="48" height="64"/>
    </a>
LINKEMAGE;
        //$this->renderPartial('/image/view', array( 'model' => $image,'class'=>'cloudzoom'));
				//echo '<br />'; 
			}
	 } else 
		$this->renderPartial('/image/view', array( 'model' => new Image()));
?>

<div>
<a href='http://www.professorcloud.com/images/zoomengine/bigimage00.jpg' class='cloud-zoom' id='zoom1'
  rel="adjustX: 10, adjustY:-4, softFocus:true , zoomWidth:700 , position:'right'">
   <img src="http://www.professorcloud.com/images/zoomengine/smallimage.jpg" alt='' align="left"
        title="Optional title display"/>
</a>
</div>
<div style="clear:both;">
  <?PHP echo $images?>
    <a href='http://www.professorcloud.com/images/zoomengine/bigimage00.jpg' class='cloud-zoom-gallery'
       title='Thumbnail 1'
       rel="useZoom: 'zoom1', smallImage: 'http://www.professorcloud.com/images/zoomengine/smallimage.jpg' ">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage.jpg" alt="Thumbnail 1"/>
    </a>

    <a href='http://www.professorcloud.com/images/zoomengine/bigimage01.jpg' class='cloud-zoom-gallery'
       title='Thumbnail 2'
       rel="useZoom: 'zoom1', smallImage: ' http://www.professorcloud.com/images/zoomengine/smallimage-1.jpg'">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage-1.jpg" alt="Thumbnail 2"/>
    </a>

    <a href='http://www.professorcloud.com/images/zoomengine/bigimage02.jpg' class='cloud-zoom-gallery'
       title='Thumbnail 3'
       rel="useZoom: 'zoom1', smallImage: 'http://www.professorcloud.com/images/zoomengine/smallimage-2.jpg' ">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage-2.jpg" alt="Thumbnail 3"/>
    </a>

    <a href='http://www.professorcloud.com/images/zoomengine/bigimage03.jpg' class='cloud-zoom-gallery'
       title='Thumbnail 1'
       rel="useZoom: 'zoom1', smallImage: 'http://www.professorcloud.com/images/zoomengine/smallimage-3.jpg' ">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage-3.jpg" alt="Thumbnail 1"/>
    </a>

    <a href='http://www.professorcloud.com/images/zoomengine/bigimage04.jpg' class='cloud-zoom-gallery'
       title='Thumbnail 2'
       rel="useZoom: 'zoom1', smallImage: ' http://www.professorcloud.com/images/zoomengine/smallimage-4.jpg'">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage-4.jpg" alt="Thumbnail 2"/>
    </a>

</div>