<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ThongTinNhaTro extends MY_Controller {
	
	private $username;
	private $ma_quyen;
	private $auth;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		$this->auth = $this->lib_authentication->check_cookie();
		$this->username = $this->auth['username'];			
		if ($this->auth != NULL) 
			$this->ma_quyen = $this->auth['ma_quyen'];
		else
			$this->ma_quyen = 0;
	}
	
	public function danhgia($MA_NHATRO, $number){
		if ($this->username == null)
			$this->lib_string->alert('Bạn chưa đăng nhập !', CIT_BASE_URL.'thongTinNhaTro/xem_nhatro/'.$MA_NHATRO);
		else if ($this->ma_quyen == 2)
			$this->lib_string->alert('Chủ nhà trọ không thể đánh giá !', CIT_BASE_URL.'thongTinNhaTro/xem_nhatro/'.$MA_NHATRO);
		$result = $this->mthongTinNhaTro->cong_danhgia($MA_NHATRO, $number, $this->username);
		if ($result == 1)
			header('Location:'.CIT_BASE_URL.'thongTinNhaTro/xem_nhatro/'.$MA_NHATRO);
		else 
			$this->lib_string->alert('Bạn chỉ đánh giá được một lần cho mỗi nhà trọ!', CIT_BASE_URL.'thongTinNhaTro/xem_nhatro/'.$MA_NHATRO);
	}
	
	
	public function xem_nhatro ($id)
	{
		$this->load->model('mdiendan');
		$this->load->helper('date');
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		
		$data['danhgia'] = $this->mthongTinNhaTro->load_danhgia ($id);
		$data['nhatro'] = $this->mthongTinNhaTro->load_nhatro ($id);
		$data['phongtro'] = $this->mthongTinNhaTro->load_phongtro ($id);
		$data['chu'] = $this->mthongTinNhaTro->getTTChu($id);
		$data['binhluan'] = $this->mthongTinNhaTro->load_binhluan($id);
		
		$sl_nhatrolienquan = $this->mthongTinNhaTro->load_nhatrolienquan($id)['count'];
		
		if ($sl_nhatrolienquan > 0)
			$data['nhatrolienquan'] = $this->mthongTinNhaTro->load_nhatrolienquan($id)['nhatro'];
		else 
			$data['nhatrolienquan'] = null;
		
		
		$data['title_page'] = 'Nhà trọ '.$data['nhatro'][0]['TEN_NHATRO'];
		$data['ma_quyen'] = $this->ma_quyen;
		$data['username'] = $this->username;
		$data['MA_NHATRO'] = $id;
		
		
		
		// them binh luan vao nha tro
		
		if(isset($_POST['btnBinhLuan']))
		{
			$_POST = $this->input->post('member');
				$this->form_validation->set_error_delimiters('<div class="error">','</div>');
				$this->form_validation->set_rules('noidung', 'Nội dung', 'required|min_length[3]');
		
			if( $data['username'] == NULL)
			{
				echo "<script>alert('Để bình luận về nhà trọ bạn cần phải đăng nhập!')</script>";
			}
			else
			{
				
				
				$arr = array(
								'USERNAME' => $data['username'],
								'MA_NHATRO' => $id,
								'THOIGIAN' => date('Y-m-d H:i:s'),
								'NOIDUNG' => $_POST['noidung']
								);	
				if($this->form_validation->run())
				{
					$this->mthongTinNhaTro->insertbinhluan($arr);
					header('Location:'.CIT_BASE_URL.'thongTinNhaTro/xem_nhatro/'.$id);
				}
				
				
			}
		}
		$data['template'] = 'thongTinNhaTro/thongTinNhaTro';
		$this->load->view('layout/thongTinNhaTro', isset($data)? $data : NULL);
			
		
	}
	
	// binh luan
	
}
?>