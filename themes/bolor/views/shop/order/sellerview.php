<style>
.summary .row{
	padding:10px;
	border-bottom: 1px solid #eee;
	
}
.summary .row form{
	margin:0px;
}
.summary .row .figure, .summary .row .title{
	display: inline-block;
}
.summary .row .title{
	width:340px;
}
</style>

<?php
Shop::register('css/shop.css');
$this->breadcrumbs=array(
		Shop::t('Order Penjual')=>array('seller'),
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
<div>
	<h3>Status</h3>
	<?php $this->widget('shop.widgets.updatestatusWidget',
						array('option'=>
							array('store_id'=>$model->store_id,
								  'order_id'=>$model->order_id
								  )
							));?>
</div>
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
	<th>Biaya Pengiriman</th>
	<th>Total Harga</th>
	</tr>
	<?php foreach($model->products as $product) { ?>
	<tr class="local">
	<td class="shipsto" shipstoid="3171">
	<?php echo ($product->product_name ? $product->product_name : $product->product->title)?><br>
	<?php echo $product->renderSpecifications() ?>
	
	</td>
	<td><?php echo ($price = ($product->product_price != 0 ) ? $product->product_price : $product->product->price)?></td>
	<td><?php echo $product->amount?></td>
	<td></td>
	<td><?php echo $product->total_price = ($product->total_price ? $product->total_price : $price * $product->amount )?></td>
	
	</tr>
	<?php
	$total += $product->total_price; 
	} ?>
	<tr class="local">
	<td >
	Sub Total
	
	</td>
	<td></td>
	<td></td>
	<td></td>
	<td><?php echo $total;?></td>
	
	</tr>
	</tbody>
</table>
<div style="clear:both;margin-top:10px;"> </div>
<div>
	<div style="float:left;">
		
	</div>
	<div id="summary" style="float:right;width:500px;">
		
			<div class="summary">
				<div class="row">
					<div class="title">Sub-total</div>
					<div class="figure"><?php echo $total;?></div>
				</div>
				<?php if ( $model->store_id == Yii::app()->user->getState('storeLogin')->id ){ ?>
					<?php $this->widget('shop.widgets.additionalpriceWidget',array('option'=>array('store_id'=>$model->store_id,'order_id'=>$model->order_id)));?>
				<?php } ?>
				<div class="row">
					<div class="title">Tax</div>
					<div class="figure">$217.40</div>
				</div>
				
				<div class="row total">
					<div class="title">Amount Due</div>
					<div class="figure">$4565.40</div>
				</div>
				
				<div class="btn">Invoice Paid</div>
			</div>
		
	</div>
	<div style="clear:both;"> </div>
</div>

<div style="margin-bottom:10px;"></div>

<span class="btn">Update & Kirim konfirmasi ke Pembeli</span>
<span class="btn">Kirim konfirmasi ke Pembeli</span>
<div style="margin-bottom:10px;"></div>