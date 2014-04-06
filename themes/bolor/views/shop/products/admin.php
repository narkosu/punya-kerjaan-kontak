<?php
echo CHtml::link(Shop::t('Create a new Product'), array('products/create'),array('class'=>'smallrounded blue'));
?>
<?php 

//$model = new Products();
/*
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'price',
		array(
			'class'=>'CButtonColumn', 
			'template' => '{view}{update}{delete}{images}',
			'viewButtonUrl' => 'Yii::app()->createUrl("/shop/products/view",
			array("id" => $data->product_id))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/shop/products/update",
			array("id" => $data->product_id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/shop/products/delete",
			array("id" => $data->product_id))',
			'buttons' => array(
				'images' => array(
					'label' => Yii::t('ShopModule.shop', 'images'),
					'url' => 'Yii::app()->createUrl("/shop/image/admin",
					array("product_id" => $data->product_id))',
				),
			),
		),
	)
)
); 
*/
?>
<table class="tablelist" cellspacing="0" cellpadding="0">
<?php
foreach ($model as $idx=>$row){
?>
<tr class="rowlist">
<td class="colFirst"><?php echo CHtml::link(Shop::t('Edit'), array('/shop/products/update/id/'.$row['product_id']),array('class'=>''));?></td>
<td class="col smallimage">
	<?php if( $row['images']){
		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $row['images'][0]));
	}else {
		echo CHtml::image(Shop::register('no-pic.jpg'));
	}
	?>
	<?php echo CHtml::link(Shop::t('Photo'), Yii::app()->createUrl("/shop/image/admin",
					array("product_id" => $row['product_id'])),array('class'=>''));?>
	
	
</td>
<td class="col"><?php echo $row['title']?></td>
<td class="col"><?php echo Shop::priceFormat($row['price']); ?></td>
</tr>
<?php
}
?>
</table>

