<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Hệ thống quản lý nhà trọ</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
  </head>
  
  <body>
      
    <div class="container khung">
        <div class="login-header">
            <div class="col-md-8">
                <img style="margin: 0 0 0 0; padding-top: 3px;" src="D:\WEB\icon\menu-home.png"/>
                <font style="color: white; font-size: 25px; font-weight: bold;">HỆ THỐNG QUẢN LÝ NHÀ TRỌ</font>
            </div>
            <div class="col-md-4">
                <div class="name-home">
                    <a style="float: right; margin-left: 25px;" href="<?php echo base_url();?>index.php/home/logout" class="btn btn-success square-btn-adjust">Đăng nhập</a> &nbsp;&nbsp;&nbsp;
                    <a style="float: right; width: 90px;" href="<?php echo base_url();?>index.php/home/logout" class="btn btn-success square-btn-adjust">Đăng ký</a>
                </div>
            </div>
        </div>
        
        <div class="row">
        <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading" style="padding:0px; border-radius:0px;">
                            <ul class="nav nav-tabs" style="padding:0px; margin-left: 140px;border-radius:0px;">
                                <li class="active"><a href="#tab1default" data-toggle="tab">Trang chủ</a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">Quản lý thành viên<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                        <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">Quản lý nhà trọ và các nhà trọ<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                        <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/home" data-toggle="tab">Tin tức</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/home" data-toggle="tab">Đánh giá, góp ý</a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">Quản lý đăng tin<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                        <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"><input style="width: 370px;" class="form-control" placeholder="Nhập thông tin tìm kiếm"/></div>
        <div class="col-md-8">
            <button class="btn btn-primary">Tìm kiếm</button>
            <div class="pull-right">
            <img style="width: 30px; height: 30px; padding-right: 0px" src="http://file1.batdongsan.com.vn/Images/header-middle-right-icon1.jpg" alt="plus"/>
            Đăng tin quảng cáo
            <img style="width: 30px; height: 30px; padding-right: 0px" src="http://file1.batdongsan.com.vn/Images/header-middle-right-icon2.jpg"/>
            Hỏi - đáp
        </div>
        </div>
        
        
        
        
        <div style="margin-top: 50px;" class="panel panel-primary">
            <div class="panel-heading" style="font-size: 17px">Khu vực được tìm kiếm nhiều nhất</div>
            <div class="panel-body">
                <p><span style="margin-right: 110px; font-size: 15px; margin-left: 50px;"><a>» Phòng trọ quận Ninh Kiều</a></span><span style="margin-right: 110px; font-size: 15px;"><a>» Phòng trọ quận Cái Răng</a></span>
                <span style="margin-right: 110px; font-size: 15px;"><a>» Phòng trọ quận Bình Thủy</a></span> <span style="font-size: 15px;"><a>» Phòng trọ quận Ô Môn</a></span>
                </p>
                <span style="margin-right: 93px; font-size: 15px; margin-left: 50px;"><a>» Phòng trọ phường Hưng Lợi</a></span><span style="margin-right: 70px; font-size: 15px;"><a>» Phòng trọ phường Xuân Khánh</span></a>
                <span style="margin-right: 105px; font-size: 15px;"><a>» Phòng trọ phường An Hòa</a></span> <span style="font-size: 15px;"><a>» Phòng trọ phường An Cư</a></span>
            </div>
        </div>
        
        <div class="panel panel-primary" style="font-size: 17px">
            <div class="panel-heading">Danh sách các nhà trọ</div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead style="font-size: 16px">
                        <th>#</th>
                        <th>Chủ nhà trọ</th>
                        <th>Các nhà trọ</th>
                        <th>Số phòng</th>
                        <th>Giá / phòng</th>
                        <th></th>
                    </thead>
                    <tbody style="font-size: 14px">
                        <tr>
                            <td>1</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>1</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>Trần Văn Tỷ</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 300 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>3</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>4</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>5</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>6</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>7</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>8</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>8</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>9</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>10</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>11</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>12</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>13</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>14</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>15</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                        
                        <tr>
                            <td>16</td>
                            <td>Nguyễn Hồng Vân</td>
                            <td>Phòng trọ Ninh Kiều</td>
                            <td>30</td>
                            <td>1 500 000 đồng</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--So trang -->
            <div style="padding-bottom: 45px" class="panel-footer">
                <ul style="margin-top: 0px" class="pagination pull-right">
                  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left" style="color: #428bca"> Trang 1/30</span></a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">....</a></li>
                  <li><a href="#">30</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </div>
        </div>
    
    
    <br/>
    <div style="border: 1px dashed #F0F5F5;">
    </div>
		<div style="margin-left: 15px" class="footer">
			<p>Được phát triển bởi Khoa Công nghệ Thông tin & Truyền thông - Trường Đại học Cần Thơ</p>
			<p>Số 01 Lý Tự Trọng, Q. Ninh Kiều, TP. Cần Thơ, Việt Nam; Điện thoại: 84 710 3831301; Fax: 84 710 3830841</p>
    </div>
    <hr />
	</div><!--end div container-->
</body>
</html>
