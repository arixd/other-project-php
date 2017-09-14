<?php

	require_once('config/koneksi.php');
	if (isset($_POST['signin'])){
		$user 		= 	$_POST['username'];
		$pass 		= 	$_POST['password'];
		$hasil 		= 	mysql_query("SELECT * FROM tabel_pegawai WHERE username='$user' AND password='$pass'");
		$data 		= 	mysql_fetch_array($hasil);
		$user_id	= 	$data['nip'];
		$username 	= 	$data['username'];
		$password 	= 	$data['password'];
		$fullname	= 	$data['fullname'];
		$photo 		= 	$data['photo'];
		$access 	= 	$data['access'];
		$id_divisi	=	$data['id_divisi'];
		if($user==$username && $pass=$password){
			session_start();
			$_SESSION['user_id']	=	$user_id;
			$_SESSION['username']	=	$username;
			$_SESSION['fullname']	=	$fullname;
			$_SESSION['photo']  	=	$photo;
			$_SESSION['access']		=	$access;
			header('Location: dashboard/');
		}else {
			echo "<script language='javascript'>alert('Silahkan isi data dengan benar')</script>";
  			echo "<script language='javascript'>window.location = 'index.php'</script>";
		}
	}
	
?>