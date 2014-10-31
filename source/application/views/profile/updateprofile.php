<div>
		<table width="48%" class="TableContainer standardform">
    	<tr>
        	<td class="Header">Cập nhật thông tin</td>
        </tr>
        <tr>
		<?php
			echo "
			<form action='' method='POST'>
        	<td>
            	<table width='100%' class='TableForm'>
                	<tr>
                    	<td class='Left'>Họ tên:</td>
                        <td><input name='edit[ten]' type='text' value='' /></td>
                    </tr>	
					<tr>
						<td class='Left'>Giới tính:</td>";
						
						echo"	<td><input type='radio' name='edit[sex]' value='1' checked='' /> Nam     <input type='radio' name='edit[sex]' value='2' checked='' /> Nữ</td>
					</tr>
					<tr>
						<td class='Left'>Ngày sinh:</td>
						<td><input name='edit[ngaysinh]' type='date' class='shortInput'  value='' /></td>
                    </tr>
                    <tr>
						<td class='Left'>Email: </td>
                        <td><input type='text' name='edit[email]' class='shortInput' value=''  /></td>
					<tr>
                     <tr>
                        <td class='Left'>Số điện thoại::</td>
                        <td><input type='text' name='edit[sdt]' class='shortInput' value='' /></td>
                    </tr>
					<tr>
						<td class='Left'>Quận - Huyện:</td>
						<td><select name='edit[quanhuyen]'>
								<option></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Xã - Phường:</td>
						<td><select name='edit[xaphuong]'>
								<option></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Đường:</td>
						<td><select name='edit[duong]'>
								<option></option>
							</select>
						</td>
					</tr>
                 </table>
            </td>
			</form>
			";
		?>
        </tr>
        <tr><td align="left"><input type="submit" name="btnUpdateproFile" value="Chỉnh sửa" class="nutnhan2"  /> </td></tr>
    </table>
</div>