<div class="header-submenu" style="position: relative;">
			
	<div id="shop-submenu" class="submenu" style="position: absolute;top: 44px;
					width: 150px;right: 0px;
					">
		<div title="Daftar Produk" class="rowmenu">
			<a href="<?php echo Yii::app()->createUrl('shop/products')?>">
			<div class="gicons isshop" style="" title="Toko"></div>
			<div class="menucaption">Produk</div>
			</a>
			<div class="clear"></div>
		</div>
		<div title="Daftar Produk"  class="rowmenu">
			<a href="<?php echo Yii::app()->createUrl('shop/products/create')?>">
			<div class="gicons isshop"  title="Toko"></div>
			<div class="menucaption">Tambah</div>
			<a href="<?php echo Yii::app()->createUrl('shop/products')?>">
			<div class="clear"></div>
		</div>
		<div title="Daftar Produk"  class="rowmenu">
			<div class="gicons isshop"  title="Toko"></div>
			<div class="menucaption">Order</div>
			<div class="clear"></div>
		</div>
	</div>
		
</div>