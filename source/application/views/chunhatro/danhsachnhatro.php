<!-- Nội dung bên trong -->
	<a href='<?php echo CIT_BASE_URL."chunhatro/dangnhatro";?>' class='art-button'>Đăng nhà trọ</a><br/>
	<table>
	<?php if (isset($nhatro) && !empty($nhatro)){?>
		
	<?php
		foreach ($nhatro as $row) {
			echo "<tr>";
			echo 	"<td>";
					echo "<a href='".CIT_BASE_URL."thongtinnhatro/load_nhatro/".$row['MA_NHATRO']."'>".$row['TEN_NHATRO']." </a>";
			echo    "</td>";
			echo    "<td>";
					echo "<a href='".CIT_BASE_URL."chunhatro/capnhatnhatro/".$row['MA_NHATRO']."' class='art-button'>Cập nhật</a>";
			echo 	"</td>";
			echo "</tr>";
			
		}
	?>
	
	<?php	}
		else {
			echo "<tr><td colspan='2'><span style='color:blue;' >Chưa có nhà trọ được đăng</span></td></tr>";
		}
	?>
	</table>
	