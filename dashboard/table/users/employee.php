<div class="row">
<!-- isi -->
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Users with Karyawan Access</span>
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
							<th>Employee ID</th>
							<th>Fullname</th>
							<th>Position</th>
							<th width="10%">Telphone</th>
							<th width="18%"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$nomer = 1;
							$query = mysql_query("
								SELECT
								t1.id_pegawai,
								t1.nip,
								t1.fullname,
								t1.telphone,
								t2.name_jabatan,
								t3.name_divisi
								FROM tabel_pegawai as t1
								INNER JOIN tabel_jabatan as t2 ON t1.id_jabatan=t2.id_jabatan
								INNER JOIN tabel_divisi as t3 ON t1.id_divisi=t3.id_divisi
								WHERE access='karyawan' ORDER BY t1.id_pegawai DESC
							");
							while ($data=mysql_fetch_array($query)) {
						?>
						<tr>
							<td><center><?php echo $nomer ?></center></td>
							<td><?php echo $data['nip']; ?></td>
							<td><?php echo $data['fullname']; ?></td>
							<td><?php echo $data['name_jabatan'].' - '.$data['name_divisi']; ?></td>
							<td><?php echo $data['telphone']; ?></td>
							<td>
								<center>
									<!--<a href="?edit-user= echo $data['id_pegawai']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span>Edit</a>-->
									<a href="?delete-user=<?php echo $data['id_pegawai']; ?>&ref=employee" class="btn btn-danger" onclick="return confirm('are you sure to delete it?')"><span class="fa fa-trash-o"></span>Delete</a>
								</center>
							</td>
						</tr>
						<?php
							$nomer++;
						}
						?>
					</tbody>
				</table>
				<a href="?users=create-user&ref=employee" class="btn btn-primary"><span class="fa fa-plus"></span> Create New User</a>
			</div>
		</div>
	</div>
</div>