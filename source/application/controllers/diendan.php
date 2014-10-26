<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diendan extends MY_Controller
	{
	
	public function __construct(){
		parent::__construct();
	
	}
	
	public function dangtintuc()
	{
		$this->load->model('mdiendan');
		$this->load->helper('date');
		$bien = 'nva';
		$data['name'] = $this->mdiendan->arGetNguoiDang($bien);
		if(isset($_POST['btnDangTin']))
		{
			echo date('Y-m-d');
			$_POST = $this->input->post('member');
			$data_info = array(
							'NGUOIDANG' =>$_POST['ma'],
							'TIEUDE' =>$_POST['tieude'],
							'NGAYDANG' => date('Y-m-d'),
							'NOIDUNG' => $_POST['noidung']								
							);
			$this->mdiendan->arInsertTin($data_info);
			echo "Dang tin thanh cong :)";
		}
		//$data['template'] = 'diendan/dangtintuc';
		$data['template'] = 'diendan/demo';
		$this->load->view('layout/diendan', isset($data)? $data : NULL);
	}
	public function gopy()
	{
		$this->load->helper('date');
		$this->load->model('mdiendan');
		$data['info'] = $this->mdiendan->	getThongTinThanhVien('nva');
		if(isset($_POST['btnGopY']))
		{
			$_POST = $this->input->post('member');
			for($i = 0; $i < 4; $i++)
			{
				if(isset($_POST['r'][$i]))
				{
					echo $_POST['r'][$i]; // get gia tri cua radio button
					$arr = array(
						'MSTHANHVIEN' =>$_POST['ma'],
						'MA_NHATRO' =>'40',
						'THOIGIAN' => date('Y-m-d'),
						'MUCDODANHGIA' =>$_POST['r'][$i]
						);
						$this->mchunhatro->arGopY($arr);
						echo "insert thanh cong roi!!!";
				}
			}
		}
		$data['template'] = 'diendan/gopy';
		$this->load->view('layout/diendan', isset($data)? $data : NULL);
	}
	
	public function index()
	{
		$data['template'] = 'diendan/index';
		$this->load->view('layout/diendan', isset($data)? $data : NULL);
	}	
	
	
	

	
}