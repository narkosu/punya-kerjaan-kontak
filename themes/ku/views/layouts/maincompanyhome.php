<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Yii::app()->name?></title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/stylecompanyhome.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" />
</head>
<body>
  <!-- header start -->
  <?php 
	include('_header.php');
  ?>

<!-- wrapper start -->
<div id="wrapper">
	 <div id="left-container">
		  
  </div>
  
  <!-- container start -->
	<div id="container">
	 
		<?php echo $content ?>
	  <div class="boo-clr"></div>  
  </div>
  <!-- container end -->
<div style="clear:both;"></div> 	

</div>
<div style="clear:both;"></div> 	
<!-- wrapper end -->

<!-- footer start -->

<?php include('_footer.php')?>
<!-- footer end -->
</body>
</html>
