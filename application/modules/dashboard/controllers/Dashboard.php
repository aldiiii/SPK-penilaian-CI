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

		$param = '';
		$search = '';
		if ($this->input->get('param')) {
			$param 	= $this->input->get('param');
			$search = array('user_id' => $param);
		}

		$data['jumlah_penutur'] = $this->_dataModel->count_data($this->prefix.'_sys_user', 'user_level_id = 3');
		$data['jumlah_kriteria'] = $this->_dataModel->count_data($this->prefix.'_kriteria');
		$data['jumlah_nilai'] = $this->_dataModel->count_data($this->prefix.'_calculate');

		//ambil periode
		$periode = [];
		$getPeriode = $this->_dataModel->get_data($this->prefix . '_periode_penilaian', '', '', '', array('periode_id', 'ASC'));
		if (!empty($getPeriode)) {
			foreach ($getPeriode as $p) {
				$periode[] = $p['nama_periode'];
			}
		}

		//nilai hasil pehitungan, jika tidak ada nama penutur maka menagmbil nilai rata rata dari keseluruhan
		$nilai_chart = [];
		if ($search == '') {
			$getAverageCalculate = $this->_dataModel->getAvgList($this->prefix.'_calculate', 'total', $search,'periode_id','periode_id');
			
			if (!empty($getAverageCalculate)) {
				foreach ($getAverageCalculate as $ac) {
					$nilai_chart[] = (float) number_format($ac['nilai'], 1);
				}
			}
		} else {
			$calculate =  $this->_dataModel->get_data($this->prefix . '_v_calculate', $search, '', '', array('periode_id', 'ASC	'));
				
			if (!empty($calculate)) {
				foreach ($calculate as $ac) {

					$nilai_chart[] = (float) number_format($ac['total'], 1);
				}
			}
		}

		$data['periode'] = $periode;
		$data['nilai_chart'] = $nilai_chart;

		//tampilkan penutur
		$getPenutur = $this->_dataModel->getList($this->prefix.'_sys_user', 'user_level_id = 3', array('user_name', 'ASC'));
		$penutur = "";

		if ($getPenutur) {
			foreach ($getPenutur as $result) { 
				$selected = ($result['user_id'] == $param) ? 'selected' : '';
				$penutur .= "<option value='". $result['user_id'] ."' $selected>". $result['user_name'] ."</option>";
			}
		}

		$data['penutur'] 	= $penutur;

		$this->template->set('title', 	'Beranda');
		$this->template->set('menu',  	'dashboard');
		$this->template->load('root', 	'dashboard', $data);

	}

}
