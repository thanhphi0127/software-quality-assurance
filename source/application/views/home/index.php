﻿
<script type="text/javascript" charset="utf-8">
	$(function(){
		if(!flux.browser.supportsTransitions)
			alert("No Support");
			
		window.f = new flux.slider('#bars', {
			pagination: true,
			autoplay: true,
		});
	});
</script>


<header class='index_header'>



<div id='menu'>
		<div id="bar" class='menu'>
			   <ul>
					 <li><a href="#">Trang Chủ</a>     	
					 </li>
					 <li><a href="#">Diễn Đàn</a>
						<ul>
							<li><a href="#">Web Programming</a></li>
							<li><a href="#">Operating System</a></li>
							<li><a href="#">Object Oriented Programming</a></li>
						</ul>
					 </li>
					 <li><a href="#">Quản Lý</a></li>
					 <li><a href="#">bla bla</a></li>

			   </ul>
		</div>
	</div>
</header>


        
<section id='cit_wrapper'>
	
	<div id='flash'>
		<div class='title'>
			<marquee direction="right">Top 10 nhà trọ được bình chọn nhiều nhất</marquee>
		</div>
		<div class='top_img'>
			<div class='houselist'>
                    <div id="bars">
                        <img src="public/img/nhatro/hongvan.jpg" alt="" style="width: 550px;
height: 281px;" />
                        <img src="public/img/nhatro/large-FC4-0D7EB0.jpg" alt="" style="width: 550px;
height: 281px;" />
                        <img src="public/img/nhatro/nhatro1.jpg" alt="" style="width: 550px;
height: 281px;" />
                    </div>
				<div class='houseinfo'>
				</div>
			</div>
		</div>
		
		<div class='top_name'>
			<ul>
				<li class='img1'>Nhà trọ Hồng Vân</li>
				
				<li class='img2'>Nhà trọ 91</li>
				<li class='img3'>Nhà trọ Ông Sáu</li>
				<li class='img4'>Nhà trọ Bà Tư</li>
			</ul>
		</div>
	</div>
	<div id='tool'>
		<ul>
			<li class='intro'><img src='public/img/icon/icon-gioithieu.jpg'></img></li>
			<li class='intro'><img src='public/img/icon/icon-gioithieu.jpg'></img></li>
			<li class='quicksearch'><img src='public/img/icon/icon-search.jpg'></img></li>
			<li class='advancedsearch'><img src='public/img/icon/icon-searchplus.png'></img></li>
			
		</ul>
		
		<div class='tool intro'>
			<div class='panel'><h1>Giới thiệu</h1></div>
			<p>Website tìm kiếm nhà trọ ra đời nhằm...</p>
		</div>
		<div class='tool quicksearch standardform'>
			<div class='panel'><h3> Tìm kiếm nhanh với</h3></div>
			<input type='text' placeholder='Nhập thông tin nhà trọ cần tìm'/> 
			<input type='submit' value='Tìm'/>
		</div>
		<div class='tool advancedsearch'>
			<div class='panel'><h3>TÌm kiếm nâng cao</h3></div>
			<p> Bạn có thể tìm kiếm nhà trọ với nhiều thông tin như: giá cả, khu vực, và những thông tin cần thiết. 
				<a href='<?php echo CIT_BASE_URL;?>search/advancedsearch'>Bắt đầu ngay</a>
			 </p>
		</div>

	</div>
</section>