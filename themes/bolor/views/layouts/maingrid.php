<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>jQuery Wookmark Plug-in Example</title>
  <meta name="description" content="An very basic example of how to use the Wookmark jQuery plug-in.">
  <meta name="author" content="Christoph Ono">

  <meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skeleton_mainproduk.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/layout_mainproduk.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tools.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/produk.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/peralatan.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css" />
	<script src="<?php echo Yii::app()->baseUrl; ?>/js/columnpage.js"></script>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu_buyer.css">
  <!-- CSS Reset -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css">
  
  <!-- Styling for your grid blocks -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">

</head>

<body>
	<div id="menuleftside">
		
		<?php include('_leftside.php');?>
	</div>
	<div id="header"> 
		<?php include('_header.php');?>
	 </div>
	 <div id="navigation-breadcrumb">
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->

	</div>
	<div id="content" class="container">
		<?php echo $content?>
	</div><!-- container -->

  <footer>
  </footer>	
</body>
</html>
