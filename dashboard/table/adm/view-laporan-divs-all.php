<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			
			<div class="grid-body">


			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title"> Divisi Reporting TR.O</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					
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
															
									
								<tr><td>Total<td><?php echo $data['tr_tukarjaga'];?>
								             <td><?php echo $data['tr_tukaroff']; ?>
								             <td><?php echo $data['tr_ijinpribadi']; ?>
								             <td><?php echo $data['tr_sisacuti']; ?>
							
						</tbody>
					</table>
				</form>




			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title"> Divisi Reporting Chief GA</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>

				<form role="form" class="form-horizontal"  enctype="multipart/data-form" method="post">
					
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
				SELECT v.*,
					(v.Messanger_tukarjaga+v.OfficeBoy_tukarjaga+v.GenAdmin_tukarjaga+v.CleaningService_tukarjaga+v.SECURITY_tukarjaga+v.parkir_tukaroff) AS ga_tukarjaga,
					(v.Messanger_tukaroff+v.OfficeBoy_tukaroff+v.GenAdmin_tukaroff+v.CleaningService_tukaroff+v.SECURITY_tukaroff+v.parkir_tukaroff) AS ga_tukaroff,
					(v.Messanger_ijinpribadi+v.OfficeBoy_ijinpribadi+v.GenAdmin_ijinpribadi+v.CleaningService_ijinpribadi+v.SECURITY_ijinpribadi+v.parkir_ijinpribadi) AS ga_ijinpribadi,
					(v.Messanger_sisacuti+v.OfficeBoy_sisacuti+v.GenAdmin_sisacuti+v.CleaningService_sisacuti+v.SECURITY_sisacuti+v.parkir_sisacuti) AS ga_sisacuti
					FROM 
					(SELECT (
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
				) v


								");
								$data = mysql_fetch_array($query);	
							?>

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
															
								<tr><td>Total<td><?php echo $data['ga_tukarjaga']; ?>
								             <td><?php echo $data['ga_tukaroff']; ?>
								             <td><?php echo $data['ga_ijinpribadi']; ?>
								             <td><?php echo $data['ga_sisacuti']; ?>
								
								
							
						</tbody>
					</table>
				</form>

				<!-- chief finance -->

			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title"> Divisi Reporting Chief Finance</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					
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
											SELECT v.*,
											(v.Kasir_tukarjaga+v.Collection_tukarjaga+v.AR_tukarjaga) AS total_tukarjaga_chiffinance,
											(v.Kasir_tukaroff+v.Collection_tukaroff+v.AR_tukaroff) AS total_tukaroff_chiffinance,
											(v.Kasir_ijinpribadi+v.Collection_ijinpribadi+v.AR_ijinpribadi) AS total_ijinprib_chiffinance,
											(v.Kasir_sisacuti+v.Collection_sisacuti+v.AR_sisacuti) AS total_ar_chiffinance
											FROM(
												SELECT (
													SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='Kasir'
												) AS Kasir_tukarjaga,
												(
													SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='Collection'
												) AS Collection_tukarjaga
												,
												(
													SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='A.R'
												) AS AR_tukarjaga,
												#--------------- Tukar Off ---------------------------------------
												(
													SELECT COUNT(*) FROM `tabel_tukar_off` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='Kasir'
												) AS Kasir_tukaroff,
												(
													SELECT COUNT(*) FROM `tabel_tukar_off` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='Collection'
												) AS Collection_tukaroff
												,
												(
													SELECT COUNT(*) FROM `tabel_tukar_off` tj  
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='A.R'
												) AS AR_tukaroff
												,
												#---------------  Ijin Pribadi --------------------------
												(
													SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='Kasir'
												) AS Kasir_ijinpribadi,
												(
													SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='Collection'
												) AS Collection_ijinpribadi
												,
												(
													SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj  
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='A.R'
												) AS AR_ijinpribadi
												,
												#--------------- Sisa Cuti --------------------------
												(
													SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='Kasir'
												) AS Kasir_sisacuti,
												(
													SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj 
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='Collection'
												) AS Collection_sisacuti
												,
												(
													SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj  
													JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
													JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
													WHERE `approve_status`='Approve' AND td.name_divisi='A.R'
												) AS AR_sisacuti
												FROM DUAL
										) v

								");
								$data = mysql_fetch_array($query);	
							?>
								
					
								<tr>									
		                           <td><b>Kasir</b><td><?php echo $data['Kasir_tukarjaga']; ?></td>
						                           <td><?php echo $data['Kasir_tukaroff']; ?></td>
						                           <td><?php echo $data['Kasir_ijinpribadi']; ?></td>
						                           <td><?php echo $data['Kasir_sisacuti']; ?></td>
								<tr><td><b>Collection</b><td><?php echo $data['Collection_tukarjaga'];?>
											             <td><?php echo $data['Collection_tukaroff']; ?>
											             <td><?php echo $data['Collection_ijinpribadi']; ?>
											             <td><?php echo $data['Collection_sisacuti']; ?>
						        <tr><td><b>A.R</b><td><?php echo $data['AR_tukarjaga'];?>
										             <td><?php echo $data['AR_tukaroff'];?>
										             <td><?php echo $data['AR_ijinpribadi'];?>
										             <td><?php echo $data['AR_sisacuti'];?>
							    <tr><td>Total<td><?php echo $data['total_tukarjaga_chiffinance'];?>
							    			 <td><?php echo $data['total_tukaroff_chiffinance'];?>
							    			 <td><?php echo $data['total_ijinprib_chiffinance'];?>
							    			 <td><?php echo $data['total_ar_chiffinance'];?>
						</tbody>
					</table>
				</form>

				<!-- Chief Enginering -->

				<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title"> Divisi Reporting Chief Engine</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					
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
												WHERE `approve_status`='Approve' AND td.name_divisi='Engineering'
											) AS Engineering_tukarjaga,
											#--------------- Tukar Off ---------------------------------------
											(
												SELECT COUNT(*) FROM `tabel_tukar_off` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Engineering'
											) AS Engineering_tukaroff,
											#--------------- Tukar Ijin Pribadi --------------------------
											(
												SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Engineering'
											) AS Engineering_ijinpribadi,
											#--------------- Sisa Cuti --------------------------
											(
												SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj 
												JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
												JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
												WHERE `approve_status`='Approve' AND td.name_divisi='Engineering'
											) AS Engineering_sisacuti
											FROM DUAL


								");
								$data = mysql_fetch_array($query);	
							?>
								
								<tr>
									<td style='background:#eee; font-weight: bold;'><?php echo"Enginering"?></td>
									                           <td><?php echo $data['Engineering_tukarjaga']; ?></td>
									                           <td><?php echo $data['Engineering_tukaroff']; ?></td>
									                            <td><?php echo $data['Engineering_ijinpribadi']; ?></td>
									                             <td><?php echo $data['Engineering_sisacuti']; ?></td>
						<tr>
									<td style='background:#eee; font-weight: bold;'><?php echo"Total"?></td>
									                           <td><?php echo $data['Engineering_tukarjaga']; ?></td>
									                           <td><?php echo $data['Engineering_tukaroff']; ?></td>
									                            <td><?php echo $data['Engineering_ijinpribadi']; ?></td>
									                             <td><?php echo $data['Engineering_sisacuti']; ?></td>
						</tbody>
					</table>
				</form>

				<!-- end chief engine -->


				<!-- cHIEF tr -->


				<!-- Chief Enginering -->

				<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title"> Divisi Reporting Chief Engine</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					
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
								
								<tr>
									<td style='background:#eee; font-weight: bold;'><?php echo"Tenant Relation Office"?></td>
									                           <td><?php echo $data['tr_tukarjaga']; ?></td>
									                           <td><?php echo $data['tr_tukaroff']; ?></td>
									                            <td><?php echo $data['tr_ijinpribadi']; ?></td>
									                             <td><?php echo $data['tr_sisacuti']; ?></td>
						<tr>
									<td style='background:#eee; font-weight: bold;'><?php echo"Total"?></td>
									                           <td><?php echo $data['tr_tukarjaga']; ?></td>
									                           <td><?php echo $data['tr_tukaroff']; ?></td>
									                            <td><?php echo $data['tr_ijinpribadi']; ?></td>
									                             <td><?php echo $data['tr_sisacuti']; ?></td>
						</tbody>
					</table>
				</form>
				<div class="col-lg-4 col-md-4 col-sm-4" style="left:400px;">
						<div class="grid widget bg-white">
							
						

							<a href="http://localhost/valey/dashboard/table/adm/grafik-div-all.html" target="_blank"">
								<div class="grid-body">
									<span class="value btn btn-danger">View Grafik All Divisi</span>
								</div>
							</a>
						</div>
					</div>
		</div>