<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mauth extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	public function check_username($username, $password) {
		$count = $this->db->where(array('username' => $username))->from('user')->count_all_results();
		if (0 == $count) {
			return NULL;
		}
		else {
			$user = $this->db->select('username, password, salt')->where(array('username' => $username))->from('user')->get()->row_array();
			$password = $this->lib_string->encode_password($username, $password, $user['salt']);
			if ($user['password'] == $password) {
				return $user;
			}
			else 
				return NULL;
		}
	}
	
	public function check_email($email) {
		$count = $this->db->where(array('email' => $email))->from('user')->count_all_results();
		return (0 == $count) ? FALSE : TRUE;
	}
	
	
}