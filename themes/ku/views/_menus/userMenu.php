<div class="compant-left-group">
	<div class="baris">
      
		<a href="<?php echo Yii::app()->createUrl('members/'.$getParam['username']);?>">Profil</a>
	</div>
	<?php
	$factory = UserFactory::model()->getfactorybyuser($getParam['user_id']);
	if ($factory )  {
	?>
		<div class="baris">
			<a href="<?php echo Yii::app()->createUrl('company/factory/view/id/'.$factory->company_id)?>">Perusahaan</a>
		</div>
    <div class="baris">
        <a href="<?php echo Yii::app()->createUrl('company/factory/contactinfo/id/'.$getParam['company_id'])?>">Kontak</a>
    </div>
	<?php }else{ ?>
    <div class="baris">
			<a href="<?php echo Yii::app()->createUrl('company/factory/baru')?>">Perusahaan Anda ? </a>
		</div>
  <?php } ?>
	
</div>