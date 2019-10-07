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

class Periodepenilaian extends MX_Controller
{

	function __construct()
	{

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->prefix 	= $this->db->dbprefix;
		$this->table 	= $this->prefix . "_periode_penilaian";
		$this->pkey 	= "periode_id";
		$this->join 	= $this->prefix ."_sys_user";
		$this->fkey 	= "user_id";
		$this->module 	= "periodepenilaian";
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
		$join 			= array($this->join, $this->join .'.'. $this->fkey .' = '. $this->table .'.'. $this->fkey, 'left');
		// $join2 			= array($this->join2, $this->join2 .'.'. $this->fkey2 .' = '. $this->table .'.'. $this->fkey2, 'left');
		$data['datas']	= $this->_dataModel->get_data($this->table, '', $limit, $start, array('periode_id', 'DESC'), $join);
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

		$this->template->set('title', 'Periode Penilaian');
		$this->template->set('menu',  'periodepenilaian');
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
		$join 			= array($this->join, $this->join .'.'. $this->fkey .' = '. $this->table .'.'. $this->fkey, 'left');
		// $join2 			= array($this->join2, $this->join2 .'.'. $this->fkey2 .' = '. $this->table .'.'. $this->fkey2, 'left');
		$data['datas']	= $this->_dataModel->get_search($this->table, $search, $limit, $start, array('periode_id', 'DESC'), '', $join);

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

		$this->template->set('title', 'Periode Penilaian');
		$this->template->set('menu',  'periodepenilaian');
		$this->template->load('root', 'list', $data);
	}

	public function add()
	{
		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'add');
		$this->urlpattern->resetQueryString();

