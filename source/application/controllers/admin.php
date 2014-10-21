<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	public function quanlynguoidung(){
		$data['template'] = 'admin/quanlynguoidung';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	public function duyetnhatro(){
		$data['template'] = 'admin/duyetnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}	
	
	public function duyettintuc(){
		$data['template'] = 'admin/duyettintuc';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	

	
}