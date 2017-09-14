<?php 
	//Admin Delete
	if (isset($_GET['delete-department'])) {
		$id = $_GET['delete-department'];
		$delete = mysql_query("DELETE FROM tabel_divisi WHERE id_divisi = $id");
		if ($delete){
			echo "<meta http-equiv='refresh' content='0;URL=?data=department'>";
		}
	}elseif (isset($_GET['delete-position'])) {
		$id = $_GET['delete-position'];
		$delete = mysql_query("DELETE FROM tabel_divisi WHERE id_divisi = $id");
		if ($delete){
			echo "<meta http-equiv='refresh' content='0;URL=?data=position'>";
		}
	}elseif (isset($_GET['delete-user'])) {
		$id = $_GET['delete-user'];
		$ref = $_GET['ref'];
		$delete = mysql_query("DELETE FROM dt_users WHERE user_id = $id");
		if ($delete){
			echo "<meta http-equiv='refresh' content='0;URL=?users=".$ref."'>";
		}
	}
?>