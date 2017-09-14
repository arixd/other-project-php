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
								<th>NIK</th>
								<th>NAMA</th>
								<th>Posisi</th>
								<th>Tujuan</th>
								<th>Keperluan</th>
								<th>Berangkat </th>
								<th>Lama Dinas</th>
								<th>Kembali</th>
								<th>Alamat</th>
							</tr>
						</thead>
						<tbody>
							<?php
							    $nip=$_SESSION['user_id'];
								$nomer = 1;
								$query = mysql_query("						
										SELECT   `id_spdl` ,
										 tj.`id_pegawai` ,
										 tp.fullname,
										  (SELECT name_divisi FROM tabel_divisi td WHERE  td.id_divisi=tp.id_divisi) AS divisi,
										  `id_shift` ,
										  `nama_instansi` ,
										  `alasan` ,
										  `keperluan` ,
										  `tanggal_berangkat` ,
										  `tanggal_kembali` ,
										  `approve_status` ,
										  `tujuan`,
										  `alamat`,
										  lama
										FROM tabel_spdl tj
										JOIN tabel_pegawai tp ON tj.id_pegawai=tp.nip
										ORDER BY  `id_spdl` DESC 

								");
								while ($data = mysql_fetch_array($query)) {	
							?>
							<div class="form-group">
								
					</div>
								<tr>
									<td><?php echo $nomer?></td>
									<td><?php echo $data['id_pegawai']?></td>
									<td><?php echo $data['fullname']?></td>
									<td><?php echo $data['divisi']?></td>
									<td><?php echo $data['tujuan']?></td>
									<td><?php echo $data['keperluan']?> </td>
									<td><?php echo $data['tanggal_berangkat']?></td>
									<td><?php echo $data['lama']?></td>
									<td><?php echo $data['tanggal_kembali']?></td>
									<td><?php echo $data['alamat']?></td>
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