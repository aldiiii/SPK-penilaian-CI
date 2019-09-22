<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Jabatan Controller.
 *
 * Updated  2017, 3 Juni 11:10
 *
 * @author  Yudi Setiadi Permana <hi@yudipermana.com>
 *
 */

class Detailkriteria extends MX_Controller {

	function __construct(){

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->prefix 	= $this->db->dbprefix;
		$this->table 	= $this->prefix ."_detail_kriteria";
		$this->join 	= $this->prefix ."_kriteria";
		$this->pkey 	= "kriteria_detail_id";
		$this->fkey 	= "kriteria_id";
		$this->module 	= "detailkriteria";
		$this->id 		= $this->uri->segment(3);
		
	}

	public function index(){

		$this->page();		
		
	}

	public function page(){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'list');
		$this->urlpattern->setQueryString();

		$data 	= array();
		$alert	= "";

		$msg 	= $this->session->flashdata('message');

		//alert
		if($msg != ''){

			$alert 	= "
						<div class='alert alert-success'>
						    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						    <strong>SUCCESS !</strong> ". $msg .".
						</div>
					";

			$this->session->set_flashdata('message', '');

		}

		//paggination
		$pagging_uri = 4;

		if($this->uri->segment($pagging_uri)){
			$start = $this->uri->segment($pagging_uri);
		}
		else{
			$start = 0;
		}

		$where = $this->table.".kriteria_id = ".$this->id."";

		$limit 			= 20;
		$join 			= array($this->join, $this->join .'.'. $this->fkey .' = '. $this->table .'.'. $this->fkey, 'left');
		// $join2 			= array($this->join2, $this->join2 .'.'. $this->fkey2 .' = '. $this->table .'.'. $this->fkey2, 'left');
		$data['datas']	= $this->_dataModel->get_data($this->table, $where, $limit, $start, array('nama_detail_kriteria', 'ASC'), $join);
		// echo $this->db->last_query(); die;
		
		$config['base_url'] 	= site_url('detailkriteria/page/');
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

		$this->template->set('title', 'Detail Kriteria');
		$this->template->set('menu',  'detailkriteria');
		$this->template->load('root', 'list', $data);

	} 

	public function search(){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'list');
		$this->urlpattern->setQueryString();

		$data 	= array();
		$key 	= $this->input->get('key');
		$param 	= $this->input->get('param');

		$search = array($param => $key);

		//paggination
		$pagging_uri = 4;

		if($this->uri->segment($pagging_uri)){
			$start = $this->uri->segment($pagging_uri);
		}
		else{
			$start = 0;
		}
		$where = "'kriteria_id' = ".$this->id."";

		$limit 			= 20;
		$join 			= array($this->join, $this->join .'.'. $this->fkey .' = '. $this->table .'.'. $this->fkey, 'left');
		// $join2 			= array($this->join2, $this->join2 .'.'. $this->fkey2 .' = '. $this->table .'.'. $this->fkey2, 'left');
		$data['datas']	= $this->_dataModel->get_search($this->table, $search, $limit, $start, array('nama_detail_kriteria', 'ASC'), $where, $join);

		$config['base_url'] 	= site_url('detailkriteria/search/');
		$config['suffix'] 		= "?key=". $key ."&param=". $param;
		$config['first_url'] 	= $config['base_url'] . $config['suffix'];
		$config['total_rows'] 	= $this->_dataModel->table_record_count;
		$config['per_page'] 	= $limit;
		$config['uri_segment'] 	= $pagging_uri;

		$this->pagination->initialize($config);

		$msg 	= "Hasil pencarian untuk ' <i>". $key ."</i> '";
		$alert 	= "
					<div class='alert alert-success'>
					    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					    <strong>SUCCESS !</strong> ". $msg .".
					</div>
				";

		$data['page_links']		= $this->pagination->create_links();
		$data['total'] 			= $this->_dataModel->table_record_count;
		$data['number'] 		= $start;
		$data['alert'] 			= $alert;
		$data['key'] 			= $key;
		$data['param'] 			= $param;

		$this->template->set('title', 'Detail Kriteria');
		$this->template->set('menu',  'detailkriteria');
		$this->template->load('root', 'list', $data);

	} 

	public function add(){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'add');
		$this->urlpattern->resetQueryString();

		$id = $this->uri->segment(3);
		
		$data 	= array();
		$data['id_kriteria'] = $id;

		if ($this->input->post('submit')) {

			$nama_detail_kriteria = $this->input->post('nama_detail_kriteria');
			$id_kriteria = $this->input->post('id_kriteria');
			$date			= date('Y-m-d H:i:s');

			$value 	= array(
				'nama_detail_kriteria'	 		=> $nama_detail_kriteria,
				'kriteria_id'	 		=> $id_kriteria,
				'created_at' => $date,
				'updated_at' => $date
			);

			$res 	= $this->_dataModel->insert($this->table, $value);

			if ($res) {

				$msg = "Detail kriteria berhasil ditambahkan";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('detailkriteria/index/').$id_kriteria);
			}
		}

		$this->template->set('title', 'Tambah Detail Kriteria');
		$this->template->set('menu',  'detailkriteria');
		$this->template->load('root', 'add', $data);

	}

	public function edit($id, $kriteria_id){
		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'edit');
		$this->urlpattern->resetQueryString();

		$data 	= array();
		$detail = $this->_dataModel->getDetail($this->table, $this->pkey, $id);
		$data['kriteria_id'] 		= $kriteria_id;

		//check data
		if (!$detail) {
			echo "
				<script type='text/javascript'>
					alert('Data yang dimaksud tidak sersedia');
					document.location = '". $this->urlpattern->getRedirect() ."';
				</script>
			";

			exit;
		}

		if($this->input->post('submit')){

			$nama_detail_kriteria = $this->input->post('nama_detail_kriteria');
			$date			= date('Y-m-d H:i:s');
			
			$value 	= array(
				'nama_detail_kriteria'	 		=> $nama_detail_kriteria,
				'updated_at' => $date
			);

			$res 	= $this->_dataModel->update($this->table, $this->pkey, $id, $value);

			if($res){

				$msg = "detailkriteria berhasil ditambahkan";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('detailkriteria/index/').$kriteria_id);

			}
		}

		$data['data'] 		= $detail;

		$this->template->set('title', 'Ubah Detail Kriteria');
		$this->template->set('menu',  'detailkriteria');
		$this->template->load('root', 'edit', $data);

	}

	public function delete($id, $kriteria_id){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'delete');
		$this->urlpattern->resetQueryString();

		$detail = $this->_dataModel->getDetail($this->table, $this->pkey, $id);

		//check data
		if (!$detail) {
			echo "
				<script type='text/javascript'>
					alert('Data yang dimaksud tidak sersedia');
					document.location = '". $this->urlpattern->getRedirect() ."';
				</script>
			";

			exit;
		}

		$res 	= $this->_dataModel->delete($this->table, $this->pkey, $id);

		if($res){

			$msg = "detailkriteria berhasil dihapus";

			$this->session->set_flashdata('message', $msg);

			// redirect($this->urlpattern->getRedirect());
			redirect(site_url('detailkriteria/index/').$kriteria_id);

		}

	}

}
