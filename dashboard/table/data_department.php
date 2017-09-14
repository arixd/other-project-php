<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Data - Divisi</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<table id="dataTables1" class="table table-hover display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th width="3%">#</th>
							<th>Divisi Name</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$nomer = 1;
							$query = mysql_query("SELECT * FROM tabel_divisi ORDER BY id_divisi DESC");
							while ($data = mysql_fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $nomer ?></td>
							<td><?php echo $data['name_divisi'] ?></td>
							<td>
								<center>
									<a href="?edit-department=<?php echo $data['id_divisi']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span>Edit</a>
									<a href="?delete-department=<?php echo $data['id_divisi']; ?>" class="btn btn-danger" onclick="return confirm('are you sure to delete it?')"><span class="fa fa-trash-o"></span>Delete</a>
								</center>
							</td>
						</tr>
						<?php
							$nomer++;
						}
						?>
					</tbody>
				</table>
				<a href="?data=create-department" class="btn btn-primary"><span class="fa fa-plus"></span> Create</a>
			</div>
		</div>
	</div>
</div>