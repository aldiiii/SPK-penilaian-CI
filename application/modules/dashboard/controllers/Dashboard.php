<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Controller.
 *
 * Updated  2018, 1 April 11:10
 *
 * @author  Yudi Setiadi Permana <hi@yudipermana.com>
 *
 */

class Dashboard extends MX_Controller {

	function __construct(){

		parent::__construct();

		$this->system 	= $this->config->item('system');
		$this->module 	= "dashboard";

		$this->date 	= new Datename();

	}

	public function index(){

		$this->auth->authorize($this->system['userData'], $this->module, 'view');

		$data 	= array();

		// $data['count_product'] = $this->_dataModel->count_data('nr_product');
		// $data['count_info'] = $this->_dataModel->count_data('nr_info');
		// $data['count_gallery'] = $this->_dataModel->count_data('nr_gallery');
		// $data['order'] = $this->_dataModel->count_data('nr_order');
		// $data['driver'] = $this->_dataModel->count_data('nr_driver');
		// $data['unit'] = $this->_dataModel->count_data('nr_unit');
		// $data['date_format'] = $this->date;


		// $where = array('status_order' => 2);

		// $start = 0;
		// $limit = 10;
		
		// $data['og_unit']	= $this->_dataModel->getList('nr_v_lap_wip', $where, array('id_unit', 'ASC'), '', '');
		
		// $data['og_driver']	= $this->_dataModel->getList('nr_driver', $where, array('id_driver', 'ASC'), '', '');
		

		$this->template->set('title', 	'Beranda');
		$this->template->set('menu',  	'dashboard');
		$this->template->load('root', 	'dashboard', $data);

	}

}
