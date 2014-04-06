<div id="<?php echo $this->id?>">
<div class="row">
	<div style="font-weight:bold;">Dikirim dari
		<?php echo State::model()->complete('3171');?>
	</div>
	
</div>
<div class="row clear">
	<label></label>
	<div class="input">
	<table cellpadding="0" cellspacing="0" class="shipping_produk">
	<tr>
	<th>Dikirim ke</th>
	<th>Biaya</th>
	<th>Dengan produk lain</th>
	<th></th>
	</tr>
	<?php if ( $data ){ 
		$loop = 1;
		foreach ($data as $record){
			
	?>
			<tr class="listrecord_<?php echo $record['kode_propinsi'].$record['kode_kabupaten']?> <?php echo ($loop > 1 ? 'listshowmore':'');?>" style="<?php echo ($loop > 1 ? 'display:none;':'');?>">
			<td class="shipsto" shipstoid="<?php echo $record['kode_propinsi'].$record['kode_kabupaten']?>"><?php echo $record['propinsi']?> - <?php echo $record['kabupaten']?>
				
			</td>
			<td><?php echo Shop::priceFormat($record['price'])?></td>
			<td><?php echo Shop::priceFormat($record['price_other_item']) ?></td>
			<td><?php if ( $loop == 1 ) { ?><span class="icon-chevron-down showmore" ></span><?php } ?></td>
			</tr>
	<?php 
			
			$loop++;
		}
	}
	?>
	</table>
	</div>
	
</div>
<div class="clear"></div>
</div>
