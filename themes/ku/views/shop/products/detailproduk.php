<div id="detail-product">
	<?php
	$this->breadcrumbs=array(
		Shop::t('Products')=>array('index'),
		$model->title,
	);
	
	?>
	
	<div class="product-images">
      <div class="thumb-images" style="float:right;padding-top:0px;width:70px;">
          <div style="margin:0px auto;width:50px;">
                <?php 
                if($model->images) {
                  foreach($model->images as $image) {
                    $this->renderPartial('/image/view', array( 'model' => $image, 'custom'=>true, 'dWidth'=>'50px'));
                    
                    $lastImage = $image;
                    echo '<br />'; 
                  }
                } else { 
                    $this->renderPartial('/image/view', array( 'model' => new Image()));
                    $lastImage = new Image();
                }
                ?>
          </div>
      </div>
      <div class="orig-images" style="float:left;width:550px;">
          <?php
          $this->renderPartial('/image/view', array( 'model' => $image, 'custom'=>true, 'dWidth'=>'550px', 'maxWidth'=>'550px'));
          ?>
          
      </div>
      <div style="clear:both;"></div>
	</div>
	
	<div class="product-spec">
		<div class="product-owner">
        <div style="float:left">
            <div class="avatarlogo" style="border-radius: 50%;overflow:hidden;width:64px;height:64px;">
                <?php $company = $model->shop_store->company; ?>
                <?php
                $urlLogo = (!empty($company->picture_id) ?
                                Yii::app()->baseUrl . '/images/' .
                                        Yii::app()->image
                                        ->renderVersion($company->picture_id, 'logo')
                                ->urlpath : '');
                ?>
                <?php if (!empty($urlLogo)) { ?>
                    <img class="avatar" src="<?php echo $urlLogo ?>" style="width:64px">
                <?php } ?>
            </div>
        </div>
        <div style="float:left;position: relative;padding:0px 10px;">
            <div >
                <a style="font-weight:300;font-size:16px;" rel="<?php echo Yii::app()->createUrl('members/profile/ajaxprofile/id/'.$model->shop_store->shop_name);?>" href="<?php echo Yii::app()->baseUrl?>/company/factory/view/id/<?php echo $model->shop_store->company->id?>" class="qtipsy">
                    <?php echo (isset($model->shop_store->shop_name) ? $model->shop_store->company->company_name : 'Noname')?>
                </a>
                <br>
                di <?php echo $model->shop_store->company->city?>
            </div>
            
        </div>
        <div style="clear:both"></div>
		</div>
		<div class="product-header">
        <div style="padding:10px 0px;">
            <h2 class="title" style="font-weight:lighter;font-size:20px;"><?php echo $model->title; ?></h2>
        </div>    
        <div>
            <?php printf('<h2 class="price" style="font-weight:bold;">%s</h2>',
              Shop::priceFormat($model->price));
            ?>
        </div>
        <div style="margin:10px 0px;">
            <span class="btn">
                <a href="<?php echo $this->createUrl('/mailbox/message/new'); ?>">Buat Surat</a>
            </span>
        </div>
		</div>
		
	</div>
	<div class="clear"></div>
  <?php $specs = $model->custom_spec; ?>
  
	<div class="specification">
      <div class="product-description-title">Sepesifikasi</div>
      <div style="padding-top:10px;">
  <?php foreach ( $specs as $spec ){ ?>
      <div style="float:left;margin-right:30px;"> <Span style="color:#aeaeae;"><?php echo $spec->specification_name ?> </span>: <?php echo $spec->specification_value ?></div>
      
  <?php } ?>    
      <div style="clear:both"></div>
      </div>
  </div>
	
	<div class="product-description" style="margin-top:10px">
		<div class="product-description-title">Tentang Produk</div>
		<div style="padding:10px 0px;">
		<?php echo nl2br($model->description); ?>
		</div>
	</div>
  
	<?php 
  /*
	$specs = $model->getSpecifications();
	if($specs) {
		echo '<table>';
		
		printf ('<tr><td colspan="2"><strong>%s</strong></td></tr>',
				Shop::t('Product Specifications'));
				
		foreach($specs as $key => $spec) {
			if($spec != '')
				printf('<tr> <td> %s: </td> <td> %s </td> </td>',
						$key,
						$spec);
		}
		
		echo '</table>';
	}
   * 
   */ 
	?>
</div>