<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Keluar</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					<table class="table table-hover display" id="dataTables1" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>nip</th>
								<th>nama</th>
								<th>tanggal</th>
								<th>Waktu Mengajukan</th>
								<th>Waktu Mengantikan</th>
								<th>Alasan</th>
								<th>Persetujuan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nomer = 1;
								$query = mysql_query("
									SELECT DISTINCT 
									id_tukar_jaga,
									waktu_mengajukan,
									waktu_menggantikan,
									tanggal,
									status,
									alasan,
									approve_status,
									nip,
									fullname
									FROM tabel_tukar_jaga
									INNER JOIN tabel_pegawai ON tabel_tukar_jaga.id_pegawai = tabel_pegawai.id_pegawai
									WHERE nip_menggantikan = '$user_id' ORDER BY id_tukar_jaga DESC
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['nip']?></td>
									<td><?php echo $data['fullname']?></td>
									<td><?php echo $data['tanggal']?></td>
									<td><?php echo $data['waktu_mengajukan']?></td>
									<td><?php echo $data['waktu_menggantikan']?></td>
									<td><?php echo $data['alasan']?></td>
									<td><?php echo $data['approve_status']?></td>
									<td><?php echo $data['nip_menggantikan']?></td>
									<td>
									<?php
										$reschedule_id = $data['id_tukar_jaga'];
										if ($data['status'] == '1') {
											echo '<span class="label label-success">Accepted</span>';
										}
										elseif ($data['status'] == '0') {
											echo '<span class="label label-danger">Rejected</span>';
										}
										elseif ($data['status'] === NULL ) {
											echo '
											<a href="?reschedule_id='.$reschedule_id.'&changestat=1" class="btn btn-success" onclick="return confirm(\'Are you sure to Accept it?\')"><span class="fa fa-check"></span>Accept</a>
											<a href="?reschedule_id='.$reschedule_id.'&changestat=0" class="btn btn-danger" onclick="return confirm(\'Are you sure to reject it?\')"><span class="fa fa-times"></span>Reject</a>
											';
										}										
									
									?>
									</td>
								</tr>
							<?php
								$nomer++;
								}
							?>
						</tbody>
					</table>
					<div class="col-lg-2 col-md-4 col-sm-2" style="left:400px;">
						<div class="grid widget bg-white">
							<a href="?users=employee">
								<div class="grid-body">
									<span class="title">Total tukar jaga</span>
										<?php
											$users = mysql_query("SELECT COUNT(fullname) AS total FROM tabel_pegawai WHERE access = 'employee'");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>