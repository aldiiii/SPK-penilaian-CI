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

class Penilaian extends MX_Controller
{

	function __construct()
	{

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->prefix 	= $this->db->dbprefix;
		$this->table 	= $this->prefix . "_penilaian";
		$this->pkey 	= "periode_id";
		$this->join 	= $this->prefix ."_sys_user";
		$this->fkey 	= "user_id";
		$this->module 	= "periodepenilaian";
		$this->view 	= '_v_penilaian';
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
		$response = array();

		$getPeriode	= $this->_dataModel->get_data($this->prefix . '_periode_penilaian', '', '', '', array('periode_id', 'ASC	'));
		if (!empty($getPeriode)) {
			foreach ($getPeriode as $periode) {
				$where = array('periode_id' => $periode['periode_id'], 'user_id' => $this->auth->user()['id']);
				$getUserPeriode = $this->_dataModel->getList($this->prefix . '_v_penilaian', $where, array('kriteria_id', 'ASC'), 'target_user_id', '');
				
				$detail = array();
				if (!empty($getUserPeriode)) {
					foreach ($getUserPeriode as $userperiode) {
						$where = array('periode_id' => $periode['periode_id'], 'user_id' => $this->auth->user()['id'], 'target_user_id' => $userperiode['target_user_id']);
						$getNilai = $this->_dataModel->getList($this->prefix . '_penilaian', $where, array('kriteria_id', 'ASC'), '', '');
						$nilai = array();
		
						if (!empty($getNilai)) {
							foreach ($getNilai as $o_res) {
								$value_option = array(
									'kriteria_id' => $o_res['kriteria_id'],
									'score' => $o_res['score'],
								);
		
								array_push($nilai, $value_option);
							}
						}

						$user = array(
							'target_user_name' => $userperiode['target_user_name'],
							'nilai' => $nilai,
						);

						array_push($detail, $user);
					}
				}

				$value = array(
					'periode_id' => $periode['periode_id'],
					'nama_periode' => $periode['nama_periode'],
					'detail' => $detail
				);

				array_push($response, $value);
			}
		}

		$data['kriteria'] = $this->_dataModel->getList($this->prefix . '_kriteria', '', array('kriteria_id', 'ASC'), '', '');
		
		$data['datas'] = $response;
		// $data['datas']	= $this->_dataModel->get_data($this->view, '', $limit, $start, array('periode_id', 'DESC'), '');
		// echo $this->db->last_query(); die;

		$config['base_url'] 	= site_url('periodepenilaian/page/');
		$config['total_rows'] 	= $this->_dataModel->table_record_count;
		$config['per_page'] 	= $limit;
		$config['uri_segment'] 	= $pagging_uri;

		$this->pagination->initialize($config);

		$data['page_links']		= $this->pagination->create_links();
		$data['total'] 			= $this->_dataModel->table_record_count;
		$data['number'] 		= $start;
		$data['alert'] 			= $alert;
		$data['key'] 			= '';
		$data['param'] 			= '';

		$this->template->set('title', 'Penilaian');
		$this->template->set('menu',  'penilaian');
		$this->template->load('root', 'list', $data);
	}

	public function search()
	{

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'list');
		$this->urlpattern->setQueryString();

		$data 	= array();
		$key 	= $this->input->get('key');
		$param 	= $this->input->get('param');

		$search = array($param => $key);

		//paggination
		$pagging_uri = 3;

		if ($this->uri->segment($pagging_uri)) {
			$start = $this->uri->segment($pagging_uri);
		} else {
			$start = 0;
		}

		$limit 			= 20;
		// $join 			= array($this->join, $this->join .'.'. $this->fkey .' = '. $this->view .'.'. $this->fkey, 'left');
		// $join2 			= array($this->join2, $this->join2 .'.'. $this->fkey2 .' = '. $this->view .'.'. $this->fkey2, 'left');
		$data['datas']	= $this->_dataModel->get_search($this->view, $search, $limit, $start, array('periode_id', 'DESC'), '', '');

		$config['base_url'] 	= site_url('periodepenilaian/search/');
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

