<div class='header khung'>
    <div class="login-header">
        <div class="thongtin">
                <img style="margin: 0 0 0 0; padding-top: 3px;" src="public/img/nhatro/home.png"/>
                <font style="font-size: 24px; font-weight: bold;">WEBSITE THÔNG TIN NHÀ TRỌ</font>
        </div>
            
 		<div id="id_login" class="login">
        	<div>
            <form action="" method="post">
            	<label>Tên đăng nhập</label>
                <input type="text" placeholder="Nhập tên đăng nhập" name="data[username]" />
                <label>Mật khẩu</label>
                <input type="text"  placeholder="Nhập mật khẩu" name="data[password]" />
                <input type="submit" name="btn_Login" value="Đăng nhập" />
            </form>
            </div>

            <div class="dangki">
            	<a>Đăng kí thành viên</a>
                <a>Quên mật khẩu</a>
            </div>
            
    	</div>
   </div>
</div>

<script>
$(document).ready(function(){
	$('ul.nav.nav-tabs > li').hover(function(){
		$(this).addClass('show');
		$('ul.nav.nav-tabs > li.show > ul').show();
	});
	

	$('ul.nav.nav-tabs > li').mouseout(function(e) {
		$(this).removeClass('show');
		$('ul.nav.nav-tabs > li > ul').hide();
	});
		
	
	/*	
	$('ul.nav.nav-tabs > li').mouseout(function(e) {
		
		$('ul.nav.nav-tabs > li.show > ul').show();
		
		$('ul.nav.nav-tabs > li > ul').hide();
		$(this).removeClass('show');
    });
	*/
	
});
</script>


<div class="menu-header" style="margin-top: 10px;">
      <div class="panel with-nav-tabs panel-default">
          <div class="panel-heading">
                  <ul class="nav nav-tabs">
                      <li><a href="home" data-toggle="tab">Trang chủ thành viên</a></li>
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
                      <li><a href="<?php echo CIT_BASE_URL; ?>index.php/home" data-toggle="tab">Tin tức</a></li>
                      <li><a href="<?php echo CIT_BASE_URL; ?>index.php/home" data-toggle="tab">Đánh giá, góp ý</a></li>
                      <li class="dropdown">
                          <a href="#" data-toggle="dropdown">Quản lý đăng tin<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                              <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                          </ul>
                      </li>
                  </ul>
          </div>
      </div> <!-- end panel -->
</div>


