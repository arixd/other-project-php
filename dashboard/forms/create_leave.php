<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Leave Request Form</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
					<?php 

					$nip=$_SESSION['user_id'];
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
								WHERE  t1.nip='$nip'
	                  	");   
	                  $mydata  = mysql_fetch_array($query);
	                ?>
					
	                <div class="form-group">
						<label class="col-sm-2 control-label">NIK</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="nik" value="<?php echo $mydata['nip']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="name" value="<?php echo $mydata['fullname']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Jabatan</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="name" value="<?php echo $mydata['name_jabatan']; ?>">
						</div>
					</div>


					<input type="hidden" class="form-control" name="user_id" value="<?php echo $nip; ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label">Department / Divisi </label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" value="<?php echo $mydata['name_divisi']; ?>">
						</div>
					
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Rencana Cuti / Tgl </label>
						<div class="col-md-2">
							<div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
								<input type="text" class="form-control" id="date_from" name="date_from" placeholder = "Enter Tanggal Cuti" required>
								<span class="input-group-addon"><i class="fa fa-th"></i></span>
							</div>
						</div>
						<label class="col-sm-2 control-label">Jumlah (Days)</label>
						<div class="col-md-1">
							<input type="number" id="length" name="length" oninput="myFunction(this.value)" class="form-control" required>
						</div>
						<label class="col-sm-2 control-label">Tanggal Kembali</label>
						<div class="col-md-2">
							<input type="text" readonly="readonly" id="date_backtowork" name="date_backtowork" class="form-control" required>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat waktu cuti</label>
						<div class="col-md-4">
							<textarea class="form-control" name="address_while_leave"></textarea>
						</div>
						<label class="col-sm-2 control-label">Keperluan Cuti</label>
						<div class="col-md-4">
								 <input type="radio" name="keperluan" value="Tahunan"/>&nbsp;Tahunan &nbsp;&nbsp;
   								 <br/>
   								 <input type="radio" name="keperluan" value="Hamil"/>&nbsp;Hamil&nbsp;&nbsp;
   								 <br/>
   								 <input type="radio" name="keperluan" value="Keperluan Keluarga"/>&nbsp;Keperluan Keluarga							 
						</div>
					</div>
					


					
					<hr/>
					<div class="form-group">
						<div class="col-md-4"></div>
						<div class="col-md-4 btn-group">
							<button type="submit" class="btn btn-primary" name="create-leave" style="margin-right:5px;"><span class="fa fa-plus"></span> Submit</button>
							<button type="reset" class="btn btn-default" style="margin-right:5px;"><span class="fa fa-eraser"></span> Cancel</button>
						</div>
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