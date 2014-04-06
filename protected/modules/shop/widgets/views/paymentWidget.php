<?php
$i = 0;
foreach(ShopPaymentSeller::model()->findAll("store_id = '".$store_id."'") as $method) {
	$attributes = json_decode($method->attribute);
	echo '<div class="row">';
	echo '<div>'.CHtml::radioButton($element_name, $checked, array(
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