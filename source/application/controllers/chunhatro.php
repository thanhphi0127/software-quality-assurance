<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chunhatro extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		
	}
	public function profile_chunhatro(){
		
		$this->load->model('mchunhatro');
		$data['datainfo'] = $this->mchunhatro->load_chunhatro();
		$data['template'] = 'profile/profile';
		$this->load->view('layout/profile', isset($data)? $data : NULL);
		
	}
	
	public function quanlynhatro(){
		$data['template'] = 'chunhatro/quanlynhatro';
		$this->load->view('layout/chunhatro', isset($data)? $data : NULL);
	}
	
	public function dangnhatro(){
		$data['title'] = 'Dang Tin Nha Tro';
		/*$this->load->model('mchunhatro');
		//$data['data_info'] = $this->mchunhatro->arInsertNhaTro();
		if(isset($_POST['btnAdd']))
		{
			$_POST = $this->input->post('member');
			$data_info = array(
									'MA_HUYEN' => $_POST['ma'],
									'TENHUYEN' =>$_POST['ten']
									);
			$this->mchunhatro->getHuyen($data_info);
			echo "insert thanh cong!";
		}*/
		$this->load->model('mchunhatro');
		$this->load->helper('date');
		$data['huyen'] = $this->mchunhatro->getHuyen();
		$data['thongtin'] = $this->mchunhatro->getTenChu('nva');
		if(isset($_POST['btnDangTin']))
		{
			$_POST = $this->input->post('member');
			$data_info = array(
								'MSCHU' =>$_POST['MaNguoiDang'],
								'MA_DUONG'=>'bth',
								'MOTA'=> $_POST['MoTa'],
								'NAU_AN' =>isset( $_POST['NauAn'] )?1:0,
								'TOILETTRONG' =>isset( $_POST['NhaVeSinh'] )?1:0 ,
								'BAIDAUXE' =>isset( $_POST['BaiDauXe'])?1:0,
								'SO' => $_POST['SoNha'],
								'LUOCXEM' =>'2',
								/*HINHANH =>*/
								'TUQUAN' => '1',
								'GIODONGCUA' =>$_POST['Gio'],
								'NGAYDANG'=> date('Y-m-d'),
								'STATUS' =>'0'
								);
			$this->mchunhatro-> arInsertNhaTro($data_info);
			$ma = $this->mchunhatro->getMaNhaTro();
			echo "insert thanh cong :D";
			if($_POST['LoaiPhong'] == 1)
			{
				foreach($ma as $v)
				{
					echo $v['MA_NHATRO'] ;
				
				$phongtro_thu1 = array(
									'MA_PHONG' =>'1',
									'MA_NHATRO' =>$v['MA_NHATRO'],
									'SL_NGUOI' => '2',
									'CONTRONG' => $_POST['PhongConTrong1'],
									'DIENTICH' => $_POST['DienTich1'],
									'GIA' => $_POST['Gia1']
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu1);
				
				echo "insert phong tro thanh cong :D";
				echo "1 loai";
			}// end 1Loai 
			//----------------------------------------------
			else if($_POST['LoaiPhong'] == 2)
			{
				//loai phong thu 1
				foreach($ma as $v1)
				{
					echo $v1['MA_NHATRO'] ;
				
				$phongtro_thu1 = array(
									'MA_PHONG' =>'1',
									'MA_NHATRO' =>$v1['MA_NHATRO'],
									'SL_NGUOI' => '2',
									'CONTRONG' => $_POST['PhongConTrong1'],
									'DIENTICH' => $_POST['DienTich1'],
									'GIA' => $_POST['Gia1']
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu1);
				// loai phong thu hai
				foreach($ma as $v2)
				{
					echo $v2['MA_NHATRO'] ;
				
				$phongtro_thu2 = array(
									'MA_PHONG' =>'2',
									'MA_NHATRO' =>$v2['MA_NHATRO'],
									'SL_NGUOI' => '2',
									'CONTRONG' => $_POST['PhongConTrong2'],
									'DIENTICH' => $_POST['DienTich2'],
									'GIA' => $_POST['Gia2']
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu2);
			}
				//---------------------------------------------------------
				//loai phong thu 3
			else if($_POST['LoaiPhong'] == 3)
			{
				//loai phong thu 1
				foreach($ma as $v1)
				{
					echo $v1['MA_NHATRO'] ;
				
				$phongtro_thu1 = array(
									'MA_PHONG' =>'1',
									'MA_NHATRO' =>$v1['MA_NHATRO'],
									'SL_NGUOI' => '2',
									'CONTRONG' => $_POST['PhongConTrong1'],
									'DIENTICH' => $_POST['DienTich1'],
									'GIA' => $_POST['Gia1']
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu1);
				// loai phong thu hai
				foreach($ma as $v2)
				{
					echo $v2['MA_NHATRO'] ;
				
				$phongtro_thu2 = array(
									'MA_PHONG' =>'2',
									'MA_NHATRO' =>$v2['MA_NHATRO'],
									'SL_NGUOI' => '2',
									'CONTRONG' => $_POST['PhongConTrong2'],
									'DIENTICH' => $_POST['DienTich2'],
									'GIA' => $_POST['Gia2']
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu2);
				foreach($ma as $v3)
				{
					echo $v3['MA_NHATRO'] ;
				
				$phongtro_thu3 = array(
									'MA_PHONG' =>'3',
									'MA_NHATRO' =>$v3['MA_NHATRO'],
									'SL_NGUOI' => '2',
									'CONTRONG' => $_POST['PhongConTrong3'],
									'DIENTICH' => $_POST['DienTich3'],
									'GIA' => $_POST['Gia3']
									);
				}
				$this->mchunhatro-> arInsertPhongTro($phongtro_thu3);
				echo "3 loai";
			}// end loai phong thu 3
		}// end of button Dang Tin

			if(isset($_POST['btnXemTruoc']))
			{
				$_POST = $this->input->post('member');
				if(isset($_POST['Quan']))
				{
						$data['phuong'] = $this->mchunhatro->getPhuong($_POST['Quan']);	
				}
			}
			if(isset($_POST['btnXemTruoc1']))
			{
				$_POST = $this->input->post('member');
				if(isset($_POST['Phuong']))
				{
					
						$data['Duong'] = $this->mchunhatro->getDuong($_POST['Phuong']);	
				}
			}
		$data['template'] = 'chunhatro/dangnhatro';
		$this->load->view('layout/chunhatro', isset($data)? $data : NULL);
	}
	/*********************************
	//dua tra y kien nhan xet nha tro
	//
	**********************************/
	public function gopy()
	{
		$this->load->helper('date');
		$this->load->model('mchunhatro');
		$data['info'] = $this->mchunhatro->	getThongTinThanhVien('nva');
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
		$data['template'] = 'chunhatro/gopy';
		$this->load->view('layout/chunhatro', isset($data)? $data : NULL);
	}
	
	
	
}