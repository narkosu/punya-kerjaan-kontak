<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Yii::app()->name?></title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" />
</head>
<body>
  <!-- header start -->
  <?php 
	include('_header.php');
  ?>

<!-- wrapper start -->
<div id="wrapper-company">
	
  <!-- container start -->
	<div id="container-company">
	  <div id="left-container-company">
		  <!-- Photo -->
		  
		 <div style="height:auto;width:100%;overflow: hidden;" class="useravatar">
			<?php
				$this->widget('ext.imageSelect.ImageSelect',  array(
					'path'=> ( $this->getParams()->picture_id ? Yii::app()->baseUrl.'/images/'.Yii::app()->image->renderVersion($this->getParams()->picture_id,'avatar')->urlpath : ''),
					'alt'=>'alt text',
					'uploadUrl'=>Yii::app()->createUrl('members/profile/UploadAvatar'),
					'htmlOptions'=>array()
				));
			 ?>
		  </div>
		  
		  <!--  menu -->
		  <div class="company-left-menu">
				<?php $this->widget('UserMenu',
						array('option'=>array('themes'=> 'webroot.themes.'.Yii::app()->theme->name.'/views/_menus/userMenu'))); ?>
		  </div>
	  </div>
	   <div id="main-container-company">
	  <?php echo $content ?>
	   </div>
	  <div class="boo-clr"></div>  
  </div>
  <!-- container end -->
<div class="boo-clr"></div> 	

</div>
<!-- wrapper end -->

<!-- footer start -->
<?php /*
<div id="wrapper-footer">
	<div id="box-footer">
    <div id="box-footer-l">
      <a href="#">Home</a>|<a href="#">Term Of Use</a>|<a href="#">Privacy Policy</a>|<a href="#">Help</a><br />
      &copy; 2011 <a href="#"><span class="bangla">BANGL</span><span class="advisor">ADVISOR</span></a>. All rights reserved.
    </div>
    <div id="box-footer-r">
      <a href="http://validator.w3.org/check?uri=referer" target="_blank">
      	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/html_valid.png" alt="html valid" border="0" /></a>
      <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">
      	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/css_valid.png" alt="css valid" border="0" /></a>
    </div>
  </div>
</div>
*/?>
<!-- footer end -->
</body>
</html>
