<div>
		<table width="48%" class="TableContainer standardform">
    	<tr>
        	<td class="Header">Cập nhật thông tin</td>
        </tr>
        <tr>
		<?php
			echo "
        	<td>
            	<table width='100%' class='TableForm'>
                	<tr>
                    	<td class='Left'>Họ tên:</td>
                        <td><input name='data[NguoiDung]' type='text' class='shortInput' readonly='readonly'  value='."$datainfo['HOTEN']".'/></td>
                    </tr>
					 <tr>
                        <td class='Left'>Giới tính:</td>
                        <input name='data[NguoiDung]' type='text' class='shortInput' readonly='readonly'  value='."$datainfo['GIOITINH']".'/></td>
                    </tr>
					</tr>
						<td class='left'>Ngày sinh:</td>
						<input name='data[NguoiDung]' type='text' class='shortInput' readonly='readonly'  value='."$datainfo['NGAYSINH']".'/></td>
                    
                    <tr>
						<td class='Left'>Email: </td>
                        <td><input type='text' name='data[Email]' class='shortInput' value='."$datainfo['MAIL']".' readonly=''/></td>
					<tr>
                     <tr>
                        <td class='Left'>Số điện thoại::</td>
                        <td><input type='text' name='data[SDT]' class='shortInput' value='."$datainfo['SDT']".'/></td>
                    </tr>
					<tr>
                        <td class='Left'>Địa chỉ:</td>
                        <td><textarea rows='3' col='20' name='data[TieuDe]'  class='expandInput'>
							."$datainfo['TEN_DUONG']"."$datainfo['TEN_PHUONGXA']"."$datainfo['TENHUYEN']".
						</textarea></td>
                    </tr>
                 </table>
            </td>
			"; ?>
        </tr>
        <tr><td align="left"><input type="submit" name="btnSuaProfile" value="Chỉnh sửa" class="nutnhan2" /> </td></tr>
    </table>
</div>