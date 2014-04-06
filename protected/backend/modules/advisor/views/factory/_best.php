<div class="box-best">
<h4 class="best">BEST SUPPLIER</h4>
 <!-- other review content -->
<h2><a href="<?php echo Yii::app()->createUrl('advisor/factory/view/id/'.$best->factory_id)?>"><?php echo $best->relfactory->company_name?></a></h2>
<div>

	<div style="float:left;font-size:10px;"><?php $this->widget('CStarRating',array('name'=>'AdvisorReview-total-widget','value'=>$best->averageRating(),'maxRating'=>5,'minRating'=>1,'readOnly'=>true));?></div>
	<div style="float:left;font-size:10px;margin-left:5px;">
	<?php echo $best->num_reviews ?> Reviews
	</div>
	<div style="clear:both;"></div>
</div>
<p>
<?php foreach ( Yii::app()->getModule('advisor')->rating as $ratingstar=>$valuerating) { ?>
		<div style="clear:both;float:left;width:100px;margin-bottom:2px;"><?php echo $valuerating ?></div>
		<div style="float:left;width:100px;background:#187257;margin:2px;">
			<div style="float:left;width:<?php echo (($best->detilRating($ratingstar)/$best->num_reviews)*100)?>px;background:#90C018;">&nbsp;</div>
		</div>
		<div style="float:left;width:10px;margin:2px 5px;;"><?php echo $best->detilRating($ratingstar)?></div>
	<?php } ?>
	<div style="clear:both;"></div>

</p>
<!-- other review content end-->
</div>