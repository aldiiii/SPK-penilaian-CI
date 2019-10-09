<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Periode Penilaian
 *
 * Updated  2018, 10 June 22:59
 *
 * @author  Indra Prasetya <indraprasetya154@gmail.com>
 *
 */

class Laporan extends MX_Controller
{

	function __construct()
	{

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->prefix 	= $this->db->dbprefix;
		$this->table 	= $this->prefix . "_calculate";
		$this->pkey 	= "calcualte_id";
		$this->join 	= $this->prefix ."_sys_user";
		$this->fkey 	= "user_id";
		$this->module 	= "laporan";
	}

	public function index()
	{

		$this->page();
	}

	public function page()
	{

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'list');
		$this->urlpattern->setQueryString();

		$data 	= array();
		$alert	= "";

		$msg 	= $this->session->flashdata('message');

		//alert
		if ($msg != '') {

			$alert 	= "
						<div class='alert alert-success'>
						    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						    <strong>SUCCESS !</strong> " . $msg . ".
						</div>
					";

			$this->session->set_flashdata('message', '');
		}

		$data['periode']	= $this->_dataModel->get_data($this->prefix.'_periode_penilaian', '', '', '', array('periode_id', 'DESC'), '');

		$data['alert'] 			= $alert;
		$data['param'] 			= '';

		$this->template->set('title', 'Laporan');
		$this->template->set('menu',  'laporan');
		$this->template->load('root', 'search', $data);
	}

	public function search()
	{

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'list');
		$this->urlpattern->setQueryString();

		$data 	= array();
		$param 	= $this->input->get('param');
		$getLast = $this->_dataModel->getDetail($this->prefix.'_periode_penilaian', 'periode_id', $param);
		$key = $getLast->nama_periode;

		$search = array('periode_id' => $param);

		//paggination
		$pagging_uri = 3;

		if ($this->uri->segment($pagging_uri)) {
			$start = $this->uri->segment($pagging_uri);
		} else {
			$start = 0;
		}

		$limit 			= 20;
		// $join 			= array($this->join, $this->join .'.'. $this->fkey .' = '. $this->table .'.'. $this->fkey, 'left');
		// $join2 			= array($this->join2, $this->join2 .'.'. $this->fkey2 .' = '. $this->table .'.'. $this->fkey2, 'left');

		//ambil data hasil akhir
		$data['datas']	= $this->_dataModel->get_data($this->prefix . '_v_calculate', $search, '', '', array('user_id', 'ASC'));

		//ambil data dari detial calculate
		$response = array();
		$getPeriode = $this->_dataModel->get_data($this->prefix . '_periode_penilaian', $search, '', '', array('periode_id', 'ASC	'));
		if (!empty($getPeriode)) {
			$userCalculate =  $this->_dataModel->get_data($this->prefix . '_v_detail_calculate', $search, '', '', array('kriteria_id', 'ASC	'),'','','user_id');
			
			if (!empty($userCalculate)) {
				foreach ($userCalculate as $uc) {
					$nilai = array();
					$search = array('periode_id' => $param, 'user_id' => $uc['user_id']);

					$nilaiCalculate =  $this->_dataModel->get_data($this->prefix . '_v_detail_calculate', $search, '', '', array('kriteria_id', 'ASC'));

					foreach ($nilaiCalculate as $n) {
						$nilai_temp = array(
							'score' => $n['score'],
							'pembagian' => $n['pembagian'],
							'hasil_bobot' => $n['hasil_bobot']
						);

						array_push($nilai, $nilai_temp);
					}

					$user = array(
						'user_name' => $uc['user_name'],
						'detail_nilai' => $nilai
					);

					array_push($response, $user);
				}
			}
		}

		//kriteria
		$kriteria	= $this->_dataModel->get_data($this->prefix.'_kriteria', '', '', '', array('kriteria_id', 'ASC'));
		//nilai max
		
		if ($kriteria) {
			$listmax = array();
			foreach ($kriteria as $k) {
				$search = array('periode_id' => $param, 'kriteria_id' => $k['kriteria_id']);
				$max = $this->_dataModel->getMaxList($this->prefix.'_detail_calculate', 'max', $search,'kriteria_id','kriteria_id');
				
				if ($max->num_rows() > 0) {
					foreach ($max->result() as $m) {
						$datamax = array(
							'score' => $m->max
						);

						array_push($listmax, $datamax);
					}
				}
			}
		}

		$data['kriteria'] = $kriteria;
		$data['max'] = $listmax;

		//hasil ambil laporan
		$data['alternatif_kriteria'] = $response;

		$config['base_url'] 	= site_url('laporan/search/');
		$config['suffix'] 		= "?key=" . $key . "&param=" . $param;
		$config['first_url'] 	= $config['base_url'] . $config['suffix'];
		$config['total_rows'] 	= $this->_dataModel->table_record_count;
		$config['per_page'] 	= $limit;
		$config['uri_segment'] 	= $pagging_uri;

		$this->pagination->initialize($config);

		$msg 	= "Hasil pencarian untuk ' <i>" . $key . "</i> '";
		$alert 	= "
					<div class='alert alert-success'>
					    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					    <strong>SUCCESS !</strong> " . $msg . ".
					</div>
				";

		$data['page_links']		= $this->pagination->create_links();
		$data['total'] 			= $this->_dataModel->table_record_count;
		$data['number'] 		= $start;
		$data['alert'] 			= $alert;
		$data['key'] 			= $key;
		$data['param'] 			= $param;

		$this->template->set('title', 'Periode Penilaian');
		$this->template->set('menu',  'laporan');
		$this->template->load('root', 'list', $data);
	}
}
