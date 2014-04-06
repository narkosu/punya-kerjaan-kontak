<div id="<?php echo $id?>">
	<span class="btn">Tambah Biaya</span>
	<div>
		<table cellpadding="0" cellspacing="0" class="shipping_produk">
			<tbody><tr class="firstrow">
			<th>Penambahan</th>
			<th>Biaya</th>
			<th></th>
			<th>Jumlah</th>
			
			</tr>
			<?php foreach ((array)$additionalFee as $row) { ?>
				<tr	id="rowaf_<?php echo $row->id?>" class="newrecord" >
					<td >
						<?php echo $row->description?>
					</td>
					<td><?php echo $row->price?>
					<td></td>
					<td class="lastcol"><span class="icon-remove removeitem" relhref="<?php echo Yii::app()->createUrl('shop/order/ajaxremoveadfee')?>" delid="<?php echo $row->id?>"></span></td>
				</tr>
			<?php } ?>
			<tr class="lastrecord"><td colspan="4"></td></tr>	
			<form id="newrecord" action="<?php echo Yii::app()->createUrl('shop/order/ajaxadditionalFee')?>">
				<input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id?>">
				<input type="hidden" id="store_id" name="store_id" value="<?php echo $store_id?>">
				<tr class="newrecord" >
				<td >
					<textarea id="add_description" name="description"></textarea>	
				</td>
				<td><input type="text"  id="add_fee" name="price"></td>
				<td><span class="btn saveadditionalprice">Tambahkan</span></td>
				<td></td>
				</tr>
			</form>
			</tbody>
		</table>			
	</div>
	
</div>