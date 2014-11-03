<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class thongTinNhaTro extends MY_Controller {
	
	private $username;
	private $ma_quyen;
	private $auth;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		$this->auth = $this->lib_authentication->check_cookie();
		$this->username = $this->auth['username'];			
		if ($this->auth != NULL) 
			$this->ma_quyen = $this->auth['ma_quyen'];
		else
			$this->ma_quyen = 0;
	}
	
	public function load_nhatro ()
	{
		$data['title_page'] = 'Danh sách nhà trọ sở hữu';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$this->load->model ('mthongTinNhaTro');
		$ma_nhatro = 1;
		$data['nhatro'] = $this->mthongTinNhaTro->load_nhatro ($ma_nhatro);
		$data['phongtro'] = $this->mthongTinNhaTro->load_phongtro ($ma_nhatro);
		$data['template'] = 'thongTinNhaTro/thongTinNhaTro';
		$this->load->view('layout/thongTinNhaTro', isset($data)? $data : NULL);
	}
}
?>