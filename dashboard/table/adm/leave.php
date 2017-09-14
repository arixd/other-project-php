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
								<th>rencana</th>
								<th>Hitung Hari</th>
								<th>Kembali</th>
								<th>Keperluan</th>
								<th>Alamat</th>
								<th>Sisa Cuti</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nomer = 1;
								$query = mysql_query("
									SELECT DISTINCT *,
									(SELECT fullname FROM dt_users WHERE dt_users.user_id = dt_leave.user_id) as user_name
									FROM dt_leave WHERE user_id = '$user_id' ORDER BY leave_id DESC
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['user_name']?></td>
									<td><?php echo $data['date_from']?></td>
									<td><?php echo $data['date_to']?></td>
									<td><?php echo $data['length']?> Days</td>
									<td><?php echo $data['date_backtowork']?></td>
									<td>
										<?php
										if ($data['application_type'] == 'annual_leave') {
											echo 'Annual Leave';
										}
										elseif ($data['application_type'] == 'ph') {
											echo 'PH';
										}
										elseif ($data['application_type'] == 'dp' ) {
											echo 'DP';
										}elseif ($data['application_type'] == 'eo' ) {
											echo 'EO';
										}elseif ($data['application_type'] == 'maternity' ) {
											echo 'Maternity';
										}
									?>
									</td>
									<td>
									<?php
										if ($data['approval_status'] == '1') {
											echo '<span class="label label-success"><i class="fa fa-check-circle-o"></i> Approved</span>';
										}
										elseif ($data['approval_status'] == '0') {
											echo '<span class="label label-danger"><i class="fa fa-exclamation-triangle"></i> Refused</span>';
										}
										elseif ($data['approval_status'] === NULL ) {
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