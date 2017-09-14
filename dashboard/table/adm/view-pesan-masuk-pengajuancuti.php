

<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Masuk Cuti</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
			<!-- <div style='overflow:auto;white-space:nowrap;'> -->
				<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					<table class="table table-hover display" id="dataTables1" cellspacing="0" >
						<thead>
							
							<tr>
								<th>NO</th>
								<th>NIP </th>
								<th>NAMA PENGIRIM</th>
								<th>DIVISI</th>
								<th>RENCANA</th>
								<th>KEMBALI</th>
								<th>JUMLAH PENGAJUAN</th>
								<th>SISA CUTI</th>
								<th>KEPERLUAN</th>
								<th>STATUS</th>
								<th>PERSETUJUAN</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nip=$_SESSION['user_id'];
								$nomer = 1;
								$query = mysql_query("
										SELECT 
										`id_cuti` ,
										tj.`id_pegawai`,
										(SELECT `name_divisi` FROM `tabel_divisi` WHERE `id_divisi`=tp.`id_divisi`) AS divisi,
										tp.fullname AS nama,
										`id_shift` ,
										`approve_status` ,
										`keperluan` ,
										tj.`jumlah_cuti`,
										`rencana` ,
										`kembali`,
										alamat_waktu_cuti,
										sisa_cuti
										FROM `tabel_permohonan_cuti` tj 
										JOIN tabel_pegawai tp  ON tj.id_pegawai=tp.nip
										LEFT JOIN `tabel_jumlahcuti` jc ON tj.`id_pegawai`=jc.nip
										WHERE approve_status='Waiting Approval'
										ORDER BY  `id_cuti` ASC  
							
								");
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['id_pegawai'];?></td>
									<td><?php echo $data['nama'];?></td>
									<td><?php echo $data['divisi']?></td>
									<td><?php echo $data['rencana']?></td>
									<td><?php echo $data['kembali']?></td>
									
									<td><?php echo $data['jumlah_cuti']?></td>
									<td><?php echo"<b class='btn btn-danger' style='border-radius:10px;'>".$data['sisa_cuti']." x </b>";?>
									   </td>
									<td><?php echo $data['keperluan']?></td>
									<td><?php echo "<span class='btn btn-primary'> <b>".$data['approve_status']."</b></span>";?>
									</td>
									<td width="250px">
										
										<?php

										$reschedule_id=$data['id_cuti'];
										$jumlahcuti=$data['jumlah_cuti'];
										$jumlahsisa=$data['sisa_cuti'];

										$total_reject=$jumlahcuti+$jumlahsisa;

										$nip=$data['id_pegawai'];
										echo '
											<a href="?reschedule_cuti='.$reschedule_id.'&changestat=Approve" class="btn btn-success" onclick="return confirm(\'Are you sure to Approve it?\')"><span class="fa fa-check"></span>Approve</a>

											<a href="?reschedule_cuti='.$reschedule_id.'&changestat=Reject&back_reject='.$total_reject.'&nip='.$nip.' 
											"class="btn btn-danger" onclick="return confirm(\'Are you sure to reject it?\')"><span class="fa fa-times"></span>Reject</a>
											';
										?>
									</td>
								
								</tr>
							<?php
								$nomer++;
								}
							?>
						</tbody>
					</table>
					
				</form>
				<!-- </div> -->
			</div>
		</div>
	</div>
</div>