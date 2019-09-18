<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sysmodule Controller.
 *
 * Updated  2017, 2 Juni 11:10
 *
 * @author  Yudi Setiadi Permana <hi@yudipermana.com>
 *
 */

class Sysmodule extends MX_Controller {

	function __construct(){

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->prefix 	= $this->db->dbprefix;
		$this->table 	= $this->prefix ."_sys_module";
		$this->pkey 	= "module_id";
		$this->module 	= "sysmodule";
		
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
		$pagging_uri = 3;

		if($this->uri->segment($pagging_uri)){
			$start = $this->uri->segment($pagging_uri);
		}
		else{
			$start = 0;
		}

		$limit 			= 20;
		$data['datas']	= $this->_dataModel->get_data($this->table, '', $limit, $start, array('module_name', 'ASC'));

		$config['base_url'] 	= site_url('sysmodule/page/');
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

		$this->template->set('title', 'Sistem Module');
		$this->template->set('menu',  'module');
		$this->template->load('root', 'list_module', $data);

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
		$pagging_uri = 3;

		if($this->uri->segment($pagging_uri)){
			$start = $this->uri->segment($pagging_uri);
		}
		else{
			$start = 0;
		}

		$limit 			= 20;
		$data['datas']	= $this->_dataModel->get_search($this->table, $search, $limit, $start, array('module_name', 'ASC'));

		$config['base_url'] 	= site_url('sysmodule/search/');
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
					    <strong>SUKSES !</strong> ". $msg .".
					</div>
				";

		$data['page_links']		= $this->pagination->create_links();
		$data['total'] 			= $this->_dataModel->table_record_count;
		$data['number'] 		= $start;
		$data['alert'] 			= $alert;
		$data['key'] 			= $key;
		$data['param'] 			= $param;

		$this->template->set('title', 'Sistem Module');
		$this->template->set('menu',  'module');
		$this->template->load('root', 'list_module', $data);

	} 

	public function add(){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'add');
		$this->urlpattern->resetQueryString();

		$data 	= array();

		if($this->input->post('submit')){

			$module	= $this->input->post('module');
			$module = str_replace(' ', '', $module);

			$value 	= array(
						'module_name' 	=> $module
					);

			$res 	= $this->_dataModel->insert($this->table, $value);

			if($res){

				$msg = "Module berhasil ditambahkan";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('sysmodule'));

			}

		}

		$this->template->set('title', 'Sistem Module');
		$this->template->set('menu',  'module');
		$this->template->load('root', 'add_module', $data);

	}

	public function edit($id){

		//auth
		$this->auth->authorize($this->system['userData'], 'syslevel', 'edit');
		$this->urlpattern->resetQueryString();

		$data 	= array();
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

		if($this->input->post('submit')){

			$module	= $this->input->post('module');
			$module = str_replace(' ', '', $module);

			$value 	= array(
						'module_name' 	=> $module
					);

			$res 	= $this->_dataModel->update($this->table, $this->pkey, $id, $value);

			if($res){

				$msg = "Module berhasil diubah";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('sysmodule'));

			}

		}

		$data['data'] = $detail;

		$this->template->set('title', 'Sistem Module');
		$this->template->set('menu',  'module');
		$this->template->load('root', 'edit_module', $data);

	}

	public function delete($id){

		//auth
		$this->auth->authorize($this->system['userData'], 'syslevel', 'delete');
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

			$msg = "Module berhasil dihapus";

			$this->session->set_flashdata('message', $msg);

			// redirect($this->urlpattern->getRedirect());
			redirect(site_url('sysmodule'));

		}

	}

}
