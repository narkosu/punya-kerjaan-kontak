<div class="intro" >
	<div id="box-intro-menu" style="padding:10px;" >
    <ul id="intro-menu" class="horizontal">
			   <?php if ( !Yii::app()->user->isGuest ) { ?> <li>Hi, <a href="<?php echo Yii::app()->createUrl('/members/').'/'.Yii::app()->user->name?>" title="profile"	><b><?php echo Yii::app()->user->name ?></b></a></li><?php } ?>
			   
			   <li><a href="<?php echo Yii::app()->createUrl('company')?>">USAHA</a></li>
			   <li><a href="<?php echo Yii::app()->createUrl('/shop/products')?>">PRODUK</a></li>
			   <li class="signup">
             <span class="dual-btn">
                 <a class="dual-btn-gray" id="app-signin" 
                    href="<?php echo Yii::app()->createUrl('/site/login')?>">SIGN IN</a>
                 <a class="dual-btn-blue" href="<?php echo Yii::app()->createUrl('/site/signup')?>">SIGN UP</a>
             </span>
			   <?php /*if ( Yii::app()->user->isGuest ) { ?>
				  <a href="<?php echo Yii::app()->createUrl('/site/login')?>">LOGIN</a>
          <br>
				  <a href="<?php echo Yii::app()->createUrl('/site/signup')?>">USAHA BARU<span class="red">(FREE)</span></a>
				  <?php } else { ?>
				  <a href="<?php echo Yii::app()->createUrl('site/logout')?>">SIGN OUT </a>
				  <?php } */?>
			   </li>
			</ul> 
		
	</div>
	<div style="clear:both"></div>
</div>
