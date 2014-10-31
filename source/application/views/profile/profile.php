<div>
		<form action="" method="POST">
		<table width="48%" class="TableContainer standardform">
    	<tr>
        	<td class="Header">Xem thông tin</td>
        </tr>
        <tr>
		<?php
		
		foreach ($datainfo as $key )
		{
			echo "
        	<td>
            	<table width='100%' class='TableForm'>
                	<tr>
                    	<td class='Left'>Họ tên:</td>
                        <td><input name='edit[ten]' type='text' value=".$key['HOTEN']." readonly /></td>
                    </tr>	
					<tr>
						<td class='Left'>Giới tính:</td>";
						if ($key['GIOITINH'] == 1 || $key['GIOITINH'] == 'Nam') $sex = 'Nam';
						else $sex = 'Nữ';
						echo"	<td><input type='text' name='edit[sex]' value=".$sex."  readonly /></td>
					</tr>
					<tr>
						<td class='Left'>Ngày sinh:</td>
						<td><input name='edit[ngaysinh]' type='date' class='shortInput'  value=".$key['NGAYSINH']." readonly /></td>
                    </tr>
                    <tr>
						<td class='Left'>Email: </td>
                        <td><input type='text' name='edit[email]' class='shortInput' value=".$key['MAIL']."  readonly /></td>
					<tr>
                     <tr>
                        <td class='Left'>Số điện thoại::</td>
                        <td><input type='text' name='edit[sdt]' class='shortInput' value=".$key['SDT']." readonly /></td>
                    </tr>
					<tr>
						<td class='Left'>Quận - Huyện:</td>
						<td><input type='text' class='shortInput' value=".$key['TENHUYEN']." readonly /></td>
					</tr>
					<tr>
						<td class='Left'>Xã - Phường:</td>
						<td><input type='text' class='shortInput' value=".$key['TEN_PHUONGXA']." readonly /></td>
					</tr>
					<tr>
						<td class='Left'>Đường:</td>
						<td><input type='text' class='shortInput' value=".$key['TEN_DUONG']." readonly /></td>
					</tr>
                 </table>
            </td>
			";
		}?>
        </tr>
        <tr><td align="left"><input type="submit" name="btnSuaProfile" value="Chỉnh sửa" class="nutnhan2" href="<?php echo CIT_BASE_URL.'chunhatro/update_chunhatro';?>" /> </td></tr>
    </table>
	</form>
</div>