<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chunhatro extends MY_Controller {
	
	private $username;
	private $ma_quyen;
	private $auth;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		$this->auth = $this->lib_authentication->check_cookie();
		$this->username = $this->auth['username'];			
		if ($this->auth != NULL) {
			if ($this->auth['ma_quyen'] != 2)
				$this->lib_string->alert('Bạn không có quyền truy cập', CIT_BASE_URL.'auth/logout');
			$this->ma_quyen = $this->auth['ma_quyen'];
		}
		else
			$this->ma_quyen = 0;
	}
	
	
	public function profile_chunhatro(){
		$data['title_page'] = 'Hồ sơ';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$this->load->model('mchunhatro');
		$ms = 2;
		$data['datainfo'] = $this->mchunhatro->load_chunhatro($ms);
				
		$data['template'] = 'profile/profile';
		$this->load->view('layout/profile', isset($data)? $data : NULL);
		
	}
	
	public function update_chunhatro()
	{
		$data['title_page'] = 'Cập nhật chủ nhà trọ';
		$ms = '2';
		$this->load->model('mchunhatro');
	//******* load huyen - xa - duong len select box	
		// load quận
		$data['quan'] = $this->msearch->load_quan();
		// load phường
		$data['phuong'] = $this->msearch->load_phuong();
		//load duong
		$data['duong'] = $this->msearch->load_duong();
		
		//print_r ($data['duong']);
	//******** code update chu nha tro
		if(isset($_POST['btnUpdateproFile']))
		{
			$_POST = $this->input->post('edit');
			$data_info = array(
				'HOTEN' => $_POST['ten'],
				'NGAYSINH' => $_POST['ngaysinh'],
				'MAIL' => $_POST['email'],
				'SDT' => $_POST['sdt'],
				'GIOITINH' => $_POST['sex'],
				'MA_DUONG' => $_POST['duong']
				);
			$this->mchunhatro->update_chunhatro($ms,$data_info);
			echo "update thanh cong";
		}
		$data['template'] = 'profile/updateprofile';
		$this->load->view('layout/updateprofile', isset($data)? $data : NULL);
	}
	////////////////////
	public function capnhatChu($id)
	{
		$data['title_page'] = 'Cập nhật chủ nhà trọ';
		$this->load->model('mchunhatro');
		$data['datainfo'] = $this->mchunhatro->load_chunhatro($id);
		
		$data['template'] = 'profile/updateprofile';
		$this->load->view('layout/updateprofile', isset($data)? $data : NULL);
	}
	
	public function quanlynhatro(){
		$data['title_page'] = 'Quản lý nhà trọ';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['template'] = 'chunhatro/quanlynhatro';
		$this->load->view('layout/chunhatro', isset($data)? $data : NULL);
	}
	
	public function dangnhatro(){
		$data['title_page'] = 'Đăng nhà trọ';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['title'] = 'Dang Tin Nha Tro';
		//load thu vien de rang buoc du lieu nhap
		
		$this->load->helper(array('form', 'url'));
		
		
		
		//------------------------------------------------------
		
		$this->load->helper('date');
		
		
		if(isset($_POST['btnDangTin']))
		{
			// rang buoc các truong nhap tren text field
		$this->form_validation->set_rules('TenNhaTro', 'Tên nhà trọ', 'required|min_length[5]');
		$this->form_validation->set_rules('Quan', 'Quận', 'required');
		$this->form_validation->set_rules('Phuong', 'Phường', 'required');
		$this->form_validation->set_rules('Duong', 'Đường', 'required');
		$this->form_validation->set_rules('Duong', 'Đường', 'required');
		$this->form_validation->set_rules('MoTa', 'Mô tả', 'required|min_length[5]');
		$this->form_validation->set_rules('Gio', 'Giờ', 'required');
		$this->form_validation->set_rules('PhongConTrong1', 'Số phòng còn trống', 'numeric');
		$this->form_validation->set_rules('SoLuongNguoi1', 'Số lượng người', 'numeric');
		$this->form_validation->set_rules('ChieuDai1', 'Chiều dài', 'required|numeric');
		$this->form_validation->set_rules('ChieuRong1', 'Chiều rộng', 'required|numeric');
		$this->form_validation->set_rules('Gia1', 'Giá', 'required|numeric');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$_POST = $this->input->post('member');
			$data_info = array(
								'TEN_NHATRO' =>$_POST['TenNhaTro'],
								'MSCHU' =>$_POST['MaNguoiDang'],
								'MA_DUONG'=>'NK-XK-1',
								'MOTA'=> $_POST['MoTa'],
								'NAU_AN' =>isset( $_POST['NauAn'] )?1:0,
								'BAIDAUXE' =>isset( $_POST['BaiDauXe'] )?1:0,
								'SO' => $_POST['SoNha'],
								'LUOCXEM' =>'0',
								/*HINHANH =>*/
								'TUQUAN' => $_POST['TuQuan'],
								'GIODONGCUA' =>$_POST['Gio'],
								'NGAYDANG'=> date('Y-m-d'),
								'STATUS' =>'0'
								);
			$this->mchunhatro-> arInsertNhaTro($data_info);
			$ma = $this->mchunhatro->getMaNhaTro();
			echo "insert thanh cong :D";
			if($_POST['LoaiPhong'] == 1)
			{
				foreach($ma as $v)
				{
					echo $v['MA_NHATRO'] ;
				
				$phongtro_thu1 = array(
									'MA_PHONG' =>'1',
									'MA_NHATRO' =>$v['MA_NHATRO'],
									'SL_NGUOI' => $_POST['SoLuongNguoi1'],
									'CONTRONG' => $_POST['PhongConTrong1'],
									'DIENTICH' => $_POST['ChieuDai1']."x".$_POST['ChieuRong1'],
									'GIA' => $_POST['Gia1'],
									'TOILETTRONG' =>isset($_POST['NhaVeSinh1'])?1:0,
									'GAC' =>isset($_POST['CoGac1'])?1:0
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu1);
				
				echo "insert phong tro thanh cong :D";
				echo "1 loai";
			}// end 1Loai 
			//----------------------------------------------
			else if($_POST['LoaiPhong'] == 2)
			{
				//loai phong thu 1
				$this->form_validation->set_rules('PhongConTrong2', 'Số phòng còn trống', 'numeric');
				$this->form_validation->set_rules('SoLuongNguoi2', 'Số lượng người', 'numeric');
				$this->form_validation->set_rules('ChieuDai2', 'Chiều dài', 'required|numeric');
				$this->form_validation->set_rules('ChieuRong2', 'Chiều rộng', 'required|numeric');
				$this->form_validation->set_rules('Gia2', 'Giá', 'required|numeric');
				foreach($ma as $v1)
				{
					echo $v1['MA_NHATRO'] ;
				
				$phongtro_thu1 = array(
									'MA_PHONG' =>'1',
									'MA_NHATRO' =>$v1['MA_NHATRO'],
									'SL_NGUOI' => $_POST['SoLuongNguoi1'],
									'CONTRONG' => $_POST['PhongConTrong1'],
									'DIENTICH' => $_POST['ChieuDai1']."x".$_POST['ChieuRong1'],
									'GIA' => $_POST['Gia1'],
									'TOILETTRONG' =>isset($_POST['NhaVeSinh1'])?1:0,
									'GAC' =>isset($_POST['CoGac1'])?1:0
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu1);
				// loai phong thu hai
				foreach($ma as $v2)
				{
					echo $v2['MA_NHATRO'] ;
				
				$phongtro_thu2 = array(
									'MA_PHONG' =>'2',
									'MA_NHATRO' =>$v2['MA_NHATRO'],
									'SL_NGUOI' => $_POST['SoLuongNguoi2'],
									'CONTRONG' => $_POST['PhongConTrong2'],
									'DIENTICH' => $_POST['ChieuDai2']."x".$_POST['ChieuRong2'],
									'GIA' => $_POST['Gia2'],
									'TOILETTRONG' =>isset($_POST['NhaVeSinh2'])?1:0,
									'GAC' =>isset($_POST['CoGac2'])?1:0
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu2);
			}
				//---------------------------------------------------------
				//loai phong thu 3
			else if($_POST['LoaiPhong'] == 3)
			{
				//validation type2
				$this->form_validation->set_rules('PhongConTrong2', 'Số phòng còn trống', 'numeric');
				$this->form_validation->set_rules('SoLuongNguoi2', 'Số lượng người', 'numeric');
				$this->form_validation->set_rules('ChieuDai2', 'Chiều dài', 'required|numeric');
				$this->form_validation->set_rules('ChieuRong2', 'Chiều rộng', 'required|numeric');
				$this->form_validation->set_rules('Gia2', 'Giá', 'required|numeric');
				//validation type3
				$this->form_validation->set_rules('PhongConTrong3', 'Số phòng còn trống', 'numeric');
				$this->form_validation->set_rules('SoLuongNguoi3', 'Số lượng người', 'numeric');
				$this->form_validation->set_rules('ChieuDai3', 'Chiều dài', 'required|numeric');
				$this->form_validation->set_rules('ChieuRong3', 'Chiều rộng', 'required|numeric');
				$this->form_validation->set_rules('Gia3', 'Giá', 'required|numeric');
				//loai phong thu 1
				foreach($ma as $v1)
				{
					echo $v1['MA_NHATRO'] ;
				
				$phongtro_thu1 = array(
									'MA_PHONG' =>'1',
									'MA_NHATRO' =>$v1['MA_NHATRO'],
									'SL_NGUOI' => $_POST['SoLuongNguoi1'],
									'CONTRONG' => $_POST['PhongConTrong1'],
									'DIENTICH' => $_POST['ChieuDai1']."x".$_POST['ChieuRong1'],
									'GIA' => $_POST['Gia1'],
									'TOILETTRONG' =>isset($_POST['NhaVeSinh1'])?1:0,
									'GAC' =>isset($_POST['CoGac1'])?1:0
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu1);
				// loai phong thu hai
				foreach($ma as $v2)
				{
					echo $v2['MA_NHATRO'] ;
				
				$phongtro_thu2 = array(
									'MA_PHONG' =>'2',
									'MA_NHATRO' =>$v2['MA_NHATRO'],
									'SL_NGUOI' => $_POST['SoLuongNguoi2'],
									'CONTRONG' => $_POST['PhongConTrong2'],
									'DIENTICH' => $_POST['ChieuDai2']."x".$_POST['ChieuRong2'],
									'GIA' => $_POST['Gia2'],
									'TOILETTRONG' =>isset($_POST['NhaVeSinh2'])?1:0,
									'GAC' =>isset($_POST['CoGac2'])?1:0
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu2);
				foreach($ma as $v3)
				{
					echo $v3['MA_NHATRO'] ;
				
				$phongtro_thu3 = array(
									'MA_PHONG' =>'3',
									'MA_NHATRO' =>$v3['MA_NHATRO'],
									'SL_NGUOI' => $_POST['SoLuongNguoi3'],
									'CONTRONG' => $_POST['PhongConTrong3'],
									'DIENTICH' => $_POST['ChieuDai3']."x".$_POST['ChieuRong3'],
									'GIA' => $_POST['Gia2'],
									'TOILETTRONG' =>isset($_POST['NhaVeSinh3'])?1:0,
									'GAC' =>isset($_POST['CoGac3'])?1:0
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu3);
				echo "3 loai";
			}// end loai phong thu 3
		}// end of button Dang Tin
				// load quận
		$data['huyen'] = $this->msearch->load_quan();
		// load phường
		$data['phuong'] = $this->msearch->load_phuong();
		//load duong
		$data['duong'] = $this->msearch->load_duong();
		
		$data['thongtin'] = $this->mchunhatro->getTenChu($this->username);
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		
		$data['template'] = 'chunhatro/dangnhatro';
		$this->load->view('layout/chunhatro', isset($data)? $data : NULL);
		
		
}

	/************************************************
	** Cập nhật thông tin nhà trọ và phòng trọ
	**
	*************************************************/
	
	public function CapNhatNhaTro($id)
	{
		$this->load->model('mchunhatro');
		$data['tenchu'] = $this->mchunhatro->getTenChu('thuyngoc');
		$data['info'] = $this->mchunhatro->NhaTroInfo($id);
		$data['phong'] = $this->mchunhatro->PhongInfo($id);
		$so_loai =$this->mchunhatro->CountPhongTro($id);
		// cap nhat
		if(isset($_POST['btnCapNhat']))
		{
			$_POST = $this->input->post('member');
			
			$data_info = array(
								'TEN_NHATRO' =>$_POST['TenNhaTro'],
								'MSCHU' =>$_POST['MaNguoiDang'],
								'MA_DUONG'=>'NK-XK-1',
								'MOTA'=> $_POST['MoTa'],
								'NAU_AN' =>isset($_POST['NauAn'])?1:0,
								'BAIDAUXE' =>isset($_POST['BaiDauXe'])?1:0,
								/*'SO' => $_POST['SoNha'],*/
								'LUOCXEM' =>'0',
								/*HINHANH =>*/
								'TUQUAN' => $_POST['TuQuan'],
								'GIODONGCUA' =>$_POST['Gio'],
								'NGAYDANG'=> date('Y-m-d'),
								);
			$this->mchunhatro-> CapNhatNhaTro($data_info, $id);
			echo "cap nhat thanh cong";
			for($i = 1; $i <= $so_loai; $i++)
			{
				$data_phong[$i] = array(
									'SL_NGUOI' => $_POST['SoLuongNguoi'.$i],
									'CONTRONG' => $_POST['PhongConTrong'.$i],
									'DIENTICH' => $_POST['DienTich'.$i],
									'GIA' => $_POST['Gia'.$i],
									'TOILETTRONG' =>isset($_POST['NhaVeSinh'.$i])?1:0,
									'GAC' =>isset($_POST['CoGac'.$i])?1:0
									);
				$this->mchunhatro->CapNhatPhong($data_phong[$i], $i, $id);
				echo "Cap nhat thanh cong";
			}
			
		}
		
		$data['template'] = 'chunhatro/capnhatnhatro';
		$this->load->view('layout/chunhatro', isset($data)? $data : NULL);
	}
	
	
	
	
	
	/*********************************
	//dua tra y kien nhan xet nha tro
	//
	**********************************/
	public function gopy()
	{
		$data['title_page'] = 'Góp ý';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$this->load->helper('date');
		$this->load->model('mchunhatro');
		$data['info'] = $this->mchunhatro->	getThongTinThanhVien('nva');
		if(isset($_POST['btnGopY']))
		{
			$_POST = $this->input->post('member');
			for($i = 0; $i < 4; $i++)
			{
				if(isset($_POST['r'][$i]))
				{
					echo $_POST['r'][$i]; // get gia tri cua radio button
					$arr = array(
						'MSTHANHVIEN' =>$_POST['ma'],
						'MA_NHATRO' =>'40',
						'THOIGIAN' => date('Y-m-d'),
						'MUCDODANHGIA' =>$_POST['r'][$i]
						);
						$this->mchunhatro->arGopY($arr);
						echo "insert thanh cong roi!!!";
				}
			}
		}
		$data['template'] = 'chunhatro/gopy';
		$this->load->view('layout/chunhatro', isset($data)? $data : NULL);
	}
	
	
	
}