<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	public function index(){
		$data['seo']['title'] = 'Trang chủ';
		$data['template'] = 'home/index';
		$this->load->view('layout/home', isset($data)? $data : NULL);
	}
	
	public function quanlythongtincanhan(){
		$data['template'] = 'home/quanlythongtincanhan';
		$this->load->view('layout/home', isset($data)? $data : NULL);
	}
	
	
}