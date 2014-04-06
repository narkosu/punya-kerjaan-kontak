<?php
$this->breadcrumbs=array(
	Yii::t('ShopModule.shop', 'Produk')=>array('/company/produk'),
	$model->title,
	Yii::t('ShopModule.shop', 'Update'),
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
    <div style="padding-left:10px;padding-right:10px;">
        <div style="padding:10px;background:#f4f4f4;"> 
            <div style="float:left;">Photo</div>
            <div style="float:right"><a href="<?php echo Yii::app()->createUrl('shop/image/create/product_id/'.$model->product_id)?>">Upload photo</a></div>
            <div style="clear:both"></div>
        </div>
        <?php 
        if ( !empty($model->images ) )
        foreach ( $model->images as $photo){
        ?>
            <div style="padding:10px 0px;border-bottom: 1px solid #eee;"><?php echo $photo->title?></div>
            <div style="padding-top: 10px;">
                <div style="float:left">
                    <?php $this->renderPartial('//shop/image/view', array('model' => $photo,'thumb'=>1));?>
                </div>
                <div style="float:right;padding:0px 10px; ">Delete</div>
                <div style="clear: both"></div>
            </div>
        <?php
        }
        ?>
    </div>
    <div>
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>
