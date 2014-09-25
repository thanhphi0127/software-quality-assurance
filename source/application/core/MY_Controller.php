<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __constuct() {
		parent::__construct();
		date_default_timezone_set('Asia/Saigon');
	}
}