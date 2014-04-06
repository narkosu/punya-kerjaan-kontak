<div id="container-header-company">About</div>
<!-- sample modal content -->
<div class="detil-company">
	<!-- main container -->
	<div class="main-content-company">
		<div id="company-cover-or-banner" style="width:100%;height:250px;background: #eee;margin-bottom:10px;overflow: hidden;">
			<?php
				$this->widget('ext.imageSelect.ImageSelect',  array(
					 'path'=>'http://localhost/yii1.1.12/kontakusaha/photos/review_51/Boston-Nevado-(Prudential-B.jpg',
					 'alt'=>'alt text',
					 'uploadUrl'=>Yii::app()->createUrl('general/upload'),
					 'htmlOptions'=>array('width'=>'100%')
				));
			 ?>
		</div>
		<h1><?php echo $data->factory->company_name?><br>
			<span style="float:left;font-size:10px;"><?php echo $data->factory->address?></span>
			<div style="clear:both;"></div>
		</h1>
		<div id="content-factory">
			<?php echo nl2br($data->factory->about_company)?>
			<div style="clear:both;"></div>
		</div>
		
	
	
	<div style="clear:both;"></div>
	<div id="detail-company-contact">
		<div style="font-weight:bold;border-bottom:1px solid #eee;" class="company-detil-header">Kontak</div>
		<div style="clear:both;float:left;width:350px;">
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
