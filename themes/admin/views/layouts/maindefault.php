<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bangladvisor</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" />
</head>
<body>
<!-- wrapper start -->
<div id="wrapper">
	
  <!-- header start -->
  <div id="header">
  	
    <!-- logo -->
    <div class="logo">
    	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="logo" border="0" /></a>
    </div>
    <!-- logo end -->
    
    <!-- topmenu-->
    <div id="topright">
		
    	<ul id="topmenu">
      	<?php if ( !Yii::app()->user->isGuest ) { ?> <li>Hi, <b><?php echo Yii::app()->user->name ?></b></li><?php } ?>
      	<li><a href="<?php echo Yii::app()->createUrl('/')?>">HOME</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/site/page')?>">ABOUT US</a></li>
        <li class="signup"><?php if ( Yii::app()->user->isGuest ) { ?><a href="#">SIGN UP <span class="red">(FREE)</span></a><?php } else { ?><a href="<?php echo Yii::app()->createUrl('site/logout')?>">SIGN OUT </a><?php } ?></li>
      </ul>      
    </div>
    <div id="topright2">
    	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fb.png" alt="fb" border="0" /></a>
      <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tw.png" alt="tw" border="0" /></a>
    </div>
    <!-- topmenu end-->
  
  </div>
  <!-- header end -->
	
  <!-- form start -->
  <div id="searchform">
  	<form name="form" method="get" action="<?php echo Yii::app()->createUrl('/advisor/search/');?>">
    	<input type="text" name="query" value="<?php echo !empty($_GET['query']) ? $_GET['query'] : '';?>"class="text" /><input type="submit" value="SEARCH" class="btnsearch" />
      <a href="<?php echo Yii::app()->createUrl('advisor/review/searchfactory')?>" class="btnreview">WRITE REVIEW</a>
      <a href="" class="btnfactory">INCLUDE A FACTORY</a>
    <div class="boo-clr"></div>
    </form>
  </div>
  <!-- form end -->
    
  <!-- container start -->
	<div id="container">
  
    <div id="left-container">      
		<?php echo $content ?>
    
    </div>
    
    <!-- right column start -->
    <div id="right-container">
    	<?php 
$this->widget('zii.widgets.CMenu',array(
   'items'=>array(
      array('label'=>'User Llogin', 'url'=>'#','linkOptions'=>array( 'onclick'=>'$("#userloginwidget").dialog("open"); return false;'), 'visible'=>Yii::app()->user->isGuest),  
   ),
)); 

?>
	<?php
		if ( Yii::app()->user->isGuest ) { ?>
		  <!-- form login start -->
		  <div id="box-login">
			<div class="box-login-header">LOGIN FORM</div>
			<form name="form" method="post" action="<?php echo Yii::app()->createUrl('site/login')?>">
				<label>Name:</label><input type="text" name="LoginForm[username]" value="<?php echo (!empty($_POST['LoginForm']['username']) ? $_POST['LoginForm']['username'] : '' ); ?>" /><br />
			  <label>Password</label><input type="password" name="LoginForm[password]"/><br />
			  <input type="submit" value=" LOGIN" class="btnlogin" /><a href="#">Forgot your password?</a>
			</form>
		  </div>
	  <!-- form login end -->
	  <?php } ?>
      <?php $this->widget('application.components.login.UserLoginWidget',array('visible'=>Yii::app()->user->isGuest)); ?>
      <!-- best supplier start -->
      <div class="box-best">
      	<h4 class="best">BEST SUPPLIER</h4>
         <!-- other review content -->
        <h2><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h2>
        <span class="posted">  Nov. 112011 | By: <a href="#">John Smith</a><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/star.png" alt="rating" /></span>
        <p>
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/pic1.png" align="left" alt="picture"  />
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br /><br />
        <a href="#" class="readmore">Read full review</a><br />
        </p>
        <!-- other review content end-->
      </div>
      <!-- best supplier end -->
      
      <!-- worst supplier start-->
      <div class="box-worst">
      	<h4 class="worst">WORST SUPPLIER</h4>
         <!-- other review content -->
        <h2><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h2>
        <span class="posted">  Nov. 112011 | By: <a href="#">John Smith</a><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/star.png" alt="rating" /></span>
        <p>
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/pic1.png" align="left" alt="picture"  />
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br /><br />
        <a href="#" class="readmore">Read full review</a><br />
        </p>
        <!-- other review content end-->
      </div>
      <!-- worst supplier end-->
      <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ads.png" alt="ads" />
    </div>
    <!-- right column end -->
    
  <div class="boo-clr"></div>  
  </div>
  <!-- container end -->
<div class="boo-clr"></div> 	

</div>
<!-- wrapper end -->

<!-- footer start -->
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
<!-- footer end -->
</body>
</html>
