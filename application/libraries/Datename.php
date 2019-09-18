<?php 

/**
 * Date PHP Libraries Function.
 *
 * Updated  2016, 18 Mei 08:55
 *
 * @author  Yudi Setiadi Permana <mail@yspermana.my.id>
 *
 */

class Datename{
	
	public function __construct(){
		
	}

	public function dateEng($date){ 

		$day 	= substr($date,8,2); 
		$month 	= $this->getMonth(substr($date,5,2)); 
		$year 	= substr($date,0,4); 
		
		return $day.' '.$month.' '.$year; 
	} 

	public function dateEngFull($date){ 

		$day 	= substr($date,8,2); 
		$month 	= $this->getMonth(substr($date,5,2)); 
		$year 	= substr($date,0,4); 
		$time 	= substr($date, 11,5);
		
		return $day.' '.$month.' '.$year.'  '. $time;
	} 

	public function getMonth($month){ 
		switch ($month){ 
			case 1: 	return "January"; 	break; 
			case 2: 	return "February"; 	break; 
			case 3: 	return "March"; 	break; 
			case 4: 	return "April"; 	break; 
			case 5: 	return "May"; 		break;
			case 6: 	return "June"; 		break; 
			case 7: 	return "July"; 		break; 
			case 8: 	return "August"; 	break; 
			case 9: 	return "September"; break; 
			case 10:	return "October"; 	break; 
			case 11: 	return "November"; 	break; 
			case 12: 	return "December"; 	break; 
		}
	} 

	public function dateEngShort($date){ 

		$day 	= substr($date,8,2); 
		$month 	= $this->getMonthShort(substr($date,5,2)); 
		$year 	= substr($date,0,4); 
		
		return $day.' '.$month.' '.$year; 
	} 

	public function getMonthShort($month){ 
		switch ($month){ 
			case 1: 	return "Jan"; 	break; 
			case 2: 	return "Feb"; 	break; 
			case 3: 	return "Mar"; 	break; 
			case 4: 	return "Apr"; 	break; 
			case 5: 	return "May"; 	break;
			case 6: 	return "Jun"; 	break; 
			case 7: 	return "Jul"; 	break; 
			case 8: 	return "Aug"; 	break; 
			case 9: 	return "Sep"; 	break; 
			case 10:	return "Oct"; 	break; 
			case 11: 	return "Nov"; 	break; 
			case 12: 	return "Dec"; 	break; 
		}
	}

	public function getDay($day){ 
		switch ($day){ 
			case 1: 	return "Monday"; 	break; 
			case 2: 	return "Tuesday"; 	break; 
			case 3: 	return "Wednesday"; break; 
			case 4: 	return "Thursday"; 	break; 
			case 5: 	return "Friday"; 	break;
			case 6: 	return "Saturday"; 	break; 
			case 7: 	return "Sunday"; 	break; 
		}
	}

	public function dateIn($tgl){ 

		$tanggal 	= substr($tgl,8,2); 
		$bulan 		= $this->getBulan(substr($tgl,5,2)); 
		$tahun 		= substr($tgl,0,4); 
		
		return $tanggal.' '.$bulan.' '.$tahun; 
	} 

	public function dateInFull($tgl){ 

		$tanggal 	= substr($tgl,8,2); 
		$bulan 		= $this->getBulan(substr($tgl,5,2)); 
		$tahun 		= substr($tgl,0,4); 
		$waktu 		= substr($tgl, 11,5);
		
		return $tanggal.' '.$bulan.' '.$tahun.' '. $waktu; 
	} 

	public function getBulan($bln){ 
		switch ($bln){ 
			case 1: 	return "Januari"; 	break; 
			case 2: 	return "Februari"; 	break; 
			case 3: 	return "Maret"; 	break; 
			case 4: 	return "April"; 	break; 
			case 5: 	return "Mei"; 		break;
			case 6: 	return "Juni"; 		break; 
			case 7: 	return "Juli"; 		break; 
			case 8: 	return "Agustus"; 	break; 
			case 9: 	return "September"; break; 
			case 10:	return "Oktober"; 	break; 
			case 11: 	return "November"; 	break; 
			case 12: 	return "Desember"; 	break; 
		}
	}

	public function dateNum($date){ 

		$day 	= substr($date,8,2); 
		$month 	= substr($date,5,2); 
		$year 	= substr($date,0,4); 
		
		return $day.'/'.$month.'/'.$year; 
	} 

	public function dateNumFull($date){ 

		$day 	= substr($date,8,2); 
		$month 	= substr($date,5,2); 
		$year 	= substr($date,0,4); 
		$time 	= substr($date, 11,5);
		
		return $day.'/'.$month.'/'.$year.' '. $time;
	}

	public function getHari($hari){ 
		switch ($hari){ 
			case 1: 	return "Senin"; 	break; 
			case 2: 	return "Selasa"; 	break; 
			case 3: 	return "Rabu"; 		break; 
			case 4: 	return "Kamis"; 	break; 
			case 5: 	return "Jumat"; 	break;
			case 6: 	return "Sabtu"; 	break; 
			case 7: 	return "Minggu"; 	break; 
		}
	}
}
 

?>