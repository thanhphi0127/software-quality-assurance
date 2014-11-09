<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//**************************************************
	/*author: Tính
	** date: 19/10/2014
	   decription: truy vấn dữ liệu liên qua đến duyệt nhà trọ
	   duyệt tin....
	*/
	//**************************************************
	public function arDSNhaTroDuyet()
	{
		$sql = $this->db->query(
		 "SELECT a.*, b.*, CONCAT('đường ', c.TEN_DUONG,'- phường ' ,d.TEN_PHUONGXA, '- quận ', e.TENHUYEN)  as diachi1
			FROM (nhatro as a, chunhatro as b, duong as c, phuongxa as d, quanhuyen as e) 
			WHERE a.MSCHU = b.MSCHU AND a.MA_DUONG = c.MA_DUONG AND c.MA_PHUONGXA = d.MA_PHUONGXA 
					AND d.MA_HUYEN = e.MA_HUYEN AND a.STATUS = 1"
		 );
		 $query = $sql->result_array();
		 $query['count'] = $sql->num_rows();
		return $query;
	}
	
	public function arDSNhaTroChuaDuyet()
	{
		$sql = $this->db->query(
		 "SELECT a.*, b.*, CONCAT('đường ', c.TEN_DUONG,'- phường ' ,d.TEN_PHUONGXA, '- quận ', e.TENHUYEN)  as diachi
			FROM (nhatro as a, chunhatro as b, duong as c, phuongxa as d, quanhuyen as e) 
			WHERE a.MSCHU = b.MSCHU AND a.MA_DUONG = c.MA_DUONG AND c.MA_PHUONGXA = d.MA_PHUONGXA 
					AND d.MA_HUYEN = e.MA_HUYEN AND a.STATUS = 0"
		 );
		 $query = $sql->result_array();
		 $query['count'] = $sql->num_rows();
		return $query;
	}
	
	public function arCountDaDuyet()
	{
		$this->db->where('STATUS', "1");
		$query = $this->db->get('nhatro');
		return $query->num_rows();
	}
	public function arConditionSelect($bien)
	{
		$this->db->where('MA_NHATRO', $bien);
		$query = $this->db->get('nhatro');
		$data = $query->result_array();
		return $data; 
	}
	
	public function arMultiple_Update($bien, $id)
	{
		$this->db->where('MA_NHATRO', $id);
		$this->db->update('nhatro', $bien);
	}
	
	// xoa NHA TRO
	public function arDelete($id)
	{
		$this->db->where('MA_NHATRO', $id);
		$this->db->delete('nhatro');
	}
	// xoa PHONG TRO
	public function arXoaPhong($bien)
	{
		$this->db->query('delete from phong where MA_NHATRO ='.$bien);
	}

	
	public function arSelectUpdate($bien)
	{
		$this->db->where('MA_NHATRO', $bien);
		$query = $this->db->get('nhatro');
		$data = $query->result_array();
		return $data; 
	}
	
	//****************************
	// xu ly nha tro da duyet
	//****************************
	
	// multiple delete bording house
	public function arMultiple_Delete($id)
	{
		$this->db->where('MA_NHATRO', $id);
		$this->db->delete('nhatro');
	}
		public function arCountChuaDuyet()
	{
		$this->db->where('STATUS', "1");
		$query = $this->db->get('nhatro');
		return $query->num_rows();
	}
	
	//Tin tuc
	
	public function arDSTinChuaDuyet()
	{
		$query = $this->db->query(
		 "select a.*, b.* from dangtindiendan as a, thanhvien as b
		 	where a.NGUOIDANG = b.USERNAME
			and a.TRANGTHAI = 0
		 "
		 );
		return $query->result_array();
	}
	
	public function arDSTinDuyet()
	{
		$query = $this->db->query(
		 "select a.*, b.* from dangtindiendan as a, thanhvien as b
		 	where a.NGUOIDANG = b.USERNAME
			and a.TRANGTHAI = 1
		 "
		 );
		return $query->result_array();
	}
	// dem so dong
	
	public function arCountTinDuyet()
	{
		$this->db->where('TRANGTHAI', "1");
		$query = $this->db->get('dangtindiendan');
		return $query->num_rows();
	}
	
	public function arCountTinChuaDuyet()
	{
		$this->db->where('TRANGTHAI', "0");
		$query = $this->db->get('dangtindiendan');
		return $query->num_rows();
	}
	
	public function arConditionSelectTin($bien)
	{
		$this->db->where('MA_DANGTIN', $bien);
		$query = $this->db->get('dangtindiendan');
		$data = $query->result_array();
		return $data; 
	}
	// cap nhat lai trang thai tin tuc
	
	public function arMultiple_UpdateTin($bien, $id)
	{
		$this->db->where('MA_DANGTIN', $id);
		$this->db->update('dangtindiendan', $bien);
	}
	
	//chon ma_dangtin de update
	public function arSelectUpdateTin($bien)
	{
		$query = $this->db->query('select a.*, b.* from dangtindiendan as a, thanhvien b
						where a.NGUOIDANG = b.USERNAME
						and a.MA_DANGTIN ='.$bien);
		$data = $query->result_array();
		return $data; 
	}
	// xoa tin tuc
	public function arMultiple_DeleteTin($id)
	{
		$this->db->where('MA_DANGTIN', $id);
		$this->db->delete('dangtindiendan');
	}
	
	public function arDeleteTin($id)
	{
		$this->db->where('MA_DANGTIN', $id);
		$this->db->delete('dangtindiendan');
	}
	
	/*****************************************************
	+ Tên hàm: Danh sách thành viên
	+ Tham số: 
	+ Mục đích: Lấy danh sách thành viên để hiển thị
	+ Kết quả: Trả về một mảng thành viên
	******************************************************/
	public function DanhSachThanhVien() {
		$result = $this->db->query("SELECT USERNAME, HOTEN, GIOITINH, MAIL, SDT, DIACHI, NGAYSINH, NGAYDANGKI 
									FROM thanhvien
									ORDER BY USERNAME ASC");
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
			'USERNAME' => $data['maso'],
			'hoten' => $data['hoten'],
			'gioitinh' => $data['gioitinh'],
			'mail' => $data['mail'],
			'sdt' => $data['sodt'],
			'diachi' => $data['diachi'],
			'ngaysinh' => $data['ngaysinh'],
			'ngaydangki' => date('Y-m-d G:m:s'),
			'card' => $data['card']
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
		$count = $this->db->where(array('USERNAME' => $username))->from('thanhvien')->count_all_results();
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
			"USERNAME" => $mstv,
			"hoten" => $data['hoten'],
			"ngaysinh" => $data['ngaysinh'],
			"sdt" => $data['sdt'],
			"gioitinh" => $data['gioitinh'],
			"ngaydangki" => $data['ngaydangki'],
			"diachi" => $_POST[$mstv]['diachi'],
			"mail" => $data['mail']
		);
		$this->db->where('USERNAME', $update_data['USERNAME']);
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
		$this->db->where('USERNAME',$mstv);
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
		$this->db->where('USERNAME',$mstv);
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
		$this->db->where('USERNAME',$mstv);
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