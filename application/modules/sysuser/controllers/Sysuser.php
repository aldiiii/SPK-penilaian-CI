<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sysuser Controller.
 *
 * Updated  2017, 2 Juni 11:10
 *
 * @author  Yudi Setiadi Permana <hi@yudipermana.com>
 *
 */

class Sysuser extends MX_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('authModel', 	'_authModel');

		$this->system 	= $this->config->item('system');
		$this->prefix 	= $this->db->dbprefix;
		$this->table 	= $this->prefix ."_sys_user";
		$this->pkey 	= "user_id";
		$this->join 	= $this->prefix ."_sys_user_level";
		$this->fkey 	= "user_level_id";
		$this->module 	= "sysuser";
		
	}

	public function index(){

		$this->page();		
		
	}

	public function get_list_agama() {
		return $list_agama = [
			"islam",
			"kristen",
			"budha",
			"hindu",
		];
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
		$data['datas']	= $this->_dataModel->get_data($this->table, array($this->table. '.user_level_id >=' => '2'), $limit, $start, array('user_name', 'ASC'), $join);

		$config['base_url'] 	= site_url('sysuser/page/');
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

		$this->template->set('title', 'Sistem User');
		$this->template->set('menu',  'user');
		$this->template->load('root', 'list_user', $data);

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
		$data['datas']	= $this->_dataModel->get_search($this->table, $search, $limit, $start, array('user_name', 'ASC'), array($this->table. '.user_level_id >=' => '2'), $join);

		$config['base_url'] 	= site_url('sysuser/search/');
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

		$this->template->set('title', 'Sistem User');
		$this->template->set('menu',  'user');
		$this->template->load('root', 'list_user', $data);

	} 

	public function add(){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'add');
		$this->urlpattern->resetQueryString();

		$data 	= array();
		$agama = null;

		if($this->input->post('submit')){

			$nik		= $this->input->post('nik');
			$name		= $this->input->post('name');
			$email		= $this->input->post('email');
			$agama		= $this->input->post('agama');
			$tgl_lahir	= $this->input->post('tgl_lahir');
			$phone		= $this->input->post('phone');
			$address	= $this->input->post('address');
			$level		= $this->input->post('level');
			$start_work = $this->input->post('mulai_kerja');
			$password	= $this->input->post('password');
			$password 	= $this->_authModel->hashing($password);

			$data_agama = 0;
			switch($agama) {
				case 1:
				 $data_agama = 'islam';
				 break;
				 case 2:
				 $data_agama = 'kristen';
				 break;
				 case 3:
				 $data_agama = 'budha';
				 break;
				 case 4:
				 $data_agama = 'hindu';
				 break;
				 case 5:
				 $data_agama = 'lainnya';
				 break;
				
			}

			$value 	= array(
						'user_nik' 			=> $nik,
						'user_name' 		=> $name,
						'user_email' 		=> $email,
						'user_agama' 		=> $data_agama,
						'user_tgl_lahir' 	=> $tgl_lahir,
						'user_start_work' 	=> $start_work,
						'user_phone' 		=> $phone,
						'user_address' 		=> $address,
						'user_level_id' 	=> $level,
						'user_password' 	=> $password,
					);

			$res 	= $this->_dataModel->insert($this->table, $value);

			if($res){

				$msg = "User berhasil ditambahkan";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('sysuser'));

			}	

		}
		$index = 1;
		$list_agama = $this->get_list_agama();
		foreach ( $list_agama as $result) { 
			$agama .= "<option value='". $index++ ."'>". $result ."</option>";
		}
		$getLevel = $this->_dataModel->getList($this->join, array('user_level_id >=' => '2'), array('user_level_name', 'ASC'));
		$optLevel = "";

		if ($getLevel) {
			foreach ($getLevel as $result) { 
				$optLevel .= "<option value='". $result['user_level_id'] ."'>". $result['user_level_name'] ."</option>";
			}
		}

		$data['optlevel'] 	= $optLevel;
		$data['data_agama'] = $agama;

		$this->template->set('title', 'Sistem User');
		$this->template->set('menu',  'user');
		$this->template->load('root', 'add_user', $data);

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

			$name		= $this->input->post('name');
			$email		= $this->input->post('email');
			$phone		= $this->input->post('phone');
			$address	= $this->input->post('address');
			$level		= $this->input->post('level');
			$status	= $this->input->post('user_status');

			// if (empty($password)) {
				$value 	= array(
							'user_name' 		=> $name,
							'user_email' 		=> $email,
							'user_phone' 		=> $phone,
							'user_address' 		=> $address,
							'user_level_id' 	=> $level,
							'user_status' 		=> $status,
						);
			// }
			// else{
			// 	$password 	= $this->_authModel->hashing($password);

			// 	$value 	= array(
			// 				'user_name' 		=> $name,
			// 				'user_email' 		=> $email,
			// 				'user_phone' 		=> $phone,
			// 				'user_address' 		=> $address,
			// 				'user_level_id' 	=> $level,
			// 				'user_username' 	=> $username,
			// 				'user_password' 	=> $password,
			// 				'user_type' 		=> $type,
			// 			);
			// }	

			$res 	= $this->_dataModel->update($this->table, $this->pkey, $id, $value);

			if($res){

				$msg = "User berhasil diubah";

				$this->session->set_flashdata('message', $msg);

				// redirect($this->urlpattern->getRedirect());
				redirect(site_url('sysuser'));

			}	

		}

		$getLevel = $this->_dataModel->getList($this->join, array('user_level_id >=' => '2'), array('user_level_name', 'ASC'));
		$optLevel = "";

		$index = 0;
		$list_agama = $this->get_list_agama();
		$agama = null;
		foreach ( $list_agama as $result) { 
			// print_r(); die;
			$select  	 = $result == $detail->user_agama ? "selected" : "";
			// print_r($select);die;
			$agama .= "<option value='". $index++ ."' $select>". $result ."</option>";
		}

		if ($getLevel) {
			foreach ($getLevel as $result) { 
				$select  	 = $result['user_level_id'] == $detail->user_level_id ? "selected" : "";
				$optLevel  	.= "<option value='". $result['user_level_id'] ."' $select>". $result['user_level_name'] ."</option>";
			}
		}

		$data['optlevel'] 	= $optLevel;
		$data['data'] 		= $detail;
		$data['data_agama'] = $agama;

		$this->template->set('title', 'Sistem User');
		$this->template->set('menu',  'user');
		$this->template->load('root', 'edit_user', $data);

	}

	public function delete($id){

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

			$msg = "User berhasil dihapus";

			$this->session->set_flashdata('message', $msg);

			// redirect($this->urlpattern->getRedirect());
			redirect(site_url('sysuser'));

		}

	}

	public function status($id, $status){

		//auth
		$this->auth->authorize($this->system['userData'], $this->module, 'edit');
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

		$value 	= array('user_status' => $status);

		$res 	= $this->_dataModel->update($this->table, $this->pkey, $id, $value);

		if($res){

			$status = $status == 1 ? "diaktifkan" : "dinon-aktifkan";
			$msg 	= "User berhasil $status";

			$this->session->set_flashdata('message', $msg);

			redirect($this->urlpattern->getRedirect());

		}

	}

}
