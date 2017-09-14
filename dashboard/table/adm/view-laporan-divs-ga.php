<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Divisi GA</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					<table class="table table-hover display" id="dataTables1"  cellspacing="0" width="100%">
					<!-- <table class="table table-hover display" id="dataTables1"  cellspacing="0" width="100%"> -->
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
												WHERE `approve_status`='Approve' AND td.name_divisi='Messanger'
											) AS Messanger_tukarjaga,
											(
												SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Office Boy'
											) AS OfficeBoy_tukarjaga
											,
											(
												SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Gen.Admin'
											) AS GenAdmin_tukarjaga
											,
											(
												SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Cleaning Service'
											) AS CleaningService_tukarjaga
											,
											(
												SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Scurity'
											) AS SECURITY_tukarjaga
											,
											(
												SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Parkir'
											) AS parkir_tukarjaga,
											#--------------- Tukar Off ---------------------------------------
											(
												SELECT COUNT(*) FROM `tabel_tukar_off` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Messanger'
											) AS Messanger_tukaroff,
											(
												SELECT COUNT(*) FROM `tabel_tukar_off` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Office Boy'
											) AS OfficeBoy_tukaroff
											,
											(
												SELECT COUNT(*) FROM `tabel_tukar_off` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Gen.Admin'
											) AS GenAdmin_tukaroff
											,
											(
												SELECT COUNT(*) FROM `tabel_tukar_off` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Cleaning Service'
											) AS CleaningService_tukaroff
											,
											(
												SELECT COUNT(*) FROM `tabel_tukar_off` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Scurity'
											) AS SECURITY_tukaroff
											,
											(
												SELECT COUNT(*) FROM `tabel_tukar_off` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Parkir'
											) AS parkir_tukaroff
											,
											#--------------- Tukar Ijin Pribadi --------------------------
											(
												SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Messanger'
											) AS Messanger_ijinpribadi,
											(
												SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Office Boy'
											) AS OfficeBoy_ijinpribadi
											,
											(
												SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Gen.Admin'
											) AS GenAdmin_ijinpribadi
											,
											(
												SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Cleaning Service'
											) AS CleaningService_ijinpribadi
											,
											(
												SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Scurity'
											) AS SECURITY_ijinpribadi
											,
											(
												SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Parkir'
											) AS parkir_ijinpribadi
											,
											#--------------- Sisa Cuti --------------------------
											(
												SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Messanger'
											) AS Messanger_sisacuti,
											(
												SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Office Boy'
											) AS OfficeBoy_sisacuti
											,
											(
												SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Gen.Admin'
											) AS GenAdmin_sisacuti
											,
											(
												SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Cleaning Service'
											) AS CleaningService_sisacuti
											,
											(
												SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Scurity'
											) AS SECURITY_sisacuti
											,
											(
												SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj  
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Parkir'
											) AS parkir_sisacuti
											FROM DUAL

								");
								$data = mysql_fetch_array($query);	
							?>
							<div class="form-group">
								
					</div>
								<tr>
									<td style='background:#eee; font-weight: bold;'><?php echo"Messanger"?></td>
									                           <td><?php echo $data['Messanger_tukarjaga']; ?></td>
									                           <td><?php echo $data['Messanger_tukaroff']; ?></td>
									                            <td><?php echo $data['Messanger_ijinpribadi']; ?></td>
									                             <td><?php echo $data['Messanger_sisacuti']; ?></td>
															
									
									
								<tr>
									<td style='font-weight: bold;'><?php echo"Office Boy"?></td>
									                           <td><?php echo $data['OfficeBoy_tukarjaga']; ?></td>
															   <td><?php echo $data['OfficeBoy_tukaroff']; ?></td>
															   <td><?php echo $data['OfficeBoy_ijinpribadi']; ?></td>
															   <td><?php echo $data['OfficeBoy_sisacuti']; ?></td>

								<tr>
									<td style='background:#eee; font-weight: bold;'><?php echo"Gen Admin"?></td>
									                           <td><?php echo $data['GenAdmin_tukarjaga']; ?></td>
									                           <td><?php echo $data['GenAdmin_tukaroff']; ?></td>
									                           <td><?php echo $data['GenAdmin_ijinpribadi']; ?></td>
									                           <td><?php echo $data['GenAdmin_sisacuti']; ?></td>

								<tr>
									<td style='font-weight: bold;'><?php echo"Cleaning Service"?></td>
																	<td><?php echo $data['CleaningService_tukarjaga']; ?></td>
																	<td><?php echo $data['CleaningService_tukaroff']; ?></td>
																	<td><?php echo $data['CleaningService_ijinpribadi']; ?></td>
																	<td><?php echo $data['CleaningService_sisacuti']; ?></td>
								<tr>
									<td style='background:#eee; font-weight: bold;'><?php echo"Security"?> </td>
																<td><?php echo $data['SECURITY_tukarjaga']; ?></td>
																<td><?php echo $data['SECURITY_tukaroff']; ?></td>
																<td><?php echo $data['SECURITY_ijinpribadi']; ?></td>
																<td><?php echo $data['SECURITY_sisacuti']; ?></td>
								<tr>
									<td style='font-weight: bold;'><?php echo"Parkir"?></td>
																<td><?php echo $data['parkir_tukarjaga']; ?></td>
																<td><?php echo $data['parkir_tukaroff']; ?></td>
																<td><?php echo $data['parkir_ijinpribadi']; ?></td>
																<td><?php echo $data['parkir_sisacuti']; ?></td>
									
								</tr>
							
						</tbody>
					</table>
				</form>

				

			</div>

				<div class="col-lg-2 col-md-4 col-sm-2" style="left:400px;">
						<div class="grid widget bg-white">
							
						

							<a href="http://localhost/valey/dashboard/table/adm/grafik-div-ga.html" target="_blank"">
								<div class="grid-body">
									<span class="value btn btn-danger">View Grafik</span>
								</div>
							</a>
						</div>
					</div>
		</div>
	</div>
</div>