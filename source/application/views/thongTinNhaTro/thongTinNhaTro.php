<div>
	<!--**************************************
		|	xem thông tin nhà trọ			|
	***************************************-->
	<div>
		<!-- xem thong tin chung nhà trọ -->
		<div>
			<table	class=''>
			<?php
			foreach ($nhatro as $key)
			{
			echo "
				<tr>
					<td>Thông tin</td>		<td>Nội dung</td>
				<tr>
				<tr>
					<td>Tên nhà trọ</td>		<td>".$key['TEN_NHATRO']."</td>
				</tr>
				<tr>
					<td>Mô tả chung</td>		<td>".$key['MOTA']."</td>
				</tr>
				<tr>";
					if ( $key['NAU_AN'] == 1 ) $nauan = 'Có';
					else $nauan = 'Không';
					echo "
					<td>Nấu ăn</td>		<td>".$nauan."</td>
				</tr>
				<tr>";
					if ( $key['BAIDAUXE'] == 1 ) $baidauxe = 'Có';
					else $baidauxe = 'Không';
					echo "
					<td>Bãi đậu xe</td>		<td>".$baidauxe."</td>
				</tr>
				<tr>
					<td>Giờ đóng cửa</td>	<td>".$key['GIODONGCUA']."</td>
				</tr>";
				}?>
			</table>
		</div>
		<!-- xem thong tin phong tro cua nha tro -->
		<div>
			<?php
		echo	"<div>";
			foreach ($phongtro as $key)
				{
			echo	"<table class=''>
						<tr><td>Loai phòng</td>	<td> Loại ".$key['MA_PHONG']."</td></tr>
						<tr><td>Giá phòng</td>	<td> ".$key['GIA']." Đồng</td></tr>
						<tr><td>Diện tích</td>	<td> ".$key['DIENTICH']." m2</td></tr>";
						
						if ($key['TOILETTRONG'] == 1 ) $wc = 'Có';
						else $wc = 'Sử dụng chung';
						echo"
						<tr><td>Có WC riêng</td>	<td> ".$wc."</td></tr>";
						
						if ($key['GAC'] == 1 ) $GAC = 'Có';
						else $GAC = 'Không';
						echo"
						<tr><td>Có gác</td>	<td> ".$GAC."</td></tr>
						<tr><td>Số lượng người / <br/> còn trống</td>	<td> ".$key['SL_NGUOI']."/".$key['CONTRONG']."</td></tr>
					</table>";
					}
		echo	"</div>";
			?>
		<div>
				
		
	</div>
	<!--**************************************
		|	bình luận, góp ý		|
	***************************************-->
	<div>
	
	</div>
</div>