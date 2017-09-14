<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Masuk</span>
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
									SELECT 
									DISTINCT id_tukar_jaga,
									waktu_mengajukan,
									waktu_mengantikan,
									tanggal,
									approve_status,
									status
									(SELECT fullname FROM tabel_pegawai WHERE tabel_pegawai.id_pegawai = tabel_tukar_jaga.id_tukar_jaga) as user_change
									FROM tabel_tukar_jaga WHERE user_request_id = '$user_id' ORDER BY id_tukar_jaga DESC
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['user_change']?></td>
									<td><?php echo $data['tanggal']?></td>
									<td><?php echo $data['waktu_mengajukan']?></td>
									<td><?php echo $data['waktu_mengantikan']?></td>
									<td>
									<?php
										
											if ($data['status'] == '1') {
												if ($data['approve_status'] == '1') {
													echo '<span class="label label-success"><i class="fa fa-check-circle-o"></i> Approved</span>';
												}
												elseif ($data['approve_status'] == '0') {
													echo '<span class="label label-danger"><i class="fa fa-exclamation-triangle"></i> Refused</span>';
												}
												elseif ($data['approve_status'] === NULL ) {
													echo '<span class="label label-primary"><i class="fa fa-check"></i> Agreed</span>';
												}
											}
											elseif ($data['status'] == '0') {
												echo '<span class="label label-warning"><i class="fa fa-times"></i> Rejected</span>';
											}
											elseif ($data['status'] === NULL ) {
												echo '<span class="label label-info"><i class="fa fa-clock-o"></i> Waiting</span>';										
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
				</form>
			</div>
		</div>
	</div>
</div>