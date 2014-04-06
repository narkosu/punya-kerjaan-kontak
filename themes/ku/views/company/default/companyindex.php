<div class="box-company-list">
  <?php
	foreach($companies as $company){ ?>
		<div class="row-company">
      <a class="companytitle" href="<?php echo Yii::app()->createUrl('company/factory/view/id/'.$company->id)?>">
        <?php echo $company->company_name?>
      </a>
      <div class="subtitle"><?php echo substr($company->about_company,0,50).'..'?></div>
      <div class="box-toolbar">Kontak</div>
    </div>
	<?php } ?>
</div>