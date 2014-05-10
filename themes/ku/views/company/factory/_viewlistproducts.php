<div id="company-product-columns">	
<?php 
foreach ( (array) $dataProvider as $idx =>$data){
?>
<div class="company-product-item">
	
	<div >
		<div class="company-product-item-image" style="text-align: center">
			<?php //echo $data->getImage();?>
		<?php 
			if($data->images){
          
				$this->renderPartial('application.modules.shop.views.image.view', 
                        array(
                            'custom'=> true,
                            'dWidth'=> 145,
                            'thumb' =>true, 
                            'model' => $data->images[0],
                            'size'  => '180x180'
                            )
                        );
			}else {
				echo CHtml::image(Shop::register('no-pic.jpg'));
			}
		?>
		</div>
		<div class="company-product-item-title">
			<?php echo CHtml::link(CHtml::encode($data->title), array('/company/factory/detailproduct','cid'=>$data->shop_store->company_id,'id' => $data->product_id)); ?>
		</div>
		<?php /*
		<div>
			<?php echo substr($data->description,0,100).'..'; ?>
		</div>
		*/?>
		
	</div>	
</div>
<?php } ?>
</div>
