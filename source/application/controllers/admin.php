<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	public function quanlynguoidung(){
		$data['template'] = 'admin/quanlynguoidung';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	//**************************************************
	/*	hien thi danh sach các nhà tro
		da duyet va chua duyet
		có thể duyệt cùng lúc nhiều nhà trọ
		nhà trọ đã duyệt --> co thể cùng lúc xóa nhiều nhà trọ
	*/ 
	//**************************************************
	public function duyetnhatro()
	{
		$this->load->model('madmin');
		$data['data_info'] = $this->madmin->arDSNhaTroDuyet();
		$data['info'] = $this->madmin->arDSNhaTroChuaDuyet();
		$bien = $this->madmin->arCountChuaDuyet();
		
		//****************************
		// xu ly nha tro chua duyet
		//****************************
		
		// duyet cac nha tro
		if(isset($_POST['btnDuyetNhaTro']))
		{
			for($i = 0; $i < $bien; $i++)
			{
				if(isset($_POST['member'][$i]))
				{
					$arr = $this->madmin->arConditionSelect($_POST['member'][$i]);
				foreach($arr as $v)
				{
					$mang = array(
						"STATUS" => "1"
					);	
				$this->madmin->arMultiple_Update($mang, $_POST['member'][$i]);	
				//$result = $this->Mhone->arMultiple_Select();
				header('Location:http://localhost/timkiemnhatro/admin/duyetnhatro');
				}
				}
			}
		}
		// xoa tung nha tro chua duyet
		if(isset($_POST['btn_delete']))
		{
			$_POST = $this->input->post('delete');
			
			$this->madmin->arDelete($_POST['ma_nhatro']);
			//echo "Xoa xong roi :(!";
		}
		//****************************
		// xu ly nha tro  duyet
		//****************************
		$chua_duyet = $this->madmin->arCountDaDuyet();
		if(isset($_POST['btnXoaNhaTro']))
		{
			for($i = 0; $i < $chua_duyet; $i++)
			{
				if(isset($_POST['daduyet'][$i]))
				{
					$arr = $this->madmin->arConditionSelect($_POST['daduyet'][$i]);
					$this->madmin->arMultiple_Delete($_POST['daduyet'][$i]);
					header('Location:http://localhost/timkiemnhatro/admin/duyetnhatro');
				}
			}
			echo "xoa roi sao :'( huc huc";
		}
		$data['template'] = 'admin/duyetnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}	
	
	
	public function xoaTinNhaTro($id)
	{
		$this->load->model(madmin);
		$data['data_info'] = $this->madmin->arSelectUpdate($id);
		$this->madmin->arDelete($id);
		echo "Xoa xong roi :(!";
		$data['template'] = 'admin/duyetnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}

	// duyet tung nha tro
	public function duyettungnhatro($id)
	{
		$this->load->model(madmin);
		$data['data_info'] = $this->madmin->arSelectUpdate($id);
		if(isset($_POST['btnDuyetTin']))
		{
			foreach($data as $v)
			{
				$mang = array(
						"STATUS" => "1"
						);	
				$this->madmin->arMultiple_Update($mang, $id);	
			}
			echo "duyet thanh cong";
		}
	
		$data['template'] = 'admin/duyettungnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	// xoa tung nha tro thong qua bang các nha tro da duyet
	
		public function xoatungnhatro($id)
		{
		$this->load->model(madmin);
		$data['data_info'] = $this->madmin->arSelectUpdate($id);
		if(isset($_POST['btnDuyetTin']))
		{
			$this->madmin->arMultiple_Delete($id);	
			echo "xoa roi do";
			header('Location:http://localhost/timkiemnhatro/admin/duyetnhatro');
		}
		$data['template'] = 'admin/duyettungnhatro';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	//**************************************************
	/*	hien thi danh sach các TIN TUC
		da duyet va chua duyet
		có thể duyệt cùng lúc nhiềuTIN TUC
		nhà trọ đã duyệt --> co thể cùng lúc xóa nhiều TIN TUC
	*/ 
	//**************************************************
	
	public function duyettintuc()
	{
		$this->load->model('madmin');
		$data['data_info'] = $this->madmin->arDSTinDuyet();
		$data['info'] = $this->madmin->arDSTinChuaDuyet();
		$bien = $this->madmin->arCountTinChuaDuyet();
		// duyet nhieu tin tuc
		
		if(isset($_POST['btnDuyetTin']))
		{
			for($i = 0; $i < $bien; $i++)
			{
				if(isset($_POST['member'][$i]))
				{
					$arr = $this->madmin->arConditionSelectTin($_POST['member'][$i]);
				foreach($arr as $v)
				{
					$mang = array(
						"TRANGTHAI" => "1"
					);	
				$this->madmin->arMultiple_UpdateTin($mang, $_POST['member'][$i]);	
				//$result = $this->Mhone->arMultiple_Select();
				header('Location:http://localhost/timkiemnhatro/admin/duyettintuc');
				}
				}
			}
		}
		if(isset($_POST['btn_delete']))
		{
			$_POST = $this->input->post('delete');
			
			$this->madmin->arDeleteTin($_POST['ma_nhatro']);
			echo "Xoa xong roi :(!";
		}	
		// xoa nhieu tin tuc
		$chua_duyet = $this->madmin->arCountTinDuyet();
		if(isset($_POST['btnXoaTin']))
		{
			for($i = 0; $i < $chua_duyet; $i++)
			{
				if(isset($_POST['daduyet'][$i]))
				{
					$arr = $this->madmin->arConditionSelectTin($_POST['daduyet'][$i]);
					$this->madmin->arMultiple_DeleteTin($_POST['daduyet'][$i]);
					header('Location:http://localhost/timkiemnhatro/admin/duyettintuc');
				}
			}
			echo "xoa roi sao :'( huc huc";
		}
		//goi view
		$data['template'] = 'admin/duyettintuc';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	
	public function duyettungtin($id)
	{
		$this->load->model(madmin);
		$data['data_info'] = $this->madmin->arSelectUpdateTin($id);
		if(isset($_POST['btnDuyetTin']))
		{
			foreach($data as $v)
			{
				$mang = array(
						"TRANGTHAI" => "1"
						);	
				$this->madmin->arMultiple_UpdateTin($mang, $id);	
			}
			echo "duyet thanh cong";
			
		}
		header('Loacation:http://localhost/timkiemnhatro/admin/duyettintuc');
		$data['template'] = 'admin/duyettungtin';
		$this->load->view('layout/admin', isset($data)? $data : NULL);
	}
	//*****************************
	/*Xoa cac tin tuc duyet
	*/
	//******************************
	
}