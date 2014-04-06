<div id="allbox-signup">
		<div id="box-signup">
			<div class="box-login-header">Register Nolkm.com</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableAjaxValidation'=>true,
			)); ?>
				<div class="clearfix">
					<?php
					echo $form->labelEx($model,'first_name');
					echo '<div class="input">';
					echo $form->textField($model,'first_name');
					echo $form->error($model,'first_name');
					echo '</div>';
					?>
				</div>
				<div class="clearfix">
					<?php
					echo $form->labelEx($model,'last_name');
					echo '<div class="input">';
					echo $form->textField($model,'last_name');
					echo $form->error($model,'last_name');
					echo '</div>';
					?>
				</div>
				<div class="clearfix">			
					<?php
					echo $form->labelEx($model,'username');
					echo '<div class="input">';
					echo $form->textField($model,'username');
					echo $form->error($model,'username');
					echo '</div>';
					?>
				</div>
				<div class="clearfix">			
					<?php
					echo $form->labelEx($model,'email');
					echo '<div class="input">';
					echo $form->textField($model,'email');
					echo $form->error($model,'email');
					echo '</div>';
					?>
				</div>
				<div class="clearfix">			
					<?php
					echo $form->labelEx($model,'reemail');
					echo '<div class="input">';
					echo $form->textField($model,'reemail');
					echo $form->error($model,'reemail');
					echo '</div>';
					?>
				</div>
				<div class="clearfix">			
					<?php
					echo $form->labelEx($model,'password');
					echo '<div class="input">';
					echo $form->passwordField($model,'password');
					echo $form->error($model,'password');
					echo '</div>';
					?>
				</div>
				
				
				<input type="submit" value="Sign Up" class="smallrounded blue" />
			
			<?php $this->endWidget(); ?>
		</div>

	
<div id="sign-up-support">Ingin mengenal nolkm lebih lanjut sebelum menjadi anggota ? <br/><span class="smallrounded orange">Lihat - lihat</span> dulu</div>
<div class="clearfix"></div>
</div>

