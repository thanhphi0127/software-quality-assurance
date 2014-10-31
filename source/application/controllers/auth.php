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
			$this->ma_quyen = $this->auth['ma_quyen'];
		else
			$this->ma_quyen = 0;
	}
	
	public function login(){
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		if ($this->auth != NULL) {
			$this->lib_string->alert(NULL, CIT_BASE_URL.'home/index');
		}
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
					setcookie(CIT_PREFIX.'_user_logged', $this->lib_string->encode_cookie(json_encode($user)), time() + 3600, '/');
					$this->lib_string->alert(NULL, CIT_BASE_URL.'home/index');
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
		$data['seo']['title'] = 'Đăng kí';
		$data['seo']['keyword'] = 'register';
		$data['seo']['description'] = '';
		if ($this->input->post('register'))
		{
			$_post = $this->input->post('data');
			$data['data']['_post'] = $_post;
			$this->form_validation->set_rules('data[username]', 'Tên đăng nhập', 'regex_match[/^([a-z0-9_])+$/i]|trim|required|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('data[password]', 'Mật khẩu', 'trim|required');
			$this->form_validation->set_rules('data[email]', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('data[name]', 'Họ tên', 'trim|required');
			$this->form_validation->set_rules('data[phone]', 'Số điện thoại', 'trim|regex_match[/^([0-9])+$/i]');
			$this->form_validation->set_rules('data[sex]', 'Giới tính', 'required');
			$this->form_validation->set_rules('data[birth]', 'Năm sinh', 'required|regex_match[/^([0-9])+$/i]|birthday');
			$this->form_validation->set_rules('data[classid]', 'Lớp', 'required');
			if ($this->form_validation->run())
			{
				$_post['salt'] = $this->lib_string->random(69, TRUE);
				$_post['password'] = $this->lib_string->encode_password($_post['username'], $_post['password'], $_post['salt']);
				$_post['name'] = ucwords(strtolower($_post['name']));
				$this->db->insert('nguoidung', $_post);
				echo $this->lib_string->alert("Tạo mới tài khoản thành công", CIT_BASE_URL."auth/register");
			}
			
			
		}	
		$data['template'] = 'auth/register';
		$this->load->view('layout/auth', isset($data)?$data:NULL);
	}
	
	
	
}
