<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	public function create_new_password($email) {
		
		$user = $this->db->select('username')->where(array('email' => $email))->from('user')->get()->row_array();
		$new_password = $this->lib_string->random(8, TRUE);
		$new_salt = $this->lib_string->random(69, TRUE);
		$new_password = $this->lib_string->encode_password($user['username'], $new_password, $new_salt);
		$this->db->update(array('password' => $new_password))->where(array('user' => $user['username']))->from('user');
		
	}
	
	
	
	
}