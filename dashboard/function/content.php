<?php
	//BAGIAN FUNGSI CREATE
	if(isset($_GET['users'])){
		if ($_GET['users'] == 'admin') {
			include('table/users/admin.php');
		}elseif ($_GET['users']== 'allusers') {
			include ('table/users/allusers.php');
		}elseif ($_GET['users']=='employee') {
			include ('table/users/employee.php');
		}elseif ($_GET['users']=='head_department') {
			include ('table/users/head_department.php');
		}elseif ($_GET['users']=='director') {
			include ('table/users/director.php');
		}elseif ($_GET['users']=='create-user') {
			include('function/create.php');
			include('forms/create_user.php');
		}

	}
	elseif (isset($_GET['adm'])) {
		if ($_GET['adm'] == 'schedule-approval') {
			include ('table/adm/schedule_approval.php');
		}elseif ($_GET['adm'] == 'permit-approval') {
			include ('table/adm/permit_approval.php');
		}elseif ($_GET['adm'] == 'leave-approval') {
			include ('table/adm/leave_approval.php');

		}elseif ($_GET['adm'] == 'create-request-tukarjaga') {
			include ('function/create.php');
			include ('forms/create_request_tukarjaga.php');
			/*membuat yang tukar jaga terlebih dahulu*/
		}else if($_GET['adm'] =='view-pesan-keluar-tukarjaga'){
			include ('table/adm/pesan-keluar-tukarjaga.php');
		}else if($_GET['adm'] =='view-pesan-masuk-tukarjaga'){
			include ('function/edit.php');
			include ('table/adm/pesan-masuk-tukarjaga.php');
		}else if($_GET['adm'] =='create-request-tukaroff'){
			include ('function/create.php');
			include ('forms/create_request_tukaroff.php');
		}else if($_GET['adm'] =='view-pesan-keluar-tukaroff'){
			include ('table/adm/pesan-keluar-tukaroff.php');
		}else if($_GET['adm'] =='view-pesan-masuk-tukaroff'){
			include ('function/edit.php');
			include ('table/adm/pesan-masuk-tukaroff.php');
		}
		elseif ($_GET['adm'] == 'view-request') {
			// jika berhasil yang diatas akan masuk ke yang sini create
			include ('table/adm/request.php');
		}elseif ($_GET['adm'] == 'my-request') {
			include ('table/adm/myrequest.php');
		}elseif ($_GET['adm'] == 'create-permit') {
			include ('function/create.php');
			include ('forms/create_permit.php');
		}elseif ($_GET['adm'] == 'view-permit') {
			include ('table/adm/permit.php');
		}else if($_GET['adm'] =='view-pesan-masuk-permit'){
			include ('function/edit.php');
			include ('table/adm/view-pesan-masuk-permit.php');
		}
		elseif ($_GET['adm'] == 'create-leave') {
			include ('function/create.php');
			include ('forms/create_leave.php');
		}elseif ($_GET['adm'] == 'create-request-isi-spdl') {
			include ('function/create.php');
			include ('forms/create-request-isi-spdl.php');
		}else if($_GET['adm'] =='view-request-isi-spdl'){
			include ('function/edit.php');
			include ('table/adm/view-request-isi-spdl.php');
		}else if($_GET['adm'] =='view-masuk-isi-spdl'){
			include ('function/edit.php');
			include ('table/adm/view-masuk-isi-spdl.php');
		}

/*view-masuk-isi-spdl
	<li><a href="?adm=create-request-isi-spdl">Tulis Pesan</a></li>
							<li><a href="?adm=view-request-isi-spdl">Pesan Keluar</a></li>*/


		else if($_GET['adm'] =='view-leave'){
			include ('function/edit.php');
			include ('table/adm/view-pesan-keluar-leave.php');
		}

		elseif ($_GET['adm'] == 'view-pesan-masuk-pengajuancuti') {
			include ('table/adm/view-pesan-masuk-pengajuancuti.php');
		}elseif ($_GET['adm'] == 'view-laporan-divs-ga') {
			include ('table/adm/view-laporan-divs-ga.php');
		}elseif ($_GET['adm'] == 'view-laporan-divs-finance') {
			include ('table/adm/view-laporan-divs-finance.php');
		}elseif ($_GET['adm'] == 'view-laporan-divs-eng') {
			include ('table/adm/view-laporan-divs-eng.php');
		}elseif ($_GET['adm'] == 'view-laporan-divs-tro') {
			include ('table/adm/view-laporan-divs-tro.php');
		}
		elseif ($_GET['adm'] == 'view-laporan-divs-all') {
			include ('table/adm/view-laporan-divs-all.php');
		}



	}elseif (isset($_GET['data'])) { // menu data 
		if ($_GET['data'] == 'department') {
			include('table/data_department.php');
		}elseif ($_GET['data'] == 'position') {
			include('table/data_position.php');
		}elseif ($_GET['data'] == 'create-department') {
			include('function/create.php');
			include('forms/create_department.php');
		}elseif ($_GET['data'] == 'create-position') {
			include('function/create.php');
			include('forms/create_position.php');
		}elseif ($_GET['data'] =='upload-jadwal') {
			include ('function/create.php');
			include ('forms/create_upload_jadwal.php');
		}elseif ($_GET['data'] =='list-jadwal') {
			include ('forms/list-jadwal.php');
/*				include ('function/create.php');
			include ('forms/create_upload_jadwal.php');
*/		}
	}elseif (isset($_GET['view'])) {
		if ($_GET['view'] == 'schedule') {
			include('table/view/schedule.php');
		}elseif ($_GET['view'] == 'permit') {
			include('table/view/permit.php');
		}if ($_GET['view'] == 'leave') {
			include('table/view/leave.php');
		}
	}

	//BAGIAN FUNGSI EDIT
	elseif (isset($_GET['profile'])) {
		include('function/edit.php');
		include('forms/edit_profile.php');
	}elseif (isset($_GET['edit-department'])) {
		include('function/edit.php');
		include('forms/edit_department.php');
	}elseif (isset($_GET['edit-position'])) {
		include('function/edit.php');
		include('forms/edit_position.php');
	}elseif (isset($_GET['reschedule_id'])) {
		include('function/edit.php');
	}elseif (isset($_GET['reschedule_tukarof_id'])) {
		include('function/edit.php');
	}elseif (isset($_GET['reschedule_ijinpribadi_id'])) {
		include('function/edit.php');
	}elseif (isset($_GET['permit_id'])) {
		include('function/edit.php');
	}elseif (isset($_GET['reschedule_cuti'])) {
		include('function/edit.php');
	}elseif (isset($_GET['reschedule_id_baca'])) {
		include('function/edit.php');
	}elseif (isset($_GET['edit-user'])) {
		include ('function/edit.php');
		include ('forms/edit_user.php');
	}
	//BAGIAN FUNGSI DELETE
	elseif (isset($_GET['delete-user'])) {
		include ('function/delete.php');
	}elseif (isset($_GET['delete-department'])) {
		include ('function/delete.php');
	}elseif (isset($_GET['delete-position'])) {
		include ('function/delete.php');
	}elseif (isset($_GET['laporan-delete'])) {
		include ('function/delete.php');
	}elseif (isset($_GET['divisi-delete'])) {
		include('function/delete.php');
	}elseif (isset($_GET['karyawan-delete'])) {
		include('function/delete.php');
	}

	else if($_SESSION['access'] == 'Chief GA'){
		$nip=$_SESSION['user_id'];
?>

<!-- ================================================================================================ -->
<div class="row">
	<!-- BEGIN PROFILE -->
	<div class="col-md-4">
		<div class="grid box-profile bg-blue">
			<div class="grid-body">							
				<img src="<?php echo $site_url.$_SESSION['photo']; ?>" class="img-circle" alt="User Profile" width="90" height="150">
				<h3><?php echo $_SESSION['fullname']; ?></h3>
				<span></span>
			</div>
			<div class="footer bg-black" style="height: 50px;">
			</div>
		</div>
	</div>
	<!-- END PROFILE -->	

</div>
<!-- ================================================================================================ -->
<div class="row">

	<div class="col-lg-2 col-md-4 col-sm-6">
			<div class="grid widget bg-red">
				<a href="?adm=view-pesan-masuk-tukarjaga">
					<div class="grid-body">
						<span class="title">Notification Request Tukar Jaga</span>
							<?php
								$users = mysql_query("SELECT 
														id_tukar_jaga
														FROM tabel_tukar_jaga tj
														JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
													where 
													STATUS=0 AND approve_status='Waiting'
								");
								$data = mysql_num_rows($users);
							?>
						<span class="value" style=' background: white;border:1px solid pink; color: red; border-radius: 20px; width: 30px; margin:0 auto; margin-bottom: 10px;'><?php echo $data; ?></span>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-2 col-md-4 col-sm-6">
			<div class="grid widget bg-yellow">
				<a href="?adm=view-pesan-masuk-permit">
					<div class="grid-body">
						<span class="title">Notification Request Ijin Pribadi</span>
							<?php
								$users = mysql_query(" SELECT
											tj.`id_pegawai` AS NIP,
											tp.fullname AS nama,
											(SELECT name_divisi FROM tabel_divisi td WHERE  td.id_divisi=tp.id_divisi) AS divisi,
											`tanggal`,
											`approve_status`,
											`keterangan`,
											`jam` ,
											tj.`nip`,
											`alasan`
											FROM tabel_ijin_pribadi tj
											JOIN tabel_pegawai tp ON tj.id_pegawai=tp.nip
											where approve_status='Waiting Approval'
											ORDER BY  `id_ijin_pribadi` DESC 
								");
								$data = mysql_num_rows($users);
							?>
						<span class="value" style=' background: white;border:1px solid pink; color: red; border-radius: 20px; width: 30px; margin:0 auto;margin-bottom: 10px;'><?php echo $data; ?></span>
					</div>
				</a>
			</div>
		</div>

</div>
<!-- ================================================================================================ -->
<?php 

	}  else if($_SESSION['access'] == 'Chief Eng'){

		$nip=$_SESSION['user_id'];
?>

<!-- =====================================START CHIF ENGINERING =========================================================== -->
<div class="row">
	<!-- BEGIN PROFILE -->
	<div class="col-md-4">
		<div class="grid box-profile bg-blue">
			<div class="grid-body">							
				<img src="<?php echo $site_url.$_SESSION['photo']; ?>" class="img-circle" alt="User Profile" width="90" height="150">
				<h3><?php echo $_SESSION['fullname']; ?></h3>
				<span></span>
			</div>
			<div class="footer bg-black" style="height: 50px;">
			</div>
		</div>
	</div>
	<!-- END PROFILE -->	

</div>
<!-- ================================================================================================ -->
<div class="row">

	<div class="col-lg-2 col-md-4 col-sm-6">
			<div class="grid widget bg-yellow">
				<a href="?adm=view-pesan-masuk-tukaroff">
					<div class="grid-body">
						<span class="title">Notification Request Tukar Off</span>
							<?php
								$users = mysql_query("SELECT 
														id_off
														FROM tabel_tukar_off tj
														JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
													where  STATUS=0 AND approve_status='Waiting'
								");
								$data = mysql_num_rows($users);
							?>
						<span class="value" style=' background: white;border:1px solid pink; color: red; border-radius: 20px; width: 30px; margin:0 auto;margin-bottom: 10px;'><?php echo $data; ?></span>
					</div>
				</a>
			</div>
		</div>

	<div class="col-lg-2 col-md-4 col-sm-6">
			<div class="grid widget bg-red">
				<a href="?adm=view-pesan-masuk-pengajuancuti">
					<div class="grid-body">
						<span class="title">Notification Request Pengajuan Cuti</span>
							<?php
								$users = mysql_query("SELECT id_cuti FROM  tabel_permohonan_cuti
													   WHERE approve_status='Waiting Approval'
								");
								$data = mysql_num_rows($users);
							?>
						<span class="value" style=' background: white;border:1px solid pink; color: red; border-radius: 20px; width: 30px; margin:0 auto; margin-bottom: 10px;'><?php echo $data; ?></span>
					</div>
				</a>
			</div>
		</div>

</div>
<!-- ====================================END CHIF ENGINERING============================================================ -->
<?php 



	}else if($_SESSION['access'] != 'admin' and $_SESSION['access'] != 'Building Manager'){

$nip=$_SESSION['user_id'];
?>

<!-- ================================================================================================ -->
<div class="row">
	<!-- BEGIN PROFILE -->
	<div class="col-md-4">
		<div class="grid box-profile bg-blue">
			<div class="grid-body">							
				<img src="<?php echo $site_url.$_SESSION['photo']; ?>" class="img-circle" alt="User Profile" width="90" height="150">
				<h3><?php echo $_SESSION['fullname']; ?></h3>
				<span></span>
			</div>
			<div class="footer bg-black" style="height: 50px;">
			</div>
		</div>
	</div>
	<!-- END PROFILE -->	

</div>
<!-- ================================================================================================ -->
<div class="row">

	<div class="col-lg-2 col-md-4 col-sm-6">
			<div class="grid widget bg-red">
				<a href="?adm=view-pesan-masuk-tukarjaga">
					<div class="grid-body">
						<span class="title">Notification Request Tukar Jaga</span>
							<?php
								$users = mysql_query("SELECT 
														id_tukar_jaga
														FROM tabel_tukar_jaga tj
														JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
													where nip_mengganti='$nip'
													AND STATUS=0 AND approve_status='Waiting Approval'
								");
								$data = mysql_num_rows($users);
							?>
						<span class="value" style=' background: white;border:1px solid pink; color: red; border-radius: 20px; width: 30px; margin:0 auto; margin-bottom: 10px;'><?php echo $data; ?></span>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-2 col-md-4 col-sm-6">
			<div class="grid widget bg-yellow">
				<a href="?adm=view-pesan-masuk-tukaroff">
					<div class="grid-body">
						<span class="title">Notification Request Tukar Off</span>
							<?php
								$users = mysql_query("SELECT 
														id_off
														FROM tabel_tukar_off tj
														JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
													where nip_mengganti='$nip'
													AND STATUS=0 AND approve_status='Waiting Approval'
								");
								$data = mysql_num_rows($users);
							?>
						<span class="value" style=' background: white;border:1px solid pink; color: red; border-radius: 20px; width: 30px; margin:0 auto;margin-bottom: 10px;'><?php echo $data; ?></span>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-2 col-md-4 col-sm-6">
			<div class="grid widget bg-blue">
				<a href="?adm=view-masuk-isi-spdl">
					<div class="grid-body">
						<span class="title">Notification Request SPDL</span>
							<?php
								$users = mysql_query("SELECT COUNT(id_spdl) AS total FROM `tabel_spdl` WHERE tandai IS NULL");
								$data = mysql_fetch_array($users);
							?>
						<span class="value" style=' background: white;border:1px solid pink; color: red; border-radius: 20px; width: 30px; margin:0 auto;margin-bottom: 10px;'><?php echo $data['total'] ?></span>
					</div>
				</a>
			</div>
		</div>



</div>
<!-- ================================================================================================ -->
<?php 
	}
?>