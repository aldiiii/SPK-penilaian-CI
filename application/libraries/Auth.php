<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Codeigniter Auth Libraries Template.
 *
 * Updated  2017, 5 Juni 08:55
 *
 * @author  Yudi Setiadi Permana <mail@yspermana.my.id>
 * 
 */

class Auth {

	private $userId;
	private $userRole;
	private $CI;
	
	public function __construct(){

		$this->CI =& get_instance();

		$this->CI->load->library('session');
		$this->CI->load->library('template');
		$this->CI->load->config('system');
		$this->CI->load->helper('url');
		$this->CI->load->model('authModel', 'model');

		$this->system 	= $this->CI->config->item('system');

	}

	/**
	 * Authorize access for user
	 *
	 * @param
	 * - sessionName 	= CI session userdata name for login
	 * - moduleName 	= Module name
	 * - taskName 		= Task name
	 * 
	 * @return null
	 */
	public function authorize($sessionName, $moduleName, $taskName){

		/* Get user login */
		$login 			= $this->CI->session->userdata($sessionName);
		$this->userId 	= $login['user_id'];

		/* Check if not logged */
		if ($this->userId == '') {
			redirect(site_url());
		}

		/* Get detail user */
		$userDetail 	= $this->CI->model->getUserDetail($this->userId);
		$this->userRole = $userDetail->user_level_id;

		/* Get detail task */
		$getRole 	= $this->CI->model->getRole($moduleName, $taskName, $this->userRole);

		if (!$getRole) {
			die("User not authorize for access this task");
		}

		/* Useer photo */
		$userPhoto 	= base_url() .'assets/img/avatar.jpg';

		if (is_file($this->system['cdnPath'] .'/images/photo/'. $userDetail->user_photo)) {
			$userPhoto 	= base_url() .'cdn/images/photo/'. $userDetail->user_photo;
		}

		/* Set User to Template */
		$this->CI->template->set('user_name', 	$userDetail->user_name);
		$this->CI->template->set('user_level', 	$userDetail->user_level_id);
		$this->CI->template->set('user_role', 	$userDetail->user_level_name);
		$this->CI->template->set('user_photo', 	$userPhoto);
		$this->CI->template->set('last_login', 	$userDetail->user_last_login);
	}

	/**
	 * Logged user redirect
	 *
	 * @param
	 * - sessionName 	= CI session userdata name for login
	 * - redirect 		= Basename url redirect page
	 * 
	 * @return null
	 */
	public function islogged($sessionName, $redirect){

		/* Get user login */
		$login 			= $this->CI->session->userdata($sessionName);
		$this->userId 	= $login['user_id'];

		/* Check if not logged */
		if ($this->userId != '') {
			redirect(site_url() . $redirect);
		}

	}

	/**
	 * User logged detail
	 *
	 * @param
	 * -
	 * 
	 * @return array
	 */
	public function user(){

		$data = array();

		/* Get detail user */
		$userDetail 	= $this->CI->model->getUserDetail($this->userId);
		$this->userRole = $userDetail->user_level_id;

		$data['id']			= $userDetail->user_id;
		$data['name']		= $userDetail->user_name;
		$data['email']		= $userDetail->user_email;
		$data['phone']		= $userDetail->user_phone;
		$data['address']	= $userDetail->user_address;
		$data['last_login']	= $userDetail->user_last_login;
		$data['statsus']	= $userDetail->user_status;
		$data['username']	= $userDetail->user_username;
		$data['level']		= $userDetail->user_level_id;
		$data['photo']		= $userDetail->user_photo;
		// $data['type']		= $userDetail->user_type;

		return $data;

	}
}