<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	}
	
	public function quanlynguoidung(){
		$data['title'] = 'Quản lý thành viên';
		$data['press_add'] = 0;
		$data['press_modify'] = 0;
		
		$this->load->model('madmin');
		
		//Lấy mã số lớn nhất
		$data['maso'] = $this->madmin->LayMaSo();
		$data['maso']['MS'] = $data['maso']['MS'] + 1;
		
		//********************************************************************
		if ($this->input->post('btnThemThanhVien')) {
			
			//Lấy giá trị đưa vào biến POST
			$_POST = $this->input->post('add');
			
			//Load thư viện
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
			
			//Kiểm tra dữ liệu nhập vào
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
				}
				else {
					echo "<script>alert('Thành viên đã tồn tại')</script>";
				}
			}
			else {
				$data['press_add'] = 1;
			} // if form_validation	
		}
	
		//********************************************************************
		//XU LY CHINH SUA NGUOI DUNG
		if($this->input->post('btn_save')) {
			
			if (isset($_POST['checked'])){
				foreach ($_POST['checked'] as $mstv)
				{
					$_POST[$mstv] = $this->input->post($mstv);
					$this->load->helper(array('form', 'url'));
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<div class="error">','</div>');

					//Kiểm tra dữ liệu
					//$this->form_validation->set_rules($_POST[$mstv]['hoten'], 'Họ tên', 'trim|required');	
					//$this->form_validation->set_rules($_POST[$check]['sdt'], 'Số điện thoại', 'required|trim|regex_match[/^([0-9])+$/i]');
					//$this->form_validation->set_rules($_POST[$check]['ngaysinh'], 'Năm sinh', 'required|birthday');
					//$this->form_validation->set_rules($_POST[$check]['mail'], 'Địa chỉ mail', 'trim|required|valid_email');
					//$this->form_validation->set_rules($_POST[$check]['diachi'], 'Địa chỉ', 'trim|required');	
							
						//Goi model cap nhat chinh sua
						$this -> madmin -> CapNhatNguoiDung($_POST[$mstv], $mstv);
						
					//} else { echo "error"; }
					
				}//END FOREACH
			
			}
		} // END IF SUA SINH VIEN
		
		//********************************************************************
		//XU LY XOA SINH VIEN
		if($this->input->post('btn_delete')) {
			if (isset($_POST['checked'])){
				foreach ($_POST['checked'] as $mstv)
				{

					//Xoa thong tin danh gia
					$result = $this -> madmin -> XoaDanhGiaThanhVien($mstv);
					
					//Xoa thong tin gop y
					$result = $this -> madmin -> XoaGopYThanhVien($mstv);
			
					//Xoa thanh vien
					$result = $this -> madmin -> XoaThanhVien($mstv);
					
					//Xoa nguoi dung
					$result = $this -> madmin -> XoaNguoiDung($mstv);
				}
			}
		}
		
		
		//Lấy danh sách hiển thị
		$data['DanhSachThanhVien'] = $this->madmin->DanhSachThanhVien();
		
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