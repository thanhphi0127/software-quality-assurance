<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diendan extends MY_Controller
	{
	
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
	
	public function dangtintuc()
	{
		$data['ma_quyen'] = $this->ma_quyen;
		$this->load->model('mdiendan');
		$this->load->helper('date');
		$bien = 'nva';
		$data['name'] = $this->mdiendan->arGetNguoiDang($bien);
		if(isset($_POST['btnDangTin']))
		{
			echo date('Y-m-d');
			$_POST = $this->input->post('member');
			$data_info = array(
							'NGUOIDANG' =>$_POST['ma'],
							'TIEUDE' =>$_POST['tieude'],
							'NGAYDANG' => date('Y-m-d'),
							'NOIDUNG' => $_POST['noidung']								
							);
			$this->mdiendan->arInsertTin($data_info);
			echo "Dang tin thanh cong :)";
		}
		//$data['template'] = 'diendan/dangtintuc';
		$data['template'] = 'diendan/demo';
		$this->load->view('layout/diendan', isset($data)? $data : NULL);
	}
	public function gopy($MA_NHATRO)
	{
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		//load thu vien de rang buoc du lieu nhap
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		// rang buoc các truong nhap tren text field
		$this->form_validation->set_rules('noidung', 'Nội dung', 'required|min_length[5]');
		$this->form_validation->set_rules('member', 'Mức đánh giá', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		//-------------------------------------------------------------------------------------------
		$this->load->helper('date');
		$this->load->model('mdiendan');
		$data['info'] = $this->mdiendan->getThongTinThanhVien('nva');
		if(isset($_POST['btnGopY']))
		{
			$_POST = $this->input->post('member');
			$arr2 = array(
						'USERNAME' =>$_POST['ma'],
						'MA_NHATRO' =>$MA_NHATRO,
						'THOIGIAN' => date('Y-m-d H:i:s'),
						'NOIDUNG' =>$_POST['noidung']
						);
					
			$this->mdiendan->arGopY($arr2);
			echo "<p style='color:blue; margin:20px 10px;'> Đã gửi góp ý. </p>";
				
			
		}// end -- $_POST['btnGopY']
		else {
		
			$data['template'] = 'diendan/gopy';
		
			$this->load->view('layout/diendan', isset($data)? $data : NULL);
		}
	}
	
	public function index()
	{
		$data['ma_quyen'] = $this->ma_quyen;
		$data['template'] = 'diendan/index';
		$this->load->view('layout/diendan', isset($data)? $data : NULL);
	}	
	
	
	

	
}