		$this->template->set('title', 'Penilaian');
		$this->template->set('menu',  'penilaian');
		$this->template->load('root', 'list', $data);
	}

	public function add()
	{
		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'add');
		$this->urlpattern->resetQueryString();

		$data 	= array();

		if ($this->input->post('submit')) {

			// echo json_encode($this->input->post()); die;

			$periode_id = $this->input->post('periode_id');
			$penutur_id = $this->input->post('penutur_id');
			$point = $this->input->post('point');
			$date = date('Y-m-d H:i:s');

			foreach ($point as $key => $value) {
				# code...
				$user = array(
					'user_id' => $this->auth->user()['id'],
					'target_user_id' => $penutur_id,
					'periode_id' => $periode_id,
					'kriteria_id' => $key,
					'created_at' => $date,
					'updated_at' => $date,
				);
				
				$input 	= $this->_dataModel->insert($this->table, $user);
				$penilaian_id = $this->db->insert_id();
					
				$index = 0;
				$count = count($value);
				$score = 0;
				foreach ($value as $respon) {
					# code...
					$explode = explode(',', $respon);
					$is_point = $explode[0];
					$detail_kriteria = $explode[1];
	
					$input = array(
						'penilaian_id' => $penilaian_id,
						'kriteria_id' => $key,
						'kriteria_detail_id' => $detail_kriteria,
						'point' => $is_point,
						'created_at' => $date,
						'updated_at' => $date,
					);
	
	
					$input 	= $this->_dataModel->insert('spk_penilaian_respon', $input);
					
					$score += $is_point; 
					$index++;
				}
				if ($index == $count) {
					$is_score = $score/$count;
					$update_score['score'] = $is_score;
	
					$update = $this->_dataModel->update($this->table, 'penilaian_id', $penilaian_id, $update_score);
				}

			}

			if ($update) {

				$msg = "Periode Penilaian berhasil ditambahkan";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('penilaian'));
			}
		}

		$response = array();

		$where = "status = 1";
		$getKriteria	= $this->_dataModel->get_data($this->prefix . '_kriteria', $where, '', '', array('kriteria_id', 'DESC'));
		if (!empty($getKriteria)) {
			foreach ($getKriteria as $kriteria) {
				$where = array('kriteria_id' => $kriteria['kriteria_id']);
				$getOption = $this->_dataModel->getList($this->prefix . '_detail_kriteria', $where, array('kriteria_detail_id', 'ASC'), '', '');
				$option = array();

				if (!empty($getOption)) {
					foreach ($getOption as $o_res) {
						$value_option = array(
							'kriteria_detail_id' => $o_res['kriteria_detail_id'],
							'nama_detail_kriteria' => $o_res['nama_detail_kriteria'],
						);

						array_push($option, $value_option);
					}
				}

				$value_question = array(
					'kriteria_id' => $kriteria['kriteria_id'],
					'nama' => $kriteria['nama'],
					'bobot' => $kriteria['bobot'],
					'kode' => $kriteria['kode'],
					'status' => $kriteria['status'],
					'detail' => $option
				);

				array_push($response, $value_question);
			}
		}


		$data['kriteria'] = $response;
		
		$getPeriode = $this->_dataModel->getList($this->prefix.'_periode_penilaian', '', array('periode_id', 'DESC'));
		$periode = "";

		if ($getPeriode) {
			foreach ($getPeriode as $result) { 
				$periode .= "<option value='". $result['periode_id'] ."'>". $result['nama_periode'] ." (".$result['tanggal_mulai']." - ".$result['tanggal_selesai'].")</option>";
			}
		}

		$getPenutur = $this->_dataModel->getList($this->prefix.'_sys_user', 'user_level_id = 3', array('user_name', 'ASC'));
		$penutur = "";

		if ($getPenutur) {
			foreach ($getPenutur as $result) { 
				$penutur .= "<option value='". $result['user_id'] ."'>". $result['user_name'] ."</option>";
			}
		}

		$data['penutur'] 	= $penutur;
		$data['periode'] 	= $periode;

		$this->template->set('title', 'Tambah Periode Penilaian');
		$this->template->set('menu',  'penilaian');
		$this->template->load('root', 'add', $data);
	}

	public function edit($id)
	{

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'edit');
		$this->urlpattern->resetQueryString();

		$data 	= array();
		$detail = $this->_dataModel->getDetail($this->table, $this->pkey, $id);

		//check data
		if (!$detail) {
			echo "
				<script type='text/javascript'>
					alert('Data yang dimaksud tidak sersedia');
					document.location = '" . $this->urlpattern->getRedirect() . "';
				</script>
			";

			exit;
		}

		if ($this->input->post('submit')) {

			$nama_periode = $this->input->post('nama_periode');
			$tanggal_mulai = $this->input->post('tanggal_mulai');
			$tanggal_selesai = $this->input->post('tanggal_selesai');
			$date			= date('Y-m-d H:i:s');

			$value 	= array(
				'nama_periode'	 		=> $nama_periode,
				'tanggal_mulai'	 		=> $tanggal_mulai,
				'tanggal_selesai'		=> $tanggal_selesai,
				'user_id'				=> $this->auth->user()['id'],
				'updated_at' => $date
			);

			$res 	= $this->_dataModel->update($this->table, $this->pkey, $id, $value);

			if ($res) {

				$msg = "Periode Penilaian berhasil diubah";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('periodepenilaian'));
			}
		}

		$data['data'] 		= $detail;

		$this->template->set('title', 'Ubah Periode Penilaian');
		$this->template->set('menu',  'penilaian');
		$this->template->load('root', 'edit', $data);
	}

	public function delete($id)
	{

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'delete');
		$this->urlpattern->resetQueryString();

		$detail = $this->_dataModel->getDetail($this->table, $this->pkey, $id);

		//check data
		if (!$detail) {
			echo "
				<script type='text/javascript'>
					alert('Data yang dimaksud tidak sersedia');
					document.location = '" . $this->urlpattern->getRedirect() . "';
				</script>
			";

			exit;
		}

		$res 	= $this->_dataModel->delete($this->table, $this->pkey, $id);

		if ($res) {

			$msg = "Periode Penilaian berhasil dihapus";

			$this->session->set_flashdata('message', $msg);

			// redirect($this->urlpattern->getRedirect());
			redirect(site_url('periodepenilaian'));
		}
	}
}
