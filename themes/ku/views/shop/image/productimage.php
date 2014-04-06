<?php
$this->breadcrumbs=array(
	Yii::t('ShopModule.shop', 'Produk')=>array('/company/produk'),
	$product->title => array('products/update/id/'.$product->product_id),
	Yii::t('ShopModule.shop', 'Photo'),
);

?>

<div class="prepend-1" id="shopcontent">
    <div style="text-transform: uppercase;padding-left: 10px;">
     <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
           'links'=>$this->breadcrumbs,
           'separator'=> ' / '
       ));
     ?>
    </div> 
    
    <div style="padding-left:10px; ">
        
        <?php
        if( !empty($images) ) {
            foreach($images as $image) {
        ?>     
            <div style="padding:10px 0px;border-bottom: 1px solid #eee;"><?php echo $image->title?></div>
            <div style="padding-top: 10px;">
                <div style="float:left">
                    <?php $this->renderPartial('view', array('model' => $image,'thumb'=>1));?>
                </div>
                <div style="float:right;padding:0px 10px; ">Delete</div>
                <div style="clear: both"></div>
            </div>
            
        <?php
        
          }
        }
        ?>
    </div>
    <div style="margin:10px 0px;">
        <?php        
        echo CHtml::link(Yii::t('ShopModule.shop', 'Cancel'), array('products/update/id/'.$product->product_id), array('style'=>'padding:10px;border:1px solid #f4f4f4;margin-right:10px;')) ;
        echo CHtml::link(Yii::t('ShopModule.shop', 'Upload new Image'), array('create', 'product_id' => $product->product_id), array('style'=>'padding:10px;border:1px solid #f4f4f4;margin-right:10px;'));
        ?>
    </div>
</div>
