<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chunhatro extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		
	}
	public function profile_chunhatro(){
		
		$this->load->model('mchunhatro');
		$data['datainfo'] = $this->mchunhatro->load_chunhatro();
		$data['template'] = 'profile/profile';
		$this->load->view('layout/profile', isset($data)? $data : NULL);
		
	}
	
	public function quanlynhatro(){
		$data['template'] = 'chunhatro/quanlynhatro';
		$this->load->view('layout/chunhatro', isset($data)? $data : NULL);
	}
	
	
	
}