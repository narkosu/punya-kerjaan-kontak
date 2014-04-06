<div class="compant-left-group">
	<div class="baris">
		<a href="<?php echo Yii::app()->createUrl('company/factory/view/id/'.$getParam['company_id']);?>">Profil</a>
	</div>
	<div class="baris">
    <div style="float:left;">
		<a href="<?php echo Yii::app()->createUrl('company/factory/products/id/'.$getParam['company_id'])?>">Produk</a>
    </div>
    <div style="float:right;">
		
    </div>
    <div style="clear: both"></div>
	</div>
  <div class="baris">
      <a href="<?php echo Yii::app()->createUrl('company/factory/contactinfo/id/'.$getParam['company_id'])?>">Kontak</a>
  </div>
</div>