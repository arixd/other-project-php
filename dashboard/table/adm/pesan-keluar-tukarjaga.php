<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Keluar</span>
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
								<th>nip</th>
								<th>nama</th>
								<th>tanggal</th>
								<th>Shif Mengajukan</th>
								<th>Shif Mengantikan</th>
								<th>Alasan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$nip=$_SESSION['user_id'];
								$nomer = 1;
								$query = mysql_query("
									SELECT 
										id_tukar_jaga,
										nip_mengganti AS NIK,
										tp.`fullname` AS NamaTujuan,
										nip_meminta,
										(SELECT  nama_shift FROM `tabel_shift` WHERE `id_shift`=id_shift_mengajukan) AS Mengajukan,
										(SELECT  nama_shift FROM `tabel_shift` WHERE `id_shift`=id_shift_menggantikan) AS Menggantikan,
										tanggal tanggal_dibuat,
										waktu_menggajukan waktu,
										waktu_menggantikan,
										alasan,
										status,
										approve_status,
										approve_date
										FROM tabel_tukar_jaga tj
										JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
										where nip_meminta='$nip'
										ORDER BY id_tukar_jaga DESC

									
							
								");
								$total_tukar_jaga=0;
								while ($data = mysql_fetch_array($query)) {	
							?>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['NIK']?></td>
									<td><?php echo $data['NamaTujuan']?></td>
									<td><?php echo $data['waktu']?></td>
									<td><?php echo $data['Mengajukan']?></td>
									<td><?php echo $data['Menggantikan']?></td>
									<td><?php echo $data['alasan']?></td>
									<td><?php 


									if ($data['status'] == '0') {

											if($data['approve_status']==='Waiting Approval'){
												echo "<span class='btn btn-primary'> <b>".$data['approve_status']."</b></span>";
											}elseif($data['approve_status']==='Waiting'){
												echo "<span class='btn btn-danger'> <b>".$data['approve_status']."</b></span>";
											}elseif($data['approve_status']==='Approve'){
												echo "<span class='btn btn-primary'> <b>".$data['approve_status']."</b></span>";
												$total_tukar_jaga++;
											}elseif($data['approve_status']==='Reject'){
												echo "<span class='btn btn-danger'> <b>".$data['approve_status']."</b></span>";
											}
											
										}else{
											echo '<span class="btn btn-danger"><b>Close</b></span>';
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
					<div class="col-lg-2 col-md-4 col-sm-2" style="left:400px;">
						<div class="grid widget bg-white">
							<a href="?users=employee">
								<div class="grid-body">
									
									<span class="value btn btn-danger"><?php echo $total_tukar_jaga; ?></span>
								</div>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>