<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Keluar Permohonan Cuti</span>
				<div class="pull-right grid-tools">
					<a data-widget="collapse" title="Collapse" data-toggle="tooltip" data-placement="top"><i class="fa fa-chevron-up"></i></a>
					<a data-widget="reload" title="Reload" data-toggle="tooltip" data-placement="top"><i class="fa fa-refresh"></i></a>
					<a data-widget="remove" title="Remove" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="grid-body">
				<form role="form" class="form-horizontal" enctype="multipart/data-form" method="post">
					<table class="table table-hover display" id="dataTables1" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>NIK</th>
								<th>NAMA</th>
								<th>RENCANA</th>
								<th>JUMLAH CUTI</th>
								<th>KEMBALI </th>
								<th>KEPERLUAN</th>
								<th>ALAMAT</th>
								<th>SISA CUTI</th>
								<th>STATUS</th>
								
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
									JOIN tabel_pegawai tp ON tj.id_pegawai=tp.nip
									LEFT JOIN `tabel_jumlahcuti` jc ON tj.`id_pegawai`=jc.nip
									WHERE tj.`id_pegawai`='$nip'
									ORDER BY  `id_cuti` ASC 
								");
							
								$approval=0;
								while ($data = mysql_fetch_array($query)) {	
							
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['id_pegawai']?></td>
									<td><?php echo $data['nama']?></td>
									<td><?php echo $data['rencana']?></td>
									<td><?php echo $data['jumlah_cuti']?> </td>
									<td><?php echo $data['kembali']?></td>
									<td><?php echo $data['keperluan']?></td>
									<td><?php echo $data['alamat_waktu_cuti']?></td>


									<td><?php echo "<b class='btn btn-danger' style='border-radius:10px;'>".$data['sisa_cuti'].' x </b>'; ?></td>
									<td>
									<?php
										if($data['approve_status']==='Waiting Approval'){
												echo "<span class='btn btn-primary'> <b>".$data['approve_status']."</b></span>";
											}elseif($data['approve_status']==='Approve'){
												$approval++;
												echo "<span class='btn btn-primary'> <b>".$data['approve_status']."</b></span>";
												
											}elseif($data['approve_status']==='Reject'){
												echo "<span class='btn btn-danger'> <b>".$data['approve_status']."</b></span>";
											}
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

					<div class="col-lg-2 col-md-4 col-sm-2" style="left:400px;">
						<div class="grid widget bg-white">
							<a href="?users=employee">
								<div class="grid-body">
									<span class="value btn btn-danger"><?php echo $approval; ?></span>
								</div>
							</a>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>