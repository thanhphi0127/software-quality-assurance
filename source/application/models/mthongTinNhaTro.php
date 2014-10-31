<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MthongTinNhaTro extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function load_nhatro ($maNhaTro)
	{
		$query = $this->db->query ("SELECT a.MA_NHATRO, a.TEN_NHATRO, a.MOTA, a.NAU_AN, a.BAIDAUXE, a.GIODONGCUA FROM `nhatro` as a\n"
									. "	WHERE MA_NHATRO = ".$maNhaTro." LIMIT 0, 30 ");
		return $query->result_array();
	}
	
	public function load_phongtro ($maNhaTro)
	{
		$query = $this->db->query ("select * from phong as a where a.ma_nhatro =".$maNhaTro."");
		return $query->result_array();
	}
}