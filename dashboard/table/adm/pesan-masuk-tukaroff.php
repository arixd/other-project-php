<?php
		if($_SESSION['access'] == 'Chief Eng'){

			?>
<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Masuk Tukar Off</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
			<!-- <div style='overflow:auto;white-space:nowrap;'> -->
				<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					<table class="table table-hover display" id="dataTables1" cellspacing="0" >
						<thead>
							
							<tr>
								<th>NO</th>
								<th>MENGAJUKAN </th>
								<th>MENGGANTIKAN</th>
								<th>TANGGAL MENGAJUKAN</th>
								<th>TANGGAL MENGGANTIKAN</th>
								<th>ALASAN</th>
								<th>STATUS</th>
								<th>PRSETUJUAN</th>
							</tr>
					

						</thead>
						<tbody>
							<?php
								$nip=$_SESSION['user_id'];
								$nomer = 1;
								$query = mysql_query("
	
										SELECT 
												id_off,
												nip_mengganti AS NIK,
												tp.`fullname` AS NamaTujuan,
												nip_meminta AS nip_pengirim,
												(SELECT fullname FROM tabel_pegawai WHERE nip=nip_meminta) nama_pengirim,
												waktu_menggajukan,
												waktu_menggantikan,
												alasan,
												status,
												approve_status,
												approve_date
											FROM tabel_tukar_off tj
											JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
												WHERE status=0 AND approve_status='Waiting'
											ORDER BY id_off DESC
									
							
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['nama_pengirim']?></td>
									<td><?php echo $data['NamaTujuan']?></td>
									<td><?php echo $data['waktu_menggajukan']?></td>
									<td><?php echo $data['waktu_menggantikan']?></td>
									<td><?php echo $data['alasan']?></td>
									<td><?php 
									if ($data['status'] == '0') {
											echo "<span class='btn btn-primary'> <b>".$data['approve_status']."</b></span>";
										}else{
											echo '<span class="label label-danger">Close</span>';
										}
									?>
									</td>
									<td width="250px">
										
										<?php

										$reschedule_id=$data['id_off'];
										echo '
											<a href="?reschedule_tukarof_id='.$reschedule_id.'&changestat=Approve" class="btn btn-success" onclick="return confirm(\'Are you sure to Approve it?\')"><span class="fa fa-check"></span>Approve</a>

											<a href="?reschedule_tukarof_id='.$reschedule_id.'&changestat=Reject" class="btn btn-danger" onclick="return confirm(\'Are you sure to reject it?\')"><span class="fa fa-times"></span>Reject</a>
											';
										?>
									</td>
								
								</tr>
							<?php
								$nomer++;
								}
							?>
						</tbody>
					</table>
					
				</form>
				<!-- </div> -->
			</div>
		</div>
	</div>
</div>

			<?php
		}else{
?>

<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Masuk Tukar Off </span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
			<!-- <div style='overflow:auto;white-space:nowrap;'> -->
				<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					<table class="table table-hover display" id="dataTables1" cellspacing="0" >
						<thead>
							
							<tr>
								<th>NO</th>
								<th>NIP </th>
								<th>NAMA PENGIRIM</th>
								<th>WAKTU MENGAJUKAN</th>
								<th>WAKTU MENGGANTIKAN</th>
								<th>ALASAN</th>
								<th>STATUS</th>
								<th>PRSETUJUAN</th>
							</tr>
					

						</thead>
						<tbody>
							<?php
								$nip=$_SESSION['user_id'];
								$nomer = 1;
								$query = mysql_query("
	
										SELECT 
												id_off,
												nip_mengganti AS NIK,
												tp.`fullname` AS NamaTujuan,
												nip_meminta AS nip_pengirim,
												(SELECT fullname FROM tabel_pegawai WHERE nip=nip_meminta) nama_pengirim,
												waktu_menggajukan,
												waktu_menggantikan,
												alasan,
												status,
												approve_status,
												approve_date
											FROM tabel_tukar_off tj
											JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
												WHERE nip_mengganti='$nip'
											AND status=0 AND (approve_status='Waiting Approval' or approve_status='Waiting') 
											ORDER BY id_off DESC
									
							
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['nip_pengirim']?></td>
									<td><?php echo $data['nama_pengirim']?></td>
									<td><?php echo $data['waktu_menggajukan']?></td>
									<td><?php echo $data['waktu_menggantikan']?></td>
									<td><?php echo $data['alasan']?></td>
									<td><?php 
									if ($data['status'] == '0') {
											echo "<span class='btn btn-danger'> <b>".$data['approve_status']."</b></span>";
										}else{
											echo '<span class="btn btn-danger">Close</span>';
										}
									?>
									</td>
									<td width="250px">
										
										<?php

										$reschedule_id=$data['id_off'];
										echo '
											<a href="?reschedule_tukarof_id='.$reschedule_id.'&changestat=Waiting" class="btn btn-success" onclick="return confirm(\'Are you sure to Approve it?\')"><span class="fa fa-check"></span>Approve</a>

											<a href="?reschedule_tukarof_id='.$reschedule_id.'&changestat=Reject" class="btn btn-danger" onclick="return confirm(\'Are you sure to reject it?\')"><span class="fa fa-times"></span>Reject</a>
											';
										?>
									</td>
								
								</tr>
							<?php
								$nomer++;
								}
							?>
						</tbody>
					</table>
					
				</form>
				<!-- </div> -->
			</div>
		</div>
	</div>
</div>
<?php 
	 }
?>