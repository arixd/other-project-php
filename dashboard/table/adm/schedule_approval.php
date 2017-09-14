<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Tukar Jaga</span>
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
								<th>Mengajukan</th>
								<th>Digantikan</th>
								<th width="12%">Tanggal</th>
								<th width="15%">Dari Shift</th>
								<th width="12%">Ke Shift</th>
								<th>Persetujuan</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nomer = 1;
								$query = mysql_query("
									SELECT DISTINCT
									t1.reschedule_id,
									t1.sc_from,
									t1.sc_to,
									t1.date,
									t1.approval_status,
									(SELECT fullname FROM dt_users WHERE dt_users.user_id = t1.user_request_id) as user_request,
									(SELECT fullname FROM dt_users WHERE dt_users.user_id = t1.user_change_id) as user_change
									FROM dt_reschedule as t1
									INNER JOIN dt_users as t2 ON t1.user_request_id=t2.user_id
									INNER JOIN dt_position as t3 ON t2.position_id=t3.position_id
									WHERE change_status = '1' AND t3.department_id='$my_department' ORDER BY t1.reschedule_id DESC
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['user_request']?></td>
									<td><?php echo $data['user_change']?></td>
									<td><?php echo $data['date']?></td>
									<td><?php echo $data['sc_from']?></td>
									<td><?php echo $data['sc_to']?></td>
									<td>
									<?php
										$reschedule_id = $data['reschedule_id'];
										if ($data['approval_status'] == '1') {
											echo '<span class="label label-success">Approved</span>';
										}
										elseif ($data['approval_status'] == '0') {
											echo '<span class="label label-danger">Refused</span>';
										}
										elseif ($data['approval_status'] === NULL ) {
											echo '
											<a href="?reschedule_id='.$reschedule_id.'&approvalstat=1&approval_id='.$user_id.'" class="btn btn-success" onclick="return confirm(\'Are you sure to Approve it?\')"><span class="fa fa-check"></span>Approve</a>
											<a href="?reschedule_id='.$reschedule_id.'&approvalstat=0&approval_id='.$user_id.'" class="btn btn-danger" onclick="return confirm(\'Are you sure to Refuse it?\')"><span class="fa fa-times"></span>Refuse</a>
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