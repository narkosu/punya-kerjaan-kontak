<div id="<?php echo $this->id?>">
<div class="row">
<select id="shiptoaddress" name="shiptoaddres" style="width:150px" store_id="<?php echo $this->store_id?>">
<option value>-</option>
<?php foreach ((array) $shipaddress as $to) {?>
<option value="<?php echo $to['id']?>" city_state_dn="<?php echo $to['city_state_dn']?>"><?php echo $to['firstname'].' '.$to['lastname']?></option>
<?php } ?>
</select>
<?php /*
	echo CHtml::dropDownList("shipto",
					'',	$shipaddress, array('id'=>'shiptoaddress','style'=>'width:150px',
					'empty' => '-',
					
					)); 
					*/
?>					
	
</div>
</div>
