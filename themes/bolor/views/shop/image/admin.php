<?php
$this->breadcrumbs=array(
	Yii::t('ShopModule.shop', 'Images') =>array('index'),
	Yii::t('ShopModule.shop', 'Manage'),
);
?>
<h2>
<?php 
echo Yii::t('ShopModule.shop', 'Images for'); 
echo '&nbsp;' . $product->title; 
?>
</h2>
<?php
if($images) { 
?>
<table class="tablelist" cellspacing="0" cellpadding="0">
<?php

	foreach($images as $idx=>$image){
?>
<tr class="rowlist">
<td class="colFirst"><?php echo CHtml::link(Shop::t('Edit'), array('/shop/image/update/id/'. $image->id.'/product_id/'.$image->product_id),array('class'=>''));?></td>
<td class="col smallimage">
	<?php 
	$rst = $image->getImage(array('thumb'=>true));
	echo CHtml::image($rst['path'],
		$image->title,
		array(
			//'title' => $model->title,
			//'style' => 'margin-bottom: 10px;',
			'class'=>'bigrounded',
			'width' => $rst['width'],
			'height'=> $rst['height']
			
			)
		);
	?>
	
</td>
<td class="col"><?php echo $image->title?></td>

</tr>
<?php
}
?>
</table>
<?php } ?>
<div id="shopcontent">

<?php
echo '<br class="clear"/>';

echo CHtml::link(Yii::t('ShopModule.shop', 'Cancel'), array('/shop/shop/admin'),array('class'=>'smallrounded blue'));
echo CHtml::link(Yii::t('ShopModule.shop', 'Upload new Image'), array('create', 'product_id' => $product->product_id),array('class'=>'smallrounded blue'));


?>
</div>
