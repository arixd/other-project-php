<div class="row">
<!-- isi -->
	<div class="col-md-12">
		<?php
		$ref = $_GET['ref'];
		?>
		<div class="grid no-border">
			<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
				<div class="grid-header">
					<i class="fa fa-table"></i>
					<span class="grid-title">Form New User</span>
					<div class="pull-right grid-tools">
						<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
						<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
						<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="grid-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">NIP</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="nip" placeholder="Enter Employee ID" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Karyawan</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="fullname" placeholder="Enter Fullname" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="username" placeholder="Enter Username" required>
						</div>						
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-md-4">
							<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Divisi</label>
						<div class="col-md-4">
							<select class="form-control" name="id_divisi" required>
								<?php 
									$position = mysql_query("SELECT * FROM `tabel_divisi`");
									while ($data=mysql_fetch_array($position)) {
								?>
								<option value="<?php echo $data['0']; ?>"><?php echo $data['1']; ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>	

					<div class="form-group">
						<label class="col-sm-2 control-label">Jabatan</label>
						<div class="col-md-4">
							<select class="form-control" name="id_jabatan" required>
								<?php 
									$position = mysql_query("SELECT * FROM `tabel_jabatan`");
									while ($data=mysql_fetch_array($position)) {
								?>
								<option value="<?php echo $data['0']; ?>"><?php echo $data['1']; ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-2 control-label">Address</label>
						<div class="col-md-4">
							<textarea class="form-control" name="address" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Telphone</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="telphone" placeholder="Enter Telphone" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Gender</label>
						<div class="col-md-4">
							<select class="form-control" name="gender" required>
								<option>Male</option>
								<option>Pemale</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Access</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="access" placeholder="Enter Access" required>
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-2 control-label">Choose Photo</label>
						<div class="col-md-4">
							<input type="file" name="photo" required>
						</div>
					</div>  -->
					<hr/>
					<div class="form-group">
						<div class="col-md-2"></div>
						<div class="col-md-4 btn-group">
							<button type="submit" class="btn btn-primary" name="create-user" style="margin-right:5px;"><span class="fa fa-plus"></span> Create</button>
							<button type="reset" class="btn btn-default" style="margin-right:5px;"><span class="fa fa-eraser"></span> Cancel</button>
							<a href="?users=<?php echo $ref;?>" class="btn btn-info" style="margin-right:5px;"><span class="fa fa-reply"></span> Back</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>