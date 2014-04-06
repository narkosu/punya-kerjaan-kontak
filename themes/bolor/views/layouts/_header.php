 <div id="header">
  	<div id="blockHeader">
		<!-- logo -->
		<div class="logo">
			<a href="<?php echo Yii::app()->baseUrl?>" class="logo-title">
			Kotak<br>Jelajah
			<?php /*<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="logo" border="0" />*/?>
			</a>
		</div>
		<!-- logo end -->
		
		<!-- topmenu-->
		<div id="topright">
			<ul id="topmenu">
			<?php if ( !Yii::app()->user->isGuest ) { ?> <li>Hi, <a href="<?php echo Yii::app()->createUrl('/members/').'/'.Yii::app()->user->name?>" title="profile"	><b><?php echo Yii::app()->user->name ?></b></a></li><?php } ?>
			<li><a href="<?php echo Yii::app()->createUrl('/')?>">HOME</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('/site/page')?>">ABOUT US</a></li>
			<li class="signup"><?php if ( Yii::app()->user->isGuest ) { ?><a href="<?php echo Yii::app()->createUrl('/site/signup')?>">SIGN UP <span class="red">(FREE)</span></a><?php } else { ?><a href="<?php echo Yii::app()->createUrl('site/logout')?>">SIGN OUT </a><?php } ?></li>
		  </ul>      
		</div>
		
		<!-- topmenu end-->
		<div style="clear:both;"></div>	
	</div>
 </div>	
  <!-- header end -->
	
  <!-- form start -->
  <?php /*<div id="searchform" style="padding-top:15px;">
  	<form name="form" method="get" action="<?php echo Yii::app()->createUrl('/advisor/search/');?>" style="margin:0px;">
    	<input type="text" name="query" value="<?php echo !empty($_GET['query']) ? $_GET['query'] : '';?>" class="textsearch" />
		<input type="submit" value="SEARCH" class="btnsearch" />
      <a href="<?php echo Yii::app()->createUrl('advisor/review/searchfactory')?>" class="btnfactory">MENULIS REVIEW</a>
      <a href="<?php echo Yii::app()->createUrl('advisor/factory/include')?>" class="btnfactory">LOKASI BARU</a>
    <div class="boo-clr"></div>
    </form>
  </div>
  */?>
  <!-- form end -->