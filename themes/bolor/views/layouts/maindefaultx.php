<?php
	$rs = Yii::app()->clientScript->registerScript("maindefault",'
		jQuery("#savenewsletter").click(function(){
			
			$.post(jQuery("#email-newsletter-form").attr("action"), $("#email-newsletter-form").serialize(),
			function(data) {
				
				if ( data.status == "sukses"){
					 jQuery("#EmailNewsletter_email").val("");
					 jQuery("#email-newsletter-form-info").html(data.pesan);
					 jQuery(".succesMessage").show();
					 jQuery(".errorMessage").hide();
				}else{
					jQuery("#EmailNewsletter_email_em_").html(data.pesan);
					jQuery(".errorMessage").show();
				}				
			   },"json");
		});	
	
	');

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en" manifest="example.appcache"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en" manifest="example.appcache"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en" manifest="example.appcache"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" manifest="example.appcache"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>nolkmdotcom:berbagi informasi produk</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font_intro.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/base_intro.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skeleton_intro.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/layout_intro.css">
	

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>

	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns" style="display:none;">
			<div style="margin-top: 0px"><a href="<?php echo Yii::app()->baseUrl?>"><img src="<?php echo Yii::app()->baseUrl?>/images/nolkmbig.png"></a></div>
			<h5 style="font-weight:200;">berbagi informasi produk</h5>
			<hr />
		</div>
		<div class="one-two column">
			<?php $this->widget('application.extensions.minslide.minslide');?>
		</div>
		
		<div class="one-two column">
			<div style="margin-top: 0px"><a href="<?php echo Yii::app()->baseUrl?>"><img src="<?php echo Yii::app()->baseUrl?>/images/nolkmbig.png"></a></div>
			<h3 class="title-trial">Tentang Nolkm?</h3>
			<p>Salah satu cara mengenalkan dan menjual produk - produk anda.</p>
						
			<div class="box-invite">
				<h3>Tertarik untuk mencoba ?</h3>
				<p>Kami mengundang teman - teman sebagai tester <br/>untuk mencoba nolkm dalam sesi soft launching. </p>
				<div>
				<?php 
				$model = new EmailNewsletter;
				$form=$this->beginWidget('CActiveForm', array(
					'id'=>'email-newsletter-form',
					'action'=>'emailnewsletter/create',
					'enableAjaxValidation'=>true,
				)); ?>

					
				<?php echo $form->labelEx($model,'email',array('style'=>'display: inline-block;')); ?>
				<?php echo $form->textField($model,'email',array('maxlength'=>100,'placeholder'=>'Email','style'=>'display: inline-block;')); ?>
				<?php echo CHtml::Button($model->isNewRecord ? 'Kabari saya' : 'Save',array('id'=>'savenewsletter','style'=>'display: inline-block;')); ?>
				<?php //echo $form->error($model,'email'); ?>
				<div class="succesMessage" id="email-newsletter-form-info" style="display:none;"></div>				
				
			

				<?php $this->endWidget(); ?>
				<span class="icon-twitter-sign">Twitter: <a target="_blank" href="http://twitter.com/nolkmdotcom/">@nolkmdotcom</a></span>
				
				</div>
			</div>	
		</div>
		

	</div><!-- container -->



	<!-- JS
	================================================== -->
	

<!-- End Document
================================================== -->
</body>
</html>