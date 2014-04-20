<?php
$this->breadcrumbs=array(
	Shop::t('Products'),
);
Shop::renderFlash();
?>


<div id="papan-produk">
    <div id="products-header"></div>
    <div id="products-body">
    <?php $this->renderpartial('_viewlistproducts_grid',array(
      'dataProvider'=>$dataProvider));
    ?>
    </div>
    
    <div id="products-footer">
        <?php 
        $this->widget('CLinkPager', array(
            'pages' => $pages,
        ));
        ?>
    </div>
    
</div>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>
