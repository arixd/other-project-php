<div class="row">
<!-- isi -->
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Form New Position</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">Department</label>
						<div class="col-md-4">
							<select class="form-control" name="department_id" required>
								<?php 
									$department = mysql_query("SELECT * FROM tabel_jabatan");
									while ($data=mysql_fetch_array($department)) {
								?>
								<option value="<?php echo $data['id_jabatan']; ?>"><?php echo $data['name_jabatan']; ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Position Name</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="name_divisi" placeholder="Enter Position Name" required>
						</div>
					</div><hr/>
					<div class="form-group">
						<div class="col-md-2"></div>
						<div class="col-md-4 btn-group">
							<button type="submit" class="btn btn-primary" name="create-position" style="margin-right:5px;"><span class="fa fa-plus"></span> Create</button>
							<button type="reset" class="btn btn-default" style="margin-right:5px;"><span class="fa fa-eraser"></span> Cancel</button>
							<a href="?data=position" class="btn btn-info" style="margin-right:5px;"><span class="fa fa-reply"></span> Back</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>