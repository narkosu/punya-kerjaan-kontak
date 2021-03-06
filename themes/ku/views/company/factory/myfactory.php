<?php
	$js=Yii::app()->clientScript;
	$js->registerScriptFile(Yii::app()->baseUrl.'/js/bootstrap-modal.js');
	$js->registerScriptFile(Yii::app()->baseUrl.'/js/bootstrap-modal.js');
	$js->registerScript('savereview', '
	jQuery("#buttonsavefactory").click(function(){
		
		var datas = jQuery("#factory-factory-form").serialize();
		jQuery.ajax({
		  url: "'.Yii::app()->createUrl('advisor/factory/savefactory').'",
		  data : datas,
		  dataType : "json",
		  type : "post",
		  success: function(data) {
			
			if (data.status == "needlogin"){
				jQuery.ajax({
					url: "'.Yii::app()->createUrl('site/AjaxLogin?element=factory-factory-form').'",
					success: function(datas) {
							$("#modal-from-dom").find(".modal-body").html(datas);
							$("#modal-from-dom").modal({"show":true,"backdrop":"static"});
					}
					});
			} else if (data.status == "notallowed") {
				
				$("#modal-from-dom").find(".modal-body").html("'.Yii::t('notallowed','Your account does not allowed to modify this factory.').'");
				$("#modal-from-dom").find(".modal-header span").html("'.Yii::t('error','Error').'");
				$("#modal-from-dom").modal({"show":true,"backdrop":"static"});
				
			} else if (data.status == "error") {
				
				$.each(data.errors, function(index, value) { 
				  jQuery("#error-"+index).html(value[0]).show(); 
				});
				
			} else if (data.status == "success") {
					location.href = "'.Yii::app()->createUrl('advisor/factory/update/id/').'/"+data.param.id;
			}
		  }
		});
		});	
	');	
?>
<?php if ( Yii::app()->user->hasFlash("factorysuccess")){ ?>		
<div class="alert-message success">
<a href="#" class="close">�</a>
<p><strong>Well done!</strong> <?php echo Yii::app()->user->getFlash("factorysuccess")?></p>
</div>
<?php } ?>

<!-- sample modal content -->
<div class="detil-company">
	<!-- main container -->
	
		<div id="" class="form">

			<h1>Profil Perusahaan</h1>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'factory-factory-form',
				'enableAjaxValidation'=>true,
			)); ?>
				<?php echo $form->hiddenField($model,'id'); ?>
				
        <div style="padding:10px 0px;">Kontak</div>
				<div class="row">
					<?php echo $form->labelEx($model,'company_name'); ?>
					<?php echo $form->textField($model,'company_name'); ?>
					<?php echo $form->error($model,'company_name',array('id'=>'error-company_name')); ?>
				</div>
        
        <div class="row">
					<?php echo $form->labelEx($model,'tipe_bisnis'); ?>
					<?php echo $form->textField($model,'tipe_bisnis'); ?>
					<?php echo $form->error($model,'tipe_bisnis',array('id'=>'error-tipe_bisnis')); ?>
				</div>
        
				<div class="row">
					<?php echo $form->labelEx($model,'contact_person'); ?>
					<?php echo $form->textField($model,'contact_person'); ?>
					<?php echo $form->error($model,'contact_person'); ?>
				</div>
				<div class="row">
					<?php echo $form->labelEx($model,'address'); ?>
					<?php echo $form->textarea($model,'address'); ?>
					<?php echo $form->error($model,'address'); ?>
				</div>
				<div class="row">
					<?php echo $form->labelEx($model,'telp_number'); ?>
					<?php echo $form->textField($model,'telp_number'); ?>
					<?php echo $form->error($model,'telp_number'); ?>
				</div>
					
				<div class="row">
					<?php echo $form->labelEx($model,'distric'); ?>
					<?php echo $form->textField($model,'distric'); ?>
					<?php echo $form->error($model,'distric'); ?>
				</div>
			
				<div class="row">
					<?php echo $form->labelEx($model,'city'); ?>
					<?php echo $form->textField($model,'city'); ?>
					<?php echo $form->error($model,'city'); ?>
				</div>
			<div style="padding:10px 0px;">Penjelasan</div>
				<div class="row">
					<?php echo $form->labelEx($model,'about_company'); ?>
					<?php echo $form->textarea($model,'about_company', array('style'=>'padding:10px 5px;width:400px;height:50px;')); ?>
					<?php echo $form->error($model,'about_company',array('id'=>'error-about_company')); ?>
				</div>
			
				<div class="row buttons">
					<?php echo CHtml::Button('Save',array('class'=>'btnsubmit','type'=>'submit','id'=>'buttonsavefactory')); ?>
				</div>
			
			<?php $this->endWidget(); ?>
			
			<!-- form -->
	</div>
</div>


