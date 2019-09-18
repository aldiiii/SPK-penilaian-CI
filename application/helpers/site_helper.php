<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//extract number from currency to integer
function extract_numbers($string)
{
	return preg_replace("/[^0-9]/", '', $string);
}


function getLastID($table, $pkey, $param, $type)
{

	$CI = &get_instance();
	$lastID	= $CI->db->query("SELECT $param as code FROM $table order by $pkey desc LIMIT 1");

	$numberCode = 0;
	if ($lastID->num_rows() > 0) {
		$code = explode('/', $lastID->row()->code);
		$numberCode = $code[0]; //get code number from long code
	}

	$company    = 'NR';
	$month      = date('m');
	$year       = date('Y');

	$numberID = (int) $numberCode; //last number  
	$numberID++;
	$numberID = sprintf("%05s", $numberID); //generate number

	$newID = $numberID . '/' . $company . '/' . $type . '/' . $month . '/' . $year; //generate long code

	return $newID;
}

function penyebut($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = penyebut($nilai - 10) . " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
	}
	return $temp;
}

function terbilang($nilai)
{
	if ($nilai < 0) {
		$hasil = "minus " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil;
}
