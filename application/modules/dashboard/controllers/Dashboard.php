<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Controller.
 *
 * Updated  2018, 1 April 11:10
 *
 * @author  Yudi Setiadi Permana <hi@yudipermana.com>
 *
 */

class Dashboard extends MX_Controller {

	function __construct(){

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->module 	= "dashboard";
		$this->prefix 	= $this->db->dbprefix;

		$this->date 	= new Datename();

	}

	public function index(){

		$this->auth->authorize($this->system['userData'], $this->module, 'view');

		$data 	= array();

		$search = '';

		$data['penutur'] = $this->_dataModel->count_data($this->prefix.'_sys_user', 'user_level_id = 3');
		$data['kriteria'] = $this->_dataModel->count_data($this->prefix.'_kriteria');
		$data['nilai'] = $this->_dataModel->count_data($this->prefix.'_calculate');
		
		// $response = array();
		// $getPeriode = $this->_dataModel->get_data($this->prefix . '_periode_penilaian', $search, '', '', array('periode_id', 'ASC	'));
		// if (!empty($getPeriode)) {
		// 	foreach ($getPeriode as $periode) {
		// 		$nilai = array();
		// 		$calculate =  $this->_dataModel->get_data($this->prefix . '_v_calculate', $search, '', '', array('user_id', 'ASC	'),'','','');
				
		// 		if (!empty($calculate)) {
		// 			foreach ($calculate as $c) {
	
		// 				$nilai_temp = (int) $c['total'];
	
		// 				array_push($nilai, $nilai_temp);
		// 			}
		// 		}

		// 		$periode_temp = array(
		// 			'nama' => $periode['nama_periode'], 
		// 			'data' => $nilai
		// 		);

		// 		array_push($response, $periode_temp);
		// 	}
			
		// }

		// $data['data'] = json_encode($response);


		$periode = [];
		$getPeriode = $this->_dataModel->get_data($this->prefix . '_periode_penilaian', $search, '', '', array('periode_id', 'ASC	'));
		if (!empty($getPeriode)) {
			foreach ($getPeriode as $p) {
				$periode[] = $p['nama_periode'];
			}
		}

		$nilai_chart = [];
		if ($search == '') {
			$getAverageCalculate = $this->_dataModel->getAvgList($this->prefix.'_calculate', 'total', $search,'periode_id','periode_id');
			
			if (!empty($getAverageCalculate)) {
				foreach ($getAverageCalculate as $ac) {
					$nilai_chart[] = (float) number_format($ac['nilai'], 1);
				}
			}
		}

		$data['periode'] = $periode;
		$data['nilai_chart'] = $nilai_chart;
		$this->template->set('title', 	'Beranda');
		$this->template->set('menu',  	'dashboard');
		$this->template->load('root', 	'dashboard', $data);

	}

}
