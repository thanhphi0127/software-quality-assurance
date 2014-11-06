<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mchunhatro extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function load_chunhatro ($ms)
	{
		/*$query = $this->db->query("select HOTEN, GIOITINH, NGAYSINH, SDT, MAIL, TEN_DUONG, TEN_PHUONGXA, TENHUYEN
									FROM chunhatro as a, DUONG as b, PHUONGXA as c, QUANHUYEN as d
									where MSCHU like ".$ms." AND
										a.MA_DUONG = b.MA_DUONG AND
										b.MA_PHUONGXA = c.MA_PHUONGXA AND
										c.MA_HUYEN = d.MA_HUYEN");*/
		$query = $this->db->query("select a.*, b.*, c.*, d.*
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
		//print_r ($arr);
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
		$this->db->insert('nhatro', $data);
		return $this->db->insert_id();
	}
	public function arInsertPhongTro($data)
	{
		$this->db->insert('phong', $data);
	}
	public function getHuyen()
	{
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
	
	/******************************
	** Cap nhat nha tro
	** Cap nhat phong tro
	*******************************/
	
	// lay thong tin nha tro thong qua MA_NHATRO
	public function NhaTroInfo($id)
	{
		$this->db->where('MA_NHATRO', $id);
		$query = $this->db->get('nhatro');
		return $query->result_array();
		/* $query = $this->db->query("select a.*, b.* from nhatro as a, chunhatro as b
							where a.MSCHU = b.MSCHU	and 
								  a.MA_NHATRO = $id and b.USERNAME = $user
							");
		return $query->result_array();*/
	}
	
	//lay thong tin duuong
	public function DiaChiCu($id)
	{
		$query = $this->db->query(
		 "SELECT a.*, b.*, CONCAT('đường ', c.TEN_DUONG,'- phường ' ,d.TEN_PHUONGXA, '- quận ', e.TENHUYEN)  as diachi
			FROM (nhatro as a, chunhatro as b, duong as c, phuongxa as d, quanhuyen as e) 
			WHERE a.MSCHU = b.MSCHU AND a.MA_DUONG = c.MA_DUONG AND c.MA_PHUONGXA = d.MA_PHUONGXA 
					AND d.MA_HUYEN = e.MA_HUYEN AND a.MA_NHATRO=".$id
		 );
		return $query->result_array();
	}
	// lay thong tin phong tro thong qua MA_NHATRO
	public function PhongInfo($id)
	{
		$this->db->where('MA_NHATRO', $id);
		$q = $this->db->get('phong');
		return $q->result_array();
		/* $query = $this->db->query("select a.*,b.*, c.* 
		 							from nhatro as a, phong as b, chunhatro as c
									where a.MA_NHATRO = b.MA_NHATRO	and a.MSCHU = c.MSCHU 
								  	a.MA_NHATRO = $id and b.USERNAME = $user
							");
		return $query->result_array();*/
		
	}
	
	//dem so phong tro trong nha tro
	public function CountPhongTro($id)
	{
		$this->db->where('MA_NHATRO', $id);
		$query = $this->db->get('phong');
		return $query->num_rows();
	}
		
	//cap nhat nha tro	
	public function CapNhatNhaTro($data, $id)
	{
		$this->db->where('MA_NHATRO', $id);
		$this->db->update('nhatro', $data);
	}
	//cap nhap phong tro
	public function CapNhatPhong($data, $id1, $id2)
	{
		$this->db->where('MA_PHONG', $id1);
		$this->db->where('MA_NHATRO', $id2);
		$this->db->update('phong', $data);
	}
	/*****************************************************************/
	
	public function load_nhatro($username){
		$MSCHU = $this->db->query('select MSCHU from chunhatro where USERNAME = "'.$username.'"')->result_array()[0]['MSCHU'];
		$sql = $this->db->get_where('nhatro', array('MSCHU' => $MSCHU));
		$query['count'] = $sql->num_rows();
		if ($query['count'] > 0) 
			$query['nhatro'] = $sql->result_array();
		return $query;
	}
	









	public function load_gopy($username){
		$MSCHU = $this->db->query('select MSCHU from chunhatro where USERNAME = "'.$username.'"')->result_array()[0]['MSCHU'];
		$nhatro = $this->db->query('select * from nhatro where MSCHU = "'.$MSCHU.'" ')->result_array();
		$chuoi_nhatro = '';
		foreach ($nhatro as $row){	
			$chuoi_nhatro .= $row['MA_NHATRO'].', ';
			
		}
		$chuoi_nhatro .= '0';
		
		$query = $this->db->query('select * from gopy, nhatro
									where gopy.MA_NHATRO in ('.$chuoi_nhatro.') and
										 gopy.MA_NHATRO  = nhatro.MA_NHATRO
									order by THOIGIAN desc
									')->result_array();
		return $query;
	}
}


