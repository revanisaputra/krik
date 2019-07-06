<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

public function visin ()
	{
	//Visualisasi 1------------------------------------------------------------------------------------------1
	$source=file_get_contents('assets/visdat.json');
	$source=json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $source), true);
	$result=array();
	foreach ($source as $row ) 
	{
		if(!isset($result[$row['darah']]))
		{
			$result[$row['darah']] = array($row['pemakaian']);
		}else {
			array_push($result[$row['darah']], $row['pemakaian']);
		}
	}
	$keys=array_keys($result);
	$darah=array();
	foreach ($keys as $row)
	{
		$darah[]=[$row, array_sum($result[$row])];	
	}
	$data['PieChartData']=json_encode($darah);
	$data['PieChartTitle']='Presentase Penerimaan Darah 2016';


	//Visualisasi 2------------------------------------------------------------------------------------------2
	$result2=array();
	foreach ($source as $row ) 
	{
		if(!isset($result2[$row['darah']]))
		{
			$result2[$row['darah']] = array($row['sisa']);
		}else {
			array_push($result2[$row['darah']], $row['sisa']);
		}
	}
	$keys=array_keys($result2);
	$dara=array();
	foreach ($keys as $row)
	{
		$dara[]=[$row, array_sum($result2[$row])];	
		}
	$data['PieChartData2']=json_encode($dara);
	$data['PieChartTitle2']='Presentase Darah Sisa 2016';


	//Visualisasi 3------------------------------------------------------------------------------------------3
	$darah = [array('Tanggal','Penerimaan','pakai','sisa')];
	$totalData=array();
	foreach ($source as $row)
	{
		$gol=($row['darah']);
		if($gol!='A')
		{
		$dat = array($row['bulan'],(double)$row['penerimaan'],(double)$row['pemakaian'],(double)$row['sisa']);
	}else{
	$dat = array($row['bulan'],(double)$row['penerimaan'],(double)$row['pemakaian'],(double)$row['sisa']);
	array_push($darah, $dat);
	}
}
$data['BarChartData']=json_encode($darah);
$data['BarChartTitle']= 'Data Pengelolaan Darah A';


	//Visualisasi 4------------------------------------------------------------------------------------------4
$rere = [array('Tanggal','Penerimaan','Penggunaan')];
$res2=array();
foreach ($source as $row) 
{
	$gol=($row['darah']);
	if($gol!='O')
	{
		// $dat = array($row['bulan'],(double)$row['penerimaan'],(double)$row['pemakaian'],(double)$row['sisa']);
		$dat2=array($row['bulan'],(double)$row['penerimaan'],(double)$row['pemakaian']);
	}else{
		$dat2=array($row['bulan'],(double)$row['penerimaan'],(double)$row['pemakaian']);
		array_push($rere, $dat2);
	}
}

$data['BarChartData7']=json_encode($rere);
$data['BarChartTitle7']='Perbandingan antara penerimaan dan penggunaan darah O';

	//Visualisasi 5------------------------------------------------------------------------------------------5

$darah = [array('Tanggal','Rusak')];
$totalData=array();
foreach ($source as $row)
{
	$gol=($row['darah']);
	if($gol!='A')
	{
		$dat = array($row['bulan'],(double)$row['rusak']);
	}else{
		$dat = array($row['bulan'],(double)$row['rusak']);
		array_push($darah, $dat);
	}
}
$data['AkhirChartData']=json_encode($darah);
$data['AkhirChartTitle']= 'Data Darah Rusak';


	// view data
$this->load->view('Grafik',$data);
	}
}


