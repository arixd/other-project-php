<?php 
    //var_dump ($_SESSION['access']); //          
 if ($_SESSION['access'] == 'admin'){

$nip=$_SESSION['user_id'];
	?>


<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Upload Jadwal</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Jadwal</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="nama_jadwal"">
						</div>

					</div>
			
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal</label>
						<div class="col-md-3">
							<div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
								<input type="text" class="form-control" name="tanggal" placeholder = "Enter Date" required>
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
							</div>
						</div>
					</div>


					
					
					<div class = "form-group">
					<label class="col-sm-2 control-label">Upload Image</label>
						<div class="col-md-3">
							 <input type=file name='photo' size='20' class='' style=''>
						</div>
							
					</div>


			
					

					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td>
					
					
						
							<button type="submit" class="btn btn-primary" name="create-upload-jadwal"><span class="fa fa-plus"></span> Submit</button>
							<button type="reset" class="btn btn-default"><span class="fa fa-eraser"></span> Cancel</button>
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php }
elseif ($_SESSION['access'] == 'Building Manager'){
	echo "Building Manager [ON]";
}
elseif ($_SESSION['access'] == 'Chief GA'){ ?>
	

<?php }
elseif ($_SESSION['access'] == 'Chief Eng'){ ?>
<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Ini Chief Eng</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
			</div>
		</div>
	</div>
</div>
<?php
}
?>


