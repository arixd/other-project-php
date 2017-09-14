	<div class="wrapper row-offcanvas row-offcanvas-left">
		<!-- BEGIN SIDEBAR -->
		<aside class="left-side sidebar-offcanvas">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">					
						<img src="<?php echo $site_url.$_SESSION['photo']; ?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info"><br/>
					<?php 
	                  $query=mysql_query("SELECT fullname FROM tabel_pegawai WHERE nip='$user_id'");   
	                  $data=mysql_fetch_array($query);
	                ?>
						<p><?php echo $data['fullname']; ?></p>
						<a href="?profile=<?php echo $_SESSION['nip']; ?>"><i class="fa fa-circle text-green"></i>
							<?php  
								if (isset($_SESSION['access'])) {
									if ($_SESSION['access'] == 'admin'){
										echo "Administrator [ON]";
									}
									elseif ($_SESSION['access'] == 'karyawan'){
										echo "Karyawan [ON]";
									}
									elseif ($_SESSION['access'] == 'Building Manager'){
										echo "Building Manager [ON]";
									}
									elseif ($_SESSION['access'] == 'Chief GA'){
										echo "Chief GA [ON]";
									}
									elseif ($_SESSION['access'] == 'Chief Eng'){
										echo "Chief Eng [ON]";
									}
								}
							?>	
						</a>
					</div>
				</div><br/>			
				<ul class="sidebar-menu">
					<li>
						<a href="../index.php">
							<i class="fa fa-home"></i><span>Home</span>
						</a>
						<a href="http://localhost/valey/dashboard/forms/list-jadwal.php" target="_blank">
							<i class="fa fa-users"></i><span>Lihat Jadwal</span>
						</a>
					</li>


				<?php
				// http://localhost/valey/dashboard/?users=employee 
					if (isset($_SESSION['access'])) {
						if ($_SESSION['access'] == 'admin') {
				?>
					<li class="menu">
						<a href="#">
							<i class="fa fa-users"></i><span>User Management</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?users=allusers">All Users</a></li>
							<li><a href="?users=admin">Admin</a></li>
							<!--<li><a href="?users=director">Building Manager</a></li>
							<li><a href="?users=head-department">Chief GA</a></li>
							<li><a href="?users=head-department">Chief Eng</a></li>-->
							<li><a href="?users=employee">Karyawan</a></li>
							<!-- <li><a href="?laporan=upload">Direktor</a></li> -->
						</ul>
					</li>
					<li class="menu">
						<a href="#">
							<i class="fa fa-archive"></i><span>Data</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?data=department">Divisi</a></li>
							<li><a href="?data=position">Jabatan</a></li>
						</ul>
					</li>	

					<li class="menu">
						<a href="#">
							<i class="fa fa-archive"></i><span>Jadwal</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?data=upload-jadwal">Upload Jadwal</a></li>
							<li><a href="http://localhost/valey/dashboard/forms/list-jadwal.php" target="_blank">List Jadwal</a></li>
						</ul>
					</li>				
										
				<?php
					}elseif ($_SESSION['access'] == 'karyawan') {

						//sekarang bagian ini 
						// edit bagian karyawan

				?>
					<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>Tukar Jaga</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-request-tukarjaga">Tulis Pesan</a></li>
							<li><a href="?adm=view-pesan-masuk-tukarjaga">Pesan Masuk</a></li>
							<li><a href="?adm=view-pesan-keluar-tukarjaga">Pesan Keluar</a></li>
						</ul>
					</li>
						
						<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>Tukar Off</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-request-tukaroff">Tulis Pesan</a></li>
							<li><a href="?adm=view-pesan-masuk-tukaroff">Pesan Masuk</a></li>
							<li><a href="?adm=view-pesan-keluar-tukaroff">Pesan Keluar</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#">
							<i class="fa fa-sign-out"></i><span>ijin Pribadi</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-permit">Tulis Pesan</a></li>
							<li><a href="?adm=view-permit">Pesan Keluar</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#">
							<i class="fa fa-suitcase"></i><span>permohonan cuti</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-leave">Tulis Pesan</a></li>
							<li><a href="?adm=view-leave">Pesan Keluar</a></li>
						</ul>
					</li>	
					
					<li class="menu">
						<a href="#">
							<i class="fa fa-stack-overflow"></i><span>SPDL</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=view-masuk-isi-spdl">Pesan Masuk</a></li>
						</ul>
					</li>

				<?php
					}elseif ($_SESSION['access'] == 'Chief GA') {

				?>
				<li class="menu">
						<a href="#">
							<i class="fa fa-sign-out"></i><span>Pesan Masuk</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=view-pesan-masuk-tukarjaga">Tukar Jaga </a></li>
							<li><a href="?adm=view-pesan-masuk-permit">Izin Pribadi</a></li>
						</ul>
				</li>
			

					<?php
					}elseif ($_SESSION['access'] == 'Chief Eng') {
				?>


				<li class="menu">
						<a href="#">
							<i class="fa fa-sign-out"></i><span>Pesan Masuk</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=view-pesan-masuk-tukaroff">Tukar Off </a></li>
							<li><a href="?adm=view-pesan-masuk-pengajuancuti">Permohonan Cuti</a></li>
						</ul>
					</li>
				<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>SPDL</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-request-isi-spdl">Tulis Pesan</a></li>
							<li><a href="?adm=view-request-isi-spdl">Pesan Keluar</a></li>
						</ul>
					</li>


				<!--
					<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>Chief TRO</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-request">TRO</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>Chief GA</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-request">Masanger</a></li>
							<li><a href="?adm=create-request">OB</a></li>
							<li><a href="?adm=create-request">Gen.Admin</a></li>
							<li><a href="?adm=create-request">Cleaning Service</a></li>
							<li><a href="?adm=create-request">Scurity</a></li>
							<li><a href="?adm=create-request">Parkir</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>Chief Eng</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-request">Enginnering</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#">
							<i class="fa fa-stack-overflow"></i><span>Chief Finance</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=create-request">Kasir</a></li>
							<li><a href="?adm=create-request">Collection</a></li>
							<li><a href="?adm=create-request">A.R</a></li>
						</ul>
					</li>

				-->
					
				<?php
					}elseif ($_SESSION['access'] == 'Building Manager') {
				?>

					<li class="menu">
						<a href="#">
							<i class="fa fa-stack-overflow"></i><span>All Report </span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=view-laporan-divs-all">Laporan All Divisi</a></li>	
						</ul>
					</li>

					<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>Chief TRO</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=view-laporan-divs-tro">Laporan Divisi TRO</a></li>	
						</ul>
					</li>

				


					<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>Chief GA</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
						<li><a href="?adm=view-laporan-divs-ga">Laporan Divisi GA</a></li>							
							<!--
							<li><a href="?adm=create-request">Masanger</a></li>
							<li><a href="?adm=create-request">OB</a></li>
							<li><a href="?adm=create-request">Gen.Admin</a></li>
							<li><a href="?adm=create-request">Cleaning Service</a></li>
							<li><a href="?adm=create-request">Scurity</a></li>
							<li><a href="?adm=create-request">Parkir</a></li>
							-->
						</ul>
					</li>
					<li class="menu">
						<a href="#">
							<i class="fa fa-clock-o"></i><span>Chief Eng</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
								<li><a href="?adm=view-laporan-divs-eng">Laporan Divisi Eng</a></li>	
						</ul>
					</li>
					<li class="menu">
						<a href="#">
							<i class="fa fa-stack-overflow"></i><span>Chief Finance</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="?adm=view-laporan-divs-finance">Laporan Divisi Finance</a></li>	
						</ul>
					</li>
					<?php
					}
				?>
					
					

				<?php 
						
					}
				?>								
				</ul>
			</section>
		</aside>
		<!-- END SIDEBAR -->