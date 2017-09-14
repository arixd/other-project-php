<div class="row">
<!-- isi -->
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Edit - Department</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">Department Name</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="name_divisi" value="<?php echo $row['name_divisi'] ?>" required>
						</div>
					</div><hr/>
					<div class="form-group">
						<div class="col-md-2"></div>
						<div class="col-md-4 btn-group">
							<button type="submit" class="btn btn-primary" name="update-department" style="margin-right:5px;"><span class="fa fa-plus"></span> Update</button>
							<button type="reset" class="btn btn-default" style="margin-right:5px;"><span class="fa fa-eraser"></span> Cancel</button>
							<a href="?data=department" class="btn btn-info" style="margin-right:5px;"><span class="fa fa-reply"></span> Back</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>