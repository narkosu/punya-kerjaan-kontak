<div id="container-header-company"><?php echo ucfirst($user->first_name).' '. ucfirst($user->last_name) ?></div>
<!-- sample modal content -->
<div class="detil-company">
	<!-- main container -->
	<div id="content-factory">
		<?php echo nl2br($user->profile)?>
	</div>
	
	
	<div id="detail-company-contact">
		<div style="font-weight:bold;border-bottom:1px solid #eee;" class="company-detil-header">
        <div style="float:left;">
        Kontak
        </div>
        <?php if ( Yii::app()->user->name === $user->username ) { ?>
        <div style="float:right;">Edit</div>
        <?php } ?>
        <div style="clear:both" class="clearfix"></div>
    </div>
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
	<div style="clear:both;"></div>
</div>
