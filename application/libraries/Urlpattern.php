<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Codeigniter Urlpattern Libraries Template.
 *
 * Updated  2018, 1 April 20:44
 *
 * @author  Yudi Setiadi Permana <mail@yspermana.my.id>
 * 
 */

class Urlpattern {

	private $query;
	private $string;
	private $CI;
	
	public function __construct(){

		$this->CI =& get_instance();

		$this->CI->load->library('session');
		$this->CI->load->config('system');
		$this->CI->load->helper('url');

		$this->system 	= $this->CI->config->item('system');

	}

	/**
	 * Set data current url to session
	 *
	 * @param
	 * - 
	 * 
	 * @return null
	 */
	public function setQueryString(){

		$query 	= $_SERVER['QUERY_STRING'];
		$string = uri_string(); 

		$this->CI->session->set_flashdata('urlQuery', 	$query);
		$this->CI->session->set_flashdata('urlString', 	$string);

	}

	/**
	 * Reset data current url to session
	 *
	 * @param
	 * - 
	 * 
	 * @return null
	 */
	public function resetQueryString(){

		$query 	= $this->CI->session->flashdata('urlQuery');
		$string = $this->CI->session->flashdata('urlString'); 

		$this->CI->session->set_flashdata('urlQuery', 	$query);
		$this->CI->session->set_flashdata('urlString', 	$string);

	}

	/**
	 * Get data url string from session
	 *
	 * @param
	 * - 
	 * 
	 * @return string
	 */
	public function getString(){

		$string = $this->CI->session->flashdata('urlString');

		return $string;

	}

	/**
	 * Get data url query from session
	 *
	 * @param
	 * - 
	 * 
	 * @return string
	 */
	public function getQuery(){

		$query 	= $this->CI->session->flashdata('urlQuery');

		return $query;

	}

	/**
	 * Get redirect url from data query and string in session
	 *
	 * @param
	 * - 
	 * 
	 * @return string
	 */
	public function getRedirect(){

		$query 	= $this->CI->session->flashdata('urlQuery');
		$string = $this->CI->session->flashdata('urlString');
		$url 	= $string;

		if (!empty($query)) {
			$url = $string .'?'. $query;
		}

		return site_url($url);

	}
}