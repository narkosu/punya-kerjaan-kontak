<?php 
function renderVariation($variation, $i) { 
	if(!ProductSpecification::model()->findByPk(1))
		return false;
	if(!$variation) {
		$variation = new ProductVariation;
		$variation->specification_id = 1;
	}

	$str = '<tr> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][specification_id]",
			$variation->specification_id, CHtml::listData(
				ProductSpecification::model()->findall(), "id", "title"), array(
				'empty' => '-'));  

	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][title]", $variation->title); 
	$str .= '</td> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][sign]",
			$variation->price_adjustion >= 0 ? '+' : '-', array(
				'+' => '+',
				'-' => '-'),array('style'=>'width:40px;'));
	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][price_adjustion]", abs($variation->price_adjustion),array('style'=>'width:80px;'));  
	$str .= '</td> <td>';
	for($j = -10; $j <= 10; $j++)
		$positions[$j] = $j;
	$str .= CHtml::dropDownList("Variations[{$i}][position]",
			$variation->position,
			$positions,array('style'=>'width:50px;'));
	$str .= '</td> </tr>';

return $str;
} ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'products-form',
			'enableAjaxValidation'=>true,
			)); ?>

<?php echo $form->errorSummary($model); ?>

<div id="papanformproduk">
	<fieldset style="padding-right:100px;">
		<legend> <?php echo Shop::t('Tentang Produk'); ?> </legend>
		<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
			<div class="input">
			<?php $this->widget('application.modules.shop.components.Relation', array(
						'model' => $model,
						'relation' => 'category',
						'fields' => 'title',
						'showAddButton' => false)); ?>
			<?php echo $form->error($model,'category_id'); ?>
			</div>
		</div>

		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
			<div class="input">
			<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'title'); ?>
			</div>
		</div>

		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
			<div class="input">
			<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'description'); ?>
			</div>
		</div>
	</fieldset>
</div>

<div id="papanformspesifikasiproduk">
	<fieldset >
		<legend> <?php echo Yii::t('ShopModule.shop', 'Spesifikasi Produk'); ?> </legend>

		<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
			<div class="input">
			<?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'price'); ?>
			</div>
		</div>

		<?php 
			foreach(ProductSpecification::model()->findAll() as $specification) { ?>
				<div class="row">
					<?php echo CHtml::label($specification->title, ''); ?>
					<div class="input">
					<?php echo CHtml::textField("Specifications[{$specification->title}]",
						$model->getSpecification($specification->title),array(
							'size'=>45,'maxlength'=>45)); ?>
					</div>		
				</div>
		<?php } ?>
	</fieldset>

	<?php if(!$model->isNewRecord) { ?>
			<fieldset>
			<legend> <?php echo Shop::t('Variasi Produk'); ?> </legend>
			<div id="variations">

			<table class="tablelist">
				<?php 
				printf('<tr><th>%s</th><th>%s</th><th colspan = 2>%s</th><th>%s</th></tr>',
						Shop::t('Spesifikasi'), 
						Shop::t('Value'), 
						Shop::t('Penyesuaian harga'),
						Shop::t('Posisi'));


				$i = 0;
				foreach($model->variations as $variation) { 
					echo renderVariation($variation, $i); 
					$i++;
				}

					echo renderVariation(null, $i); 
		 ?>
			</table>	
		<?php echo CHtml::button(Shop::t('Tambah Spesifikasi'), array(
					'submit' => array(
						'//shop/products/update',
						'return' => 'product',
						'id' => $model->product_id),'class'=>'smallrounded blue')); ?>


			</fieldset>

	<?php } ?>
	</div>
	<div id="papanformspeingiriman">
		<fieldset>
			<legend> <?php echo Yii::t('ShopModule.shop', 'Biaya Pengiriman'); ?> </legend>
			<?php $this->widget('shop.widgets.ShippingproductWidget',array('model'=>$model,'show'=>'modify'));?>
						
		</fieldset>
	</div>	
	<div class="row buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ?
			Yii::t('ShopModule.shop', 'Create') 
			: Yii::t('ShopModule.shop', 'Save'),array('class'=>'smallrounded blue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
