<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	public function detailsearch(){
	
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
	
		$data['template'] = 'search/result';
		$this->load->view('layout/search', isset($data)? $data : NULL);
	}
	
}
