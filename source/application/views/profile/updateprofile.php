<div>
		<table width="48%" class="TableContainer standardform">
		<form action='' method='POST'>
    	<tr>
        	<td class="Header">Cập nhật thông tin</td>
        </tr>
        <tr>		
		<?php
		foreach($datainfo as $k)
		{
			echo "
        	<td>
            	<table width='100%' class='TableForm'>
                	<tr>
                    	<td class='Left'>Họ tên:</td>
                        <td><input name='edit[ten]' type='text' value='".$k['HOTEN']."' /></td>
                    </tr>	
					<tr>
						<td class='Left'>Giới tính:</td>
						<td><select name='edit[sex]'>
							<option>Nam</option>
							<option>Nữ</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Ngày sinh:</td>
						<td><input name='edit[ngaysinh]' type='date' class='shortInput'  value='".$k['NGAYSINH']."' /></td>
                    </tr>
                    <tr>
						<td class='Left'>Email: </td>
                        <td><input type='text' name='edit[email]' class='shortInput' value='".$k['MAIL']."'  /></td>
					<tr>
                     <tr>
                        <td class='Left'>Số điện thoại::</td>
                        <td><input type='text' name='edit[sdt]' class='shortInput' value='".$k['SDT']."' /></td>
                    </tr>
					<tr>
						<td class='Left'>Quận - Huyện:</td>
							<td><select name='edit[quanhuyen]'>";
							foreach ($quan as $key)
							{
							echo "
								<option>".$key['TENHUYEN']."</option>";
							}
					echo "
						</select></td>
					</tr>
					<tr>
						<td class='Left'>Xã - Phường:</td>
						<td><select name='edit[xaphuong]'>";
							foreach ($phuong as $key)
							{
								echo "
								<option>".$key['TEN_PHUONGXA']."</option>";
								}
					echo "
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Đường:</td>
						<td><select name='edit[duong]'>";
							foreach ($duong as $key)
							{
								echo "
								<option value=".$key['MA_DUONG'].">".$key['TEN_DUONG']."</option>";
							}
					echo "
							</select>
						</td>
					</tr>
                 </table>
            </td>
			";
		}
		?>
		
        </tr>
        <tr><td align="left"><input type="submit" name="btnUpdateproFile" value="Hoàn tất" class="nutnhan2"  />
			<input type="submit" name="btnUpdateCancle" value="Hủy bỏ" class="nutnhan2"  /> </td>
		</tr>
		</form>
    </table>
</div>