<?php // content="text/plain; charset=utf-8"

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');
require_once ('jpgraph/jpgraph_line.php');
include "koneksi.php";
                                                                      
$tahun=array();
$kelas_satu=array();
$kelas_dua=array();
$kelas_tiga=array();
$kelas_empat=array();


$result=mysql_query("
SELECT (
	SELECT COUNT(*) FROM `tabel_tukar_jaga` tj 
	JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
	JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
	WHERE `approve_status`='Approve' AND td.name_divisi='Tenant Relation Office'
) AS tr_tukarjaga,
#--------------- Tukar Off ---------------------------------------
(
	SELECT COUNT(*) FROM `tabel_tukar_off` tj 
	JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
	JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
	WHERE `approve_status`='Approve' AND td.name_divisi='Tenant Relation Office'
) AS tr_tukaroff,
#--------------- Tukar Ijin Pribadi --------------------------
(
	SELECT COUNT(*) FROM `tabel_ijin_pribadi` tj 
	JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
	JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
	WHERE `approve_status`='Approve' AND td.name_divisi='Tenant Relation Office'
) AS tr_ijinpribadi,
#--------------- Sisa Cuti --------------------------
(
	SELECT COUNT(*) FROM `tabel_permohonan_cuti` tj 
	JOIN `tabel_pegawai` tp ON tp.`nip`=tj.`id_pegawai`
	JOIN `tabel_divisi` td  ON td.id_divisi=tp.id_divisi
	WHERE `approve_status`='Approve' AND td.name_divisi='Tenant Relation Office'
) AS tr_sisacuti
FROM DUAL");
while ($data=mysql_fetch_array($result)) {
	array_unshift($tahun, 'T.R');
	array_unshift($kelas_satu, $data['tr_tukarjaga']);
	array_unshift($kelas_dua, $data['tr_tukaroff']);
	array_unshift($kelas_tiga, $data['tr_ijinpribadi']);
	array_unshift($kelas_empat, $data['tr_sisacuti']);

}



$graph = new Graph(500,500,'auto');
$graph->SetScale("textlin");
// menampilkan data kelas untuk warna orange
$b1plot = new BarPlot($kelas_satu);
$b1plot->SetFillColor("#c9302c");
$b1plot->value->show();


$b2plot = new BarPlot($kelas_dua);
$b2plot->SetFillColor("blue");
$b2plot->value->show();

$b3plot = new BarPlot($kelas_tiga);
$b3plot->SetFillColor("yellow");
$b3plot->value->show();

$b4plot = new BarPlot($kelas_empat);
$b4plot->SetFillColor("red");

$b4plot->value->show();


$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot,$b4plot));
$graph->Add($gbplot);


// membuat legend untuk keterangan kelas 

$b1plot->SetLegend("Tukar Jaga");
$b2plot->SetLegend("Penakaran Off");
$b3plot->SetLegend("Ijin Pribadi");
$b4plot->SetLegend("Permohonan Cuti");


$graph->legend->Pos(0.1,0.95,"left","center");

$graph->SetMargin(40,110,20,40);





$graph->SetMargin(40,110,20,40);

$graph->yaxis->title->Set("Jumlah");

$graph->xaxis->SetTickLabels($tahun);

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->SetShadow();
$graph->Stroke();
?>
  