<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_authentication {
	public $CI;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function check_cookie() {
		if (isset($_COOKIE[CIT_PREFIX.'_user_logged']) && !empty($_COOKIE[CIT_PREFIX.'_user_logged'])) {
			$cookie = $_COOKIE[CIT_PREFIX.'_user_logged'];
			$cookie = $this->CI->lib_string->decode_cookie($cookie);
			$cookie = json_decode($cookie, TRUE);

			$user = $user = $this->CI->db->select('username, password, ma_quyen')->where(array('username' => $cookie['username']))->from('nguoidung')->get()->row_array();
			if (isset($user) && count($user)) {
				if ($cookie['username'] == $user['username'] && $cookie['password'] == $user['password'] && $cookie['ma_quyen'] == $user['ma_quyen'] )
				{
					setcookie(CIT_PREFIX.'_user_logged', $this->CI->lib_string->encode_cookie(json_encode($cookie)), time() + 3600, '/');
					if ($user['ma_quyen'] == 2){					
					$table= 'chunhatro';
					}
					else if ($user['ma_quyen'] == 3) {
						$table = 'thanhvien';
					}
					
				/*	$query  = $this->CI->db->select('HOTEN')->get_where($table, array('USERNAME' => $cookie['username']))->result_array();
					$cookie['HOTEN'] = $query[0]['HOTEN'];*/
					return $cookie;
				}
				
			}
		}
		return NULL;
	}
	
	public function classify_user($user){
		$this->CI->db->select('MA_QUYEN');
		return $this->CI->db->get_where('nguoidung', array('USERNAME' => $user))->result_array()[0]['MA_QUYEN'];
	}
	
}