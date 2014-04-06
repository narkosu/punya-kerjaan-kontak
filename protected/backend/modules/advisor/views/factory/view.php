<div class="detil">
	<h1><?php echo $data->factory->company_name?><br>
		<span style="float:left;font-size:10px;"><?php echo $data->factory->address?></span>
		<span style="float:right;font-size:10px;margin-left:5px;">
		<?php echo $data->factoryReview->num_reviews ?> Reviews
		</span>
		<span style="float:right;font-size:10px;">
		<?php $this->widget('CStarRating',array('name'=>'AdvisorReview-total','value'=>$data->factoryReview->averageRating(),'maxRating'=>5,'minRating'=>1,'readOnly'=>true));?>
		</span>
		<div style="clear:both;"></div>
		
	</h1>
	<div class="row">
	<span>Telp number : </span>
	<span><?php echo $data->factory->telp_number?></span>
	</div>
	<div class="row">
	<span>Fax : </span>
	<span><?php echo $data->factory->fax?></span>
	</div>
	<div class="row">
	<span>Address : </span>
	<span><?php echo $data->factory->address?></span>
	</div>
	<div class="row">
	<span>City : </span>
	<span><?php echo $data->factory->city?></span>
	</div>
	
	<h1 style="padding:10px 0px;font-weight:bold;"><div style="float:left;color:green;">Reviews from our community</div>
	<div style="float:right;" class="button"><a href="<?php echo Yii::app()->createUrl('advisor/review/write/id/'.$data->factory->id);?>">Write Review</a></div><div style="clear:both;"></div></h1>
	<div>
	<?php foreach ( Yii::app()->getModule('advisor')->rating as $ratingstar=>$valuerating) { ?>
		<div style="clear:both;float:left;width:100px;margin-bottom:2px;"><?php echo $valuerating ?></div>
		<div style="float:left;width:100px;background:#eee;margin:2px;">
			<div style="float:left;width:<?php echo (($data->factoryReview->detilRating($ratingstar)/$data->factoryReview->num_reviews)*100)?>px;background:#90C018;">&nbsp;</div>
		</div>
		<div style="float:left;width:10px;margin:2px 5px;;"><?php echo $data->factoryReview->detilRating($ratingstar)?></div>
	<?php } ?>
	</div>
	<div style="clear:both"></div>
	<div id="reviews-list" style="margin-top:10px;">
	<div id="rewiews-list-header" style="border-top:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;">
	<div><?php echo Yii::t('Reviews','{num} Reviews',array('{num}'=>$data->factoryReview->num_reviews));?></div>
	</div>
	<div id="show-reviews">
		<?php
		foreach( $data->show_reviews as $review) {
		?>
		<div>
		<div style="float:left;padding:10px;" class="user-reviews">
		<div style="border:1px solid #aaa;width:74px;height:74px;">
		<?php echo CHtml::image(Yii::app()->baseUrl.'/images/no_user_photo.gif'); ?>
		<div><a href=""><?php echo User::model()->findByPk($review->user_id)->username?></a></div>		
		</div>
		</div>
		<div style="float:left;width:400px;">
			<h2><a href="#"><?php echo $review->title?></a></h2>
			<div style="float:left;margin-right:10px;">
			<?php $this->widget('CStarRating',array('name'=>'AdvisorReview-'.$review->id.'[rating]','value'=>$review->rating,'maxRating'=>5,'minRating'=>1,'readOnly'=>true));?>
			
			</div>
			<span class="posted">  <?php echo date('M d, Y',$review->create_date)?> | By: <a href="#"><?php echo User::model()->findByPk($review->user_id)->username?></a></span>
			
			<div style="clear:both;">
			<?php echo nl2br($review->review) ?>
			</div>
			<div style="margin-top:10px;font-size:12px;">
			<?php foreach ($review->RatingReview() as $ratingreview){ ?>
			<div style="padding-bottom:5px;">
				<div style="display:inline-block;margin-right:10px;width:160px;"><?php echo $ratingreview->relrating->title?></div>
				<div style="display:inline-block">
				<?php 
				
				$this->widget('CStarRating',array('name'=>'AdvisorReviewrating-'.$review->id.'['.$ratingreview->rating_id.']','value'=>$ratingreview->value,'maxRating'=>5,'minRating'=>1,'readOnly'=>true,'titles'=>Yii::app()->getModules('advisor')->rating));?></div>
			</div>
			<?php } ?>
			
			</div>
		</div>
		<div class="clear" style="clear:both;"></div>
		</div>
		<?php } ?>
	</div>
	</div>
</div>