
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
				<tr>
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
		<div>
		
	</div>
	<!--**************************************
		|	bình luận, góp ý		|
	***************************************-->
	
</div>
</div>
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
	</div>
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

<div>    
     <form action=""  method="post">
     	 <div class='gopy'>
        	<textarea placeholder="Bạn có nhận xét gì về nhà trọ này" cols="40" rows="3" name='member[noidung]'></textarea>
         </div>
         <div class='nut'>
        	<input type="submit" name="btnBinhLuan" value='Bình Luận' class="nut" />
         </div>   
     </form>
     <?php
	 	foreach($binhluan as $bl)
		{
         	echo "
				 <div class='gopy'>
				 	<font color= '#0000FF'><b>".$bl['USERNAME']."</b></font></br>
					".$bl['NOIDUNG']."</br>
					<i>".$bl['THOIGIAN']."</i>					
				 </div>
				 
		       ";
     
		}
	 ?>
</div>


