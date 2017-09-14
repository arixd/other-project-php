<?php
	//create-User
	if (isset($_POST['create-user'])) {
		$employee_id	=	mysql_real_escape_string($_POST['nip']);
		$fullname		= 	mysql_real_escape_string($_POST['fullname']);
		$username 		= 	mysql_real_escape_string($_POST['username']);
		$password		=	mysql_real_escape_string($_POST['password']);
		$id_divisi	=	mysql_real_escape_string($_POST['id_divisi']);
		$address		=	mysql_real_escape_string($_POST['address']);
		$telphone		=	mysql_real_escape_string($_POST['telphone']);
		$gender			= 	mysql_real_escape_string($_POST['gender']);
		$id_jabatan			=	mysql_real_escape_string($_POST['id_jabatan']);
		$access			=	mysql_real_escape_string($_POST['access']);
		/*$folder 		= 	'photos';*/
       /* $tmp_name 		= 	$_FILES["photo"]["tmp_name"];
        $link 			= 	$folder."/".$_FILES["photo"]["name"];*/

        //move_uploaded_file($tmp_name, $link);

        $query = mysql_query("INSERT INTO `tabel_pegawai` (
  `nip` ,
  `fullname`,
  `username`,
  `password`,
  `access`,
  `telphone`,
  `photo`,
  `gender`,
  `id_jabatan`,
  `id_divisi`
)VALUES('$employee_id','$fullname','$username','$password','$access','$telphone','photo','$gender','$id_jabatan','$id_divisi')");

        if ($query) {
        	echo 	"<div class='alert alert-success alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Done!</strong> Data successfully added.
					</div>";
			echo 	"<meta http-equiv='refresh' content='2;URL=?users=employee'>";
        }else{
			echo 	"<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Ups!</strong> Data failed to be added.
					</div>";;
        }

	}
?>


<?php
	//create-User
	if (isset($_POST['create-upload-jadwal'])) {
		$nama_jadwal	=	mysql_real_escape_string($_POST['nama_jadwal']);
		$tanggal		= 	mysql_real_escape_string($_POST['tanggal']);
		
		$folder 		= 	'file_jadwal';
        $tmp_name 		= 	$_FILES["photo"]["tmp_name"];
        $link 			= 	$folder."/".$_FILES["photo"]["name"];

        move_uploaded_file($tmp_name, $link);

        $cek=mysql_query("select count(*) from tabel_jadwal");
        $jumlah=mysql_num_rows($cek);
        if($jumlah>0){
        	mysql_query("DELETE FROM tabel_jadwal");
        }


        $query = mysql_query("INSERT INTO tabel_jadwal(nama,
					date,
					nama_file)VALUES('$nama_jadwal',
					'$tanggal',
					'$link')");

        if ($query) {
        	echo 	"<div class='alert alert-success alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Done!</strong> Data successfully added.
					</div>";
			echo 	"<meta http-equiv='refresh' content='2;URL=?data=upload-jadwal'>";
        }else{
			echo 	"<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Ups!</strong> Data failed to be added.
					</div>";;
        }

	}
?>


<?php
	//create - department
	if (isset($_POST['create-department'])) {
		$department_name = mysql_real_escape_string($_POST['department_name']);
		$query = mysql_query("INSERT INTO tabel_divisi(id_divisi,name_divisi) VALUES(NULL,'$department_name')");	

		if ($query) {
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Data successfully added.
				  </div>";
			echo "<meta http-equiv='refresh' content='2;URL=?data=department'>";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Data failed to be added.
				  </div>";
		}
	}
?>

<?php
	//create - position
	if (isset($_POST['create-position'])) {
		$position_name = mysql_real_escape_string($_POST['name_divisi']);
		$department_id = mysql_real_escape_string($_POST['department_id']);
		$query = mysql_query("INSERT INTO tabel_divisi(id_divisi,name_divisi,id_jabatan) VALUES(NULL,'$position_name',$department_id)");


		if ($query) {
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Data successfully added.
				  </div>";
			echo "<meta http-equiv='refresh' content='2;URL=?data=position'>";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Data failed to be added.
				  </div>";
		}
	}
?>

<?php
	

