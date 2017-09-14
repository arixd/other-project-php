<?php 

$nip=$_SESSION['user_id'];
	?>


<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Surat Perintah Dinas Luar</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
			
			
				<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
					

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
							<input type="hidden"  name="nip"  value="<?php if(isset($data_pengganti['nip'])) echo"".$data_pengganti['nip']; ?>">
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
						<label class="col-sm-2 control-label">Tgl Berangkat </label>
						<div class="col-md-2">
							<div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
								<input type="text" class="form-control" id="date_from" name="date_from" placeholder = "Enter Tanggal Cuti" >
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
							</div>
						</div>
						

						
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Lama Dinas</label>
						<div class="col-md-1">
							<input type="number" id="length" name="length" oninput="myFunction(this.value)" class="form-control" >
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Kembali</label>
						<div class="col-md-2">
							<input type="text" readonly="readonly" id="date_backtowork" name="date_backtowork" class="form-control" >
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Tujuan / Instansi</label>
						<div class="col-md-4">
							<input type="text"  name="tujuan" class="form-control" >
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-md-4">
							<input type="text"  id="date_backtowork" name="alamat" class="form-control" >
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-2 control-label">Keperluan</label>
						<div class="col-md-4">
							<input type="text"  id="date_backtowork" name="keperluan" class="form-control" >
						</div>
					</div>



					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>&nbsp;</td>
					
					
						
							<button type="submit" class="btn btn-primary" name="create-request-isi-spdl"><span class="fa fa-plus"></span> Submit</button>
							<button type="reset" class="btn btn-default"><span class="fa fa-eraser"></span> Cancel</button>
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	(function() {
	    Date.prototype.toYMD = Date_toYMD;
	    function Date_toYMD() {
	        var year, month, day;
	        year = String(this.getFullYear());
	        month = String(this.getMonth() + 1);
	        if (month.length == 1) {
	            month = "0" + month;
	        }
	        day = String(this.getDate());
	        if (day.length == 1) {
	            day = "0" + day;
	        }
	        return year + "-" + month + "-" + day;
	    }
	})();

	function myFunction(length) {
	var startDate = $("#date_from").val();

	startDate = new Date(startDate.replace(/-/g, "/"));
	var endDate = "", count = 0;
	var noOfDaysToAdd = length;
	while(count < noOfDaysToAdd){
	    endDate = new Date(startDate.setDate(startDate.getDate() + 1));
	    if(endDate.getDay() !== 0 && endDate.getDay() != 6){
	       //Date.getDay() gives weekday starting from 0(Sunday) to 6(Saturday)
	       count++;
	    }
	}
	  $("#date_backtowork").val(endDate.toYMD());
	}
</script>
