<?php
$this->breadcrumbs=array(
	Yii::t('ShopModule.shop', 'Produk')=>array('/company/produk'),
	$product->title => array('products/update/id/'.$product->product_id),
	Yii::t('ShopModule.shop', 'Photo'),
);

?>

<div id="shopcontent">

	<div style="text-transform: uppercase;padding-left: 10px;">
     <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
           'links'=>$this->breadcrumbs,
           'separator'=> ' / '
       ));
     ?>
    </div> 

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
