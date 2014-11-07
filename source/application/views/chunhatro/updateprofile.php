<div>
	<a href='<?php echo CIT_BASE_URL.'chunhatro/profile_chunhatro';?>' >Về trang hồ sơ chủ nhà trọ</a>
	<span style='color:blue; font-style:italic;'  ><?php if (isset($message) ) echo $message; ?></span>
	
	<form action='' method='POST'>
    	<table width='100%' class='TableForm'>
        	
		<?php
		foreach($datainfo as $k) {?>
		
                	<tr>
                    	<td class='Left'>Họ tên:</td>
                        <td><input name='edit[ten]' id='ten' type='text' value='<?php echo $k['HOTEN'];?>' /></td>
                    </tr>	
					<tr>
						<td class='Left'>Giới tính:</td>
						<td><select name='edit[sex]'>
						
							<option <?php if ($k['GIOITINH'] == 'nam' || $k['GIOITINH'] == 'Nam') echo 'selected';?>>nam</option>
							<option <?php if ($k['GIOITINH'] != 'nam') echo 'selected';?>>nữ</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Ngày sinh:</td>
						<td><input style='width: 200px;margin-left: 5px;' name='edit[ngaysinh]' type='date' class='shortInput'  value='<?php echo $k['NGAYSINH'];?>' /></td>
                    </tr>
                    <tr>
						<td class='Left'>Email: </td>
                        <td><input type='text' name='edit[email]' id='mail' class='shortInput' value='<?php echo $k['MAIL'];?>'  /></td>
					</tr>
                     <tr>
                        <td class='Left'>Số điện thoại::</td>
                        <td><input type='text' name='edit[sdt]' id='sdt' class='shortInput' value='<?php echo $k['SDT'];?>' /></td>
                    </tr>
					<tr>
						<td class='Left' >Quận:</td>
							<td><select name='edit[quanhuyen]' id='sel_quan'>
							<?php foreach ($quan as $key){?>
								<option value="<?php echo $key['MA_HUYEN'];?>"><?php echo $key['TENHUYEN'];?></option>
							<?php }?>
					
								</select>
							</td>
					</tr>
					<tr>
						<td class='Left' >Phường:</td>
						<td><select name='edit[xaphuong]'id='sel_phuong'>";
							<?php foreach ($phuong as $key){?>
								<option value="<?php echo $key['MA_PHUONGXA'];?>"><?php echo $key['TEN_PHUONGXA'];?></option>
							<?php }?>
					
							</select>
						</td>
					</tr>
					<tr>
						<td class='Left'>Đường:</td>
						<td><select name='edit[duong]' id='sel_duong' >
						
							<?php foreach ($duong as $MA_PHUONGXA => $row)
								foreach ($row as $key){?>
								
								<option value="<?php echo $MA_PHUONGXA;?>"><?php echo $key['TEN_DUONG'];?></option>
							<?php }?>
							</select>
						</td>
					</tr>
		<?php }
		
		?>
		<tr><td ></td><td align="left"><input type="submit" name="btnUpdateproFile" value="Hoàn tất" class="art-button"  />
			<input type="submit" onclick="javascript:eraseText();" name="btnUpdateCancle" value="Hủy bỏ" class="art-button"  /> </td>
		</tr>
		</table>
        
        
	</form>
    
</div>