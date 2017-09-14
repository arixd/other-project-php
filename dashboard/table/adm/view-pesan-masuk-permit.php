<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			<div class="grid-header">
				<i class="fa fa-table"></i>
				<span class="grid-title">Pesan Masuk Ijin Pribadi</span>
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
								<th>nama</th>
								<th>Divisi</th>
								<th>Ijin Tanggal</th>
								<th>Ijin Pribadi </th>
								<th>Jam Masuk</th>
								<th>Jam Izin </th>
								<th>Keterangan</th>
								<th>Status</th>
								<th>Persetujuan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							    $nip=$_SESSION['user_id'];
								$nomer = 1;
								$query = mysql_query("						
									 SELECT
									        id_ijin_pribadi,
											tj.`id_pegawai` AS NIP,
											tp.fullname AS nama,
											(SELECT name_divisi FROM tabel_divisi td WHERE  td.id_divisi=tp.id_divisi) AS divisi,
											`tanggal`,
											`approve_status`,
											`keterangan`,
											absen,
											`jam` ,
											tj.`nip`,
											`alasan`
											FROM tabel_ijin_pribadi tj
											JOIN tabel_pegawai tp ON tj.id_pegawai=tp.nip
											where approve_status='Waiting Approval'
											ORDER BY  `id_ijin_pribadi` DESC 

								");
								while ($data = mysql_fetch_array($query)) {	
							?>
							<div class="form-group">
								
					</div>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['NIP']?></td>
									<td><?php echo $data['nama']?></td>
									<td><?php echo $data['divisi']?></td>
									<td><?php echo $data['tanggal']?> </td>
									<td><?php echo $data['alasan']?></td>
									<td><?php echo $data['absen']?></td>
									<td><?php echo $data['jam']?></td>


									<td><?php echo $data['keterangan']?></td>
									<td>
									<?php
										if($data['approve_status']==='Waiting Approval'){
												echo "<span class='btn btn-primary'> <b>".$data['approve_status']."</b></span>";
											}elseif($data['approve_status']==='Approve'){
												echo "<span class='btn btn-primary'> <b>".$data['approve_status']."</b></span>";
												$total_tukar_jaga++;
											}elseif($data['approve_status']==='Reject'){
												echo "<span class='btn btn-danger'> <b>".$data['approve_status']."</b></span>";
											}
									?>
									</td>
									<td>
									<?php 
									$reschedule_id=$data['id_ijin_pribadi'];
										echo '
										
											<a href="?reschedule_ijinpribadi_id='.$reschedule_id.'&changestat=Approve" class="btn btn-success" onclick="return confirm(\'Are you sure to Approve it?\')"><span class="fa fa-check"></span>Approve</a>

											<a href="?reschedule_ijinpribadi_id='.$reschedule_id.'&changestat=Cancel" class="btn btn-danger" onclick="return confirm(\'Are you sure to Cancel it?\')"><span class="fa fa-times"></span>Cancel</a>
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
			</div>
		</div>
	</div>
</div>