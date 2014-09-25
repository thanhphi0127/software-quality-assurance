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
			$user = $user = $this->CI->db->select('username, password, salt')->where(array('username' => $cookie['username']))->from('user')->get()->row_array();
			if (isset($user) && count($user)) {
				if ($cookie['username'] == $user['username'] &&
					$cookie['password'] == $user['password'] &&
					$cookie['salt'] == $user['salt'])
				{
					setcookie(CIT_PREFIX.'_user_logged', $this->CI->lib_string->encode_cookie(json_encode($cookie)), time() + 3600, '/');
					return $cookie;
				}
			}
		}
		return NULL;
	}
	
}