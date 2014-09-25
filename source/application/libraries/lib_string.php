<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_string {
	public $CI;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function random($length = 10, $char = FALSE) {
		if (! $char)
			$s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
		else 
			$s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		mt_srand((double)microtime() * 1000000);
		$salt = '';
		for ($i = 0; $i < $length; $i++) {
			$salt .= substr($s, mt_rand() % strlen($s), 1);
		}
		
		return $salt;
	}
	
	public function encode_password($user = '', $pass = '', $salt = '') {
		return md5($salt.$user.(md5($salt.$user.$pass.$salt).$salt));
	}
	
	public function encode_cookie($cookie) {
		return $this->random(10).base64_encode($cookie);
	}
	
	public function decode_cookie($cookie) {
		return base64_decode(substr($cookie, 10));
	}
	
	public function alert($notice, $url) {
		if (NULL != $notice)
			echo '<script language="javascript">
					alert("'.$notice.'");
				  </script>';
				  
		echo '<script language="javascript">
				window.location.href="'.$url.'";
			  </script>';
		
	}
}