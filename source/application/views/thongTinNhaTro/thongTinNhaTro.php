
<div>
	<?php if ($ma_quyen != 0) {?>
	<p style='float:left;width:100%;'>  <a style='float:left; margin:10px;' href='<?php echo CIT_BASE_URL.'chunhatro/danhsachnhatro';?>'><< Về danh sách nhà trọ của tôi</a> 
      	
	</p>
	<?php  } ?>
	<!--**************************************
		|	xem thông tin nhà trọ			|
	***************************************-->
    <style>
		.data
		{
			font-size:14px;
			width:500px;
		}
		.mau{
			color:#333;
			background:#3CF;
			font-style:oblique
		}
		.ttchu{
			float:right;
			border:1px 	#C0C0C0 solid;
			width:350px;
			height:150px;
			margin-right:30px;
			
		}
		.tthinh{
			float:right;
			/*border:1px solid;*/
			width:350px;
			height:200px;
			margin-bottom:10px;
			margin-right:30px;
			
		}

		.ttnhatro
		{
			float:left;
		}
		td{
			color:#036;
		}
		.gopy
		{
			float:left;
			border:1px 	#C0C0C0 solid;
			width:920px;
			height:100px;
			margin-top:30px;
			margin-right:30px;
			background-color:#FFF;
			box-shadow: 2px 2px 2px #888888;
			border-radius:10px;
		}
		textarea
		{
			background-color:#FFF;
			text-shadow:#999;
		}
		.nut
		{
			float: left;
		}
    </style>
<table>
	<tr>
		<td rowspan='2'>
				<div class='ttnhatro' >
					<!-- xem thong tin chung nhà trọ -->
					<div>
						<table class='data'>
						<?php
						foreach ($nhatro as $key)
						{
							$nauan = '';
							$baidauxe = '';
						?>
							<tr>
								<td width="160" class='mau'><b>Thông tin</b></td>
								<td class='mau' ><b>Nội dung</b></td>
							</tr>
							<tr>
								<td>Tên nhà trọ</td>
								<td><b><?php echo $key['TEN_NHATRO']; ?></b></td>
							</tr>
							<tr>
								<td>Địa chỉ</td>
								<td><b><?php echo $key['diachi']; ?></b></td>
							</tr>
							<tr>
								<td>Mô tả chung</td>
								<td><?php echo $key['MOTA']; ?></td>
							</tr>
							<tr>
							<?php
								if ( $key['NAU_AN'] == 1 ) $nauan = 'Có';
								else $nauan = 'Không';
							?>
								<td>Nấu ăn</td>	
								<td><?php echo $nauan; ?></td>
							</tr>
							<tr>
							<?php
								if ( $key['BAIDAUXE'] == 1 ) $baidauxe = 'Có';
								else $baidauxe = 'Không';
							?>
								<td>Bãi đậu xe</td>		
								<td><?php echo $baidauxe; ?></td>
							</tr>
							<tr>
								<td>Giờ đóng cửa</td>	
								<td><?php echo $key['GIODONGCUA']; ?></td>
							</tr>
						</table> 
						<?php
						}
						?>
					</div>
					<!-- xem thong tin phong tro cua nha tro -->
		
			
					<div>
						<?php
						foreach ($phongtro as $key)
							{
								$wc = '';
								$gac = '';
						?>
						<table class='data'>
									<tr><td width="160" class='mau'><b>Loai phòng</b></td>	<td class='mau'><b> Loại phòng thứ <?php echo $key['MA_PHONG'];?></b> </td></tr>
									<tr><td>Giá phòng</td>	<td><b><font color="#FF0000"><?php echo $key['GIA']; ?> Đồng</font><b></td></tr>
									<tr><td>Diện tích</td>	<td><?php echo $key['DIENTICH'];?> M<sup>2</sup></td></tr>
									<?php
										if ($key['TOILETTRONG'] == 1 ) $wc = 'Có';
										else $wc = 'Không';
									?>
									<tr><td>Nhà vệ sinh trong</td>	<td> <?php echo $wc; ?></td></tr>
									<?php
									if ($key['GAC'] == 1 ) $gac = 'Có';
									else $gac = 'Không';
									?>
									<tr><td>Gác</td>	<td><?php echo $gac; ?></td></tr>
									<tr><td>Số lượng người/phòng</td>	<td><?php echo $key['SL_NGUOI']; ?></td></tr>
									<tr><td>Số phòng còn trống</td>	<td><?php echo $key['CONTRONG']; ?></td></tr>
								</table>
								
					</div>
					<?php
							}
						?>
			

			</div>
		</td>
		<td style='height:200px;'>
			<div class="tthinh">
				<?php
					foreach($nhatro as $nt)
					{
				?>
					 <img src="public/img/nhatro/<?php if (!empty($nt['HINHANH'])) echo $nt['HINHANH']; else echo 'no_photo.jpg';?>" width="350" height="200" class="art-lightbox"/>
				<?php
					}
				?>
				
				<?php if ($ma_quyen == 3) {?><p style='margin:10px 0px;'><a href='<?php echo CIT_BASE_URL.'diendan/gopy/'.$MA_NHATRO;?>' target='iframe' class='art-button gopy' >Góp ý</a></p><?php }?>
				
				
				<div style='position:relative;'>
					
					
					<form action='' method='post'>
						<div class='yellow_star'>
							<a href='<?php echo CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO.'/1';?>'><img src='public/img/star.png'  class='star' title='1 sao'/></a>
							<a href='<?php echo CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO.'/2';?>'><img src='public/img/star.png'  class='star' title='2 sao'/></a>
							<a href='<?php echo CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO.'/3';?>'><img src='public/img/star.png'  class='star' title='3 sao'/></a>
							<a href='<?php echo CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO.'/4';?>'><img src='public/img/star.png'  class='star' title='4 sao'/></a>
							<a href='<?php echo CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO.'/5';?>'><img src='public/img/star.png'  class='star' title='5 sao'/></a>
						</div>
						<div class='yellow_star'>
							<?php 
								if ($danhgia >= LEV1){
									echo "<a href='".CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO."/1'><img src='public/img/star_yes.png'  class='star_yes' title='1 sao'/></a>";
								}
								if ($danhgia >= LEV2){
									echo "<a href='".CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO."/2'><img src='public/img/star_yes.png'  class='star_yes' title='2 sao'/></a>";
								}
								if ($danhgia >= LEV3){
									echo "<a href='".CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO."/3'><img src='public/img/star_yes.png'  class='star_yes' title='3 sao'/></a>";
								}
								if ($danhgia >= LEV4){
									echo "<a href='".CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO."/4'><img src='public/img/star_yes.png'  class='star_yes' title='4 sao'/></a>";
								}
								if ($danhgia >= LEV5){
									echo "<a href='".CIT_BASE_URL.'thongtinnhatro/danhgia/'.$MA_NHATRO."/5'><img src='public/img/star_yes.png'  class='star_yes' title='5 sao'/></a>";
								}
							?>
						</div>
						<div class='luotdanhgia' ><tieude> Số lượt bình chọn:</tieude> <span><?php echo $nt['DANHGIA'];?></span>
						</div>
						
					</form>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="ttchu">
				<?php
					foreach($chu as $c)
					{
				?>
						<font size="+2" color="#0099FF">Thông tin chủ nhà trọ</font></br>
						<hr /></br>
						Tên chủ nhà trọ: <strong><?php echo $c['HOTEN']; ?></strong></br>
						Địa chỉ:<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; <?php echo $c['DIACHI'];?></strong><br />
						Số điện thoại:&nbsp; &nbsp;<strong> <?php echo $c['SDT']; ?></strong></br>
						Email: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;<strong> <?php echo $c['MAIL']; ?> </strong></br>
				<?php
					}
				?>
			</div>
		</td>
	</tr>
