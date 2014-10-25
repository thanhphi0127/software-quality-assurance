<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mchunhatro extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	
	public function load_thanhvien ()
	{
		$query = $this->db->query("select HOTEN, GIOITINH, NGAYSINH, STD, MAIL, TEN_DUONG, TEN_PHUONGXA, TENHUYEN
									FROM thanhvien as a, DUONG as b, PHUONGXA as c, QUANHUYEN as d
									where USERNAME like ".$username." AND
										a.MA_DUONG = b.MA_DUONG AND
										b.MA_PHUONGXA = c.MA_PHUONGXA AND
										c.MA_HUYEN = d.MA_HUYEN");
		return $query->result_array();
	}
}