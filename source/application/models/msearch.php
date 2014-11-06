<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msearch extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	
	function load_quan(){
		$this->db->select('TENHUYEN, MA_HUYEN');
		return $this->db->get('quanhuyen')->result_array();
	}
	
	function load_phuong(){
		$this->db->select('TEN_PHUONGXA, MA_PHUONGXA');
		return $this->db->get('phuongxa')->result_array();
	}
	
	function load_duong(){
		$phuong = $this->load_phuong();
		foreach ($phuong as $row){
			$this->db->select('TEN_DUONG, MA_DUONG');
			$duong[$row['MA_PHUONGXA']] = $this->db->get_where('duong', array('MA_PHUONGXA' => $row['MA_PHUONGXA']))->result_array();
		}
		return $duong;
	}
	public function load_bxh(){
		//1st
		$sql = $this->db->query('select * 
								 from nhatro
								 where DANHGIA in (select MAX(DANHGIA) from nhatro)');
		$query['count'] = $sql->num_rows();
		$query['nhatro']['st'] = $sql->result_array();
		
		//2nd
		
		$array_exp  = '';
		foreach ($query['nhatro']['st'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		$array_exp  .= '0';
		$sql = $this->db->query('select * 
								 from nhatro
								 where DANHGIA in (select MAX(DANHGIA) 
												   from nhatro
												   where MA_NHATRO not in ('.$array_exp.'))');
		$query['count'] += $sql->num_rows();
		$query['nhatro']['nd'] = $sql->result_array();
		
		//3rd
		$array_exp  = '';
		foreach ($query['nhatro']['nd'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		foreach ($query['nhatro']['st'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		$array_exp  .= '0';
		$sql = $this->db->query('select * 
								 from nhatro
								 where DANHGIA in (select MAX(DANHGIA) 
												   from nhatro
												   where MA_NHATRO not in ('.$array_exp.'))');
		$query['count'] += $sql->num_rows();		
		$query['nhatro']['rd'] = $sql->result_array();
		
		//4th
		$array_exp  = '';
		foreach ($query['nhatro']['nd'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		foreach ($query['nhatro']['st'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		foreach ($query['nhatro']['rd'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		$array_exp  .= '0';
		$sql = $this->db->query('select * 
								 from nhatro
								 where DANHGIA in (select MAX(DANHGIA) 
												   from nhatro
												   where MA_NHATRO not in ('.$array_exp.'))');
		$query['count'] += $sql->num_rows();		
		$query['nhatro']['4th'] = $sql->result_array();
		
		
		//5th
		$array_exp  = '';
		foreach ($query['nhatro']['nd'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		foreach ($query['nhatro']['st'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		foreach ($query['nhatro']['rd'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		foreach ($query['nhatro']['4th'] as $row){
			$array_exp .= $row['MA_NHATRO'].', ';
		}
		$array_exp  .= '0';
		$sql = $this->db->query('select * 
								 from nhatro
								 where DANHGIA in (select MAX(DANHGIA) 
												   from nhatro
												   where MA_NHATRO not in ('.$array_exp.'))');
		
		$query['count'] += $sql->num_rows();
		$query['nhatro']['5th'] = $sql->result_array();
		
		return $query;
	}
	
	function searcharea($MA_DUONG) {
		$array = explode('-', $MA_DUONG);
		if ('0' == $array[2]) {
			
			$query['count'] = $this->db->query ('select MA_NHATRO
							   from nhatro
							   where MA_DUONG like "'.$array[0].'-'.$array[1].'%"
							   ')->num_rows();
			
			if (0 == $query['count'])
				$query['nhatro'] = null;
			else {
				$query['nhatro'] =  $this->db->query('select *
													  from nhatro
													  where MA_DUONG like "'.$array[0].'-'.$array[1].'-'.'%"
													  ')->result_array();
				
				foreach ($query['nhatro'] as $row){
				$query['phong'][$row['MA_NHATRO']] = $this->db->query('select * 
																	   from phong
																	   where MA_NHATRO = '.$row['MA_NHATRO'])->result_array();
				}
			}
			
			
			
			$query['area'][0]['TENHUYEN'] = $this->db->query('select TENHUYEN
																  from quanhuyen
																  where MA_HUYEN = "'.$array[0].'"')->result_array()[0]['TENHUYEN'];
																  
			$query['area'][0]['TEN_PHUONGXA'] = $this->db->query('select TEN_PHUONGXA
												from phuongxa
												where MA_PHUONGXA = "'.$array[0].'-'.$array[1].'"')->result_array()[0]['TEN_PHUONGXA'];
			
		}
		else {
			$query['count'] = $this->db->query ('select MA_NHATRO
							   from nhatro
							   where MA_DUONG = "'. $MA_DUONG.'"')->num_rows();
			
			if (0 == $query['count'])
				$query['nhatro'] = null;
			else {
				$query['nhatro'] =  $this->db->query('select *
								  from nhatro
								  where MA_DUONG = "'.$MA_DUONG.'"
								  ')->result_array();
				foreach ($query['nhatro'] as $row){
					$count = $this->db->query('select * 
												from phong
												where MA_NHATRO = '.$row['MA_NHATRO'])->num_rows();
					if (0 != $count) {
						$query['phong'][$row['MA_NHATRO']] = $this->db->query('select * 
																			   from phong
																			   where MA_NHATRO = '.$row['MA_NHATRO'])->result_array();
					}
				}
			}
			
			$query['area'] = $this->db->query('select TEN_PHUONGXA, TENHUYEN, TEN_DUONG
							  from duong, phuongxa, quanhuyen
							  where duong.MA_DUONG = "'.$MA_DUONG.'" and
									duong.MA_PHUONGXA = phuongxa.MA_PHUONGXA and
									phuongxa.MA_HUYEN = quanhuyen.MA_HUYEN')->result_array();
									
		}
		return $query;
	}
	
	function searchbyadvanced($_post, $_option) {
		//lấy mã quận, phuong xã từ tham số dầu vào
		$MA_PHUONGXA = '';
		if ('0' == $_post['MA_HUYEN']) {// không giới hạn 
			$array_MA_PHUONGXA = $this->db->query('select MA_PHUONGXA
										 from phuongxa, quanhuyen
										 where  quanhuyen.MA_HUYEN = phuongxa.MA_HUYEN ')->result_array();
			foreach ($array_MA_PHUONGXA as $row){
				$MA_PHUONGXA .= '"'.$row['MA_PHUONGXA'].'",';
			}
			$MA_PHUONGXA .= '"0"';
		}
		else { //một số phường trong huyện (hoặc tất cả phường thuộc một huyện
			if (isset($_post['MA_PHUONGXA']) && !empty($_post['MA_PHUONGXA'])){ //giới hạn phường xã nào đó
				
				foreach ($_post['MA_PHUONGXA'] as $row){
					$MA_PHUONGXA .= '"'.$row.'",';
				}
				$MA_PHUONGXA .= '"0"';
			}
			else {//tất cả phuong xa thuộc một quận
			
				$array_MA_PHUONGXA = $this->db->query('select MA_PHUONGXA
													 from phuongxa
													 where MA_HUYEN = "'.$_post['MA_HUYEN'].'"')->result_array();
				foreach ($array_MA_PHUONGXA as $row){
					$MA_PHUONGXA .= '"'.$row['MA_PHUONGXA'].'",';
				}
				$MA_PHUONGXA .= '"0"';
			}
		}
		
		
		//Lây ra đường từ phuong xã
		$MA_DUONG = '';
		$array_MA_DUONG = $this->db->query('select duong.MA_DUONG
									  from duong
									  where duong.MA_PHUONGXA in ('.$MA_PHUONGXA.')')->result_array();
		
		foreach ($array_MA_DUONG as $row){
					$MA_DUONG .= '"'.$row['MA_DUONG'].'",';
				}
				$MA_DUONG .= '"0"';
		
		
		
		
		//lấy nhà trọ, phòng
		// Tạo chuỗi truy vấn dựa vào tiêu chí
		$query_nhatro_string = 'select * 
								from nhatro
								where MA_DUONG in ('.$MA_DUONG.')';
		
		
		
		if (!empty($_option)) {
				foreach ($_option as $item) {
					if ('NAU_AN' == $item) {
						$query_nhatro_string .= ' and NAU_AN = 1';
					}
					if ('BAIDAUXE' == $item){
						$query_nhatro_string .= ' and BAIDAUXE = 1';
					}
				}
		}
		
		$query['count'] = $this->db->query ($query_nhatro_string)->num_rows();
		
		
		
		if (0 == $query['count'] )
			$query['nhatro'] = null;
		else {
			$query['nhatro'] = $this->db->query($query_nhatro_string)->result_array();
			$query['count'] = 0;
			$i = 0;
			foreach ( $query['nhatro'] as $row){
				$query_phong_string = 'select *
										from phong
										where MA_NHATRO = '.$row['MA_NHATRO'];
				if ($_post['GIA'] != '0-0') {
					$GIA = explode('-', $_post['GIA']);
					$query_phong_string .= ' and GIA BETWEEN '.$GIA[0]. ' AND '.$GIA[1];
				}
			
				if ($_post['SL_NGUOI'] != 0){
					if ($_post['SL_NGUOI'] == '>4')
						$query_phong_string .= ' and SL_NGUOI >  4' ;
					else 
						$query_phong_string .= ' and SL_NGUOI <=  '.$_post['SL_NGUOI'];
				}
				if (!empty($_option)) {
						foreach ($_option as $item) {
							if ('GAC' == $item) {
								$query_phong_string .= ' and GAC = 1';
							}
							if ('TOILETTRONG' == $item){
								$query_nhatro_string .= ' and TOILETTRONG = 1';
							}
						}
				}
				
				$count = $this->db->query($query_phong_string)->num_rows();
				if (0 != $count) {
					$query['phong'][$row['MA_NHATRO']] =  $this->db->query($query_phong_string)->result_array();
					$query['count']  =  intval($query['count']) + 1;
				}
				else {
					unset($query['nhatro'][$i]);
				}
				$i ++;
			}			
		}
		
		return $query;
	}
	
	function load_tieudiem() {
		return $this->db->query('select distinct MA_TIEUDIEM, TEN_TIEUDIEM
						  from tieudiem')->result_array();
	}
	
	function searchbytarget($MA_TIEUDIEM) {
		
		$MA_DUONG =  $this->db->query('select MA_DUONG
									   from tieudiem
									   where MA_TIEUDIEM = "'.$MA_TIEUDIEM.'"
										')->result_array();
		$string_MA_DUONG = '';
		foreach ($MA_DUONG as $item){
			$string_MA_DUONG .= '"'.$item['MA_DUONG'].'", ';
		}
		$string_MA_DUONG .= '"0"';
		
		$query['count'] = $this->db->query ('select MA_NHATRO
							   from nhatro
							   where MA_DUONG in ('. $string_MA_DUONG.')')->num_rows();
			
			if (0 == $query['count'])
				$query['nhatro'] = null;
			else {
				$query['nhatro'] =  $this->db->query('select *
								  from nhatro
								  where MA_DUONG in ('. $string_MA_DUONG.')')->result_array();
				foreach ($query['nhatro'] as $row){
					$count = $this->db->query('select * 
												 from phong
												 where MA_NHATRO = '.$row['MA_NHATRO'])->num_rows();
					if (0 != $count) {
						$query['phong'][$row['MA_NHATRO']] = $this->db->query('select * 
																		   from phong
																		   where MA_NHATRO = '.$row['MA_NHATRO'])->result_array();
					}
				}
			}
		$query['TEN_TIEUDIEM'] = $this->db->query('select TEN_TIEUDIEM
												   from tieudiem
												   where MA_TIEUDIEM = "'.$MA_TIEUDIEM.'"')->result_array()[0]['TEN_TIEUDIEM'];
		return $query;
	}
	
	
	public function quicksearch($key) {
		$query['count'] = 0;
		$query['nhatro'] = array();
		$i = 0;
		$sql = 'select * 
				from nhatro
				where';
		if ($key == '' || $key == 'tất cả') {
			$sql .= ' 1';
		}
		else {
			$array_key = explode(' ', $key);
			foreach ($array_key as $item) {
				$sql .= ' TEN_NHATRO like "%'.$item.'%" or  MOTA like "%'.$item.'%" or ';
			}
			$sql .= '0 > 1';
		}
		
		$temp_query = $this->db->query($sql);
		$temp_count = $temp_query->num_rows();
		if ($temp_count != 0){
			$query['count'] += $temp_count;
			$query['nhatro'][$i] = $temp_query -> result_array();
			$i ++;
		}
		
		
		return $query;
	}
}
