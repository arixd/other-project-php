<?php 
    //var_dump ($_SESSION['access']); //          
 if ($_SESSION['access'] == 'admin'){
	echo "Administrator [ON]";
}
elseif ($_SESSION['access'] == 'karyawan'){ 

$nip=$_SESSION['user_id'];
	?>


<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Ijin Pribadi</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
				
					<?php 	 
	                  $query = mysql_query("
	                  			SELECT
								t1.nip,
	                  			t1.fullname,
								t2.name_jabatan,
								t3.name_divisi,
								t3.id_divisi
								FROM tabel_pegawai as t1
								INNER JOIN tabel_jabatan as t2 ON t1.id_jabatan=t2.id_jabatan
								INNER JOIN tabel_divisi as t3 ON t1.id_divisi=t3.id_divisi
								WHERE access='karyawan' 
								and t1.nip='$nip'");   
	                  $mydata  = mysql_fetch_array($query);

	                ?>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nip</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="nip_meminta" value="<?php echo $mydata['nip']; ?>">
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="name" value="<?php echo $mydata['fullname']; ?>">
						</div>
					</div>
					<input type="hidden" class="form-control" name="user_request_id" value="<?php echo $user_id; ?>">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Divisi</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="divisi" value="<?php echo $mydata['name_divisi']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Jabatan</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" value="<?php echo $mydata['name_jabatan']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal</label>
						<div class="col-md-3">
							<div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
								<input type="text" class="form-control" name="date" placeholder = "Enter Date" required>
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
							</div>
						</div>
					


					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">In /Out  </label>
						
							<div class="col-md-1">

								<input type="text" class="form-control" name="absen" placeholder = "In " maxlength="5" required>
								
							</div>
							<label class="col-sm-1 control-label"> /  </label>
							<div class="col-md-1">

								<input type="text" class="form-control" name="time_out" placeholder = "Out " maxlength="5" required>
							</div>
						

					</div>



					
					
					<div class = "form-group">
					<label class="col-sm-2 control-label">Keterangan</label>

							<div class="col-md-4">
								<input type="radio" name="keterangan" value="Datang Terlambat"/>&nbsp; Datang Terlambat &nbsp;&nbsp;
   								 <br/>
   								 <input type="radio" name="keterangan" value="Tidak Masuk"/>&nbsp;Tidak Masuk &nbsp;&nbsp;
   								 <br/>
   								 <input type="radio" name="keterangan" value="Pulang Lebih Awal"/>&nbsp;Pulang Lebih Awal
   								 <br/>
						</div>
					</div>

					<div class = "form-group">
					<label class="col-sm-2 control-label">Alasan</label>

							<div class="col-md-4">
								<textarea class="form-control" name="reason"></textarea>
						</div>
					</div>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td>
					
					
						
							<button type="submit" class="btn btn-primary" name="create-permit"><span class="fa fa-plus"></span> Submit</button>
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


