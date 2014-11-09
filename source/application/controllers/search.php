<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {
	
	private $username;
	private $ma_quyen;
	private $auth;
	private $linker;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		$this->auth = $this->lib_authentication->check_cookie();
		$this->username = $this->auth['username'];			
		if ($this->auth != NULL) 
			$this->ma_quyen = $this->auth['ma_quyen'];
		else
			$this->ma_quyen = 0;
		$this->linker = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
	
	public function detailsearch(){
		$data['linker'] = $this->linker;
		$data['ma_quyen'] = $this->ma_quyen;
		$data['title_page'] = 'Tìm kiếm chi tiết';
		$data['username'] = $this->username;
		$data['seo']['title'] = 'Tìm kiếm nâng cao';
		$data['seo']['keyword'] = 'advanced seach';
		$data['seo']['description'] = 'Tìm kiếm theo nhiều tiêu chí';
		
		// load quận
		$data['quan'] = $this->msearch->load_quan();
		// load phường
		$data['phuong'] = $this->msearch->load_phuong();
		//load duong
		$data['duong'] = $this->msearch->load_duong();
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		
		$data['template'] = 'search/detailsearch';
		$this->load->view('layout/search', isset($data)? $data : NULL);
		
	}
	public function areasearch(){
		$data['linker'] = $this->linker;
		$data['title_page'] = 'Tìm kiếm theo khu vực';
		$data['username'] = $this->username;
		$data['ma_quyen'] = $this->ma_quyen;
		$data['seo']['title'] = 'Tìm kiếm theo khu vực';
		$data['seo']['keyword'] = 'advanced seach';
		$data['seo']['description'] = 'Tìm kiếm theo nhiều tiêu chí';
		
		// load quận
		$data['quan'] = $this->msearch->load_quan();
		// load phường
		$data['phuong'] = $this->msearch->load_phuong();
		//load duong
		$data['duong'] = $this->msearch->load_duong();
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		
		$data['template'] = 'search/areasearch';
		$this->load->view('layout/search', isset($data)? $data : NULL);
		
	}
	
	
	
	public function quicksearch(){
		$data['linker'] = $this->linker;
		$data['username'] = $this->username;
		$data['title_page'] = 'Kết quả tìm kiếm nhanh';
		$data['ma_quyen'] = $this->ma_quyen;
		$data['seo']['title'] = 'Kết quả tìm kiếm ';
		$data['seo']['keyword'] = 'seach result';
		$data['seo']['description'] = 'Kết quả tìm kiếm';	
		
		if ($this->input->post('keyword')){
			$data['keyword'] = $this->input->post('keyword');
		}
		else 
			$data['keyword'] = 'tất cả';
		$data['result'] = $this->msearch->quicksearch($data['keyword']);
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		
		$data['template'] = 'search/quicksearch';
		$this->load->view('layout/search', isset($data)? $data : NULL);
	}
	
	public function result($type, $MA = null){
		
		$data['linker'] = $this->linker;
		$data['username'] = $this->username;
		$data['ma_quyen'] = $this->ma_quyen;
		$data['seo']['title'] = 'Kết quả tìm kiếm ';
		$data['seo']['keyword'] = 'seach result';
		$data['seo']['description'] = 'Kết quả tìm kiếm';	
		//load tiêu điểm
		$data['tieudiem'] = $this->msearch->load_tieudiem();
		
		
		if ('advance' == $type){ 
			$_post = $this->input->post('data');
			$_option = $this->input->post('option');
			$data['result'] = $this->msearch->searchbyadvanced($_post, $_option);
			$data['type'] = 'nâng cao';
		}
		else if ('area' == $type){ //Mã là mã phường, hoặc mã đường
			$data['result'] = $this->msearch->searcharea($MA);
			$data['type'] = 'theo khu vực';
		}
		else if ('target' == $type){ //$MA là MÃ tiêu điểm
			$data['result'] = $this->msearch->searchbytarget($MA);
			$data['type'] = 'theo tiêu điểm';
		}
		else if ('quick' == $type){ //$mã là từ khóa
			$data['type'] = 'nhanh';
		}
		$data['title_page'] = 'Kết quả tìm kiếm '.$data['type'];
		$data['template'] = 'search/result';
		$this->load->view('layout/search', isset($data)? $data : NULL);
	}
	
}
