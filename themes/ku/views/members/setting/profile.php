<div class="headerSubPage"><h1>General</h1></div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
	<?php echo CHtml::errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

  <div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
    
  <div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>  
  
  <div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>
    
  <div class="row">
		<?php echo $form->labelEx($model,'zipcode'); ?>
		<?php echo $form->textField($model,'zipcode',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'zipcode'); ?>
	</div>  
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->