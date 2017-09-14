<?php
	
	include("koneksi2.php");

	$query=mysql_query("SELECT
								t1.nip,
	                  			t1.fullname,
								t2.name_jabatan,
								t3.name_divisi,
								t3.id_divisi
								FROM tabel_pegawai AS t1
								INNER JOIN tabel_jabatan AS t2 ON t1.id_jabatan=t2.id_jabatan
								INNER JOIN tabel_divisi AS t3 ON t1.id_divisi=t3.id_divisi
								WHERE access='karyawan' 
								AND t1.nip='ENG C 002'");

$karyawan = mysql_fetch_array($query);
$data = array(
            'nip_meminta'      =>  $karyawan['nip'],
            'name'      =>  $karyawan['fullname'],
            'divisi'   =>  $karyawan['name_divisi']);
 echo json_encode($data);
?>