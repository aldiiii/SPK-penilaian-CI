<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Systask Controller.
 *
 * Updated  2017, 2 Juni 11:10
 *
 * @author  Yudi Setiadi Permana <hi@yudipermana.com>
 *
 */

class Systask extends MX_Controller {

	function __construct(){

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->prefix 	= $this->db->dbprefix;
		$this->table 	= $this->prefix  ."_sys_task";
		$this->pkey 	= "task_id";
		$this->join 	= $this->prefix ."_sys_module";
		$this->fkey 	= "module_id";
		$this->module 	= "systask";
		
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
		$join 			= array($this->join, $this->join .'.'. $this->fkey .' = '. $this->table .'.'. $this->fkey, 'left');
		$data['datas']	= $this->_dataModel->get_data($this->table, '', $limit, $start, array('module_name', 'ASC'), $join);

		$config['base_url'] 	= site_url('systask/page/');
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

		$this->template->set('title', 'Sistem Task');
		$this->template->set('menu',  'task');
		$this->template->load('root', 'list_task', $data);

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
		$join 			= array($this->join, $this->join .'.'. $this->fkey .' = '. $this->table .'.'. $this->fkey, 'left');
		$data['datas']	= $this->_dataModel->get_search($this->table, $search, $limit, $start, array('module_name', 'ASC'), '', $join);

		$config['base_url'] 	= site_url('systask/search/');
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

		$this->template->set('title', 'Sistem Task');
		$this->template->set('menu',  'task');
		$this->template->load('root', 'list_task', $data);

	} 

	public function add(){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'add');
		$this->urlpattern->resetQueryString();

		$data 	= array();

		if($this->input->post('submit')){

			$module	= $this->input->post('module');
			$task	= $this->input->post('task');
			$task 	= str_replace(' ', '', $task);

			$value 	= array(
						'module_id' 	=> $module,
						'task_name' 	=> $task
					);

			$res 	= $this->_dataModel->insert($this->table, $value);

			if($res){

				$msg = "Task berhasil ditambahkan";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('systask'));

			}	

		}

		$getModule = $this->_dataModel->getList($this->join, '', array('module_name', 'ASC'));
		$optModule = "";

		if ($getModule) {
			foreach ($getModule as $result) { 
				$optModule  	.= "<option value='". $result['module_id'] ."'>". $result['module_name'] ."</option>";
			}
		}

		$data['optmodule'] 	= $optModule;

		$this->template->set('title', 'Sistem Task');
		$this->template->set('menu',  'task');
		$this->template->load('root', 'add_task', $data);

	}

	public function edit($id){

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
					document.location = '". $this->urlpattern->getRedirect() ."';
				</script>
			";

			exit;
		}

		if($this->input->post('submit')){

			$module	= $this->input->post('module');
			$task	= $this->input->post('task');
			$task 	= str_replace(' ', '', $task);

			$value 	= array(
						'module_id' 	=> $module,
						'task_name' 	=> $task
					);

			$res 	= $this->_dataModel->update($this->table, $this->pkey, $id, $value);

			if($res){

				$msg = "Task berhasil diubah";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('systask'));

			}	

		}

		$getModule = $this->_dataModel->getList($this->join, '', array('module_name', 'ASC'));
		$optModule = "";

		if ($getModule) {
			foreach ($getModule as $result) { 
				$selected 	 	 = $result['module_id'] == $detail->module_id ? "selected" : "";
				$optModule  	.= "<option value='". $result['module_id'] ."' $selected>". $result['module_name'] ."</option>";
			}
		}

		$data['optmodule'] 	= $optModule;
		$data['data'] 		= $detail;

		$this->template->set('title', 'Sistem Task');
		$this->template->set('menu',  'task');
		$this->template->load('root', 'edit_task', $data);

	}

	public function delete($id){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'delete');
		$this->urlpattern->setQueryString();

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

			$msg = "Task berhasil dihapus";

			$this->session->set_flashdata('message', $msg);

			// redirect($this->urlpattern->getRedirect());
			redirect(site_url('systask'));

		}

	}

}
