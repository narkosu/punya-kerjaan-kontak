<?php
Shop::register('css/shop.css');

if($this->id == 'shoppingCart')
	$this->renderPartial('/order/waypoint', array('point' => 0));

if(!isset($products)) 
	$products = Shop::getCartContent();

if(!isset($this->breadcrumbs) || ($this->breadcrumbs== array()))
	$this->breadcrumbs = array(
			Shop::t('Shop') => array('//shop/products/'),
			Shop::t('Shopping Cart'));
?>

<h2><?php echo Shop::t('Shopping cart'); ?></h2>

<div id="kotak-keranjang-belanja">
	<div class="buttons buy-additional">
	<?php
	echo CHtml::link(Shop::t('Buy additional Products'), array(
				'//shop/products'), array('class'=>'button orange bigrounded'));
	?>
	</div>
	
	<?php
	if($products) {
		foreach($products as $store_id => $store_products) {
			echo '<div id="keranjang_'.$store_id.'" class="kotak-keranjang-store">';
			echo '<table cellpadding="0" cellspacing="0" width="100%">';
			echo '<tr>';
			echo '<td width="70%" style="vertical-align:top">';
			echo '<div class="title namestore">'.CHtml::link(Shopstore::model()->findByPk($store_id)->shop_name, array('/@'.Shopstore::model()->findByPk($store_id)->shop_name.'/produk')).'</div>';
			?>
			<table cellpadding="0" cellspacing="0" class="shopping_cart">
			<?php
				foreach($store_products as $position => $product) {
					
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
							<td width="175" class="rowitem descphoto"><?php echo $model->getImage(0, true)?></td>
							<td class="rowitem desccontent">
								<div class="title"><?php echo $model->title?></div>
								<div class="row"><?php echo Shop::t('Amount') ?> : <?php echo CHtml::textField('amount_'.$store_id.'_'.$position,
									$product['amount'], array(
										'size' => 4,
										'position' => $position,
										'sid' => $store_id,
										'class' => 'amount_',
										)
									);?>
								</div>
								<div class="row">
									<?php echo 'Harga @: '.Shop::priceFormat($model->price);?>
								</div>	
								<?php if ( !empty($variations) ) { ?>
									<div class="row"><div class="title"><?php echo Shop::t('Variasi Produk')?></div>
									<div><?php echo $variations?></div>
									<div><?php echo 'Harga @ + Variasi : '.Shop::priceFormat($model->getPrice(@$product['Variations']))?>
									
									</div>
									
									</div>
								<?php } ?>
								
								<div class="row">
								<span><?php echo 'Total harga : <span class="text-right price_'.$store_id.'_'.$position.'">'.Shop::priceFormat($model->getPrice(@$product['Variations'], @$product['amount']))?> </span>
								<span class="shipping_area_<?php echo $store_id.'_'.$product['product_id']?>"></span>	
								</div>
								<?php
								echo CHtml::link(Shop::t('Remove'), array(
										'//shop/shoppingCart/delete',
										'id' => $store_id.','.$position,
										
										), array(
											'confirm' => Shop::t('Are you sure?'), 'class'=>'button smallrounded orange'))?>
								</td>
							</tr>
							<?php
						
						}
					}	
				}
			?>	
			
			<?php echo '</table>';
			echo '</td><td width="30%" class="kotak-pendukung"> ';
			
			
			echo '<table>
					<tr>
					<td class="text-right no-border" colspan="2">
					<div class="price_total_'.$store_id.'">'.Shop::getPriceTotal($store_id).'</div></td>
					<td class="no-border"></td></tr>';
			if ( Yii::app()->user->isGuest ) {
				echo '<tr><td style="padding:10px;">Dikirim Ke</td><td>';
				
				echo CHtml::dropDownList("shipto",
						'',	State::model()->complete(), array('id'=>'shippingfrom','style'=>'width:150px',
						'empty' => '-',
						'onchange'=>"
							$.ajax({
								url:'".$this->createUrl('//shop/shoppingCart/UpdatePricingByShipping')."',
								data: $(this).serialize()+'&store_id=".$store_id."',
								dataType:'json',
								success: function(result) {
									$.each(result[".$store_id."], function(product_id, item) {
										alert(product_id);
										$('.shipping_area_".$store_id."_'+product_id).html(' + Biaya kirim : ' + item.single_cr);
									  });
									
								},
								error: function() {
									$(this).css('background-color', 'red');
								},

								});
						
						//alert($(this).val())
						
						"
						));  
				
				echo '</td></tr>';
			} else { 	
				echo '<tr><td style="padding:10px;">Dikirim Ke</td><td>';
				$this->widget('shop.widgets.shiptoaddressWidget',array('store_id'=>$store_id));
				
				echo '</td></tr>';
				echo '<tr><td colspan="2" style="padding:10px;"><div id="address_'.$store_id.'"></div></td></tr>';
			}	
			
			echo '</table>';
			echo '<div style="padding-top:10px;">';
			$this->widget('shop.widgets.paymentWidget',array('store_id'=>$store_id));
			echo '</div>';
				if(Yii::app()->controller->id != 'order') { ?>
					<div class="buttons">
					<?php
					echo CHtml::link(Shop::t('Check out order'), array(
								'//shop/belanja/buyer/sid/'.$store_id), array('class'=>'button blue bigrounded'));
					?>
					</div>
			<?php	
			echo '</td></tr>';
			echo '</table>';
			
			
			}
			
			echo '</div>';
			
		}
		
		Yii::app()->clientScript->registerScript('amount_',"
			$('.amount_').keyup(function() {
				var position = $(this).attr('position');
				var sid = $(this).attr('sid');
				
				var thisElement = $(this);
				$.ajax({
					url:'".$this->createUrl('//shop/shoppingCart/updateAmount')."',
					data: $(this).serialize(),
					success: function(result) {
						alert(result);
						thisElement.css('background-color', 'lightgreen');
						$('.widget_amount_'+position).css('background-color', 'lightgreen');
						$('.widget_amount_'+position).html(thisElement.val());
						$('.price_'+sid+'_'+position).html(result);	
						$('.price_'+sid+'_'+position).html(result);	
						$('.price_total_'+sid).load('".$this->createUrl(
						'//shop/shoppingCart/getPriceTotal/sid/')."/'+sid);
					},
					error: function() {
						$(this).css('background-color', 'red');
					},

					});
		});
			");	
	?>	
</div>
<?php
/*
 if(Yii::app()->controller->id != 'order') {
echo '<div class="buttons">';
echo CHtml::link(Shop::t('Buy additional Products'), array(
			'//shop/products'), array('class'=>'button btn-previous'));

echo '<br />';
			
echo CHtml::link(Shop::t('Buy this products'), array(
			'//shop/order/create'), array('class'=>'button btn-next')); 
echo '</div>';
}
*/
?>
<div class="clear"></div>

<?php

} else echo Shop::t('Your shopping cart is empty'); ?>

