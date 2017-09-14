<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Data - Jabatan</span>
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
							<th>Jabatan Name</th>
							<th>Divisi Name</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$nomer = 1;
							$query = mysql_query("
										SELECT 
										t1.id_divisi,
										t2.name_jabatan,
										t1.name_divisi
										FROM tabel_divisi as t1 
										INNER JOIN tabel_jabatan as t2 ON t1.id_jabatan = t2.id_jabatan ORDER BY t1.id_divisi");
							while ($data = mysql_fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $nomer ?></td>
							<td><?php echo $data['name_jabatan'] ?></td>
							<td><?php echo $data['name_divisi'] ?></td>
							<td>
								<center>
									<a href="?edit-position=<?php echo $data['id_divisi']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span>Edit</a>
									<a href="?delete-position=<?php echo $data['id_divisi']; ?>" class="btn btn-danger" onclick="return confirm('are you sure to delete it?')"><span class="fa fa-trash-o"></span>Delete</a>
								</center>
							</td>
						</tr>
						<?php
							$nomer++;
						}
						?>
					</tbody>
				</table>
				<a href="?data=create-position" class="btn btn-primary"><span class="fa fa-plus"></span> Create</a>
			</div>
		</div>
	</div>
</div>