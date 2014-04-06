<div id="top_header">
	<div class="box-header">
		<?php /*<div class="logo"><img src="<?php echo Yii::app()->baseUrl?>/images/nolkm1.png"></div>*/?>
		<div class="header-menu">
			<div class="block-menu">
				<nav class="navigation">
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('site/login')?>" class="groupicons"></a>
						</li>
					</ul>	
			<?php /* if ( Yii::app()->user->isGuest ) { ?>
				<label style="position: relative;width:40px;">
				<a href="<?php echo Yii::app()->createUrl('site/signup')?>" class="groupicons"></a>
				</label>
				<label style="position: relative;width:40px;">
				<a href="<?php echo Yii::app()->createUrl('site/login')?>" class="groupicons"></a>
				</label>
				<?php }else{ ?>
				<span class="smallrounded orange"><a href="<?php echo Yii::app()->createUrl('/').'/@'.Yii::app()->user->name?>/produk"><?php echo '@'.Yii::app()->user->name?></a></span>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<?php if ( !Yii::app()->user->isGuest ) { ?>
			<div  class="block-menu">
				<a href="<?php echo Yii::app()->createUrl('/')?>
				<?php echo '/shop/products/admin'?>">Toko</a> 
				<a href="<?php echo Yii::app()->createUrl('/shop/products/create')?>">Tambah</a>
				<a href="<?php echo Yii::app()->createUrl('/shop/order/seller')?>">Order</a>
			</div>
			<div  class="block-menu">
				<a href="<?php echo Yii::app()->createUrl('/mailbox/message/inbox')?>" class="icon-envelope"> Pesan <span class="pesanmasuk">( <?php echo (Mailbox::newMsgs(Yii::app()->user->id) ? Mailbox::newMsgs(Yii::app()->user->id) : 0)?> )</span></a> 
				<a href="<?php echo Yii::app()->createUrl('setting');?>"><span class="icon-cogs" title="Setting"> Setting</span></a>
				<a href="<?php echo Yii::app()->createUrl('site/logout');?>">Keluar</a>
			</div>
			<?php } */?>
			</nav>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php /*
<div class="box-header">
	<div class="clear" id="kotak-menu-umum">
	<ul class="pills">
		<li class="active"><a href="#">Home</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('/shop/products')?>">Produk</a></li>
		<li><a href="#">Messages</a></li>
		<li><a href="#">Settings</a></li>
		<li><a href="#">Contact</a></li>
		<li>
		<div class="kotak-keranjang-belanja"><span class="icon-shopping-cart"><span class="total-cart">
			<?php echo CHtml::link(Shop::getNumberCart(), array(
					'//shop/shoppingCart/view'));?>
			
			</span></span> Kerangjang</div>
		</li>
		</ul>
	</div>		
</div>
*/?>