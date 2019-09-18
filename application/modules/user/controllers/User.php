<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User Controller.
 *
 * Updated  2017, 19 Juli 11:10
 *
 * @author  Yudi Setiadi Permana <hi@yudipermana.com>
 *
 */

class User extends MX_Controller
{

	function __construct()
	{

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->image 	= new ScaleImage();
		$this->module  	= "user";
	}

	public function login()
	{

		/* Has logged */
		$this->auth->islogged($this->system['userData'], 'dashboard');

		$data['alert'] = "";

		/* Login proses */
		if ($this->input->post('login')) {

			$email 			= $this->input->post('email', true);
			$password 	= $this->input->post('password', true);

			/* Check auth */
			$auth = $this->_authModel->doAuth($email, $password);

			if (!$auth) {
				$data['alert'] = "<div class='alert alert-danger text-center'>Nama pengguna tidak ditemukan</div>";
			} else {

				// Get Detail
				$user = $this->_authModel->getUserDetail($auth);

				// Check Password
				if ($this->_authModel->hashing($password) != $user->user_password) {
					$data['alert'] = "<div class='alert alert-danger text-center'>Kata sandi tidak cocok dengan nama pengguna</div>";
				} else {

					// Check Status
					if ($user->user_status == 0) {
						$data['alert'] = "<div class='alert alert-danger text-center'>Akun tidak aktif</div>";
					} else {

						// Check role dashboard and user
						$getRoleDashboard 	= $this->_authModel->getRole('dashboard', 'view', $user->user_level_id);
						$getRoleUser 	  	= $this->_authModel->getRole('user', 'logout', $user->user_level_id);

						if (!$getRoleDashboard || !$getRoleUser) {
							$data['alert'] = "<div class='alert alert-danger text-center'>Peran untuk akun belum diatur</div>";
						} else {
							$sess = array(
								'user_id' 	=> $auth,
								'user_role'	=> $user->user_level_id
							);

							$this->session->set_userdata($this->system['userData'], $sess);

							$this->_authModel->updateLogTime($user->user_id);

							redirect(site_url()  . 'dashboard');
						}
					}
				}
			}
		}

		$this->template->set('title', 'Masuk');
		$this->template->load('root_login', 'login', $data);
	}

	public function forgot()
	{

		/* Has logged */
		$this->auth->islogged($this->system['userData'], 'dashboard');

		$data['alert'] = "";

		$this->template->set('title', 'Lupa Kata Sandi');
		$this->template->load('root_login', 'forgot', $data);
	}