		$data 	= array();

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
				'created_at' => $date,
				'updated_at' => $date
			);

			$res 	= $this->_dataModel->insert($this->table, $value);

			if ($res) {

				$msg = "Periode Penilaian berhasil ditambahkan";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('periodepenilaian'));
			}
		}

		$this->template->set('title', 'Tambah Periode Penilaian');
		$this->template->set('menu',  'periodepenilaian');
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
		$this->template->set('menu',  'periodepenilaian');
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

	public function calculate($id) {
		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'delete');
		$this->urlpattern->resetQueryString();

		$detail = $this->_dataModel->getDetail($this->table, $this->pkey, $id);

		//check data
		if (!$detail) {
			echo $this->reject_calculate();
			exit;
		}

		//cek kalkulasi sudah ada apa tidak?
		$checkAvailable = $this->_dataModel->getLastData($this->prefix.'_calculate', 'periode_id');

		$calculate = array();
		if ($checkAvailable->num_rows() === 0) { //check available period
			$where = array('user_level_id' => '3'); //set id penutur
			$getPenutur = $this->_dataModel->getList($this->prefix . '_sys_user', $where, array('user_id', 'ASC'), '', '');
			
			if (!empty($getPenutur)) { //get all user
				foreach ($getPenutur as $penutur) {
					//ambil semua kriteria
					$getKriteria = $this->_dataModel->getList($this->prefix . '_kriteria', '', array('kriteria_id', 'ASC'), '', '');
					
					if (!empty($getKriteria)) {
						$data_nilai = array();
						$total = 0;
						foreach ($getKriteria as $_kriteria) { //looping kriteria
							$where = array('periode_id' => $detail->periode_id, 'target_user_id' => $penutur['user_id'], 'kriteria_id' => $_kriteria['kriteria_id']);
							$getNilai = $this->_dataModel->getList($this->prefix . '_penilaian', $where, array('kriteria_id', 'ASC'), '', '');

							$raw_score = 0;
							if (empty($getNilai)) { //user already assessment
								echo $this->reject_calculate();
								exit;
							} else { //all user not yet assessment
								foreach ($getNilai as $nilai) {
									
									$raw_score += $nilai['score']; //masukan nilai kedalam data score (dijumlahkan)
								}

								//perhitungan dan hasil
								$score = number_format(($raw_score/count($getNilai)),1); //matrix alternatif
								$where = array('periode_id' => $detail->periode_id, 'kriteria_id' => $_kriteria['kriteria_id']);
								
								$getMax = $this->_dataModel->getMax($this->prefix.'_penilaian', $where); //nilai maximum
								$pembagian = number_format(($score/$getMax[0]['score']), 1); //MATRIX TERNORMALISASI
								$hasil_bobot = number_format(($pembagian*$_kriteria['bobot']), 1); //metode saw pembagian bobot
								$total += $hasil_bobot; // jumlah hasil metode saw
							}

							//hasil dari perhitungan
							$temp_nilai = array(
								'kriteria_id' => $_kriteria['kriteria_id'],
								'nama' => $_kriteria['nama'],
								'bobot' => $_kriteria['bobot'],
								'score' => $score,
								'max' => $getMax[0]['score'],
								'pembagian' => $pembagian,
								'hasil_bobot' => $hasil_bobot
							);

							array_push($data_nilai, $temp_nilai); //hasil pehitungan dimasukan kedalam array
						}

						$total = number_format($total, 1);
						$label = $this->label_calculate($total);
			
						//data user yang telah terhitung
						$temp_user = array(
							'user_name' => $penutur['user_name'],
							'user_id' => $penutur['user_id'],
							'periode_id' => $detail->periode_id,
							'total' => $total,
							'label' => $label,
							'nilai' => $data_nilai, //nilai hasil perhitungan
						);

						array_push($calculate, $temp_user);

					}  else { //kriteria not found
						echo $this->reject_calculate();
						exit;
					}
				}

			} else { //user not found
				echo $this->reject_calculate();
				exit;
			}
			
		} else { //period not found
			echo $this->reject_calculate();
			exit;
		}

		$insert_calculate = $this->insert_calculate($calculate); //hasil hitung dimasukan ke database

		if ($insert_calculate) {

			$msg = "Periode Penilaian berhasil dihitung";

			$this->session->set_flashdata('message', $msg);

			// redirect($this->urlpattern->getRedirect());
			redirect(site_url('periodepenilaian'));
		}
	}

	//keterangan hasil kalkulasi
	public function label_calculate($total) {
		if ($total >= 3.5 && $total <= 4) {
			return 'Sangat Baik';
		}
		if ($total>= 3.0 && $total <= 3.4) {
			return 'Baik';
		}
		if ($total >= 2.5 && $total <= 2.9) {
			return 'Cukup';
		}
		if ($total < 2.5) {
			return 'Kurang';
		}
	}

	//data dimasukan kedalam database
	public function insert_calculate($data) {
		$date = date('Y-m-d H:i:s');
		foreach ($data as $_data) {
			$value = array(
				'periode_id' => $_data['periode_id'],
				'user_id' => $_data['user_id'],
				'total' => $_data['total'],
				'label' => $_data['label'],
				'created_at' => $date,
				'updated_at' => $date
			);

			//table spk_calculate
			$insert = $this->_dataModel->insert($this->prefix.'_calculate', $value);

			if ($insert) {
				$caclulate_id = $this->db->insert_id(); //ambil id terakhir
				
				foreach ($_data['nilai'] as $_nilai) {
					$detail = array(
						'calculate_id' => $caclulate_id,
						'user_id' => $_data['user_id'],
						'kriteria_id' => $_nilai['kriteria_id'],
						'periode_id' => $_data['periode_id'],
						'score' => $_nilai['score'],
						'bobot' => $_nilai['bobot'],
						'max' => $_nilai['max'],
						'pembagian' => $_nilai['pembagian'],
						'hasil_bobot' => $_nilai['hasil_bobot'],
					);

					//table spk_detail_calculate
					$insert = $this->_dataModel->insert($this->prefix.'_detail_calculate', $detail);		

				}
			}
		}

		return true;
	}

	//fungsi untuk memberi tau kalau sudah dihitung / tidak bisa dihitung
	public function reject_calculate() {
		$response = "
				<script type='text/javascript'>
					alert('Data tidak dapat dikalkulasi, silahkan cek kembali');
					document.location = '" . $this->urlpattern->getRedirect() . "';
				</script>
			";

		return $response;
	}
}
