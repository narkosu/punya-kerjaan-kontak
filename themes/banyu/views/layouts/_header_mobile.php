 <?php 
	Yii::app()->clientScript->registerScript('header_mobile',  "
		jQuery('#profil').click(function(){jQuery('#profilbar').toggle();});
		jQuery('#more').click(function(){jQuery('#morebar').toggle();});
		jQuery('#lapak').click(function(){jQuery('#produkbar').toggle();});
	" );
 ?>
 <div id="header">
    
    <div class="logo">
    	
    </div>
	<div id="navigation">
	<ul >
	<li class="llogo"><a href="<?php echo Yii::app()->baseUrl?>">
		
		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/nolkm.png" alt="logo" border="0" />
		
		</a></li>
	<li class="lmenu"><a href="<?php echo Yii::app()->createUrl('shop/products')?>">Etalase</a></li>
	<li class="lmenu" id="lapak" >lapak-ku</li>
	<li class="lmenu" id="more" title="Atur">&there4;</li>
	<?php if ( Yii::app()->user->isGuest ) { ?>
	<li class="lmenu"><a href="<?php echo Yii::app()->createUrl('site/login')?>">Login</a></li>
	<?php } else { ?>
	<li class="lmenu"><a href="#" id="profil">:<?php echo Yii::app()->user->name?></a></li>
	<?php } ?>
	</ul>
	</div>
	<div style="clear:both;"></div>
	<div id="profilbar" class="hidebar">
		<div>
			<span style="float:left;padding-right:10px;">Setting Account</span>
			<span style="float:left;padding-right:10px;"><a href="<?php echo Yii::app()->createUrl('site/logout');?>">Keluar</a></span>
		</div>
		<?php /*<div class="borderbottom">---</div>*/?>
	</div>
	<div id="produkbar" class="hidebar">
		<div>
			<span style="float:left;padding-right:10px;">Produk</span>
			<span style="float:left;padding-right:10px;">Tambah Produk</span>
			<span style="float:left;padding-right:10px;">Order</span>
		</div>
		<?php /*<div class="borderbottom">---</div>*/?>
	</div>
	<div id="morebar" class="hidebar">
		<div><input type="text"></div>
	</div>
</div>    
  <!-- form end -->