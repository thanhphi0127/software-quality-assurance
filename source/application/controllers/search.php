<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	public function advancedsearch(){
		$data['template'] = 'search/advancedsearch';
		$this->load->view('layout/search', isset($data)? $data : NULL);
	}
	
	
}