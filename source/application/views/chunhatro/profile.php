﻿<div>
		<form action="" method="POST">
		<table width="48%" class="TableContainer standardform">
    	
        <tr>
		<?php
			$ma_chu='';
		foreach ($datainfo as $key )
		{
			$ma_chu = $key['MSCHU'];
			echo "
        	<td>
            	<table width='100%' class='TableForm'>
                	<tr>
                    	<td class='Left'>Họ tên:</td>
                        <td><input name='edit[ten]' type='text' value='".$key['HOTEN']."' readonly />
							<input name='edit[ma]' type='text' value='".$key['MSCHU']."' readonly='readonly' />
						</td>
                    </tr>	
					<tr>
						<td class='Left'>Giới tính:</td>";
						if ($key['GIOITINH'] == 1 || $key['GIOITINH'] == 'Nam'|| $key['GIOITINH'] == 'nam') $sex = 'nam';
						else $sex = 'nữ';
						echo"	<td><input type='text' name='edit[sex]' value=".$sex."  readonly /></td>
					</tr>
					<tr>
						<td class='Left'>Ngày sinh:</td>
						<td><input name='edit[ngaysinh]' type='date' class='shortInput'  value='".$key['NGAYSINH']."' readonly /></td>
                    </tr>
                    <tr>
						<td class='Left'>Email: </td>
                        <td><input type='text' name='edit[email]' class='shortInput' value='".$key['MAIL']."'  readonly /></td>
					</tr>
                     <tr>
                        <td class='Left'>Số điện thoại::</td>
                        <td><input type='text' name='edit[sdt]' class='shortInput' value='".$key['SDT']."' readonly /></td>
                    </tr>
					<tr>
						<td class='Left'>Quận - Huyện:</td>
						<td><input type='text' class='shortInput' value='".$key['TENHUYEN']."' readonly /></td>
					</tr>
					<tr>
						<td class='Left'>Xã - Phường:</td>
						<td><input type='text' class='shortInput' value='".$key['TEN_PHUONGXA']."' readonly /></td>
					</tr>
					<tr>
						<td class='Left'>Đường:</td>
						<td><input type='text' class='shortInput' value='".$key['TEN_DUONG']."' readonly /></td>
					</tr>
                 </table>
            </td>
			";
		}
		// echo CIT_BASE_URL.'chunhatro/update_chunhatro'
		
		?>
        </tr>
        <tr><td align="left"><a href='http://localhost/timkiemnhatro/chunhatro/update_chunhatro' class='art-button'>Cập nhật</a></td></tr>
    </table>
	</form>
</div>