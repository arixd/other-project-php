<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Leave Request</span>
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
								<th>Name</th>
								<th>From</th>
								<th>To</th>
								<th>Length</th>
								<th>Back Work</th>
								<th>Type</th>
								<th>Approval Date</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nomer = 1;
								$query = mysql_query("
									SELECT
									t1.application_type,
									t1.date_from,
									t1.date_to,
									t1.length,
									t1.date_backtowork,
									t1.approval_date,
									t2.fullname
									FROM dt_leave as t1
									INNER JOIN dt_users as t2 ON t1.user_id=t2.user_id
									WHERE approval_status='1'
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
									<td><?php echo $data['approval_date']?></td>
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