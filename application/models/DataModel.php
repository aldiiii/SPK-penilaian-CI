<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Data Model.
 *
 * Updated  2017, 5 Juni 08:55
 *
 * @author  Yudi Setiadi Permana <mail@yspermana.my.id>
 *
 */

class DataModel extends CI_Model
{

	public 	$table_record_count;
	public	$table_record_count_user;

	function __construct()
	{

		parent::__construct();
	}

	function get_data($table, $cond = '', $start = '', $count = '', $order = '', $join = '', $join2 = '', $group = '')
	{

		$result = array();

		if ($join != '') $this->db->join($join[0], $join[1], $join[2]);
		if ($join2 != '') $this->db->join($join2[0], $join2[1], $join2[2]);
		if ($cond != '') $this->db->where($cond);
		if ($group != '') $this->db->group_by($group);

		$this->db->from($table);
		$this->table_record_count = $this->db->count_all_results();

		if ($start) {
			if ($count) {
				$this->db->limit($start, $count);
			} else {
				$this->db->limit($start);
			}
		}

		if ($join != '') $this->db->join($join[0], $join[1], $join[2]);
		if ($join2 != '') $this->db->join($join2[0], $join2[1], $join2[2]);
		if ($cond != '') $this->db->where($cond);
		if ($group != '') $this->db->group_by($group);
		if ($order != '') $this->db->order_by($order[0], $order[1]);
		if (($order != '') and sizeof($order) > 2) $this->db->order_by($order[2], $order[3]);

		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}

	function get_search($table, $cond = '', $start = '', $count = '', $order = '', $where = '', $join = '', $join2 = '')
	{

		$result = array();

		if ($join != '') $this->db->join($join[0], $join[1], $join[2]);
		if ($join2 != '') $this->db->join($join2[0], $join2[1], $join2[2]);
		if ($cond != '') $this->db->or_like($cond);
		if ($where != '') $this->db->where($where);

		$this->db->from($table);
		$this->table_record_count = $this->db->count_all_results();

		if ($start) {
			if ($count) {
				$this->db->limit($start, $count);
			} else {
				$this->db->limit($start);
			}
		}

		if ($join != '') $this->db->join($join[0], $join[1], $join[2]);
		if ($join2 != '') $this->db->join($join2[0], $join2[1], $join2[2]);
		if ($cond != '') $this->db->or_like($cond);
		if ($where != '') $this->db->where($where);
		if ($order != '') $this->db->order_by($order[0], $order[1]);
		if (($order != '') and sizeof($order) > 2) $this->db->order_by($order[2], $order[3]);

		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}

	public function insert($table, $data)
	{

		$res = false;

		try {

			$this->db->insert($table, $data);

			if ($this->db->insert_id()) {
				$res = $this->db->insert_id();
			} else {
				$res = $this->db->affected_rows();
			}
		} catch (Exception $e) {
			die("Data Model : " . $e->getMessage());
		}

		return $res;
	}

	public function update($table, $keyid, $keyvalue, $data)
	{

		$res = false;

		try {

			$this->db->where($keyid, $keyvalue);
			$this->db->update($table, $data);

			$res = $this->db->affected_rows();
		} catch (Exception $e) {
			die("Data Model : " . $e->getMessage());
		}

		return $res;
	}

	public function delete($table, $keyid, $keyvalue)
	{

		$res = false;

		try {

			$this->db->where($keyid, $keyvalue);
			$this->db->delete($table);

			$res = true;
		} catch (Exception $e) {
			die("Data Model : " . $e->getMessage());
		}

		return $res;
	}

	public function getDetail($table, $keyid, $keyvalue)
	{

		$res = false;

		try {

			$this->db->where($keyid, $keyvalue);
			$query = $this->db->get($table);

			if ($query->num_rows() > 0) {
				$res = $query->row();
			}
		} catch (Exception $e) {
			die("Data Model : " . $e->getMessage());
		}

		return $res;
	}

	public function getList($table, $cond = '', $order = '', $group = '')
	{

		$res = false;

		try {

			if ($cond != '') $this->db->where($cond);
			if ($group != '') $this->db->group_by($group);
			if ($order != '') $this->db->order_by($order[0], $order[1]);
			$query = $this->db->get($table);

			if ($query->num_rows() > 0) {
				$res = $query->result_array();
			}
		} catch (Exception $e) {
			die("Data Model : " . $e->getMessage());
		}

		return $res;
	}

	public function count_data($table)
	{
		$this->db->select('*');
		$this->db->from($table);

		return $this->db->get()->num_rows();
	}

	public function getLastData($table, $pkey)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($pkey, 'desc');
		$this->db->limit(1);

		return $this->db->get();
	}
}
