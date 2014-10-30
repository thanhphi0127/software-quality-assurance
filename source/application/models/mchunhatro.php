<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mchunhatro extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function load_chunhatro ($ms)
	{
		$query = $this->db->query("select HOTEN, GIOITINH, NGAYSINH, SDT, MAIL, TEN_DUONG, TEN_PHUONGXA, TENHUYEN
									FROM chunhatro as a, DUONG as b, PHUONGXA as c, QUANHUYEN as d
									where MSCHU like ".$ms." AND
										a.MA_DUONG = b.MA_DUONG AND
										b.MA_PHUONGXA = c.MA_PHUONGXA AND
										c.MA_HUYEN = d.MA_HUYEN");
		return $query->result_array();
	}
	
	public function update_chunhatro($id, $arr)
	{
		$this->db->where('MSCHU',$id);
		$this->db->update("chunhatro", $arr);
	}
	//**************************************************
	/*author: Ngọc
	** date: 19/10/2014
	   decription: truy vấn dữ liệu liên qua đến
	   thêm nhà trọ và phòng trọ
	   duyệt tin....
	*/
	//**************************************************
	
	public function arInsertNhaTro($data)
	{
		/*$this->db->select('*')
				 ->from('quanhuyen');
				
		$query = $this->db->get();
		return $query->result_array();*/
		$this->db->insert('nhatro', $data);
	}
	public function arInsertPhongTro($data)
	{
		$this->db->insert('phong', $data);
	}
	public function getHuyen()
	{
		//$this->db->insert('quanhuyen',$data);
		/*$this->db->select('*')
				 ->from('quanhuyen');*/
		$query = $this->db->get('quanhuyen');
		return $query->result_array();	
	}
	
	public function getPhuong($ma)
	{
		$this->db->where('MA_HUYEN', $ma);
		$query = $this->db->get('phuongxa');
		$data = $query->result_array();
		return $data;	
	}
	public function getDuong($ma)
	{
		$this->db->where('MA_PHUONGXA', $ma);
		$query = $this->db->get('duong');
		$data = $query->result_array();
		return $data;	
	}
	public function getMaNhaTro()
	{
		$query = $this->db->query("select MA_NHATRO from NHATRO order by NGAYDANG desc limit 0,1");
		return $query->result_array();
	}
	//lay ten chu nha tro
	
	public function getTenChu($ma)
	{
		 $this->db->select('HOTEN, MSCHU');
		 $this->db->where('USERNAME', $ma);
		 $query = $this->db->get('chunhatro');
		 return $query->result_array();
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