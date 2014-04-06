<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Yii::app()->name?></title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/core.css" />

</head>
<body>
<!-- wrapper start -->
<div id="wrapper">
	
  <!-- header start -->
  <?php 
	include('_header_mobile.php');
  ?>
  <!-- form end -->
    
  <!-- container start -->
	<div id="container">
  
    <div id="left-container">      
		<?php echo $content ?>
    
    </div>
    
  <div class="boo-clr"></div>  
  </div>
  <!-- container end -->
<div class="boo-clr"></div> 	

</div>
<!-- wrapper end -->

<!-- footer start -->
<?php 
	include('_footer_mobile.php');
?>
<!-- footer end -->
</body>
</html>
