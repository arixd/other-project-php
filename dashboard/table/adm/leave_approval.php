<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Masuk Cuti</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					<table class="table table-hover display" id="dataTables1" cellspacing="0" width="100%">
						<?php
						$query = mysql_query("
								SELECT
								t2.department_id
								FROM dt_users as t1
								INNER JOIN dt_position as t2 ON t1.position_id=t2.position_id
								WHERE user_id='$user_id'
							");   
	                  		$mydata  = mysql_fetch_array($query);
	                  		$my_department = $mydata['department_id'];
						?>
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Rencana Cuti</th>
								<th>Samapai</th>
								<th>Waktu Hari</th>
								<th>Kembali</th>
								<th>Keperluan Cuti</th>
								<th>Persetujuan dan status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nomer = 1;
								$query = mysql_query("
									SELECT
									t1.leave_id,
									t1.application_type,
									t1.date_from,
									t1.date_to,
									t1.length,
									t1.date_backtowork,
									t1.approval_status,
									t2.fullname
									FROM dt_leave as t1
									INNER JOIN dt_users as t2 ON t1.user_id=t2.user_id
									INNER JOIN dt_position as t3 ON t2.position_id=t3.position_id
									WHERE department_id='$my_department' ORDER BY t1.leave_id DESC
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['fullname']?></td>
									<td><?php echo $data['date_from']?></td>
									<td><?php echo $data['date_to']?></td>
									<td><?php echo $data['length']?> Days</td>
									<td><?php echo $data['date_backtowork']?></td>
									<td>
										<?php
										if ($data['application_type'] == 'annual_leave') {
											echo 'Annual Leave';
										}elseif ($data['application_type'] == 'ph') {
											echo 'PH';
										}elseif ($data['application_type'] == 'dp' ) {
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
										$leave_id = $data['leave_id'];
										if ($data['approval_status'] == '1') {
											echo '<span class="label label-success">Approved</span>';
										}elseif ($data['approval_status'] == '0') {
											echo '<span class="label label-danger">Refused</span>';
										}elseif ($data['approval_status'] === NULL ) {
											echo '
											<a href="?leave_id='.$leave_id.'&approvalstat=1&approval_id='.$user_id.'" class="btn btn-success" onclick="return confirm(\'Are you sure to Approve it?\')"><span class="fa fa-check"></span>Approve</a>
											<a href="?leave_id='.$leave_id.'&approvalstat=0&approval_id='.$user_id.'" class="btn btn-danger" onclick="return confirm(\'Are you sure to Refuse it?\')"><span class="fa fa-times"></span>Refuse</a>
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
				</form>
			</div>
		</div>
	</div>
</div>