	public function logout()
	{

		$this->auth->authorize($this->system['userData'], $this->module, 'logout');

		$user 	= $this->auth->user();

		try {

			$this->session->unset_userdata($this->system['userData']);

			$this->db->set('user_is_login', 0);
			$this->db->where('user_id', $user['id']);
			$this->db->update($this->_authModel->table);

			redirect(site_url());
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function profile()
	{

		$this->auth->authorize($this->system['userData'], $this->module, 'profile');

		$data 	= array();
		$user 	= $this->auth->user();

		$alert	= "";

		$msg 	= $this->session->flashdata('message');
		$err 	= $this->session->flashdata('error');

		//alert
		if ($msg != '') {

			$style 	= $err == 1 ? "alert-danger" : "alert-success";
			$title 	= $err == 1 ? "ERROR" : "SUCCESS";
			$alert 	= "
						<div class='alert $style'>
						    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						    <strong>$title !</strong> " . $msg . ".
						</div>
					";

			$this->session->set_flashdata('message', '');
			$this->session->set_flashdata('error', '');
		}

		$userPhoto 	= base_url() . 'assets/img/avatar.jpg';

		if (is_file($this->system['cdnPath'] . '/images/photo/' . $user['photo'])) {
			$userPhoto 	= base_url() . 'cdn/images/photo/' . $user['photo'];
		}

		/* Default */
		$getData 			= $this->_authModel->getUserDetail($user['id']);

		$data['id']			= "";
		$data['name'] 		= $getData->user_name;
		$data['email'] 		= $getData->user_email;
		$data['phone'] 		= $getData->user_phone;
		$data['address'] 	= $getData->user_address;
		$data['username'] 	= $getData->user_username;
		$data['status'] 	= $getData->user_status == 1 ? "<label class='label label-success'>Aktif</label>" : "<label class='label label-danger'>Non-Aktif</label>";

		$data['level'] 		= $getData->user_level_name;
		$data['alert']		= $alert;
		$data['photo'] 		= $userPhoto;

		$this->template->set('title', 	'Profil');
		$this->template->set('menu',  	'dashboard');
		$this->template->load('root', 	'profile', $data);
	}

	public function change_account()
	{

		$this->auth->authorize($this->system['userData'], $this->module, 'setting');

		if ($this->input->post('submit')) {

			$name		= $this->input->post('name');
			$email		= $this->input->post('email');
			$phone		= $this->input->post('phone');
			$address	= $this->input->post('address');
			$user 		= $this->auth->user();

			$value 	= array(
				'user_name' 		=> $name,
				'user_email' 		=> $email,
				'user_phone' 		=> $phone,
				'user_address' 		=> $address
			);

			$res 	= $this->_dataModel->update($this->db->dbprefix . "_sys_user", "user_id", $user['id'], $value);

			if ($res) {

				$msg = "Profil berhasil diubah";

				$this->session->set_flashdata('message', $msg);

				redirect(site_url() . 'user/profile');
			}
		}
	}

	public function change_password()
	{

		$this->auth->authorize($this->system['userData'], $this->module, 'setting');

		if ($this->input->post('submit')) {

			$currpass	= $this->input->post('currpass');
			$newpass	= $this->input->post('passsword');
			$retype		= $this->input->post('retype');
			$user 		= $this->auth->user();
			$detail 	= $this->_authModel->getUserDetail($user['id']);

			if ($this->_authModel->hashing($currpass) != $detail->user_password) {

				$msg = "Kata sandi sekarang salah";

				$this->session->set_flashdata('message', $msg);
				$this->session->set_flashdata('error', '1');

				redirect(site_url() . 'user/profile');
			}

			$value 	= array(
				'user_password' => $this->_authModel->hashing($retype)
			);

			$res 	= $this->_dataModel->update($this->db->dbprefix . "_sys_user", "user_id", $user['id'], $value);

			if ($res) {

				$msg = "Kata sandi berhasil diubah";

				$this->session->set_flashdata('message', $msg);

				redirect(site_url() . 'user/profile');
			}
		}
	}

	public function change_photo()
	{

		$this->auth->authorize($this->system['userData'], $this->module, 'profile');

		if ($this->input->post('submit')) {

			$files		= $_FILES['photo'];
			$user 		= $this->auth->user();

			$img 		= $this->_uploadImage($files, $user['username'], '');

			$value 	= array(
				'user_photo' 		=> $img
			);

			$res 	= $this->_dataModel->update($this->db->dbprefix . "_sys_user", "user_id", $user['id'], $value);

			if ($res) {

				$msg = "Foto berhasil diubah";

				$this->session->set_flashdata('message', $msg);

				redirect(site_url() . 'user/profile');
			}
		}
	}

	private function _uploadImage($picture, $name, $old_img)
	{

		$name 	= strtolower(str_replace(' ', '-', $name));
		$name 	= $name . substr(sha1(md5(uniqid($name, true))), 0, 10);
		$image 	= "";

		if ($picture['tmp_name'] != '') {

			$dir 	= $this->system['cdnPath'] . '/images/photo/';
			$etype 	= explode("/", $picture['type']);
			$type 	= "." . $etype[(count($etype) - 1)];

			if ($type == '.jpg' or $type == '.png' or $type == '.jpeg') {

				$image 	= $name . $type;
				$temp 	= $picture['tmp_name'];

				/* Upload large */
				$file 	= $dir . $image;

				$this->image->load($temp);

				if ($this->image->getWidth() > 800) {
					$this->image->resizeToWidth(800);
				}

				$this->image->save($file);

				//remove old image
				if ($old_img != '') unlink($dir . $old_img);
			}
		}

		return $image;
	}
}