//CRETE REQUEST   pENGGANTI tUKAR jaga
//CRETE REQUEST   pENGGANTI tUKAR jaga
//CRETE REQUEST   pENGGANTI tUKAR jaga
//CRETE REQUEST   pENGGANTI tUKAR jaga
	if (isset($_POST['create-request'])) {
		$user_request_id = mysql_real_escape_string($_POST['nip_meminta']);
		$user_change_id = mysql_real_escape_string($_POST['nip_mengganti']);
		$shift_mengajukan = mysql_real_escape_string($_POST['shift_mengajukan']);
		$shift_menggantikan = mysql_real_escape_string($_POST['shift_menggantikan']);		
		$date = mysql_real_escape_string($_POST['date']);
		$sc_from = mysql_real_escape_string($_POST['waktu_menggajukan']);
		$sc_to = mysql_real_escape_string($_POST['waktu_menggantikan']);
		$query = mysql_query ("INSERT INTO tabel_tukar_jaga(`nip_meminta`,`nip_mengantikan``,`shift_mengajukan`,`shift_menggantikan`,`date`,`waktu_menggajukan`,`waktu_menggantikan`)
							   VALUES(NULL,'$user_request_id','$user_change_id','$shift_mengajukan','$shift_menggantikan','$data','$sc_from','$sc_to')");
		if ($query) {
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Data successfully added.
				  </div>";
			echo "<meta http-equiv='refresh' content='2;URL=?adm=create-request'>";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Data failed to be added.
				  </div>";
		}
	}

	// create request pengganti create-request-tkjaga User Karyawan
	
	if (isset($_POST['create-request-tkjg-karyawan'])) {

		$user_request_id = mysql_real_escape_string($_SESSION['user_id']);
		$id_pegawai = $user_request_id;
        $nip_meminta = mysql_real_escape_string($_POST['nip_meminta']);
        $nip_mengganti =  mysql_real_escape_string($_POST['nip_pengganti']);;
        $id_shift_mengajukan = mysql_real_escape_string($_POST['id_shift_mengajukan']);
        $id_shift_menggantikan = mysql_real_escape_string($_POST['id_shift_menggantikan']);
        $tanggal= "2017-02-01";
        $waktu_menggajukan= mysql_real_escape_string($_POST['waktu_menggajukan']);

        $waktu_menggantikan=mysql_real_escape_string($_POST['waktu_menggantikan']);;
  		$alasan = mysql_real_escape_string($_POST['alasan']);
  		
  		$approve_status = "Waiting Approval";
		//tanggal apa 	
		
		
  		$query=mysql_query("INSERT INTO tabel_tukar_jaga(id_pegawai,
					nip_meminta,
					nip_mengganti,
					id_shift_mengajukan,
					id_shift_menggantikan,
					tanggal,
					waktu_menggajukan,
					waktu_menggantikan,
					alasan,
					status,
					approve_date,
					approve_status)
                                VALUES('$id_pegawai',
					'$nip_meminta',
					'$nip_mengganti',
					'$id_shift_mengajukan',
					'$id_shift_menggantikan',
					'$tanggal',
					'$waktu_menggajukan',
					'$waktu_menggantikan',
					'$alasan',
					'0',
					'null',
					'$approve_status')");





		if ($query) {
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Data successfully added.
				  </div>";
			echo "<meta http-equiv='refresh' content='2;URL=?adm=view-pesan-keluar-tukarjaga'>";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Data failed to be added.
				  </div>";
		}
	}



	




	if (isset($_POST['create-request-tkoff-karyawan'])) {

		$user_request_id = mysql_real_escape_string($_SESSION['user_id']);
		$id_pegawai = $user_request_id;
        $nip_meminta = mysql_real_escape_string($_POST['nip_meminta']);
        $nip_mengganti =  mysql_real_escape_string($_POST['nip_pengganti']);;
        $waktu_menggajukan= mysql_real_escape_string($_POST['waktu_menggajukan']);

        $waktu_menggantikan=mysql_real_escape_string($_POST['waktu_menggantikan']);;
  		$alasan = mysql_real_escape_string($_POST['alasan']);
  		
  		$approve_status = "Waiting Approval";
		//tanggal apa 	
		


  		$query=mysql_query("INSERT INTO tabel_tukar_off(id_pegawai,
					nip_meminta,
					nip_mengganti,
					waktu_menggajukan,
					waktu_menggantikan,
					alasan,
					status,
					approve_date,
					approve_status)
                                VALUES('$id_pegawai',
					'$nip_meminta',
					'$nip_mengganti',
					'$waktu_menggajukan',
					'$waktu_menggantikan',
					'$alasan',
					'0',
					'null',
					'$approve_status')");





		if ($query) {
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Data successfully added.
				  </div>";
			echo "<meta http-equiv='refresh' content='2;URL=?adm=view-pesan-keluar-tukaroff'>";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Data failed to be added.
				  </div>";
		}
	}







?>





<?php
	//create - permit
	if (isset($_POST['create-permit'])) {
		$user_id =$nip=$_SESSION['user_id'];
		$date =  mysql_real_escape_string($_POST['date']);

		$absen = mysql_real_escape_string($_POST['absen']);
		$time_out = mysql_real_escape_string($_POST['time_out']);
		$keterangan=mysql_real_escape_string($_POST['keterangan']);
		$reason = mysql_real_escape_string($_POST['reason']);

		$approve_status = "Waiting Approval";


		$query = mysql_query ("

INSERT INTO `tabel_ijin_pribadi` (
  `id_pegawai`,
  `tanggal`,
  `approve_status`,
  `keterangan`,
  absen,
  `jam` ,
  `nip`,
  `alasan`
) VALUES( '$user_id',
  '$date',
  '$approve_status',
  '$keterangan',
  '$$absen',
  '$time_out' ,
  '$user_id',
  '$reason')
			");
		if ($query) {
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Data successfully added.
				  </div>";
			echo "<meta http-equiv='refresh' content='2;URL=?adm=view-permit'>";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Data failed to be added.
				  </div>";
		}
	}
?>

<?php
	//create - leave
	if (isset($_POST['create-leave'])) {
		$user_id = mysql_real_escape_string($_POST['user_id']);
		$address_while_leave = mysql_real_escape_string($_POST['address_while_leave']);
		
		$jumlah = mysql_real_escape_string($_POST['length']);
		
		$date_from = mysql_real_escape_string($_POST['date_from']);
		$date_backtowork = mysql_real_escape_string($_POST['date_backtowork']);
		$keperluan=mysql_real_escape_string($_POST['keperluan']);
		$approve_status = "Waiting Approval";



			/**MEMBUAT SISA CUTI*/
				$qjumlahcuti=mysql_query("SELECT jumlah_cuti FROM tabel_jumlahcuti WHERE  nip='$user_id'");
				$cuti=mysql_fetch_array($qjumlahcuti);

				$prevsisacuti=$cuti['jumlah_cuti'];
				$sisa_cuti=$cuti['jumlah_cuti']-$jumlah;


		if($cuti['jumlah_cuti']=='0'){
			echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Ups!</strong> Data failed to be added. Sisa Cuti Anda Sudah Habis.
					  </div>";
		}else if($cuti['jumlah_cuti']<$jumlah){
			echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Ups!</strong> Data failed to be added. Tidak dapat menambahkan cuti lebih besar dari  ".$cuti['jumlah_cuti']." .
				 </div>";
		}else{

				$query = mysql_query ("
				INSERT INTO `tabel_permohonan_cuti` (
				  `id_pegawai`,
				  `approve_status` ,
				  `keperluan`,
				  `jumlah_cuti`,
				  `rencana`,
				  `kembali`,
				   alamat_waktu_cuti,
				   sisa_cuti,
				   prev_sisa_cuti
				)VALUES(
				  '$user_id',
				  '$approve_status' ,
				  '$keperluan',
				  '$jumlah',
				  '$date_from',
				  '$date_backtowork',
				  '$address_while_leave',
				   $sisa_cuti,
				   $prevsisacuti
				  )");


				/**SISA CUTI */

			if ($query) {

				// update tabel tabel_jumlahcuti 


				mysql_query("UPDATE tabel_jumlahcuti 
					SET jumlah_cuti= $sisa_cuti
					WHERE nip='$user_id'");


				echo "<div class='alert alert-success alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Done!</strong> Data successfully added.
					  </div>";
				echo "<meta http-equiv='refresh' content='2;URL=?adm=view-leave'>";
			}else{
				echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Ups!</strong> Data failed to be added.
					  </div>";
			}

		}

	}


//create - leave
	if (isset($_POST['create-request-isi-spdl'])) {
		
		$nip = mysql_real_escape_string($_POST['nip']);
		$dateform = mysql_real_escape_string($_POST['date_from']);
		$length = mysql_real_escape_string($_POST['length']);
		$datebacktowork = mysql_real_escape_string($_POST['date_backtowork']);
		$tujuan = mysql_real_escape_string($_POST['tujuan']);
		$alamat = mysql_real_escape_string($_POST['alamat']);
		$keperluan = mysql_real_escape_string($_POST['keperluan']);
/*
		echo "$nip";
		echo "$dateform";
		echo "$length";
		echo "$datebacktowork";
		echo "$tujuan";
		echo "$alamat";
		echo "$keperluan";*/

			$query = mysql_query ("

					INSERT INTO `tabel_spdl` (
					  `id_pegawai`,
					  `nama_instansi`,
					  `alasan`,
					  `keperluan`,
					  `tanggal_berangkat`,
					  `tanggal_kembali`,
					  `approve_status`,
					  `tujuan`,
					  `alamat`,
					  lama
					)VALUES(
					'$nip',
					  '$tujuan',
					  'null',
					  '$keperluan',
					  '$dateform',
					  '$datebacktowork',
					  'appeoval_status',
					  '$tujuan',
					  '$alamat',
					  $length
					)
							");
		if ($query) {
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Done!</strong> Data successfully added.
				  </div>";
			echo "<meta http-equiv='refresh' content='2;URL=?adm=view-request-isi-spdl'>";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>Ups!</strong> Data failed to be added.
				  </div>";
		}
	


	}



	



?>