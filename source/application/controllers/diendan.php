<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diendan extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	public function dangtintuc(){
		$data['template'] = 'diendan/dangtintuc';
		$this->load->view('layout/diendan', isset($data)? $data : NULL);
	}
	public function index(){
		$data['template'] = 'diendan/index';
		$this->load->view('layout/diendan', isset($data)? $data : NULL);
	}	
	
	
	

	
}