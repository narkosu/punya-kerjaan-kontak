<select id="<?php echo $id?>" name="order_status">
	<?php foreach ((array) $data as $row) { ?>
		<option value="<?php echo $row->id?>"><?php echo $row->name?></option>
	<?php } ?>	
</select>