<table>
<?php 
foreach ( (array) $dataProvider as $idx =>$data){
?>
<tr class="view">
<td colspan="2">
		<?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?>
</td>
</tr>
<tr class="view">
    
    
    <td class="product-overview-image">	
          	<?php 
		  	if($data->images){
		   		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
			}else {
				echo CHtml::image(Shop::register('no-pic.jpg'));
			}?>
	</td>
    
     <td class="product-overview-description">
        <p> <?php echo CHtml::encode($data->description); ?> </p>
        <p><strong> <?php echo Shop::priceFormat($data->price); ?></strong> <br />
        <p><?php echo Shop::pricingInfo(); ?></p>
      
        <p><?php echo CHtml::link(Shop::t('show product'), array('products/view', 'id' => $data->product_id), array('class' =>'show-product')); ?></p>
    </td>
    
    
</tr>

<?php } ?>
</table>