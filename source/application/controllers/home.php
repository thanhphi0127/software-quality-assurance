<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	public function index(){
		$data['template'] = 'home/index';
		$this->load->view('layout/home', isset($data)? $data : NULL);
	}
	
	public function quanlythongtincanhan(){
		$data['template'] = 'home/quanlythongtincanhan';
		$this->load->view('layout/home', isset($data)? $data : NULL);
	}
	
	public function dangky(){
		$this->load->model('mdangky');
		 // Include validation library
		$this->load->helper(array('form', 'url'));
		$this->load->helper('email');
		$this->load->library('form_validation');
		$this->load->library('email');	
				
		if (isset($_POST['btn_register'])) {
			$_POST = $this->input->post('member');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>'); 
            $this->form_validation->set_rules('ho','Họ','trim|required');
            $this->form_validation->set_rules('ten','Tên','trim|required');
			$this->form_validation->set_rules('username','Tên đăng nhập','trim|required|min_length[3]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('pass', 'Mật khẩu', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('re_pass', 'Xác nhận mật khẩu', 'trim|required|min_length[0]|matches[pass]');
			
			
            if ($this->form_validation->run() == FALSE) {
				echo "false";
            } else {
				echo "true";
				$user = array(
						  'username' => $_POST['username'],
						  'password' => $_POST['pass'],
						  'ma_quyen' => 2
						  );
					
				$this->mdangky->capNhatNguoiDung($user);
				
				$hoten = $_POST['ho']." ".$_POST['ten'];
				$ngaysinh = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
				$member = array(
						  'hoten' => $hoten,
						  'mail' => $_POST['email'],
						  'msthanhvien' => $_POST['username'],
						  'sdt'		=> '',
						  'diachi' => '',
						  'ngaysinh' => $ngaysinh,
						  'gioitinh' => $_POST['sex']
						  );
				
				$this->mdangky->capnhatThanhVien($member);
			}
	  	}
	  	$data['template'] = 'dangky';
		$this->load->view('layout/home', isset($data)? $data : NULL);
	}
	
}