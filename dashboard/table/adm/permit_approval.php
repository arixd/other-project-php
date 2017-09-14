<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Permohonan Cuti</span>
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
								<th>From</th>
								<th>Created Date</th>
								<th>Time Out</th>
								<th>Allowed</th>
								<th>Reason</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nomer = 1;
								$query = mysql_query("
									SELECT
									t1.permit_id,
									t1.date,
									t1.reason,
									t1.time_out,
									t1.duration_allowed,
									t1.approval_status,
									t2.fullname
									FROM dt_permit as t1
									INNER JOIN dt_users as t2 ON t1.user_id=t2.user_id
									INNER JOIN dt_position as t3 ON t2.position_id=t3.position_id
									WHERE department_id='$my_department' ORDER BY t1.permit_id DESC
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['fullname'];?></td>
									<td><?php echo $data['date'];?></td>
									<td><?php echo $data['time_out'];?> Days</td>
									<td><?php echo $data['duration_allowed'];?> Days</td>
									<td><?php echo $data['reason'];?></td>
									<td>
									<?php
										$permit_id = $data['permit_id'];
										$time_out = $data['time_out'];
										if ($data['approval_status'] == '1') {
											echo '<span class="label label-success">Approved</span>';
										}
										elseif ($data['approval_status'] == '0') {
											echo '<span class="label label-danger">Refused</span>';
										}
										elseif ($data['approval_status'] === NULL ) {
											echo '
											<a href="#" class="btn btn-success" onclick="approveFunc('.$permit_id.','.$time_out.','.$user_id.')"><span class="fa fa-check"></span>Approve</a>
											<a href="?permit_id='.$permit_id.'&approvalstat=0&duration=0&approval_id='.$user_id.'" class="btn btn-danger" onclick="return confirm(\'Are you sure to Refuse it?\')"><span class="fa fa-times"></span>Refuse</a>
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
<script>
function approveFunc(permit_id,time_out,approval_id) {
    var allowed = prompt("Enter Duration Allowed", time_out);
    if (allowed != null) {
        window.location=site_url+"?permit_id="+permit_id+"&approvalstat=1&duration="+allowed+"&approval_id="+approval_id;
    }
}
</script>