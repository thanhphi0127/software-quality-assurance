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
		$query = $this->db->query(
		 "SELECT a.*, b.*, CONCAT('đường ', c.TEN_DUONG,'- phường ' ,d.TEN_PHUONGXA, '- quận ', e.TENHUYEN)  as diachi1
			FROM (nhatro as a, chunhatro as b, duong as c, phuongxa as d, quanhuyen as e) 
			WHERE a.MSCHU = b.MSCHU AND a.MA_DUONG = c.MA_DUONG AND c.MA_PHUONGXA = d.MA_PHUONGXA 
					AND d.MA_HUYEN = e.MA_HUYEN AND a.STATUS = 1"
		 );
		return $query->result_array();
	}
	
	public function arDSNhaTroChuaDuyet()
	{
		$query = $this->db->query(
		 "SELECT a.*, b.*, CONCAT('đường ', c.TEN_DUONG,'- phường ' ,d.TEN_PHUONGXA, '- quận ', e.TENHUYEN)  as diachi
			FROM (nhatro as a, chunhatro as b, duong as c, phuongxa as d, quanhuyen as e) 
			WHERE a.MSCHU = b.MSCHU AND a.MA_DUONG = c.MA_DUONG AND c.MA_PHUONGXA = d.MA_PHUONGXA 
					AND d.MA_HUYEN = e.MA_HUYEN AND a.STATUS = 0"
		 );
		return $query->result_array();
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
	
	public function arDelete($id)
	{
		$this->db->where('MA_NHATRO', $id);
		$this->db->delete('nhatro');
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
		 	where a.NGUOIDANG = b.MSTHANHVIEN
			and a.TRANGTHAI = 0
		 "
		 );
		return $query->result_array();
	}
	
	public function arDSTinDuyet()
	{
		$query = $this->db->query(
		 "select a.*, b.* from dangtindiendan as a, thanhvien as b
		 	where a.NGUOIDANG = b.MSTHANHVIEN
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
		$this->db->where('MA_DANGTIN', $bien);
		$query = $this->db->get('dangtindiendan');
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
}