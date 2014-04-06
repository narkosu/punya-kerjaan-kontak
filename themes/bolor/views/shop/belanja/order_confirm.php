<?php
$this->renderPartial('/order/waypoint', array('point' => 1));

$this->breadcrumbs=array(
		Yii::t('ShopModule.shop', 'Customers')=>array('index'),
		Yii::t('ShopModule.shop', 'Register as a new Customer'),
		);

?>
	<div class="order-shipping-address">
	<h2>Alamat Pengiriman & Metode Pembayaran </h2>
	<form method="post">
        <div class="body">
            <div id="address-ready">
				<div class="address-row">
					<h4 class="title">
						Pengiriman
					</h4>

					<div class="address-block">
						<div>
							<strong style="text-transform:uppercase;"><?php echo $deliveryAddress['firstname'].' '.$deliveryAddress['lastname']?></strong><br>
							<?php echo $deliveryAddress['street']?><br><?php echo $deliveryAddress['city']?>, 
							<?php echo $deliveryAddress['state']?> <?php echo $deliveryAddress['zipcode']?><br>
							<?php echo $deliveryAddress['country']?>
						</div>
						
					</div>
				</div>
				
				<div class="address-row payment-methode">
					<h4 class="title">
						Pembayaran
					</h4>
					<div class="payment-block">
										
						<?php
							$i = 0;
							foreach(ShopPaymentSeller::model()->findAll("store_id = '".$store_id."'") as $method) {
								$attributes = json_decode($method->attribute);
								echo '<div class="row">';
								echo '<div>'.CHtml::radioButton("PaymentMethod", $i == 0, array(
											'value' => $method->id,'style'=>'width:20px'));
								
								echo $method->payment_methode->title;
								echo '</div>';
								echo '<div style="border:1px solid #eee;padding:5px 10px;">';
								foreach ((array) $attributes as $kodeAttr =>$payments ) {
									echo '<div>';
									echo $payments->bank;
									echo '</div>';
								}
								echo '</div>';
								//echo CHtml::tag('p', array(), $method->payment_methode->description);
								
								echo '</div>';
								echo '<div class="clear"></div>';
								$i++;
							}
								?>
					</div>
				</div>
				
				<div class="address-row paymenet-methode">
					<div class="address-block">
					<button type="submit" name="nextbutton" class="smallrounded orange">
						Lanjutkan Order >
					</button>
					</div>
				</div>
				<div>
					<input type="checkbox" value="1" name="accept_terms"> Accept terms and condition ?
				</div>
			</div>
		</div>
		</form>
	</div>
	
	<div class="order-detil-summary clear">
		<div class="order-summary-inline-details">Order details from wonderfold</div>
		
		<table cellpadding="0" cellspacing="0" class="shopping_cart">
			<thead>
				<tr>
					<th>Item</th>
					<th>Nama produk</th>
					<th>Jumlah</th>
					<th>Harga Satuan</th>
					<th>Variasi</th>
					<th class="order-summary-inline-total">Order total</th>
				</tr>
			</thead>
			<?php
				foreach($cart as $position => $product) {
					
					if ( !empty($product['product_id']) ) {
					
					if(@$model = Products::model()->findByPk($product['product_id'])) {
						$variations = '';
						if(isset($product['Variations'])) {
							foreach($product['Variations'] as $specification => $variation) {
								$specification = ProductSpecification::model()->findByPk($specification);
								if($specification->is_user_input)
									$variation = $variation[0];
								else
									$variation = ProductVariation::model()->findByPk($variation);

								$variations .= $specification . ': ' . $variation . '<br />';
							}
						}
						?>
							<tr>
							<td width="175" class="rowitem "><?php echo $model->getImage(0, true)?></td>
							<td class="rowitem "><?php echo $model->title?></td>
							<td  class="rowitem "><?php echo $product['amount']?></td>
							<td class="rowitem "><?php echo Shop::priceFormat($model->price);?></td>
							<td  class="rowitem ">
								<?php if ( !empty($variations) ) { ?>
									<div class="row"><div class="title"><?php echo Shop::t('Variasi Produk')?></div>
									<div><?php echo $variations?></div>
									<div><?php echo '+ Variasi : '.Shop::priceFormat($model->getPrice(@$product['Variations']))?>
									
									</div>
									
									</div>
								<?php } ?>
							</td>
							<td><?php echo Shop::priceFormat($model->getPrice(@$product['Variations'], @$product['amount']))?></td>
							
							</tr>
							<?php
						
						}
					}	
				}
			?>	
			
		</table>
		
		<div class="clear"></div>
	</div>