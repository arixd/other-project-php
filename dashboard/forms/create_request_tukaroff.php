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
				<span class="grid-title">Isi Penukaran Off</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<h4 class="col-sm-11 control-label" style = "left : 10px;  border-left:10px solid rgb(0, 123, 233);">Karyawan Yang mengajukan </h4>
							
					</div>
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
						<label class="col-sm-2 control-label">Tanggal Mengajukan</label>
						<div class="col-md-4">
							<div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
								<input type="text" class="form-control" name="waktu_menggajukan" placeholder = "Tanggal Mengajukan">
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
							</div>
						</div>
					</div>

					
		<!--GROP KARYAWAN PENGGANTI-->

			<?php
				if(isset($_POST['nip_menganti'])){

					if($_SESSION['user_id']==$_POST['nip_menganti']){
						echo "<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>Error Found !</strong> Silahkan masukan nip karyawan pengganti / Nip karyawan selain user sendiri
						</div>";
					}else{
						$nip=$_POST['nip_menganti'];
				        $data=mysql_query("SELECT
									t1.nip,
		                  			t1.fullname,
									t2.name_jabatan,
									t3.name_divisi,
									t3.id_divisi
									FROM tabel_pegawai AS t1
									INNER JOIN tabel_jabatan AS t2 ON t1.id_jabatan=t2.id_jabatan
									INNER JOIN tabel_divisi AS t3 ON t1.id_divisi=t3.id_divisi
									WHERE access='karyawan' 
									AND t1.nip='$nip'");

				        $data_pengganti=mysql_fetch_array($data);
				        if($data_pengganti['nip']==""){

					        echo "<div class='alert alert-danger alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<strong>Not Found Data !</strong> Data yang dicari tidak ditemukan.
							</div>";
				        }
					}

				}
			?>
				<div class="form-group">
					<h4 class="col-sm-11 control-label" style = "left : 10px;  border-left:10px solid red; height:30px;">
						<span style='margin-top:10px;'>Karyawan Yang Menggantikan  Tukar Off</span></h4>
				</div>

			 
			  	  	<div class="form-group">
						<label class="col-sm-2 control-label"> Nip </label>
						<div class="col-md-3">
							<input type="text"  class="form-control" name="nip_menganti" value="<?php if(isset($data_pengganti['nip'])) echo"".$data_pengganti['nip']; ?>">
						</div>
						<div class="col-md-1">
							<input type="submit" class="btn btn-danger" value="Cari ">
						</div>
					</div>
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-md-4">
							<input type="hidden"  name="nip_pengganti"  value="<?php if(isset($data_pengganti['nip'])) echo"".$data_pengganti['nip']; ?>">
							<input type="text" readonly="readonly" class="form-control" name="name_pengganti"  value="<?php if(isset($data_pengganti['fullname'])) echo"".$data_pengganti['fullname']; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Divisi</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="divisi_pengganti" value="<?php if(isset($data_pengganti['name_divisi'])) echo"".$data_pengganti['name_divisi']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Menggantikan</label>
						<div class="col-md-4">
							<div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
								<input type="text" class="form-control" name="waktu_menggantikan" placeholder = "Tanggal Menggantikan">
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
							</div>
						</div>
					</div>


					
					
					<div class = "form-group">
					<label class="col-sm-2 control-label">Keperluan</label>

							<div class="col-md-4">
								<input type="radio" name="alasan" value="Sakit"/>&nbsp;Sakit &nbsp;&nbsp;
   								 <br/>
   								 <input type="radio" name="alasan" value="Keluarga sakit"/>&nbsp;Keluarga Sakit&nbsp;&nbsp;
   								 <br/>
   								 <input type="radio" name="alasan" value="Keperluan mendesak"/>&nbsp;Keperluan mendesak
   								 <br/>
						</div>
					</div>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td>
					
					
						
							<button type="submit" class="btn btn-primary" name="create-request-tkoff-karyawan"><span class="fa fa-plus"></span> Submit</button>
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


