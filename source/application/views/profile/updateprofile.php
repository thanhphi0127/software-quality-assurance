<div>
		<table width="48%" class="TableContainer standardform">
    	<tr>
        	<td class="Header">Cập nhật thông tin</td>
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
                        <td><input name='edit[ten]' type='text' value=".$key['HOTEN']." /></td>
                    </tr>	
					<tr>
						<td class='Left'>Giới tính:</td>";
						$sex1 = ' ';
						$sex2 = ' ';
						if ($key['GIOITINH'] == 1 || $key['GIOITINH'] == 'Nam' ) $sex1 = 'checked';
						else $sex2 = 'checked';
						echo"	<td><input type='radio' name='edit[sex]' value='1' checked=".$sex1." /> Nam     <input type='radio' name='edit[sex]' value='2' checked=".$sex2." /> Nữ</td>
					</tr>
					<tr>
						<td class='Left'>Ngày sinh:</td>
						<td><input name='edit[ngaysinh]' type='date' class='shortInput'  value=".$key['NGAYSINH']." /></td>
                    </tr>
                    <tr>
						<td class='Left'>Email: </td>
                        <td><input type='text' name='edit[email]' class='shortInput' value=".$key['MAIL']."  /></td>
					<tr>
                     <tr>
                        <td class='Left'>Số điện thoại::</td>
                        <td><input type='text' name='edit[sdt]' class='shortInput' value=".$key['SDT']." /></td>
                    </tr>
					<tr>
						<td class='Left'>Quận - Huyện:</td>
						<td><select name='edit[quanhuyen]'>
								<option>".$key['TENHUYEN']."</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Xã - Phường:</td>
						<td><select name='edit[xaphuong]'>
								<option>".$key['TEN_PHUONGXA']."</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Đường:</td>
						<td><select name='edit[duong]'>
								<option>".$key['TEN_DUONG']."</option>
							</select>
						</td>
					</tr>
                 </table>
            </td>
			";
		}?>
        </tr>
        <tr><td align="left"><input type="submit" name="btnDangTin" value="Chỉnh sửa" class="nutnhan2" /> </td></tr>
    </table>
</div>