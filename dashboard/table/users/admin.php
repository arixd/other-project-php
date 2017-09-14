<div class="row">
<!-- isi -->
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Users with Admin Access</span>
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
							<th width="3%" align="center">#</th>
							<th>Nip</th>
							<th>Fullname</th>
							<th>Username</th>
							<th>Telephone</th>
							<th>Gender</th>
							<th>Photo</th>
							<th width="20%"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$nomer = 1;
							$query = mysql_query("SELECT * FROM tabel_pegawai where access='admin' ORDER BY id_pegawai DESC");
							while ($data=mysql_fetch_array($query)) {
						?>
						<tr>
							<td><center><?php echo $nomer ?></center></td>
							<td><?php echo $data['nip'] ?></td>
							<td><?php echo $data['fullname'] ?></td>
							<td><?php echo $data['username'] ?></td>
							<td><?php echo $data['telphone'] ?></td>
							<td><?php echo $data['gender'] ?></td>
							<td><img src="<?php echo $site_url.$data['photo'] ?>" class="img-circle" width="50" height="50"></td>
							<td>
								<center>
									<a href="?edit-user=<?php echo $data['id_pegawai']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span>Edit</a>
									<a href="?delete-user=<?php echo $data['id_pegawai']; ?>&ref=admin" class="btn btn-danger" onclick="return confirm('are you sure to delete it?')"><span class="fa fa-trash-o"></span>Delete</a>
								</center>
							</td>
						</tr>
						<?php
							$nomer++;
						}
						?>
					</tbody>
				</table>
				<a href="?users=create-user&ref=admin" class="btn btn-primary"><span class="fa fa-plus"></span> Create New User</a>
			</div>
		</div>
	</div>
</div>