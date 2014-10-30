<div>
		<table width="48%" class="TableContainer standardform">
    	<tr>
        	<td class="Header">Cập nhật thông tin</td>
        </tr>
        <tr>
		<?php
		echo '<pre>';
		echo $datainfo;
		echo '</pre>';
		foreach ($datainfo as $key )
		{
			echo "
        	<td>
            	<table width='100%' class='TableForm'>
                	<tr>
                    	<td class='Left'>Họ tên:</td>
                        <td><input name='' type='text' value=".$key['HOTEN']." /></td>
                    </tr>	
					<tr>
						<td class='Left'>Giới tính:</td>";
						$sex1 = ' ';
						$sex2 = ' ';
						if ($key['GIOITINH'] == 1 ) $sex1 = 'checked';
						else $sex2 = 'checked';
						echo"	<td><input type='radio' name='Sex' value='1' checked=".$sex1." /> Nam     <input type='radio' name='Sex' checked=".$sex2." /> Nữ</td>
					</tr>
					<tr>
						<td class='Left'>Ngày sinh:</td>
						<td><input name='' type='date' class='shortInput'  value=".$key['NGAYSINH']." /></td>
                    </tr>
                    <tr>
						<td class='Left'>Email: </td>
                        <td><input type='text' name='' class='shortInput' value=".$key['MAIL']." readonly='' /></td>
					<tr>
                     <tr>
                        <td class='Left'>Số điện thoại::</td>
                        <td><input type='text' name='' class='shortInput' value=".$key['SDT']." /></td>
                    </tr>
					<tr>
                        <td class='Left'>Địa chỉ:</td>
                        <td><textarea rows='3' col='20' name=''  class='expandInput'>
							".$key['TEN_DUONG'] . " ".$key['TEN_PHUONGXA']." ".$key['TENHUYEN']."
						</textarea></td>
                    </tr>
					<tr>
						<td class='Left'>Quận - Huyện:</td>
						<td><select>
								<option></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Xã - Phường:</td>
						<td><select>
								<option></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Đường:</td>
						<td><select>
								<option></option>
							</select>
						</td>
					</tr>
                 </table>
            </td>
			";
		}?>
        </tr>
        <tr><td align="left"><input type="submit" name="btnSuaProfile" value="Chỉnh sửa" class="nutnhan2" /> </td></tr>
    </table>
</div>