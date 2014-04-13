<div class="box-company-list">
  <?php
	foreach( $companies as $company ){ ?>
		<div class="row-company" style="margin-top:10px;">
        <div class="avatar" style="float:left;width:100px;">
            
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
            <?php } ?>
                <div> NO LOGO</div>
        </div>
        <div  style="float:left;width:560px;">
            <a class="companytitle" style="font-weight:bold;" href="<?php echo Yii::app()->createUrl('company/factory/view/id/'.$company->id)?>">
              <?php echo $company->company_name?>
            </a>
            <div class="subtitle"><?php echo substr($company->about_company,0,50).'..'?></div>
            <div class="box-toolbar">Kontak</div>
        </div>
        <div style="clear:both"></div>
    </div>
	<?php } ?>
</div>