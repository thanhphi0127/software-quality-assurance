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
		 "SELECT a.*, b.*, CONCAT(a.SO, ' ', 'đường ', c.TEN_DUONG,'- phường ' ,d.TEN_PHUONGXA, '- quận ', e.TENHUYEN)  as diachi
			FROM (nhatro as a, chunhatro as b, duong as c, phuongxa as d, quanhuyen as e) 
			WHERE a.MSCHU = b.MSCHU AND a.MA_DUONG = c.MA_DUONG AND c.MA_PHUONGXA = d.MA_PHUONGXA 
					AND d.MA_HUYEN = e.MA_HUYEN AND a.MA_NHATRO=".$maNhaTro
		 );
		return $query->result_array();
	}
	
	public function load_binhluan($id){
		$this->db->where('MA_NHATRO', $id);
		$this->db->order_by('MA_GOPY', 'desc');
		$query  = $this->db->get('gopy');
		return $query->result_array();
	}
	public function load_danhgia ($maNhaTro)
	{
		$DANHGIA = $this->db->query ("select DANHGIA from nhatro where MA_NHATRO = ".$maNhaTro )->result_array()[0]['DANHGIA'];
		return $DANHGIA;
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
	public function load_nhatrolienquan($MA_NHATRO){
		
		$MSCHU = $this->db->query('select MSCHU from nhatro where MA_NHATRO = "'.$MA_NHATRO.'"')->result_array()[0]['MSCHU'];
		$this->db->where('MSCHU' ,$MSCHU);
		$this->db->where('MA_NHATRO != ' ,$MA_NHATRO);
		$sql = $this->db->get('nhatro');
		$query['count'] = $sql->num_rows();
		if ($query['count'] > 0) 
			$query['nhatro'] = $sql->result_array();
		return $query;
	}
	
	public function loadbinhluan($id)
	{
		
		$this->db->where('MA_NHATRO', $id);
		$this->db->order_by('MA_GOPY', 'desc');
		$q = $this->db->get('gopy');
		return $q ->result_array();
	}
	
	public function insertbinhluan($data)
	{
		$this->db->insert('gopy', $data);
	}
	public function cong_danhgia($MA_NHATRO, $number, $USERNAME){
		$count_danhgia = $this->db->select('*')->from('danhgia')->where('MA_NHATRO', $MA_NHATRO)->where('USERNAME', $USERNAME)->get()->num_rows();
		if ($count_danhgia > 0) //đã đánh giá
			return 0;
			
		$DANHGIA = $this->load_danhgia($MA_NHATRO);
		$data['danhgia'] = $DANHGIA + $number;
		$this->db->where('MA_NHATRO', $MA_NHATRO);
		$this->db->update('nhatro', $data);
		
		$array['USERNAME'] = $USERNAME;
		$array['MA_NHATRO'] = $MA_NHATRO;
		$array['MUCDODANHGIA'] = $number;
		$array['THOIGIAN'] = date('Y-m-d H:i:s');
		$this->db->insert('danhgia', $array);
		return 1;
	}
}