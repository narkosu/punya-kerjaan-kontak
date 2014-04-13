<div id="columns">	
<?php 
foreach ( (array) $dataProvider as $idx =>$data){
?>
<div class="grid-product">
	
	<div class="product-title">
		<?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?></div>
	<div style="width:100%;background: #fff;">
		<div style="float:left;margin-right:10px;">
        <?php $company = $data->shop_store->company; ?>
        <?php 
        $urlLogo = ( !empty($company->picture_id) ? 
                        Yii::app()->baseUrl.'/images/'.
                            Yii::app()->image
                                ->renderVersion($company->picture_id, 'logo')
                                ->urlpath : ''); 
        ?>
        <?php 
        if ( !empty($urlLogo) ) { ?>
            <img class="avatar" src="<?php echo $urlLogo?>" style="width:25px">
        <?php } ?>
    </div>        
		<div style="float:left;">
		<a rel="<?php echo Yii::app()->createUrl('members/profile/ajaxprofile/id/'.$data->shop_store->shop_name);?>" href="<?php echo Yii::app()->baseUrl?>/company/factory/view/id/<?php echo $data->shop_store->company->id?>" class="qtipsy">
		<?php echo (isset($data->shop_store->shop_name) ? $data->shop_store->company->company_name : 'Noname')?></a>
		</div>
		<div style="clear:both"></div>
	</div>
	<div style="padding-left:20px;">
		<table class="listproductTable" style="width:100%;">
			<tbody>
				<tr style="clear:both;">
					<td width="110">
						<div class="product-overview-image">	
						<?php 
							if($data->images){
								$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
							}else {
								echo CHtml::image(Shop::register('no-pic.jpg'));
							}
						?>
						</div>
					</td>
					<td >
						<div class="product-overview-description">
							<p> <?php echo substr($data->description,0,100).'..'; ?> </p>
							<p><strong> <?php echo Shop::priceFormat($data->price); ?></strong> <br />
							<?php /*<p><?php echo Shop::pricingInfo(); ?></p>*/?>
							<p><?php echo CHtml::link(Shop::t('show product'), array('products/view', 'id' => $data->product_id), array('class' =>'show-product')); ?></p>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>	
</div>
<?php } ?>
</div>
