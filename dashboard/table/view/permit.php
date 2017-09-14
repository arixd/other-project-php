<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Permit Request</span>
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
								<th>From</th>
								<th>Created Date</th>
								<th>Time Out</th>
								<th>Allowed</th>
								<th>Reason</th>
								<th>Approval Date</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nomer = 1;
								$query = mysql_query("
									SELECT
									t1.date,
									t1.reason,
									t1.time_out,
									t1.duration_allowed,
									t1.approval_date,
									t2.fullname
									FROM dt_permit as t1
									INNER JOIN dt_users as t2 ON t1.user_id=t2.user_id
									WHERE approval_status='1'
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
									<td><?php echo $data['approval_date'];?></td>
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