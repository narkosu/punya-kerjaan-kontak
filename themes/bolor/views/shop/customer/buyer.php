<?php
$this->renderPartial('/order/waypoint', array('point' => 1));

$this->breadcrumbs=array(
		Yii::t('ShopModule.shop', 'Customers')=>array('index'),
		Yii::t('ShopModule.shop', 'Register as a new Customer'),
		);

?>
	<div class="order-detil-summary clear">
		<div class="order-summary-inline-details">Order details from <?php echo Shopstore::model()->findByPk($sid)->shop_name?></div>
		
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
	
	<!------------------------------------------->
	<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'new-address-form',
					//'action'=>Yii::app()->createUrl('shop/order/shipto/sid/'.$sid),
					'enableAjaxValidation'=>false,
				)); ?>
	<div id="kotak-keranjang-belanja">
		<div class="kotak-keranjang-store">
			<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td width="70%" style="vertical-align:top">
				<div class="title namestore">Pilih Alamat Pengiriman & Pembayaran</div>
				<table cellpadding="0" cellspacing="0" class="shopping_cart">
					<tr>
					<td >
						<?php 
					
						foreach ((array) $address as $blockAddress) { 
						?>
						<div class="address-row">
							<div >
								<?php echo CHtml::radioButton('checkout[toaddress]', (isset($_POST['checkout']['toaddress']) && $_POST['checkout']['toaddress'] == $blockAddress['id'] ? 'checked' : ''), array(
									'value' => $blockAddress['id'],'class'=>'checkout_toaddress','style'=>'width:20px',
									'onclick'=>'
											if ($(this).is(":checked")){
												$("#NewAddress").removeAttr("checked");
												$("#new-address").hide();
											}	
											'
									));?>
							</div>
							<div class="address-block">
								<div>
									<strong><?php echo $blockAddress['firstname'].' '.$blockAddress['lastname']?></strong><br>
									<?php echo $blockAddress['street']?><br><?php echo $blockAddress['city']?>, 
									<?php echo $blockAddress['state']?> <?php echo $blockAddress['zipcode']?><br>
									<?php echo $blockAddress['country']?>
								</div>
								<div class="papan-tombol">
								<a href=""  class="overlay-trigger edit-delete">
									<span class="icon-edit"> Edit</span>
								</a>
								<a href="" class="overlay-trigger edit-delete">
									<span class="icon-remove"> Delete</span>
								</a>
								</div>
							</div>

						</div>
						<?php } ?>
					
					</td>
					</tr>
					<tr><td style="padding:0px 10px 10px 10px;">
					
							<?php echo CHtml::checkBox("NewAddress",(isset($_POST['NewAddress']) && $_POST['NewAddress'] == 1 ? 'checked' : ''),
										array("value"=>"1","onclick"=>'
											
											if ($(this).is(":checked")){
												$("#new-address").show();
												$(".checkout_toaddress").removeAttr("checked");
											}else{
												$("#new-address").hide();
											}
											')
										)?> Alamat lain</td></tr>
				</table>
				
				<!--- new address -->
				
				<div id="new-address" style="display:none;">
					<h2>Enter a new address</h2>
					<div id="new-address-area">
						<?php 
						if ( empty($newaddress)){
							$model = new Address;
						}else{
							$model = $newaddress;
						}
						
						$model->country_id = ( $model->country_id ? $model->country_id : 100);
						$model->location_type = ( $model->location_type ? $model->location_type : 'dn');
						?>
						<?php echo $form->errorSummary($model); ?>

						<div class="row">
							<?php echo $form->labelEx($model,'firstname'); ?>
							<div class="input">
							<?php echo $form->textField($model,'firstname'); ?>
							<?php echo $form->error($model,'firstname'); ?>
							</div>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'lastname'); ?>
							<div class="input">
							<?php echo $form->textField($model,'lastname'); ?>
							<?php echo $form->error($model,'lastname'); ?>
							</div>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'street'); ?>
							<div class="input">
							<?php echo $form->textField($model,'street'); ?>
							<?php echo $form->error($model,'street'); ?>
							</div>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'zipcode'); ?>
							<div class="input">
							<?php echo $form->textField($model,'zipcode'); ?>
							<?php echo $form->error($model,'zipcode'); ?>
							</div>
						</div>
						
						<div class="row" id="address_state_row"  style="<?php echo ($model->location_type == 'dn' ? 'display:none;':'')?>">
							<?php echo $form->labelEx($model,'state'); ?>
							<div class="input">
							<?php echo $form->textField($model,'state'); ?>
							
							<?php echo $form->error($model,'state'); ?>
							</div>
						</div>
						
						<div class="row" id="address_city_row" >
						
							<?php echo $form->labelEx($model,'city'); ?>
							<div class="input">
							<?php echo $form->textField($model,'city',array('style'=>( $model->location_type == 'dn' ? 'display:none;':''))); ?>
							<?php echo $form->dropDownList($model, 'city_state_dn', State::model()->complete(), array(
				'empty' => '-','id'=>'address_city_state_dn','style'=>( $model->location_type == 'ln' ? 'display:none;':''))); ?>
							<?php echo $form->error($model,'city'); ?>
							</div>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'country'); ?>
							<div class="input">
							<?php echo $form->hiddenField($model,'location_type',array('value'=>($model->country_id == 100 ? 'dn' : 'ln'))); ?>
							<?php $this->widget('application.extensions.CountryWidget', array(
							'model' => $model,
							'field' => 'country_id',
							'change' => 'if ( $(this).val() != 100 ){
											$("#address_city_state_dn").hide();
											$("#address_city_state_dn").attr("name","address_city_state_dn");
											
											$("#Address_city").show().attr("name","Address[city]");
											$("#Address_location_type").val("ln");
											$("#address_state_row").show();
										}else{
											$("#address_city_state_dn").show().attr("name","Address[city_state_dn]");
											$("#Address_city").hide().attr("name","address_city_state_dn");
											$("#Address_location_type").val("dn");
											$("#address_state_row").hide();
										}',
							)); ?>
							<?php echo $form->error($model,'country'); ?>
							</div>
						</div>

						<div class="submit" style="padding-top:10px;">
							<span class="button-medium"><span><input value="Ship to this address" type="submit" class="smallrounded orange"> </span></span>
						</div>
				
					</div>
				</div>
			 
				<!--- new address -->
				
				
			</td>	
			<td width="30%" style="vertical-align:top;border-left:1px solid #DADFE5;">
				<div class="title namestore">Pembayaran</div>
				
				<?php echo '<div style="padding:15px;">';
				$this->widget('shop.widgets.paymentWidget',array('name'=>'checkout[payment_method]','checked'=>( isset($_POST['checkout']['payment_method']) ? $_POST['checkout']['payment_method'] : ''),'store_id'=>$sid));
				echo '</div>';
				?>
				<div style="padding:15px;">
				<button type="submit" class="smallrounded blue" style="padding:20px;"><span class="size20">Lanjutkan Order</span> <span style="margin-left:15px;font-size:20px;" class="icon-large icon-ok "></span></button>
				</div>
			</td>
			</tr>
			</table>
		</div>
	</div>
	<?php $this->endWidget(); ?>         
	
	