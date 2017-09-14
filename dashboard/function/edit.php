<?php
	//Edit-User
	if(isset($_GET['edit-user'])){
		$id = $_GET['edit-user'];
		if (isset($_POST['update-user'])) {
			$employee_id	= $_POST['employee_id'];
			$fullname	= $_POST['fullname'];
			$username 	= $_POST['username'];
			$department_id	= $_POST['department_id'];
			$position_id	= $_POST['position_id'];
			$address	= $_POST['address'];
			$telphone	= $_POST['telphone'];
			$gender		= $_POST['gender'];
			$access		= $_POST['access'];
			$row		= mysql_fetch_array(mysql_query("SELECT * FROM dt_users WHERE user_id='$id'"));
			$folder		= 'photos';
			$tmp_name 	= $_FILES["photo"]["tmp_name"];
        	$edit 		= $folder."/".$_FILES["photo"]["name"];

	        //Upload Foto ke Folder Foto
	        if (!empty($tmp_name)) {
	 		move_uploaded_file($tmp_name, $edit);
	
			$query 		= mysql_query("UPDATE dt_users set
										`employee_id` = '$employee_id',
										`fullname` = '$fullname',
										`username` = '$username',
										`department_id` = '$department_id',
										`position_id` = '$position_id',
										`address` = '$address',
										`telphone` = '$telphone',
										`gender` = '$gender',
										`access` = '$access',
										`photo` = '$edit'
										where user_id='$id'");
	    		
	    		if ($query) {
		        	echo 	
		        		"<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>Done!</strong> Data successfully changed.
						</div>";
					echo 	"<meta http-equiv='refresh' content='2;URL=?users=".$access."'>";
				}else{
					echo 	
						"<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>Ups!</strong> Data failed modified.
						</div>";
				}

	    	}else{

				$query 		= mysql_query("UPDATE dt_users set
										`employee_id` = '$employee_id',
										`fullname` = '$fullname',
										`username` = '$username',
										`department_id` = '$department_id',
										`position_id` = '$position_id',
										`address` = '$address',
										`telphone` = '$telphone',
										`gender` = '$gender',
										`access` = '$access',
										`photo` = '$row[photo]'
										where user_id='$id'");
				
				if ($query) {
		        	echo 	
		        		"<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>Done!</strong> Data successfully changed.
						</div>";
					echo 	"<meta http-equiv='refresh' content='2;URL=?users=".$access."'>";
				}else{
					echo 	
						"<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>Ups!</strong> Data failed modified.
						</div>";
				}	
			}
			
		}

		$data 	 		= 	mysql_query("SELECT * FROM dt_users WHERE user_id = $id");
		$row 			= 	mysql_fetch_array($data);
	}
?>


<?php
//Edit-Department
// ketika klik edit pada tiap line 
// maka select data pada paling bawah
// ketika klik update 
//pada tampilan edit 
// parameter edit-department sudah terisi 
	if (isset($_GET['edit-department'])) {
		$id = $_GET['edit-department'];

		// jika tombol  
		if (isset($_POST['update-department'])) {
			$name_divisi = mysql_real_escape_string($_POST['name_divisi']);

			$query = mysql_query("UPDATE tabel_divisi SET 
									`name_divisi`='$name_divisi'
									WHERE id_divisi=$id");

			if ($query) {
				echo "<div class='alert alert-success alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Done!</strong> Data successfully changed.
				      </div>";
				echo "<meta http-equiv='refresh' content='2;URL=?data=department'>";
			}else{
				echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Ups!</strong> Data failed modified.
				      </div>";
			}
		}
	
		$datausers 		= 	mysql_query("SELECT * FROM tabel_divisi where id_divisi = $id");
		$row 			= 	mysql_fetch_array($datausers);
	}
?>

<?php
	//Edit-Position
	if (isset($_GET['edit-position'])) {
		$id = $_GET['edit-position'];// id_divisi



			//2
		if (isset($_POST['update-position'])) {
			$department_id = mysql_real_escape_string($_POST['id_jabatan']);
			$position_name = mysql_real_escape_string($_POST['name_divisi']);

			$query = mysql_query("UPDATE tabel_divisi SET 
									`name_divisi`='$position_name',
									id_jabatan=$department_id
									WHERE id_divisi=$id");

			if ($query) {
				echo "<div class='alert alert-success alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Done!</strong> Data successfully changed.
				      </div>";
				echo "<meta http-equiv='refresh' content='2;URL=?data=position'>";
			}else{
				echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Ups!</strong> Data failed modified.
				      </div>";
			}
		}
	
	// 1
		$datausers 		= 	mysql_query("SELECT t1.id_divisi,t2.id_jabatan,t2.name_jabatan,t1.name_divisi FROM tabel_divisi AS t1 
								INNER JOIN tabel_jabatan AS t2 ON t1.id_jabatan = t2.id_jabatan
								WHERE t1.id_divisi=$id");
		$row 			= 	mysql_fetch_array($datausers);
	}
?>

<?php
	//Password Edit 
	if (isset($_GET['profile'])) {
		$id 	=	$_GET['profile'];

		if (isset($_POST['pass-update'])) {
			$password	=	$_POST['password'];
			$users 		=	mysql_query("UPDATE dt_users SET `password` = '$password' WHERE user_id = '$id'");
			if ($users) {
				echo 	"<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>Done!</strong> Data successfully changed.
						</div>";
				echo 	"<meta http-equiv='refresh' content='2;URL= index.php'>";
			}else{
				echo 	"<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>Ups!</strong> Data failed modified.
						</div>";
				echo 	"<meta http-equiv='refresh' content='2;URL=index.php'>";
			}
		}

		$datausers 		= 	mysql_query("SELECT * FROM dt_users WHERE user_id = $id");
		$row 			= 	mysql_fetch_array($datausers);
	}
?>

<?php
	//Request Status Edit 
	if (isset($_GET['id_tukar_jaga'])) {
		$id 	=	$_GET['id_tukar_jaga'];
		if (isset($_GET['changestat'])) {
			$changestat = $_GET['changestat'];
			$query = mysql_query("UPDATE tabel_tukar_jaga SET status = '$changestat' WHERE id_tukar_jaga ='$id' ");
			if ($query) {
			echo "<meta http-equiv='refresh' content='0;URL=?request=view-request'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully changed.
				  </div>";
			}else{
			echo "<meta http-equiv='refresh' content='0;URL=?request=view-request'>";
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";
			}
		}
		if (isset($_GET['approvalstat'])) {
			$approvalstat = $_GET['approvalstat'];
			$approval_id = $_GET['approval_id'];
			$approval_date = date("Y-m-d H:i:s");
			$query = mysql_query("UPDATE dt_reschedule SET
									approval_status = '$approvalstat',
									approval_date = '$approval_date',
									user_approval_id = '$approval_id'
									WHERE reschedule_id ='$id' ");
			if ($query) {
			echo "<meta http-equiv='refresh' content='0;URL=?adm=schedule-approval'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully changed.
				  </div>";
			}else{
			echo "<meta http-equiv='refresh' content='0;URL=?adm=schedule-approval'>";
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";
			}
		}
	}
?>

<?php
	//Permit Status Edit 
	if (isset($_GET['permit_id'])) {
		$id 	=	$_GET['permit_id'];
		$duration = $_GET['duration'];
		$approval_id = $_GET['approval_id'];
		$approval_date = date("Y-m-d H:i:s");
		if (isset($_GET['approvalstat'])) {
			$approvalstat = $_GET['approvalstat'];
			$query = mysql_query("UPDATE dt_permit SET
									approval_status = '$approvalstat',
									duration_allowed = '$duration',
									user_approval_id = '$approval_id',
									approval_date = '$approval_date'
									WHERE permit_id ='$id' ");
			if ($query) {
			echo "<meta http-equiv='refresh' content='0;URL=?adm=permit-approval'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully changed.
				  </div>";
			}else{
			echo "<meta http-equiv='refresh' content='0;URL=?adm=permit-approval'>";
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";
			}
		}
	}
?>

<?php
	//Leave Status Edit 
	if (isset($_GET['leave_id'])) {
		$id 	=	$_GET['leave_id'];
		$approval_id = $_GET['approval_id'];
		$approval_date = date("Y-m-d H:i:s");
		if (isset($_GET['approvalstat'])) {
			$approvalstat = $_GET['approvalstat'];
			$query = mysql_query("UPDATE dt_leave SET
									approval_status = '$approvalstat',
									user_approval_id = '$approval_id',
									approval_date = '$approval_date'
									WHERE leave_id ='$id' ");
			if ($query) {
			echo "<meta http-equiv='refresh' content='0;URL=?adm=leave-approval'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully changed.
				  </div>";
			}else{
			echo "<meta http-equiv='refresh' content='0;URL=?adm=leave-approval'>";
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";
			}
		}
	}
	 /*Penambahan baru*/
	 if(isset($_GET['reschedule_id']) AND isset($_GET['changestat'])){
	 	
	 	$reschedule_id=$_GET['reschedule_id'];
	 	$changestat=$_GET['changestat'];

	 	$query=mysql_query("SELECT 
							id_tukar_jaga,
							nip_mengganti AS NIK,
							nip_meminta AS nip_pengirim,
							tanggal tanggal_dibuat,
							waktu_menggajukan waktu,
							waktu_menggantikan,
							alasan,
							STATUS,
							approve_status,
							approve_date
							FROM tabel_tukar_jaga tj
							WHERE id_tukar_jaga='$reschedule_id'");

	 	$data=mysql_fetch_array($query);

	 	$nip=$data['nip_pengirim'];
	 	$tgl=$data['waktu'];
	 	// ini berisi Waiting Approval
	 	$approvstatus=$data['approve_status'];

	 	// cari apakah ada data pengirim yang sama
	 	// dan status nya sama, jika ada maka di hapus alias di close
	 	// dengan cara di update status nya jadi 1
	 	$update=mysql_query("update tabel_tukar_jaga
 							 set approve_status='$changestat'
 							 where id_tukar_jaga=$reschedule_id");

	 	if($update){
	 		// close other task 
	 		// Jika approval dikirim ke 5 orang pada hari yang sama
	 		// dan sudah ada yang melakukan approval
	 		// Maka yang Waiting Approve lainya di Close
	 		// karena sudah ada yang Approve
	 		// Jika reject tidak di  lakukan demikian
	 		if($changestat==='Approve'){
	 			// 
	 			$date2=mysql_query("SELECT 
							id_tukar_jaga,
							nip_mengganti AS NIK,
							nip_meminta AS nip_pengirim,
							tanggal tanggal_dibuat,
							waktu_menggajukan waktu,
							waktu_menggantikan,
							alasan,
							STATUS,
							approve_status,
							approve_date
							FROM tabel_tukar_jaga tj
							WHERE nip_meminta='$nip'
							and waktu_menggajukan='$tgl'
							and approve_status='$approvstatus'
							");

		 		$jumlah=mysql_num_rows($date2);
		 		
		 		if($jumlah>0){
		 			
		 			while ($close_task=mysql_fetch_array($date2)) {
		 				$update=mysql_query("update tabel_tukar_jaga set 
		 				STATUS=1,
		 				approve_status='Close'
		 				WHERE nip_meminta='$nip'
								and waktu_menggajukan='$tgl'
								and approve_status='$approvstatus'
								and id_tukar_jaga <> $reschedule_id
		 				");	
		 			}
		 			
		 		}
	 		}
	 		



			echo "<meta http-equiv='refresh' content='0;URL=?adm=view-pesan-masuk-tukarjaga'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully, Data has".$approvstatus;  

					echo"</div>";

	 	}else{
	 		echo "<meta http-equiv='refresh' content='0;URL=?adm=view-pesan-masuk-tukarjaga'>";
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";

	 	}

	 }


?>


<?php 
	// TUKAR OF  RESECHEDULE 

 /*Penambahan baru*/
	 if(isset($_GET['reschedule_tukarof_id']) and  isset($_GET['changestat'])){
	 	

	 	
	 	$reschedule_id=$_GET['reschedule_tukarof_id'];
	 	$changestat=$_GET['changestat'];

	 	$query=mysql_query("SELECT 
								id_off,
								nip_mengganti AS NIK,
								tp.`fullname` AS NamaTujuan,
								nip_meminta AS nip_pengirim,
								waktu_menggajukan,
								waktu_menggantikan,
								alasan,
								STATUS,
								approve_status,
								approve_date
								FROM tabel_tukar_off tj
								JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
							WHERE id_off='$reschedule_id'");

	 	$data=mysql_fetch_array($query);

	 	$nip=$data['nip_pengirim'];
	 	$tgl_mengajukan=$data['waktu_menggajukan'];
	 	$tgl_menggantikan=$data['waktu_menggantikan'];
	 	// ini berisi Waiting Approval
	 	$approvstatus=$data['approve_status'];

	 	// cari apakah ada data pengirim yang sama
	 	// dan status nya sama, jika ada maka di hapus alias di close
	 	// dengan cara di update status nya jadi 1
	 	$update=mysql_query("update tabel_tukar_off
 							 set approve_status='$changestat'
 							 where id_off=$reschedule_id");

	 	if($update){
	 		// close other task 
	 		// Jika approval dikirim ke 5 orang pada hari yang sama
	 		// dan sudah ada yang melakukan approval
	 		// Maka yang Waiting Approve lainya di Close
	 		// karena sudah ada yang Approve
	 		// Jika reject tidak di  lakukan demikian
	 		if($changestat==='Approve'){
	 			// 
	 			$date2=mysql_query("SELECT 
								id_off,
								nip_mengganti AS NIK,
								tp.`fullname` AS NamaTujuan,
								nip_meminta AS nip_pengirim,
								waktu_menggajukan,
								waktu_menggantikan,
								alasan,
								STATUS,
								approve_status,
								approve_date
								FROM tabel_tukar_off tj
								JOIN tabel_pegawai tp ON tj.nip_mengganti=tp.nip
							WHERE nip_meminta='$nip'
							and waktu_menggajukan='$tgl_mengajukan'
							and waktu_menggantikan='$tgl_menggantikan'
							and approve_status='$approvstatus'
							");

		 		$jumlah=mysql_num_rows($date2);
		 		
		 		if($jumlah>0){
		 			
		 			while ($close_task=mysql_fetch_array($date2)) {
		 				$update=mysql_query("update tabel_tukar_off set 
		 				STATUS=1,
		 				approve_status='Close'
		 				WHERE nip_meminta='$nip'
								and waktu_menggajukan='$tgl_mengajukan'
							    and waktu_menggantikan='$tgl_menggantikan'
								and approve_status='$approvstatus'
								and id_off <> $reschedule_id
		 				");	
		 			}
		 			
		 		}
	 		}
	 		



			echo "<meta http-equiv='refresh' content='0;URL=?adm=view-pesan-masuk-tukaroff'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully, Data has".$approvstatus;  

					echo"</div>";

	 	}else{
	 		echo "<meta http-equiv='refresh' content='0;URL=?adm=view-pesan-masuk-tukaroff'>";
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";

	 	}

	 }





 if(isset($_GET['reschedule_ijinpribadi_id']) and  isset($_GET['changestat'])){
	 	
	 	$reschedule_id=$_GET['reschedule_ijinpribadi_id'];
	 	$changestat=$_GET['changestat'];

	 	
	 	// ini berisi Waiting Approval
	 	$approvstatus=$changestat;

	 	$update=mysql_query("update tabel_ijin_pribadi
 							 set approve_status='$changestat'
 							 where id_ijin_pribadi=$reschedule_id");

	 	if($update){

			echo "<meta http-equiv='refresh' content='0;URL=?adm=view-pesan-masuk-permit'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully, Data has".$approvstatus;  

					echo"</div>";

	 	}else{
	 		echo "<meta http-equiv='refresh' content='0;URL=?adm=view-pesan-masuk-tukaroff'>";
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";

	 	}

	 }


	  if(isset($_GET['reschedule_id_baca']) and  isset($_GET['changestat'])){
	 	
	 	$flagread = mysql_real_escape_string($_GET['reschedule_id_baca']);
		$changestat = mysql_real_escape_string($_GET['changestat']);
		$query = mysql_query ("

UPDATE tabel_spdl
SET `tandai`='$changestat'
WHERE `id_spdl`=$flagread");
			

	 	if($query){

			echo "<meta http-equiv='refresh' content='0;URL=?adm=view-masuk-isi-spdl'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully, Data has";  

					echo"</div>";

	 	}else{
	 		
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";

	 	}

	 }




	 // CUTI 


 /*Penambahan baru*/
	 if(isset($_GET['reschedule_cuti']) and  isset($_GET['changestat'])){
	 	

	 	
	 	$reschedule_id=$_GET['reschedule_cuti'];
	 	$changestat=$_GET['changestat'];

	 	$update=mysql_query("update tabel_permohonan_cuti
 							 set approve_status='$changestat'
 							 where id_cuti=$reschedule_id");



	 	if($changestat==='Reject'){
	 		$jumlahcuti=$_GET['back_reject'];
	 		
	 		$nip=$_GET['nip'];


	 		mysql_query("UPDATE tabel_jumlahcuti SET jumlah_cuti=$jumlahcuti
	 			WHERE nip='$nip'");

	 	}


	 	if($update){

			echo "<meta http-equiv='refresh' content='0;URL=?adm=view-pesan-masuk-pengajuancuti'>";
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Status successfully, Data has".$changestat;  
					echo"</div>";
	 	}else{
	 		echo "<meta http-equiv='refresh' content='0;URL=?adm=view-pesan-masuk-tukaroff'>";
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Status failed modified.
				  </div>";

	 	}

	 }




?>