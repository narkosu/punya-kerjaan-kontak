<div class="box-company-list">
  <?php
	foreach( $companies as $company ){ ?>
		<div class="row-company" style="margin-top:10px;border:1px solid #eee;">
        <div class="avatar" style="float:left;width:75px;padding:5px;">
            
            <?php 
            $urlLogo = ( !empty($company->picture_id) ? 
                            Yii::app()->baseUrl.'/images/'.
                                Yii::app()->image
                                    ->renderVersion($company->picture_id, 'logo')
                                    ->urlpath : ''); 
            ?>
            <?php 
            if ( !empty($urlLogo) ) { ?>
                <img class="avatar" src="<?php echo $urlLogo?>" style="width:75px">
            <?php } else {  ?>
                <div> NO LOGO</div>
            <?php } ?>    
        </div>
        <div  style="float:left;width:578px;padding:0px 0px;">
            <a class="companytitle" style="font-weight:bold;" href="<?php echo Yii::app()->createUrl('company/factory/view/id/'.$company->id)?>">
              <?php echo $company->company_name?>
            </a>
            <div class="subtitle"><?php echo substr($company->about_company,0,50).'..'?></div>
            <div class="" style="padding:10px 0px;margin-top: 10px;border-top: 1px solid #eee;">Kontak</div>
        </div>
        <div style="clear:both"></div>
    </div>
	<?php } ?>
    <div id="products-footer">
        <?php 
        $this->widget('CLinkPager', array(
            'pages' => $pages,
        ));
        ?>
    </div>
</div>