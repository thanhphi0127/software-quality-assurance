<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdangky extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function capNhatNguoiDung($addUser) {
		$this->db->insert('nguoidung', $addUser);
	}
	
	public function capnhatThanhVien($addMember) {
		$this->db->insert('thanhvien',$addMember);
	}
}