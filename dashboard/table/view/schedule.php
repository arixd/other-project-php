<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Request Ship</span>
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
								<th>To</th>
								<th>Date change</th>
								<th>Schedule From</th>
								<th>Schedule To</th>
								<th>Approved Date</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nomer = 1;
								$query = mysql_query("
									SELECT DISTINCT reschedule_id,sc_from,sc_to,date,approval_status,approval_date,
									(SELECT fullname FROM dt_users WHERE dt_users.user_id = dt_reschedule.user_request_id) as user_request,
									(SELECT fullname FROM dt_users WHERE dt_users.user_id = dt_reschedule.user_change_id) as user_change
									FROM dt_reschedule WHERE approval_status='1'
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