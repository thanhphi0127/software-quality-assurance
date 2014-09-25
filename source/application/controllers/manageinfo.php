<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageinfo extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	public function updateinfo(){
		$data['template'] = 'manageinfo/updateinfo';
		$this->load->view('layout/manageinfo', isset($data)? $data : NULL);
	}
	
	
}