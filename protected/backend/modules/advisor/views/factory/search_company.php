	<div class="box-searchresult">
	<h2>Select the factory you'd like to review</h2>
	<div>
	
	<?php
	
	if ( $searchQuery ) {
		foreach ( $searchQuery as $idx=>$result){
			echo '<div style="border-bottom:1px solid #ddd;padding:10px 0px;">
			<a href="'.Yii::app()->createUrl('advisor/review/write/id/'.$result->id).'">'.$result->company_name.'</div>';
		}
	} else {
		echo 'Your keyword doest not found';	
	}
	?>      
	</div>
	</div>