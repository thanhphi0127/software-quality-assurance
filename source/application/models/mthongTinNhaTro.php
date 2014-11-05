<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MthongTinNhaTro extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function load_nhatro ($maNhaTro)
	{
		/*$query = $this->db->query ("SELECT a.MA_NHATRO, a.TEN_NHATRO, a.MOTA, a.NAU_AN, a.BAIDAUXE, a.GIODONGCUA FROM `nhatro` as a\n"
									. "	WHERE MA_NHATRO = ".$maNhaTro." LIMIT 0, 30 ");*/
		$query = $this->db->query(
		 "SELECT a.*, b.*, CONCAT('đường ', c.TEN_DUONG,'- phường ' ,d.TEN_PHUONGXA, '- quận ', e.TENHUYEN)  as diachi
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
	
}