<div class="headerSubPage"><h1>General</h1></div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
	<?php echo CHtml::errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->