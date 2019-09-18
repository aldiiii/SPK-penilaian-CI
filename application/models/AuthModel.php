<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth Model.
 *
 * Updated  2017, 5 Juni 08:55
 *
 * @author  Yudi Setiadi Permana <mail@yspermana.my.id>
 *
 */

class AuthModel extends CI_Model{

	function __construct(){

		parent::__construct();

		$this->prefix	= $this->db->dbprefix;
		$this->table 	= $this->prefix ."_sys_user";
		$this->join 	= $this->prefix ."_sys_user_level";
		$this->fkey 	= "user_level_id";

	}

	public function doAuth($username = NULL){

		$res = false;

		try {
			$username 	= $this->db->escape($username);

			$sql 		= "SELECT * FROM ". $this->table ." WHERE user_username = $username";
			$query 		= $this->db->query($sql);
			
			if($query->num_rows() > 0){
				$res = $query->row()->user_id;
			}

		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function getTask($module, $task){

		$res = false;

		try {

			$module = strtolower($module);
			$task 	= strtolower($task);

			$sql 	= "
						SELECT 
							* 
						FROM 
							". $this->prefix ."_sys_task as task 
						JOIN 
							". $this->prefix ."_sys_module as module
						ON 
							task.module_id = module.module_id
						WHERE 
							LOWER(task.task_name) 		= '$task' AND 
							LOWER(module.module_name)	= '$module'
					";	
			
			$query 	= $this->db->query($sql);

			if ($query->num_rows() > 0) {
				$res = $query->row();
			}

		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function getTaskDetail($id){

		$res = false;

		try {

			$sql 	= "
						SELECT 
							* 
						FROM 
							". $this->prefix ."_sys_task as task 
						JOIN 
							". $this->prefix ."_sys_module as module
						ON 
							task.module_id 	= module.module_id
						WHERE 
							task.task_id 	= '$id'
					";	
			
			$query 	= $this->db->query($sql);

			if ($query->num_rows() > 0) {
				$res = $query->row();
			}

		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function getRole($module, $task, $role){

		$res = false;

		try {

			$module = strtolower($module);
			$task 	= strtolower($task);

			$sql 	= "
						SELECT 
							* 
						FROM 
							". $this->prefix ."_sys_role as role
						JOIN
							". $this->prefix ."_sys_task as task 
						ON 
							task.task_id = role.task_id
						JOIN 
							". $this->prefix ."_sys_module as module
						ON 
							task.module_id = module.module_id
						WHERE 
							LOWER(task.task_name) 		= '$task' AND 
							LOWER(module.module_name)	= '$module' AND 
							role.user_level_id 			= '$role'
					";	

			$query = $this->db->query($sql);

			if ($query->num_rows() > 0) {
				$res = true;
			}
			
		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function getUserDetail($id){

		$res = false;

		try {
			
			$this->db->join($this->join, $this->join .'.'. $this->fkey .' = '. $this->table .'.'. $this->fkey, 'left');
			$this->db->where('user_id', $id);
			$query = $this->db->get($this->table);
			
			if($query->num_rows() > 0){
				$res = $query->row();
			}

		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function updateLogTime($id){

		$res = false;
		$time= date('Y-m-d H:i:s');

		try {
			
			$this->db->set('user_is_login', 1);
			$this->db->set('user_last_login', $time);
			$this->db->where('user_id', $id);
			$this->db->update($this->table);

			$res = true;

		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function checkEmail($email){

		$res = false;

		try {
			
			$this->db->where('user_email', $email);
			$query = $this->db->get($this->table);
			
			if($query->num_rows() > 0){
				$res = $query->row()->user_id;
			}

		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function checkForgotKey($key){

		$res = false;

		try {
			
			$this->db->where('forgot_key', $key);
			$query = $this->db->get($this->prefix .'_user_forgot_password');
			
			if($query->num_rows() > 0){
				$res = $query->row();
			}

		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function checkRole($cond){

		$res = false;

		try {
			
			$this->db->where($cond);
			$query = $this->db->get($this->prefix .'_sys_role');
			
			if($query->num_rows() > 0){
				$res = true;
			}

		} catch (Exception $e) {
			die("Auth Model : ". $e->getMessage());
		}

		return $res;

	}

	public function hashing($password){

		$hash = hash('sha256', $password);
		$hash = md5(sha1($hash));

		return $hash;

	}

}