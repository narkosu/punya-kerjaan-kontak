<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	Yii::t('ShopModule.shop', 'Manage'),
);

?>
<?php 
/*
$model = new Order();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'order_id',
		'customer.address.firstname',
		'customer.address.lastname',
		array('name' => 'ordering_date',
			'value' => 'date("M j, Y", $data->ordering_date)'),
		array(
			'class'=>'CButtonColumn', 
			'template' => '{view}',
		),

	),
)); 
*/

?>
<table class="tablelist" cellspacing="0" cellpadding="0">
<?php
foreach ($model as $idx=>$row){
?>
<tr class="rowlist">
<td class="colFirst"><?php echo CHtml::link(Shop::t('Lihat'), array('/shop/order/view/id/'.$row['order_id']),array('class'=>''));?></td>
<td class="col">
	<?php //echo $row['customer']['address']['firstname'];?>
	
	
</td>
<td class="col"><?php echo date("M j, Y", $row['ordering_date'])?></td>
</tr>
<?php
}
?>
</table>
