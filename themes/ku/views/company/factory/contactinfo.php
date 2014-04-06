
<div id="container-header-company">Kontak <?php echo $data->factory->company_name?></div>
<!-- sample modal content -->
<div class="detil-company">
	<!-- main container -->
	<div class="main-content-company">
		<div id="detail-company-contact">
			
			<div style="">
				
				<table class="profileContactTable">
					<tbody>
						<Tr>
							<td>Nama</td>
							<td><a href="<?php echo Yii::app()->createUrl('members/'.$data->factory->user->username)?>">
							<?php echo ucfirst($data->factory->user->first_name).' '.ucfirst($data->factory->user->last_name)?>
							</a></td>
						</Tr>
						<Tr>
							<td>Email</td>
							<td><span class="btn">Kirim Pesan</span></td>
						</Tr>
						
					</tbody>
			</table>
			</div>
			
		</div>
		<div style="clear:both;"></div>
		
		<div style="font-weight:bold;border-bottom:1px solid #eee;" class="company-detil-header">Informasi Kontak Perusahaan <?php echo $data->factory->company_name?></div>
		<div style="clear:both;">
			<table class="profileContactTable">
					<tbody>
						<Tr>
							<td>Nama Perusahaan</td>
							<td><?php echo $data->factory->company_name?></td>
						</Tr>
						<Tr>
							<td>Address</td>
							<td><?php echo $data->factory->address?></td>
						</Tr>
						<Tr>
							<td>Telepon</td>
							<td><?php echo $data->factory->telp_number?></td>
						</Tr>
						<Tr>
							<td>Website</td>
							<td><?php echo $data->factory->website?></td>
						</Tr>
						
					</tbody>
			</table>
		</div>
	
	
	<div style="clear:both;"></div>
	
	</div>
</div>
