<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Divisi Chief TR</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					<!-- <table class="table table-hover display" id="dataTables1" cellspacing="0" width="100%"> -->
					<table class="table table-hover display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>NAMA DIVISI</th>
								<th>TUKAR JAGA</th>
								<th>TUKAR OFF</th>
								<th>IZIN PRIBADI</th>
								<th>PERMOHONAN CUTI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							    $nip=$_SESSION['user_id'];
								$nomer = 1;
								$query = mysql_query("						
											SELECT (
												SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Tenant Relation Office'
											) AS tr_tukarjaga,
											#--------------- Tukar Off ---------------------------------------
											(
												SELECT COUNT(*) FROM `tabel_tukar_off` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Tenant Relation Office'
											) AS tr_tukaroff,
											#--------------- Tukar Ijin Pribadi --------------------------
											(
												SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Tenant Relation Office'
											) AS tr_ijinpribadi,
											#--------------- Sisa Cuti --------------------------
											(
												SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Tenant Relation Office'
											) AS tr_sisacuti
											FROM DUAL

								");
								$data = mysql_fetch_array($query);	
							?>
							<div class="form-group">
								
					</div>
								<tr>
									<td style='background:#eee; font-weight: bold;'><?php echo"Tenant Relation Office"?></td>
									                           <td><?php echo $data['tr_tukarjaga']; ?></td>
									                           <td><?php echo $data['tr_tukaroff']; ?></td>
									                            <td><?php echo $data['tr_ijinpribadi']; ?></td>
									                             <td><?php echo $data['tr_sisacuti']; ?></td>
															
									
								
							
						</tbody>
					</table>
				</form>

				</div>

				<div class="col-lg-2 col-md-4 col-sm-2" style="left:400px;">
						<div class="grid widget bg-white">
							
						

							<a href="http://localhost/valey/dashboard/table/adm/grafik-div-tro.html" target="_blank"">
								<div class="grid-body">
									<span class="value btn btn-danger">View Grafik</span>
								</div>
							</a>
						</div>
					</div>
		</div>
	</div>
</div>