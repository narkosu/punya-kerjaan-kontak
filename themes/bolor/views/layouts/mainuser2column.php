<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>nolkm:keepsmile</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/produk.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tools.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/peralatan.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css" />
	<!--<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skeleton.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/layout.css">
	-->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skeleton_mainproduk.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/layout_mainproduk.css">
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
	<div id="header"> 
		<?php include('_header.php');?>
	 </div>


	<!-- Primary Page Layout
	================================================== -->
	<div id="navigation-breadcrumb">
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->

	</div>
	<div id="content" class="container">
		<div class="column2-left-side">
			<div id="sidebar">
				
				<?php if(!Yii::app()->user->isGuest) $this->widget('profileMenu'); ?>
				
				<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
				<?php if(!Yii::app()->user->isGuest) $this->widget('TokoMenu'); ?>
			</div>
			
		</div>
		<div class="column2-right-side">
			
				<?php echo $content; ?>
		</div>
		<div style="clear:both;"></div>
	</div><!-- container -->



	<!-- JS
	================================================== -->

	<script src="<?php echo Yii::app()->baseUrl; ?>/js/columnpage.js"></script>

<!-- End Document
================================================== -->
</body>
</html>