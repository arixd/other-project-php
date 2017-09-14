<?php // content="text/plain; charset=utf-8"

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');
require_once ('jpgraph/jpgraph_line.php');
include "koneksi2.php";


$tahun=array();
$kelas_satu=array();
$kelas_dua=array();
$kelas_tiga=array();

$result=mysql_query("SELECT DATE_FORMAT(s.tahun_masuk,'%Y') AS tahun, '10' kelas_satu,'8' kelas_dua
,'5' kelas_tiga FROM `t_siswa` s 
GROUP BY DATE_FORMAT(s.tahun_masuk,'%Y') ,kelas_satu,kelas_dua");
while ($data=mysql_fetch_array($result)) {
	array_unshift($tahun, $data['tahun']);
	array_unshift($kelas_satu, $data['kelas_satu']);
	array_unshift($kelas_dua, $data['kelas_dua']);
	array_unshift($kelas_tiga, $data['kelas_tiga']);
}



$graph = new Graph(700,300,'auto');
$graph->SetScale("textlin");
// menampilkan data kelas untuk warna orange
$b1plot = new BarPlot($kelas_satu);
$b1plot->SetFillColor("orange");
$b1plot->value->show();


$b2plot = new BarPlot($kelas_dua);
$b2plot->SetFillColor("blue");
$b2plot->value->show();

$b3plot = new BarPlot($kelas_tiga);
$b3plot->SetFillColor("yellow");
$b3plot->value->show();


$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
$graph->Add($gbplot);


// membuat legend untuk keterangan kelas 

$b1plot->SetLegend("Kelas Satu");
$b2plot->SetLegend("Kelas Dua");
$b3plot->SetLegend("Kelas Tiga");


$graph->legend->Pos(0.05,0.95,"right","center");

$graph->SetMargin(40,110,20,40);

$graph->title->Set("Grafik Tahunan Jumlah Siswa");
$graph->xaxis->title->Set("Tahun ");


$graph->SetMargin(40,110,20,40);

$graph->yaxis->title->Set("Jumlah Siswa");

$graph->xaxis->SetTickLabels($tahun);

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->SetShadow();
$graph->Stroke();
?>
  