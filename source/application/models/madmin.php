<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	
	
	/*****************************************************
	+ Tên hàm: Danh sách thành viên
	+ Tham số: 
	+ Mục đích: Lấy danh sách thành viên để hiển thị
	+ Kết quả: Trả về một mảng thành viên
	******************************************************/
	public function DanhSachThanhVien() {
		$result = $this->db->query("SELECT MSTHANHVIEN, HOTEN, GIOITINH, MAIL, SDT, DIACHI, NGAYSINH, NGAYDANGKI 
									FROM thanhvien
									ORDER BY MSTHANHVIEN ASC");
		return $result->result_array();
	}
	
	
	
	/*****************************************************
	+ Tên hàm: Lấy mã số
	+ Tham số: 
	+ Mục đích: Lấy mã số thành viên lớn nhất
	+ Kết quả: Trả về một mảng thành viên
	******************************************************/
	public function LayMaSo() {
		$result = $this->db->query("SELECT MAX(username) AS MS FROM nguoidung");
		return $result->row_array();
	}
	
	
	/*****************************************************
	+ Tên hàm: Thêm thành viên 
	+ Tham số: Mảng data lưu thông tin thành viên cần thêm
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function ThemThanhVien($data) {
		$array_thanhvien = array(
			'msthanhvien' => $data['maso'],
			'hoten' => $data['hoten'],
			'gioitinh' => $data['gioitinh'],
			'mail' => $data['mail'],
			'sdt' => $data['sodt'],
			'diachi' => $data['diachi'],
			'ngaysinh' => $data['ngaysinh'],
			'ngaydangki' => date('Y-m-d G:m:s')
		);
		$result = $this->db->insert("thanhvien", $array_thanhvien);
		if ($result) {
			return TRUE;
		}
		else return FALSE;
	}	
	
	
	/*****************************************************
	+ Tên hàm: Thêm người dùng
	+ Tham số: Mảng data lưu thông tin thành viên cần thêm
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function ThemNguoiDung($data) {
		//Thêm vào người dùng
		$array_nguoidung = array(
			'username' => $data['maso'],
			'password' => MD5($data['matkhau']),
			'ma_quyen' => 3
		);
		$result = $this->db->insert("nguoidung", $array_nguoidung);
		if ($result) {
			return TRUE;
		}
		else return FALSE;
	}		
	
	/*****************************************************
	+ Tên hàm: Kiểm tra username tồn tại
	+ Tham số: Mảng data lưu thông tin thành viên cần thêm
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function KiemTraNguoiDung($username) {
		$count = $this->db->where(array('username' => $username))->from('nguoidung')->count_all_results();
		if ($count == 0) return false;
		else return true;	
	}
	
	/*****************************************************
	+ Tên hàm: Kiểm tra username tồn tại
	+ Tham số: Mảng data lưu thông tin thành viên cần thêm
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function KiemTraThanhVien($username) {
		$count = $this->db->where(array('msthanhvien' => $username))->from('thanhvien')->count_all_results();
		if ($count == 0) return false;
		else return true;	
	}	
	
	/*****************************************************
	+ Tên hàm: Cập nhật thông tin người dùng
	+ Tham số: Mảng data lưu thông tin thành viên cần thêm
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function CapNhatNguoiDung($data, $mstv) {
		//Bien update_data de cap nhat du lieu xuong model
		$update_data = array(
			"msthanhvien" => $mstv,
			"hoten" => $data['hoten'],
			"ngaysinh" => $data['ngaysinh'],
			"sdt" => $data['sdt'],
			"gioitinh" => $data['gioitinh'],
			"ngaydangki" => $data['ngaydangki'],
			"diachi" => $_POST[$mstv]['diachi'],
			"mail" => $data['mail']
		);
		$this->db->where('msthanhvien', $update_data['msthanhvien']);
		$result = $this->db->update('thanhvien', $update_data);
		return $result;	
	}


					
	/*****************************************************
	+ Tên hàm: 
	+ Tham số: 
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function XoaDanhGiaThanhVien($mstv) {
		$this->db->where('msthanhvien',$mstv);
		$result = $this->db->delete('danhgia');
		return $result;	
	}


	/*****************************************************
	+ Tên hàm: Cập nhật thông tin người dùng
	+ Tham số: Mảng data lưu thông tin thành viên cần thêm
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function XoaGopYThanhVien($mstv) {
		$this->db->where('msthanhvien',$mstv);
		$result = $this->db->delete('gopy');
		return $result;	
	}


	/*****************************************************
	+ Tên hàm: Cập nhật thông tin người dùng
	+ Tham số: Mảng data lưu thông tin thành viên cần thêm
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function XoaThanhVien($mstv) {
		$this->db->where('msthanhvien',$mstv);
		$result = $this->db->delete('thanhvien');
		return $result;	
	}


	/*****************************************************
	+ Tên hàm: Cập nhật thông tin người dùng
	+ Tham số: Mảng data lưu thông tin thành viên cần thêm
	+ Mục đích: Thêm thành viên vào CSDL
	+ Kết quả: 
	******************************************************/
	public function XoaNguoiDung($mstv) {
		$this->db->where('username',$mstv);
		$result = $this->db->delete('nguoidung');
		return $result;		
	}
	
	
	/****************************************************
	+ Tên hàm: Danh sách các nhà trọ
	+ Tham số: Biến $machu
	+ Mục đích: Hiển thị danh sách các nhà trọ theo chủ nhà trọ
	+ Kết quả:
	*****************************************************/
	public function ds_cacnhatro($machu) {
		$this->db->select('*')
				 -> from('nhatro')
				 ->where('mschu', $machu);
		$query = $this->db->get();
		return $query->result();
	}

	
}










