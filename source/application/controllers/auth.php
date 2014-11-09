<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {
	private $username;
	private $ma_quyen;
	private $auth;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		$this->auth = $this->lib_authentication->check_cookie();
		$this->username = $this->auth['username'];			
		if ($this->auth != NULL) 
			echo "<script>	window.history.back();</script>";
		else
			$this->ma_quyen = 0;
	}
	
	public function login(){
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		$data['title_page'] = 'Đăng nhập';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		
		$data['seo']['title'] = 'Đăng nhập vào hệ thống';
		$data['seo']['keyword'] = 'login';
		$data['seo']['description'] = 'Đăng nhập vào hệ thống';
		if ($this->input->post('login'))
		{
			$_post = $this->input->post('data');
			$this->form_validation->set_rules('data[username]', 'Tên đăng nhập', 'regex_match[/^([a-z0-9_])+$/i]|trim|required|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('data[password]', 'Mật khẩu', 'trim|md5');
			
			if ($this->form_validation->run()) {
				$user = $this->mauth->check_username($_post['username'], $_post['password']);
				if (NULL == $user) {
					$this->lib_string->alert("Sai tên đăng nhập hoặc mật khẩu", CIT_BASE_URL.'auth/login');
				}
				else {
					setcookie(CIT_PREFIX.'_user_logged', $this->lib_string->encode_cookie(json_encode($user)), time() + 7200, '/');
					if ($_post['linker'] == '')
						$this->lib_string->alert(NULL, CIT_BASE_URL.'home/index');
					else $this->lib_string->alert(NULL, $_post['linker']);
				}
			}
		}	
		$data['template'] = 'auth/login';
		$this->load->view('layout/auth', isset($data) ? $data : NULL);

	}
	
	public function logout(){
		if ($this->auth != NULL) 
			setcookie(CIT_PREFIX.'_user_logged', NULL, time()-3600, '/');
			
		$this->lib_string->alert(NULL, CIT_BASE_URL."home/index");
	}
	
	public function forgot(){
		$data['title_page'] = 'Quên mật khẩu';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['seo']['title'] = 'Quên mật khẩu';
		$data['seo']['keyword'] = 'forgot password';
		$data['seo']['description'] = '';
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		$data['template'] = 'auth/forgot';
		if ($this->input->post('send'))
		{
			
			$this->lib_string->alert("Thành công ! Kiểm tra mail để nhận mật khẩu", CIT_BASE_URL.'home/index');				
			
			
		}	
		$this->load->view('layout/auth', isset($data) ? $data : NULL);
		
	}
	public function register(){
		$data['title_page'] = 'Đăng ký';
		$data['ma_quyen'] = $this->ma_quyen;
		
		$data['seo']['title'] = 'Đăng kí';
		$data['seo']['keyword'] = 'register';
		$data['seo']['description'] = '';
		
		$data['press_add'] = 0;
		$data['press_modify'] = 0;
		$data['success'] = false;
		if ($this->input->post('btnThemThanhVien')) {
			//Lấy giá trị đưa vào biến POST
			$_POST = $this->input->post('add');
			
			//Load thư viện
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
			
			//Kiểm tra dữ liệu nhập vào
			$this->form_validation->set_rules('maso','Username','trim|required|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('matkhau','Mật khẩu','trim|required|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('hoten', 'Họ tên', 'trim|required|min_length[3]|max_length[40]');					
			$this->form_validation->set_rules('sodt', 'Số điện thoại', 'required|trim|regex_match[/^([0-9])+$/i]');
			$this->form_validation->set_rules('ngaysinh', 'Năm sinh', 'required|birthday');
			$this->form_validation->set_rules('mail', 'Địa chỉ mail', 'trim|required|valid_email');
			$this->form_validation->set_rules('diachi', 'Địa chỉ', 'trim|required');
			
			if ($this->form_validation->run()) {
				if (!$this->madmin->KiemTraNguoiDung($_POST['maso']) && !$this->madmin->KiemTraThanhVien($_POST['maso'])){
					//Gọi model thêm vào người dùng
					$this->madmin->ThemNguoiDung($_POST);
					//Gọi model thêm thành viên
					$this->madmin->ThemThanhVien($_POST);
					$data['success'] = true;
				}
				else {
					echo "<script>alert('Thành viên đã tồn tại')</script>";
				}
				
			}
			else {
				$data['press_add'] = 1;
			} // if form_validation	
		}
	
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		$data['template'] = 'auth/register';
		$this->load->view('layout/auth', isset($data)?$data:NULL);
	}
	
	
	
}
