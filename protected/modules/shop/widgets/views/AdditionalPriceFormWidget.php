<div id="<?php echo $id?>">
<?php foreach ((array)$additionalFee as $row) { ?>

<div id="rowaf_<?php echo $row->id?>" class="row">
	<div class="title"><?php echo $row->description?></div>
	<div class="figure"><?php echo $row->price?></div>
</div>
<?php } ?>
<div id="row_newrecord" class="row">
	<form id="addfeenewrecord" action="<?php echo Yii::app()->createUrl('shop/order/ajaxadditionalFee')?>">
		<input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id?>">
		<input type="hidden" id="store_id" name="store_id" value="<?php echo $store_id?>">
		<div class="title">
			<textarea id="add_description" name="description" style="width:300px;height:22px;margin-top: -6px;"></textarea>	
		</div>
		<div class="figure">
			<input type="text"  id="add_fee" name="price" style="width:80px;">
			<span class="btn saveadditionalprice">+</span>
		</div>
	</form>
</div>
</div>