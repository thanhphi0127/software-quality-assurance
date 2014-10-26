<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdiendan extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function arInsertTin($data)
	{
		$this->db->insert('dangtindiendan',$data);
	}
	public function arGetNguoiDang($bien)
	{
		$this->db->where('MSTHANHVIEN', $bien);
		$query = $this->db->get('thanhvien');
		$data = $query->result_array();
		return $data; 
	}
	
	//----------------------------
	//dong gop y kien cho nha tro
	//----------------------------
	
	//// lay thong tin cua thanh vien
	
	public function getThongTinThanhVien($ma)
	{
		 $this->db->select('HOTEN, MSTHANHVIEN');
		 $this->db->where('MSTHANHVIEN', $ma);
		 $query = $this->db->get('thanhvien');
		 return $query->result_array();
	}
	
	// insert gop y kien cho nha tro
	public function arGopY($data)
	{
		$this->db->insert('danhgia',$data);
	}
	
	
}