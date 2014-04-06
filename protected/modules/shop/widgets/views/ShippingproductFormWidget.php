<div id="<?php echo $this->id?>">

<div class="row">
	<label>Dikirim dari</label>
	<div class="input">
	<?php echo CHtml::dropDownList("ShippingProduct[shipping_from]",
		3171,	State::model()->complete(), array('id'=>'shippingfrom',
		'empty' => '-'));  
	?>	
	</div>
</div>
<div class="row">
	<label></label>
	<div class="input">
	<table cellpadding="0" cellspacing="0" class="shipping_produk">
	<tr>
	<th>Dikirim ke</th>
	<th>Biaya</th>
	<th>Dengan produk lain</th>
	<th></th>
	</tr>
	<tr class="local">
	<td class="shipsto" shipstoid="3171">DKI JAKARTA - JAKARTA SELATAN
		<?php echo CHtml::hiddenField("ShippingProduct[shipsto][3171]","3171",array('style'=>'width:45px;',
						'size'=>25,'maxlength'=>45)); ?>
	</td>
	<td><?php echo CHtml::textField("ShippingProduct[cost][3171]","",array('style'=>'width:45px;',
						'size'=>25,'maxlength'=>45)); ?></td>
	<td><?php echo CHtml::textField("ShippingProduct[other_cost][3171]","",array('style'=>'width:45px;',
						'size'=>25,'maxlength'=>45)); ?></td>
	<td class="lastcol"></td>
	</tr>
	<?php if ( $data ){ 
		foreach ($data as $record){
		
	?>
		<tr class=".listrecord_<?php echo $record['kode_propinsi'].$record['kode_kabupaten']?>">
		<td class="shipsto" shipstoid="<?php echo $record['kode_propinsi'].$record['kode_kabupaten']?>"><?php echo $record['propinsi']?> - <?php echo $record['kabupaten']?>
			<?php echo CHtml::hiddenField("ShippingProduct[shipsto][".$record['kode_propinsi'].$record['kode_kabupaten']."]",$record['kode_propinsi'].$record['kode_kabupaten'],array('style'=>'width:45px;',
							'size'=>25,'maxlength'=>45)); ?>
		</td>
		<td><?php echo CHtml::textField("ShippingProduct[cost][".$record['kode_propinsi'].$record['kode_kabupaten']."]",$record['price'],array('style'=>'width:45px;',
							'size'=>25,'maxlength'=>45)); ?></td>
		<td><?php echo CHtml::textField("ShippingProduct[other_cost][".$record['kode_propinsi'].$record['kode_kabupaten']."]",$record['price_other_item'],array('style'=>'width:45px;',
							'size'=>25,'maxlength'=>45)); ?></td>
		<td class="lastcol"><span class="icon-remove delete" delid="<?php echo $record['kode_propinsi'].$record['kode_kabupaten']?>"></span></td>
		</tr>
	<?php }
	}
	?>
	<tr class="newrecord">
	<td class="shipsto"><?php echo CHtml::dropDownList("shippingProduct_temp",
		'',	State::model()->complete(), array('id'=>'ShippingProduct_shipping_from_newrecord',
		'empty' => '-'));  
	?></td>
	<td><?php echo CHtml::textField("shippingProduct_temp_cost","",array('style'=>'width:45px;',
						'size'=>25,'maxlength'=>45,'id'=>'new_record_cost')); ?></td>
	<td><?php echo CHtml::textField("shippingProduct_temp_othes_cost","",array('style'=>'width:45px;',
						'size'=>25,'maxlength'=>45,'id'=>'new_record_other_cost')); ?></td>
	<td class="lastcol"></td>
	</tr>
	<tr class="lastrrecord">
	<td colspan="3"><span class="smallrounded blue addshipping">Tambah tujuan</span></td>
	
	</tr>
	</table>
	</div>
	
</div>
</div>
