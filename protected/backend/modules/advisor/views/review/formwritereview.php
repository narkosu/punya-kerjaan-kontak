<?php
	$js=Yii::app()->clientScript;
	$js->registerScriptFile(Yii::app()->baseUrl.'/js/bootstrap-modal.js');
	$js->registerScript('savereview', '
			    
			jQuery("#buttonsavereview").click(function(){
			var datas = jQuery("#formreview").serialize();
			jQuery.ajax({
			  url: "'.Yii::app()->createUrl('advisor/review/savereview').'",
			  data : datas,
			  dataType : "json",
			  type : "post",
			  success: function(data) {
				
			
				if (data.status == "needlogin"){
					jQuery.ajax({
						url: "'.Yii::app()->createUrl('site/AjaxLogin?element=formreview').'",
						success: function(datas) {
								$("#modal-from-dom").find(".modal-body").html(datas);
								$("#modal-from-dom").modal({"show":true,"backdrop":"static"});
						}
						});
				}else if (data.status == "error") {
					$(".error").html("");
					$.each(data.errors, function(index, value) { 
					  jQuery("#error-"+index).html(value[0]); 
					});
					//data.errors.each(function(i,n){alert(i+" "+n);});
				}
			  }
			});
			
		});		
		
	');
?>
<div id="sendback"></div>

	 <!-- sample modal content -->
          <div id="modal-from-dom" class="modal hide fade">
            <div class="modal-header">
              <a href="#" class="close">&times;</a>
              <h3>Sign in to complete your review</h3>
            </div>
            <div class="modal-body">
				
            </div>
           
          </div>

   
<div id="box-recentreview">
	<form method="post" action="" id="formreview">
	<h1><?php echo $factory->company_name?><br>
		<span style="font-size:10px;"><?php echo $factory->address?></span>
		
	</h1>
	<input type="hidden" name="AdvisorReview[factory_id]" value="<?php echo $_GET['id']?>">
	<div style="padding:10px 0px;">
	Your overall rating of this property
	<br>
	<?php $this->widget('CStarRating',array('name'=>'AdvisorReview[rating]','value'=>$_POST['AdvisorReview']['rating'],'maxRating'=>5,'minRating'=>1,'titles'=>Yii::app()->getModules('advisor')->rating));?></div>
	<div style="padding:10px 0px;">Title of your review</div>
	<div id="error-title" class="error"></div>
	<div>
	<input type="text" style="width:500px;" name="AdvisorReview[title]" value="<?php echo $_POST['AdvisorReview']['title']?>">
	</div>
	<div style="padding:10px 0px;">Your review</div>
	<div id="error-review" class="error"></div>
	<div>
	<textarea style="width:500px;height:150px;" name="AdvisorReview[review]"><?php echo $_POST['AdvisorReview']['review']?></textarea>
	</div>
	
	<div>
		<div style="padding:10px 0px;"> Could you say a little more about it?(optional)</div>
		<?php foreach (AdvisorRating::model()->findAll() as $adrating){ ?>
			<div style="padding-bottom:5px;">
				<div style="display:inline-block;margin-right:10px;width:160px;"><?php echo $adrating->title?></div>
				<div style="display:inline-block">
				<?php $this->widget('CStarRating',array('name'=>'AdvisorReviewrating['.$adrating->id.']','value'=>$_POST['AdvisorReviewrating'][$adrating->id],'maxRating'=>5,'minRating'=>1,'titles'=>Yii::app()->getModules('advisor')->rating));?></div>
			</div>
		<?php } ?>
		
	</div>
	<input type="button" class="btn" id="buttonsavereview" value="Submit your review">
	</form>
</div>