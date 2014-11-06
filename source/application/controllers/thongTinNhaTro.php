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
	public function xem_nhatro ($id)
	{
		$this->load->model('mdiendan');
		$this->load->helper('date');
		
		$data['title_page'] = 'Danh sách nhà trọ sở hữu';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$this->load->model ('mthongTinNhaTro');
		//$ma_nhatro = 1;
		$data['nhatro'] = $this->mthongTinNhaTro->load_nhatro ($id);
		$data['phongtro'] = $this->mthongTinNhaTro->load_phongtro ($id);
		$data['chu'] = $this->mthongTinNhaTro->getTTChu($id);
		$data['binhluan'] = $this->mthongTinNhaTro->loadbinhluan($id);
		
		// them binh luan vao nha tro
		
		if(isset($_POST['btnBinhLuan']))
		{
			$_POST = $this->input->post('member');
			$arr = array(
							'MA_GOPY' => '7',
							'MSTHANHVIEN' => $data['username'],
							'MA_NHATRO' => $id,
							'THOIGIAN' => date('Y-m-d'),
							'NOIDUNG' => $_POST['noidung']
							);
			$this->mthongTinNhaTro->insertbinhluan($arr);
			header('Location:http://localhost/timkiemnhatro/thongTinNhaTro/xem_nhatro/3');
		}
		$data['template'] = 'thongTinNhaTro/thongTinNhaTro';
		$this->load->view('layout/thongTinNhaTro', isset($data)? $data : NULL);
	}
	
	// binh luan
	
}
?>