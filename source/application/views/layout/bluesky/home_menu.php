<div class="art-nav-inner">
      <ul class="art-hmenu">
        <li><a href="<?php echo CIT_BASE_URL."home/index";?>" class="active">Trang chủ</a></li>
        <li><a href="<?php echo CIT_BASE_URL."search/areasearch";?>">Tìm kiếm</a>
          <ul>
            <li><a href="<?php echo CIT_BASE_URL."search/areasearch";?>">Tìm kiếm theo khu vực</a> </li>
            <li><a href="<?php echo CIT_BASE_URL."search/detailsearch";?>">Tìm kiếm chi tiết</a></li>
          </ul>
        </li>
		<?php if (isset($ma_quyen) && $ma_quyen != 0) {
				if ($ma_quyen == 2) { 
		?>
					<li><a href="<?php echo CIT_BASE_URL.'chunhatro/dangnhatro';?>">Đăng nhà trọ</a></li>
		<?php   }
				else if ($ma_quyen == 1){
		?>
					<li><a href="<?php echo CIT_BASE_URL.'admin/index';?>">Quản lý</a>
						<ul>
							<li><a href="<?php echo CIT_BASE_URL.'admin/duyetnhatro';?>">Quản lý nhà trọ</a></li>
							<li><a href="<?php echo CIT_BASE_URL.'admin/quanlynguoidung';?>">Quản lý người dùng</a></li>
						
						</ul>
					</li>
		<?php	}
			}
			
			
		?>
        <li><a href="qui-đinh.html">Qui định</a>
          <ul>
            <li><a href="qui-đinh/qui-đinh-đang-tin.html">Qui định đăng tin</a></li>
            <li><a href="qui-đinh/qui-đinh-đang-ky.html">Qui định đăng ký</a></li>
          </ul>
        </li>
        <li></li>
        <li><a href="thong-bao.html">Thông báo</a></li>
        <li><a href="ho-tro.html">Hỗ trợ</a>
          <ul>
            <li><a href="ho-tro/huong-dan.html">Hướng dẫn</a></li>
            <li><a href="ho-tro/lien-he.html">Liên hệ</a></li>
            <li><a href="ho-tro/gop-y.html">Góp ý</a></li>
          </ul>
        </li>
		
      </ul>
    </div>