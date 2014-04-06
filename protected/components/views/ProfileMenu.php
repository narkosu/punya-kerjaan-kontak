<div class="profile-summary js-profile-summary">
        <a href="/<?php echo Yii::app()->user->id?>" class="account-summary account-summary-small" data-nav="profile">
      	<div class="content">
      	  <div class="account-setting" data-user-id="<?php echo Yii::app()->user->id?>" data-screen-name="<?php echo Yii::app()->user->name?>">
      	    <Div class="avatar">
			<img class="size32" src="https://si0.twimg.com/profile_images/2459998643/IMG01430-20120316-1934_normal.jpg" alt="<?php echo Yii::app()->user->name?>" data-user-id="<?php echo Yii::app()->user->id?>">
			</div>
      	    <div class="identity">
			<b class="fullname"><?php echo Yii::app()->user->name?></b><br/>
      	    <small class="metadata">View my profile page</small>
			</div>
			<div class="clear"></div>
      	  </div>
      	</div>
      </a>
  </div>