</table>
</div>
	<div class='art-block nhatrolienquan'>
		<div class="art-blockheader">
                <h3>Nhà trọ liên quan</h3>
        </div>
	<?php if (isset($nhatrolienquan) && !empty($nhatrolienquan)){?>
		<ul class='nhatrolienquan'>
	<?php
		foreach ($nhatrolienquan as $row) {
			
			echo 	"<li>";
					echo "<a href='".CIT_BASE_URL."thongtinnhatro/xem_nhatro/".$row['MA_NHATRO']."'>".$row['TEN_NHATRO']." </a>";
			echo    "</li>";
			
		}
	?>
	
	<?php	}
		else {
			echo "<li><span style='color:blue;' >Chưa có nhà trọ được đăng</span></li>";
		}
	?>
		</ul>
	</div>
	<section class='thaotac'>
		<img src='public/img/icon/iconclose.png' class='close'/>
		<div class='black'> </div>
		<iframe id='iframe' class='iframe' name='iframe' src='<?php echo CIT_BASE_URL.'diendan/gopy/'.$MA_NHATRO;?>' scrolling='no'></iframe>
	</section>

<!--**************************************
		|	bình luận, góp ý		|
	***************************************-->

<div>    
     <form action=""  method="post">
     	 <div class='gopy'>
        	<textarea placeholder="Bạn có nhận xét gì về nhà trọ này" cols="40" style='height:92px;' name='member[noidung]'></textarea>
         </div>
         <div class='nut'>
        	<input type="submit" name="btnBinhLuan" value='Bình Luận' class="art-button" />
         </div>   
     </form>
     <?php
	 	foreach($binhluan as $bl)
		{
         	echo "
				 <div class='gopy'>
				 	<font color= '#0000FF'><b>".$bl['USERNAME']."</b></font><br/>
					".$bl['NOIDUNG']."</br>
					<i>".$bl['THOIGIAN']."</i>					
				 </div>
				 
		       ";
     
		}
	 ?>
</div>