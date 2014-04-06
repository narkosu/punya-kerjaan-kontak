<?php
$this->breadcrumbs=array(
	Yii::t('ShopModule.shop', 'Images') =>array('index'),
	Yii::t('ShopModule.shop', 'Manage'),
);

?>

<div id="shopcontent">
    <div style="padding:10px 0px;border-bottom: 1px solid #f4f4f4">Photo Produk <b><?php echo '&nbsp;' . $product->title; ?></b></div>
    <div>
        
        <?php
        if($images) {
            foreach($images as $image) {
        ?>     
        <div style="padding:10px 0px;"><?php echo $image->title?></div>
        <div><?php $this->renderPartial('view', array('model' => $image,'thumb'=>1));?></div>
            
        <?php
        
          }
        }
        ?>
    </div>
    <div style="margin:10px 0px;">
        <?php        
        echo CHtml::link(Yii::t('ShopModule.shop', 'Cancel'), array('/company/produk'), array('style'=>'padding:10px;border:1px solid #f4f4f4;margin-right:10px;')) ;
        echo CHtml::link(Yii::t('ShopModule.shop', 'Upload new Image'), array('create', 'product_id' => $product->product_id), array('style'=>'padding:10px;border:1px solid #f4f4f4;margin-right:10px;'));
        ?>
    </div>
</div>
