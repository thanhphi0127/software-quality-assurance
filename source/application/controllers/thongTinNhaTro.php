<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class thongTinNhaTro extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function load_nhatro ()
	{
		$this->load->model ('mthongTinNhaTro');
		$ma_nhatro = 1;
		$data['nhatro'] = $this->mthongTinNhaTro->load_nhatro ($ma_nhatro);
		$data['phongtro'] = $this->mthongTinNhaTro->load_phongtro ($ma_nhatro);
		$data['template'] = 'thongTinNhaTro/thongTinNhaTro';
		$this->load->view('layout/thongTinNhaTro', isset($data)? $data : NULL);
	}
}
?>