<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Yii::app()->name?></title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/stylecompany.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" />
</head>
<body>
  <!-- header start -->
  <?php 
	include('_header.php');
  ?>

<!-- wrapper start -->
<div id="wrapper">
	 <div id="left-container">
       <?php 
       
       
       $urlLogo = ( !empty($this->getParams()->picture_id) ? 
                        Yii::app()->baseUrl.'/images/'.
                            Yii::app()->image
                                ->renderVersion($this->getParams()->picture_id, 'logo')
                                ->urlpath : ''); 
       ?>
		  <div style="height:<?php echo ( empty($urlLogo) ? '150px;background:#ddd' : 'auto') ?>;width:100%;overflow: hidden;">
			<?php
        if ( Yii::app()->user->getState('storeLogin')->company_id == $this->getParams()->company_id) {
            $this->widget('ext.imageSelect.ImageSelect',  array(
              'path'=> $urlLogo,
              'text'=>'Change Logo',
              'uploadUrl' => 
                    Yii::app()->createUrl('company/factory/Uploadlogo/cid/'. $this->getParams()->company_id
                ),
              'htmlOptions'=>array()
            ));
        } else {
        ?>    
          <div style="text-align:center;">
              <?php echo CHtml::image($urlLogo); ?>
          </div>
            
        <?php }
			 ?>
			
		  </div>
		  <!--  menu -->
		  <div class="left-menu">
				<?php $this->widget('UserMenu',
						array('option'=>array('themes'=> 'webroot.themes.'.Yii::app()->theme->name.'/views/_menus/companyMenu'))); ?>
		  </div>
  </div>
  
  <!-- container start -->
	<div id="container">
	 
		<?php echo $content ?>
	  <div class="boo-clr"></div>  
  </div>
  <!-- container end -->
<div style="clear:both;"></div> 	

</div>
<div style="clear:both;"></div> 	
<!-- wrapper end -->

<!-- footer start -->

<?php include('_footer.php')?>
<!-- footer end -->
</body>
</html>
