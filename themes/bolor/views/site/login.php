<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div id="box-login">
      	
		<div class="box-login-header">LOGIN FORM</div>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableAjaxValidation'=>true,
		)); ?>
		<div class="clearfix">
          	<label>Name:</label>
			<div class="input">
				<input type="text" name="LoginForm[username]" value="<?php echo (!empty($_POST['LoginForm']['username']) ? $_POST['LoginForm']['username'] : '' ); ?>" />
			</div>
		</div>	
		<div class="clearfix">
			<label>Password</label>
			<div class="input"><input type="password" name="LoginForm[password]"/></div>
		</div> 
        <input type="submit" value="Login" class="smallrounded blue" /> <a href="#">Forgot your password?</a>
		
		<?php $this->endWidget(); ?>
      </div>

</div><!-- form -->
