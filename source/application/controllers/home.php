<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	private $username;
	private $ma_quyen;
	private $auth;
	private $linker;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		$this->auth = $this->lib_authentication->check_cookie();
		$this->username = $this->auth['username'];			
		if ($this->auth != NULL) 
			$this->ma_quyen = $this->auth['ma_quyen'];
		else
			$this->ma_quyen = 0;
		$this->linker = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
	public function quydinhdangnhatro(){
		
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['title_page'] = 'Quy định đăng nhà trọ';
		$data['seo']['title'] = 'Quy định đăng nhà trọ';
		$data['template'] = 'home/quydinhdangnhatro';
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		$this->load->view('layout/home', $data);
	}
	
	public function quydinhdangkithanhvien(){
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['title_page'] = 'Điều khoản sử dụng';
		$data['seo']['title'] = 'Điều khoản sử dụng';
		$data['template'] = 'home/quydinhdangkithanhvien';
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		$this->load->view('layout/home', $data);
	}
	
	public function index(){
		$data['linker'] = $this->linker;
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['title_page'] = 'Bảng xếp hạng nhà trọ';
		$data['seo']['title'] = 'Trang chủ';
		$data['template'] = 'home/index';
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		$data['bxh'] = $this->msearch->load_bxh();
		
		if ($this->input->post('login'))
		{
			$_post = $this->input->post('data');
			$this->form_validation->set_rules('data[username]', 'Tên đăng nhập', 'regex_match[/^([a-z0-9_])+$/i]|trim|required|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('data[password]', 'Mật khẩu', 'trim|md5');
			
			if ($this->form_validation->run()) {
				$user = $this->mauth->check_username($_post['username'], $_post['password']);
				if (NULL == $user) {
					$this->lib_string->alert(NULL, CIT_BASE_URL.'auth/login');
				}
				else {
					setcookie(CIT_PREFIX.'_user_logged', $this->lib_string->encode_cookie(json_encode($user)), time() + 3600, '/');
					$this->lib_string->alert(NULL, CIT_BASE_URL.'home/index');
				}
			}
			else {
				$this->lib_string->alert(NULL, CIT_BASE_URL.'auth/logout');
			}
				
		}
		
		
		$this->load->view('layout/home', $data);
		
	}
	
	public function quanlythongtincanhan(){
		$data['title_page'] = 'Quản lý thông tin cá nhân';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['template'] = 'home/quanlythongtincanhan';
		$this->load->view('layout/home', isset($data)? $data : NULL);
	}
	
	
}