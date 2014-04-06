<!-- sample modal content -->
<div class="detil-company">
	<!-- main container -->
	<div class="main-content-company">
		<div id="company-cover-or-banner" style="width:100%;height:250px;background: #244776;overflow: hidden;">
			<?php
      $urlCover = ( !empty($this->getParams()->cover_picture_id) ? 
                        Yii::app()->baseUrl.'/images/'.
                            Yii::app()->image
                                ->renderVersion($this->getParams()->cover_picture_id, 'large')
                                ->urlpath : '');
        if ( Yii::app()->user->getState('storeLogin')->company_id == $this->getParams()->company_id) {
            $this->widget('ext.imageSelect.ImageSelect',  array(
               'path'=>$urlCover,
               'alt'=>'alt text',
               'uploadUrl' => Yii::app()->createUrl('company/factory/coverpicture/cid/'. $this->getParams()->company_id),
               'htmlOptions'=>array('width'=>'100%')
            ));
        } else {
            echo CHtml::image($urlCover,'',array('style'=>'width:100%'));
        }
			 ?>
		</div>
		<h1 style="padding:0px 10px;"><?php echo $data->factory->company_name?><br>
			<span style="float:left;font-size:10px;"><?php echo $data->factory->address?></span>
			<div style="clear:both;"></div>
		</h1>
		<div id="content-factory" style="margin:0px 10px;">
			<?php echo nl2br($data->factory->about_company)?>
			<div style="clear:both;"></div>
		</div>
	
	<div style="clear:both;"></div>
	<div id="detail-company-contact">
		<div style="font-weight:bold;border-bottom:1px solid #eee;padding:0px 10px;" class="company-detil-header">Kontak</div>
		<div style="clear:both;float:left;width:350px;padding:0px 10px;">
			<table class="profileContactTable">
				<tbody>
					<Tr>
						<td>Email</td>
						<td>Kirim Pesan</td>
					</Tr>
					<Tr>
						<td>Telepon</td>
						<td><?php echo $data->factory->telp_number?></td>
					</Tr>
					<Tr>
						<td>Address</td>
						<td><?php echo $data->factory->address?></td>
					</Tr>
				</tbody>
			</table>
				
			</div>
	</div>
</div>
