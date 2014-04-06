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
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/base.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skeleton.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/layout.css">

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
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px"><a href="<?php echo Yii::app()->baseUrl?>">Nolkm</a></h1>
			<h5>berbagi informasi produk</h5>
			<hr />
			
			
		</div>
		<div class="one-third column">
			<h3>Tentang Nolkm?</h3>
			<p>Nolkm adalah Etalase, Showroom berbagai produk.</p>
			
		</div>
		<div class="one-third column">
			<h3>Produsen &amp; Penjual</h3>
			<p>Salah satu cara mudah bagi Produsen atau penjual untuk memamerkan produknya di nolkm.</p>
			<h3>Pembeli</h3>
			<p>Semua pengunjung berpotensi untuk menjadi pembeli.</p>
		</div>
		<div class="one-third column">
			<h3>Tertarik ?</h3>
			<p>Kabari saya jika sudah <i>Launching</i></p>
			<div>
			<?php 
			$model = new EmailNewsletter;
			$form=$this->beginWidget('CActiveForm', array(
				'id'=>'email-newsletter-form',
				'action'=>'emailnewsletter/create',
				'enableAjaxValidation'=>true,
			)); ?>

				
					<?php echo $form->labelEx($model,'email'); ?>
					<?php echo $form->textField($model,'email',array('maxlength'=>100,'placeholder'=>'Email')); ?>
					<?php echo $form->error($model,'email'); ?>
					<div class="succesMessage" id="email-newsletter-form-info" style="display:none;"></div>				
					<?php echo CHtml::Button($model->isNewRecord ? 'Kabari saya' : 'Save',array('id'=>'savenewsletter')); ?>
				

			<?php $this->endWidget(); ?>
			<span class="icon-twitter-sign">Twitter: <a target="_blank" href="http://twitter.com/nolkmdotcom/">@nolkmdotcom</a></span>
			
			</div>
		</div>
		

	</div><!-- container -->



	<!-- JS
	================================================== -->
	

<!-- End Document
================================================== -->
</body>
</html>