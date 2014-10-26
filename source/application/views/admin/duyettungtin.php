<section class='cit_timkiemnhatro'>
	<!-- Nội dung bên trong -->
    <h2>Quản lý đăng tin</h2>
<form action='' name='fmulti' method ='POST'>
    <table border="1" cellpadding="0" cellspacing="0">
    	<?php
			foreach($data_info as $v)
			{
			echo "<tr>";
		//	echo "<td><input type='checkbox' name = member[] value='".$v['user_id']."'  /></td>";
			echo "<td>".$v['MA_DANGTIN']."</td>";
			echo "<td>".$v['TIEUDE']."</td>";
			echo "<td>".$v['NOIDUNG']."</td>";
			//echo "<td><a href='http://localhost/timkiemnhatro/admin/duyettungnhatro/".$v['MA_NHATRO']."'>duyệt</a></td>";
			echo "</tr>";
			}
			echo "<tr><td colspan='2'><input type='submit' name ='btnDuyetTin' value='Duyệt Tin' /></td></tr>"
		?>
    </table>
</form>   
</section>