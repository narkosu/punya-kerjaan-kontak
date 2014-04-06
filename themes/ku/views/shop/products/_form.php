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
	$str .= CHtml::textField("Variations[{$i}][title]", $variation->title,
          array('style'=>'width:100px;')); 
	$str .= '</td> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][sign]",
			$variation->price_adjustion >= 0 ? '+' : '-', array(
				'+' => '+',
				'-' => '-'),
          array('style'=>'width:50px;'));
	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][price_adjustion]", 
          abs($variation->price_adjustion),
          array('style'=>'width:50px;'));  
	$str .= '</td> <td>';
	for($j = -10; $j <= 10; $j++)
		$positions[$j] = $j;
	$str .= CHtml::dropDownList("Variations[{$i}][position]",
			$variation->position,
			$positions,
          array('style'=>'width:50px;'));
	$str .= '</td> </tr>';

return $str;
} ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'products-form',
			'enableAjaxValidation'=>true,
			)); ?>

<?php echo $form->errorSummary($model); ?>

<div style="">
    <div style="margin-bottom:20px;">
        <div style="padding:10px;background:#f4f4f4;"> <?php echo Shop::t('Produk'); ?> </div>
        <div class="row">
        <?php /* echo $form->labelEx($model,'category_id'); ?>
        <?php $this->widget('application.modules.shop.components.Relation', array(
              'model' => $model,
              'relation' => 'category',
              'fields' => 'title',
              'showAddButton' => false)); ?>
        <?php echo $form->error($model,'category_id'); */?>
        </div>

        <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'title'); ?>
        </div>

        <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description'); ?>
        </div>
    </div>
    
    <div style="margin-bottom:20px;">
        <div style="padding:10px;background:#f4f4f4;"> <?php echo Yii::t('ShopModule.shop', 'Spesifikasi'); ?> </div>

        <div class="row">
        <?php echo $form->labelEx($model,'price'); ?>
        <?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'price'); ?>
        </div>

    <?php foreach(ProductSpecification::model()->findAll() as $specification) { ?>
        <div class="row">
            <?php echo CHtml::label($specification->title, ''); ?>
            <?php echo CHtml::textField("Specifications[{$specification->title}]",
            $model->getSpecification($specification->title),array(
              'size'=>45,'maxlength'=>45)); ?>
        </div>
        <?php } ?>

    </div>
    <?php if(!$model->isNewRecord) { ?>
		<div style="margin-bottom:20px;">
        <div style="padding:10px;background:#f4f4f4;"> <?php echo Shop::t('Article Variations'); ?> </div>
        <div id="variations">

        <table>
            <?php 
            printf('<tr><th>%s</th><th>%s</th><th colspan = 2>%s</th><th>%s</th></tr>',
                Shop::t('Specification'), 
                Shop::t('Value'), 
                Shop::t('Price adjustion'),
                Shop::t('Position'));


            $i = 0;
            foreach($model->variations as $variation) { 
              echo renderVariation($variation, $i); 
              $i++;
            }

              echo renderVariation(null, $i); 
         ?>
       </table>	
        <?php echo CHtml::button(Shop::t('Save specifications'), array(
				'submit' => array(
					'//shop/products/update',
					'return' => 'product',
					'id' => $model->product_id))); ?>
        </div>

    <?php } ?>


				<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ?
						Yii::t('ShopModule.shop', 'Create') 
						: Yii::t('ShopModule.shop', 'Save')); ?>
				</div>

				<?php $this->endWidget(); ?>

    </div><!-- form -->
</div>
</div>