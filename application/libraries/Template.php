<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Codeigniter Libraries Template.
 *
 * Updated  2016, 18 Mei 08:55
 *
 * @author  Yudi Setiadi Permana <mail@yspermana.my.id>
 *
 */

class Template {

	private $CI;
	private $templateData = array();

	public function __construct(){
	    $this->CI =& get_instance();
	}

	public function set($name, $value){
		$this->templateData[$name] = $value;
	}

	public function load($template = '', $view = null, $view_data = array(), $module_name = null, $return = false){

		$caller = debug_backtrace();

		// Load module
		if (is_null($module_name)){
			$module_name = strtolower($caller[1]['class']);
		}
		
		// Load view
    	if (!is_null($view)){
			$body_view_path = $module_name .'/'. $view; 
    	}
    	else{
			$body_view_path = $module_name .'/'. $module_name; 
    	}

    	// Load the view as a string for passing to the template module
    	$this->set('content', $this->CI->load->view($body_view_path, $view_data, TRUE));

		return $this->CI->load->view($template, $this->templateData, $return);

	} // end load function
}

