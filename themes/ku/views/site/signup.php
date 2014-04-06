
<div id="box-signup">
      	<div class="box-login-header">Buat Akun Anda</div>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableAjaxValidation'=>true,
		)); ?>
      <?php /*  
      <div class="row">
				<?php
				echo $form->labelEx($model,'first_name');
				echo $form->textField($model,'first_name');
				echo $form->error($model,'first_name');
				?>
			</div>
			<div class="row">
				<?php
				echo $form->labelEx($model,'last_name');
				echo $form->textField($model,'last_name');
				echo $form->error($model,'last_name');
				?>
			</div>
       * 
       */
       
      ?>
			<div class="row">			
				<?php
				echo $form->labelEx($model,'username');
				echo $form->textField($model,'username');
				echo $form->error($model,'username');
				?>
      </div>
      
			<div class="row">			
				<?php
				echo $form->labelEx($model,'email');
				echo $form->textField($model,'email');
				echo $form->error($model,'email');
				?>
      </div>
			<div class="row">			
				<?php
				echo $form->labelEx($model,'reemail');
				echo $form->textField($model,'reemail');
				echo $form->error($model,'reemail');
				?>
			</div>
			<div class="row">			
				<?php
				echo $form->labelEx($model,'password');
				echo $form->passwordField($model,'password');
				echo $form->error($model,'password');
				?>
			</div>
			
        <div class="group-btn-center">
            <input type="submit" value="BUAT AKUN" class="btnlogin" />
        </div>
		<?php $this->endWidget(); ?>
      </div>

</div>

