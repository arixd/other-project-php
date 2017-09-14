<?php 
	if($_SESSION['access'] == 'Chief GA'){
		?>


<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Masuk Tukar Jaga</span>
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
								<th>#</th>
								<th>MENGAJUKAN  </th>
								<th>MENGGANTIKAN</th>
								<th>TANGGAL</th>
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
										id_tukar_jaga,
										nip_mengganti AS NIK,
										tp.`fullname` AS NamaTujuan,
										nip_meminta as nip_pengirim,
										(SELECT fullname FROM tabel_pegawai WHERE nip=nip_meminta) nama_pengirim,
										(SELECT  nama_shift FROM `tabel_shift` WHERE `id_shift`=id_shift_mengajukan) AS Mengajukan,
										(SELECT  nama_shift FROM `tabel_shift` WHERE `id_shift`=id_shift_menggantikan) AS Menggantikan,
										tanggal tanggal_dibuat,
										waktu_menggajukan waktu,
										waktu_menggantikan,
										alasan,
										status,
										approve_status,
										approve_date,
										approval_atasan
										FROM tabel_tukar_jaga tj
										JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
										WHERE  STATUS=0 AND  approve_status='Waiting' 
										ORDER BY id_tukar_jaga DESC
									
							
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['nama_pengirim']?></td>
									<td><?php echo $data['NamaTujuan']?></td>
									<td><?php echo $data['waktu']?></td>
									<td><?php echo $data['Mengajukan']?></td>
									<td><?php echo $data['Menggantikan']?></td>
									<td><?php echo $data['alasan']?></td>
									<td><?php 


									if ($data['status'] == '0') {
											echo "<span class='label label-danger'> <b>".$data['approve_status']."</b></span>";
										}else{
											echo '<span class="label label-danger">Close</span>';
										}
									?>
									</td>
									<td width="250px">
										
										<?php

										$reschedule_id=$data['id_tukar_jaga'];
										$approval_atasan=0;

										echo '
											<a href="?reschedule_id='.$reschedule_id.'&changestat=Approve" class="btn btn-success" onclick="return confirm(\'Are you sure to Approve it?\')"><span class="fa fa-check"></span>Approve</a>

											<a href="?reschedule_id='.$reschedule_id.'&changestat=Reject" class="btn btn-danger" onclick="return confirm(\'Are you sure to reject it?\')"><span class="fa fa-times"></span>Reject</a>
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
				<span class="grid-title">Pesan Masuk Tukar Jaga</span>
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
								<th>#</th>
								<th>NIP </th>
								<th>NAMA PENGIRIM</th>
								<th>TANGGAL</th>
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
										id_tukar_jaga,
										nip_mengganti AS NIK,
										tp.`fullname` AS NamaTujuan,
										nip_meminta as nip_pengirim,
										(SELECT fullname FROM tabel_pegawai WHERE nip=nip_meminta) nama_pengirim,
										(SELECT  nama_shift FROM `tabel_shift` WHERE `id_shift`=id_shift_mengajukan) AS Mengajukan,
										(SELECT  nama_shift FROM `tabel_shift` WHERE `id_shift`=id_shift_menggantikan) AS Menggantikan,
										tanggal tanggal_dibuat,
										waktu_menggajukan waktu,
										waktu_menggantikan,
										alasan,
										status,
										approve_status,
										approve_date,
										approval_atasan
										FROM tabel_tukar_jaga tj
										JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
										WHERE nip_mengganti='$nip'
										AND STATUS=0 AND (approve_status='Waiting Approval' or approve_status='Waiting') 
										ORDER BY id_tukar_jaga DESC
									
							
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['nip_pengirim']?></td>
									<td><?php echo $data['nama_pengirim']?></td>
									<td><?php echo $data['waktu']?></td>
									<td><?php echo $data['Mengajukan']?></td>
									<td><?php echo $data['Menggantikan']?></td>
									<td><?php echo $data['alasan']?></td>
									<td><?php 


									if ($data['status'] == '0') {
											echo "<span class='label label-danger'> <b>".$data['approve_status']."</b></span>";
										}else{
											echo '<span class="label label-danger">Close</span>';
										}
									?>
									</td>
									<td width="250px">
										
										<?php

										$reschedule_id=$data['id_tukar_jaga'];
										$approval_atasan=0;

										echo '
											<a href="?reschedule_id='.$reschedule_id.'&changestat=Waiting" class="btn btn-success" onclick="return confirm(\'Are you sure to Approve it?\')"><span class="fa fa-check"></span>Approve</a>

											<a href="?reschedule_id='.$reschedule_id.'&changestat=Reject" class="btn btn-danger" onclick="return confirm(\'Are you sure to reject it?\')"><span class="fa fa-times"></span>Reject</a>
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
