<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	private $username;
	private $ma_quyen;
	private $auth;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		$this->auth = $this->lib_authentication->check_cookie();
		$this->username = $this->auth['username'];			
		
		if ($this->auth != NULL) {
			if ($this->auth['ma_quyen'] != 1)
				$this->lib_string->alert('Bạn không có quyền truy cập', CIT_BASE_URL.'auth/logout');
			$this->ma_quyen = $this->auth['ma_quyen'];
		}
		else 
			$this->ma_quyen = 0;
	}
	
	public function quanlynguoidung(){	
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['title_page'] = 'Quản lý thành viên';
		
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
	//**************************************************
	/*	hien thi danh sach các nhà tro
		da duyet va chua duyet
		có thể duyệt cùng lúc nhiều nhà trọ
		nhà trọ đã duyệt --> co thể cùng lúc xóa nhiều nhà trọ
	*/ 
	//**************************************************
	public function duyetnhatro()
	{
		$data['title_page'] = 'Duyệt nhà trọ';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$this->load->model('madmin');
		$data['data_info'] = $this->madmin->arDSNhaTroDuyet();
		$data['info'] = $this->madmin->arDSNhaTroChuaDuyet();
		
		$bien = $this->madmin->arCountChuaDuyet();
		
		//****************************
		// xu ly nha tro chua duyet
		//****************************
		
		// duyet cac nha tro
		if(isset($_POST['btnDuyetNhaTro']))
		{	
		echo $bien;
			for($i = 0; $i < $bien; $i++)
			{
				echo $_POST['member'][$i];
				if(isset($_POST['member'][$i]))
				{
					$arr = $this->madmin->arConditionSelect($_POST['member'][$i]);
					foreach($arr as $v)
					{
						$mang = array(
							"STATUS" => "1"
						);	
					$this->madmin->arMultiple_Update($mang, $_POST['member'][$i]);	
					//$result = $this->Mhone->arMultiple_Select();
					header('Location:http://localhost/timkiemnhatro/admin/duyetnhatro');
					}// end foreach $arr
				}// end if
		}// for loop
		}// end if(isset($_POST['btnDuyetNhaTro']))
		
		// xoa tung nha tro chua duyet
		if(isset($_POST['btn_delete']))
		{
			$_POST = $this->input->post('delete');
			
			//xoa phong tro truoc
			$this->madmin->arXoaPhong($_POST['ma_nhatro']);
			echo "xoa phong thanh cong";
			//sau do den xoa nha tro
			$this->madmin->arDelete($_POST['ma_nhatro']);
			echo "xoa nha tro  thanh cong";
		}
		
		
		//****************************
		// xu ly nha tro  duyet
		//****************************
		
		
		$chua_duyet = $this->madmin->arCountDaDuyet();
		if(isset($_POST['btnXoaNhaTro']))
		{
			for($i = 0; $i < $chua_duyet; $i++)
			{
				if(isset($_POST['daduyet'][$i]))
				{
					/***********
					xác nhận xóa
					**************/
					$arr = $this->madmin->arConditionSelect($_POST['daduyet'][$i]);
					$this->madmin->arXoaPhong($_POST['daduyet'][$i]);
					$this->madmin->arMultiple_Delete($_POST['daduyet'][$i]);
					header('Location:http://localhost/timkiemnhatro/admin/duyetnhatro');
				}// end if(isset($_POST['daduyet'][$i]))
			}// end for loop
		}//end if(isset($_POST['btnXoaNhaTro']))
		$data['template'] = 'admin/duyetnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}// end function duyetnhatro	
	
	
	public function xoaTinNhaTro($id)
	{
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$this->load->model(madmin);
		$data['data_info'] = $this->madmin->arSelectUpdate($id);
		$this->madmin->arDelete($id);
		echo "Xoa xong roi :(!";
		$data['template'] = 'admin/duyetnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}

	// duyet tung nha tro
	public function duyettungnhatro($id)
	{
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		//$this->load->model(madmin);
		$data['nhatro'] = $this->mthongTinNhaTro->load_nhatro ($id);
		$data['phongtro'] = $this->mthongTinNhaTro->load_phongtro ($id);
		$data['chu'] = $this->mthongTinNhaTro->getTTChu($id);
		
		$data['data_info'] = $this->madmin->arSelectUpdate($id);
		if(isset($_POST['btnDuyetTin']))
		{
			foreach($data as $v)
			{
				$mang = array(
						"STATUS" => "1"
						);	
				$this->madmin->arMultiple_Update($mang, $id);	
			}
			header('Location:'.CIT_BASE_URL.'admin/duyetnhatro');
		}
		$data['template'] = 'admin/duyettungnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	// xoa tung nha tro thong qua bang các nha tro da duyet
	
	public function xoatungnhatro($id)
	{
			
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		//$this->load->model(madmin);
		$data['nhatro'] = $this->mthongTinNhaTro->load_nhatro ($id);
		$data['phongtro'] = $this->mthongTinNhaTro->load_phongtro ($id);
		$data['chu'] = $this->mthongTinNhaTro->getTTChu($id);
			
		$data['data_info'] = $this->madmin->arSelectUpdate($id);
		
		
		if(isset($_POST['btnXoa']))
		{
			/*$this->madmin->arXoaPhong($id);
			$this->madmin->arMultiple_Delete($id);	*/
					/***********
					xác nhận xóa
					**************/
			echo "<script>alert('Bạn có chắc xóa không?')</script>";
			$this->madmin->arXoaPhong($id);
			$this->madmin->arMultiple_Delete($id);
			header('Location:'.CIT_BASE_URL.'admin/duyetnhatro');
			
		}
		$data['template'] = 'admin/xoatungnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	

	//**************************************************
	/*	hien thi danh sach các TIN TUC
		da duyet va chua duyet
		có thể duyệt cùng lúc nhiềuTIN TUC
		nhà trọ đã duyệt --> co thể cùng lúc xóa nhiều TIN TUC
	*/ 
	//**************************************************
	
	public function duyettintuc()
	{
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$this->load->model('madmin');
		$data['data_info'] = $this->madmin->arDSTinDuyet();
		$data['info'] = $this->madmin->arDSTinChuaDuyet();
		$bien = $this->madmin->arCountTinChuaDuyet();
		// duyet nhieu tin tuc
		
		if(isset($_POST['btnDuyetTin']))
		{
			for($i = 0; $i < $bien; $i++)
			{
				if(isset($_POST['member'][$i]))
				{
					$arr = $this->madmin->arConditionSelectTin($_POST['member'][$i]);
				foreach($arr as $v)
				{
					$mang = array(
						"TRANGTHAI" => "1"
					);	
				$this->madmin->arMultiple_UpdateTin($mang, $_POST['member'][$i]);	
				//$result = $this->Mhone->arMultiple_Select();
				header('Location:http://localhost/timkiemnhatro/admin/duyettintuc');
				}
				}
			}
		}
		if(isset($_POST['btn_delete']))
		{
			$_POST = $this->input->post('delete');
			
			$this->madmin->arDeleteTin($_POST['ma_nhatro']);
			echo "Xoa xong roi :(!";
		}	
		// xoa nhieu tin tuc
		$chua_duyet = $this->madmin->arCountTinDuyet();
		if(isset($_POST['btnXoaTin']))
		{
			for($i = 0; $i < $chua_duyet; $i++)
			{
				if(isset($_POST['daduyet'][$i]))
				{
					$arr = $this->madmin->arConditionSelectTin($_POST['daduyet'][$i]);
					$this->madmin->arMultiple_DeleteTin($_POST['daduyet'][$i]);
					header('Location:http://localhost/timkiemnhatro/admin/duyettintuc');
				}
			}
			echo "xoa roi sao :'( huc huc";
		}
		//goi view
		$data['template'] = 'admin/duyettintuc';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	
	public function duyettungtin($id)
	{
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$this->load->model(madmin);
		$data['data_info'] = $this->madmin->arSelectUpdateTin($id);
		if(isset($_POST['btnDuyetTin']))
		{
			foreach($data as $v)
			{
				$mang = array(
						"TRANGTHAI" => "1"
						);	
				$this->madmin->arMultiple_UpdateTin($mang, $id);	
			}
			echo "duyet thanh cong";
			
		}
		header('Loacation:http://localhost/timkiemnhatro/admin/duyettintuc');
		$data['template'] = 'admin/duyettungtin';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	//*****************************
	/*Duyet tung nha tro new	*/
	//******************************
	
	
	public function load_nhatro ($maNhaTro)
	{
		
		$query = $this->db->query(
		 "SELECT a.*, b.*, CONCAT(a.SO, ' ', 'đường ', c.TEN_DUONG,'- phường ' ,d.TEN_PHUONGXA, '- quận ', e.TENHUYEN)  as diachi
			FROM (nhatro as a, chunhatro as b, duong as c, phuongxa as d, quanhuyen as e) 
			WHERE a.MSCHU = b.MSCHU AND a.MA_DUONG = c.MA_DUONG AND c.MA_PHUONGXA = d.MA_PHUONGXA 
					AND d.MA_HUYEN = e.MA_HUYEN AND a.MA_NHATRO=".$maNhaTro
		 );
		return $query->result_array();
	}
	
	
	public function load_phongtro ($maNhaTro)
	{
		$query = $this->db->query ("select * from phong as a where a.ma_nhatro =".$maNhaTro."");
		return $query->result_array();
	}
	public function getTTChu($manhatro)
	{
		$query = $this->db->query("select a.*, b.* from nhatro as a, chunhatro as b
									where a.MSCHU = b.MSCHU
									and a.MA_NHATRO =".$manhatro);
		return $query->result_array();
	}
	
	public function quanlychunhatro(){
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['title_page'] = 'Quản lý chủ nhà trọ';
        $data['seo']['title'] = 'Quản lý chủ nhà trọ';
        $data['check'] = 0;
        $this->load->Model('madmin');
        $this->load->Model('msearch');
        $this->load->helper('url');
        // Include validation library
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data['duong'] = $this->msearch->load_duong();
        $data['phuong'] = $this->msearch->load_phuong();
        $data['huyen'] = $this->msearch->load_quan();
        $data['chunhatro'] = $this->madmin->getChuNhaTro();
        /*******************************************************
                        Chinh sua
        *******************************************************/
        if(isset($_POST['check_empty'])) {
            $_POST = $this->input->post('chu');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>'); 
            $this->form_validation->set_rules('hoten','Họ tên','trim|required');
            $this->form_validation->set_rules('sonha','Số nhà','trim|required');
            $this->form_validation->set_rules('sdt','Số điện thoại','trim|required|is_numeric');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            
            if ($this->form_validation->run() == FALSE) {
                $data['check'] = 1;
            } 
            else {
                $machu = $_POST['mschu'];
                $ngaysinh = $_POST['nam']."-".$_POST['thang']."-".$_POST['ngay'];

                $update = array(
                              'username' => 'trang',
                              'gioitinh' => $_POST['gioitinh'],
                              'ma_duong' => $_POST['duong'],
                              'hoten' => $_POST['hoten'],
                              'sdt' => $_POST['sdt'],
                              'mail' => $_POST['email'],
                              'ngaysinh' => $ngaysinh
                           );
                $soNha = array('so' => $_POST['sonha']);
                $this->madmin->update_soNha($soNha, $machu);
                $this->madmin->update_chu($update, $machu);
            }
        }
        // Load dia chi
        
        
        $data['template'] = 'admin/quanlychunhatro';
        $this->load->view('layout/admin', isset($data)? $data : NULL);
    }
}