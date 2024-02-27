<?php 

function tanggal_indonesia($tanggal){
	if (DateTime::createFromFormat('Y-m-d', $tanggal) !== FALSE) {	
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$potong_tanggal = $tanggal;
	$potong_tanggal = explode('-', $potong_tanggal);
	
	return $potong_tanggal[2] . ' ' . $bulan[ (int)$potong_tanggal[1] ] . ' ' . $potong_tanggal[0];
	}else{
		return "";
	}
}

function tanggal_dan_waktu_24_jam_indonesia($tanggal_dan_waktu){
	
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$potong_tanggal = $tanggal_dan_waktu;
	$potong_tanggal = substr($potong_tanggal, 0,11);
	$potong_tanggal = explode('-', $potong_tanggal);


	$potong_waktu = $tanggal_dan_waktu;
	$potong_waktu = substr($potong_waktu, 11,8);
	
	return $potong_tanggal[2] . ' ' . $bulan[ (int)$potong_tanggal[1] ] . ' ' . $potong_tanggal[0] . ' - ' . substr($potong_waktu, 0,5);
	
}

function tanggal_tipe_1($tanggal){
	if (DateTime::createFromFormat('Y-m-d', $tanggal) !== FALSE) {	
	"2020-02-02";
	$pilih_tanggal = substr($tanggal, 8,2);
	$pilih_bulan = substr($tanggal, 5,2);
	$pilih_tahun = substr($tanggal, 0,4);
	return $pilih_tanggal."/".$pilih_bulan."/".$pilih_tahun;
	}else{
		return "";
	}
}

?>