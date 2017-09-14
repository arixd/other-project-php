<?php

	session_start();
	if (!isset($_SESSION['username'])){
		header('location:../index.php');
	}elseif (isset($_SESSION['access'])) {
		if ($_SESSION['access'] == 'admin' or 'employee') {
			$user_id	= $_SESSION['user_id'];
			require_once('../config/koneksi.php');
			require_once('layout/header.php');
			require_once('layout/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
		<aside class="right-side">
			<!-- BEGIN CONTENT HEADER -->
			<section class="content-header">
				<i class="fa fa-home"></i>
				<span>Dashboard</span>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Dashboard</li>
				</ol>




				
			</section>
			<!-- END CONTENT HEADER -->

			<!-- BEGIN MAIN CONTENT -->
			<section class="content">	
				<div class="row">
					<!-- WIDGET -->
					<?php
						if (isset($_SESSION['access'])) {
							if ($_SESSION['access'] == 'admin') {
					?>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="grid widget bg-red">
							<a href="?users=admin">
								<div class="grid-body">
									<span class="title">ADMIN</span>
										<?php
											$users = mysql_query("SELECT COUNT(fullname) AS total FROM tabel_pegawai WHERE access ='admin'");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-purple">
							<a href="?users=employee">
								<div class="grid-body">
									<span class="title">Karyawan</span>
										<?php
											$users = mysql_query("SELECT COUNT(fullname) AS total FROM tabel_pegawai WHERE access = 'employee'");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-orange">
							<a href="?users=head_department">
								<div class="grid-body">
									<span class="title">Chief</span>
										<?php
											$users = mysql_query("SELECT COUNT(fullname) AS total FROM tabel_pegawai WHERE access = 'head_department'");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-orange">
							<a href="?users=director">
								<div class="grid-body">
									<span class="title">Building Manager</span>
										<?php
											$users = mysql_query("SELECT COUNT(fullname) AS total FROM tabel_pegawai WHERE access = 'director'");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-green">
							<a href="?data=department">
								<div class="grid-body">
									<span class="title">Divisi</span>
										<?php
											$users = mysql_query("SELECT COUNT(id_divisi) AS total FROM tabel_divisi");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-blue">
							<a href="?data=position">
								<div class="grid-body">
									<span class="title">Jabatan</span>
										<?php
											$users = mysql_query("SELECT COUNT(id_jabatan) AS total FROM tabel_jabatan");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>				
					
					
					<?php
						}elseif ($_SESSION['access'] == 'employee') {
					?>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-orange">
							<a href="?adm=view-request">
								<div class="grid-body">
									<span class="title">Ship Request</span>
										<?php
											$users = mysql_query("
												SELECT
												COUNT(reschedule_id) as total
												FROM dt_reschedule
												WHERE user_change_id = '$user_id' AND change_status is NULL
												");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					
					<?php
						}elseif ($_SESSION['access'] == 'head_department') {
						$query = mysql_query("
								SELECT
								t2.department_id
								FROM dt_users as t1
								INNER JOIN dt_position as t2 ON t1.position_id=t2.position_id
								WHERE user_id='$user_id'
							");   
	                  		$mydata  = mysql_fetch_array($query);
	                  		$my_department = $mydata['department_id'];
					?>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-orange">
							<a href="?adm=schedule-approval">
								<div class="grid-body">
									<span class="title">Ship Request</span>
										<?php
											$users = mysql_query("
												SELECT
												COUNT(t1.reschedule_id) as total
												FROM dt_reschedule as t1
												INNER JOIN dt_users as t2 ON t1.user_request_id=t2.user_id
												INNER JOIN dt_position as t3 ON t2.position_id=t3.position_id
												WHERE change_status = '1' AND t3.department_id='$my_department' AND approval_status is NULL
											");
											$data = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-green">
							<a href="?adm=permit-approval">
								<div class="grid-body">
									<span class="title">Permit Request</span>
										<?php
											$users = mysql_query("
												SELECT
												COUNT(t1.permit_id) as total
												FROM dt_permit as t1
												INNER JOIN dt_users as t2 ON t1.user_id=t2.user_id
												INNER JOIN dt_position as t3 ON t2.position_id=t3.position_id
												WHERE department_id='$my_department' AND approval_status is NULL
											");
											$data1 = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data1['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-2">
						<div class="grid widget bg-blue">
							<a href="?adm=leave-approval">
								<div class="grid-body">
									<span class="title">Leave Request</span>
										<?php
											$users = mysql_query("
												SELECT
												COUNT(t1.leave_id) as total
												FROM dt_leave as t1
												INNER JOIN dt_users as t2 ON t1.user_id=t2.user_id
												INNER JOIN dt_position as t3 ON t2.position_id=t3.position_id
												WHERE department_id='$my_department' AND approval_status is NULL
											");
											$data2 = mysql_fetch_array($users);
										?>
									<span class="value"><?php echo $data2['total'] ?></span>
								</div>
							</a>
						</div>
					</div>
					
					<?php
							}
						}
					?>
					<!-- end widget -->		
				</div>

				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->
				<!-- Content -->			
				<?php include('function/content.php'); ?>
				<!-- end of content -->
				
			</section>
			<!-- END MAIN CONTENT -->

		</aside>
	<!-- END CONTENT -->

<?php
	require_once('layout/footer.php');
		}
	}
?>