<?php
Shop::register('css/shop.css');
$this->breadcrumbs=array(
		Shop::t('Orders')=>array('admin'),
		$model->order_id,
		);

?>
<div class="buttons"> 
<?php

echo CHtml::link(Shop::t('Delivery slip'), array(
			'//shop/order/slip', 'id' => $model->order_id )); 

echo CHtml::link(Shop::t('Invoice'), array(
			'//shop/order/invoice', 'id' => $model->order_id)); 

echo CHtml::link(Shop::t('Back to Orders'), array(
			'//shop/order/admin')); 

?>
</div>
<h2> <?php echo Shop::t('Order') ?> #<?php echo $model->order_id; ?></h2>
<div style="float:left;width:400px;margin-right:10px;">
<h3> <?php echo Shop::t('Ordering Info'); ?> </h3>

<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'order_id',
				'customer.username',
					array(
						'label' => Shop::t('Ordering Date'),
						'value' => date('d. m. Y G:i',$model->ordering_date)
					),
				'ordering_done',
				'ordering_confirmed',
				),
			)); ?>
	<h3> <?php echo Shop::t('Customer Info'); ?> </h3>
	<?php
$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model->customer,
		'attributes'=>array(
			'email',
			),
		)); ?>
</div>
<div style="float:left;width:400px;">
	<div class="summary_delivery_address">
	<h3> <?php echo Shop::t('Delivery address'); ?> </h3>
	<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model->deliveryAddress,
				'attributes'=>array(
					'firstname',
					'lastname',
					'street',
					'zipcode',
					'city',
					'country'
					),
				)); ?>
	</div>

</div>
<div style="clear:both"></div>
<hr/>
<div style="float:left;width:400px;margin-right:10px;">
<?php $this->renderPartial('/paymentMethod/view', array(
	'model' => $model->paymentMethod));
?>
</div>
<div style="float:left;width:400px;margin-right:10px;">
<?php
$this->renderPartial('/shippingMethod/view', array(
	'model' => $model->shippingMethod)); 

?>
</div>
<div style="clear:both"></div>
<h3> <?php echo Shop::t('Ordered Products'); ?> </h3>
<table cellpadding="0" cellspacing="0" class="shipping_produk">
	<tbody><tr>
	<th>Nama Produk</th>
	<th>Harga</th>
	<th>Jumlah</th>
	<th></th>
	</tr>
	<?php foreach($model->products as $product) { ?>
	<tr class="local">
	<td class="shipsto" shipstoid="3171">
	<?php echo ($product->product_name ? $product->product_name : $product->product->title)?><br>
	<?php echo $product->renderSpecifications() ?>
	
	</td>
	<td><?php echo ($price = ($product->product_price != 0 ) ? $product->product_price : $product->product->price)?></td>
	<td><?php echo $product->amount?></td>
	<td><?php echo ($product->total_price ? $product->total_price : $price * $product->amount )?></td>
	<td class="lastcol"></td>
	</tr>
	<?php } ?>
	
	</tbody></table>

<div style="clear:both;"> </div>
