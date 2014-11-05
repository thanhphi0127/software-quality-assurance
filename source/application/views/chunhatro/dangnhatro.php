<div>

<form name='fDangnhatro' method='POST' action=''>
<table  class="TableContainer standardform" >
	<?php echo form_open('form'); ?>
	
	<tr>
		<td>
			<table  style='width:100% !important;' class="TableForm">
				<tr>
					<td class="Left">Tên Người Đăng</td>
					<td>
				
						<input name="member[TenNguoiDang]" style='width:363px;' type="text" class="shortInput" value="<?php if (isset($thongtin)) echo $thongtin[0]['HOTEN']; ?>" readonly="readonly"/>
						<input name="member[MaNguoiDang]" style='width: 75px;'type="text" class="shortInput" value="<?php  if (isset($thongtin)) echo $thongtin[0]['MSCHU']; ?>" />
				
					</td>
				</tr>				
				<tr>
						<td class="Left">Tên nhà trọ</td>
						<td ><input type="text" style='width: 476px;' name="member[TenNhaTro]"  class="shortInput" />
						 <?php echo form_error('TenNhaTro');?>
						</td>
					
				</tr>
				<tr>
					<td class="Left">Khu vực</td>
					<td>  <div style='width:155px; float:left' >&nbsp;Quận</div> <div style='width:155px; float:left' >&nbsp;Phường</div> <div style='width:155px; float:left' >&nbsp;Đường</div><br/>
							<p> <select style='width: 135px;' id='sel_quan' name='member[Quan]'>
									<?php
										foreach($huyen as $v) { ?>
										
										<option value='<?php echo $v['MA_HUYEN'];?>'><?php echo $v['TENHUYEN'];?></option>
									<?php 	}
									?>
								</select>
							
							<select style='width: 135px;' id='sel_phuong' name='member[Phuong]'>
									<?php
										foreach($phuong as $v) { ?>
										
										<option value='<?php echo $v['MA_PHUONGXA'];?>'><?php echo $v['TEN_PHUONGXA'];?></option>
									<?php 	}
									?>
								</select>
							
							<select id='sel_duong' name='member[Duong]'>
									<?php 
										foreach($duong as $MA_PHUONG => $DSDUONG) { 
											foreach($DSDUONG as $v){?>
										
										<option class='<?php echo $MA_PHUONG;?>' value='<?php echo $v['MA_DUONG'];?>'><?php echo $v['TEN_DUONG'];?></option>
									<?php 	}}
									?>
								</select>
							</p>
							 
					</td>
				</tr>
				<tr>
					<td class="Left">Địa chỉ</td>
					<td><p class='sonha' style='font-weight:bold;width:500px;'></p>
						<p><input type='text' id='sonha' name='member[SoNha]' placeholder='Nhập (tên hẻm) số nhà'/></p>
						
					</td>
				</tr>
				
				
				<tr>
					<td class="Left" >Giờ Đóng cửa</td>
					<td>
					  <select name="member[Gio]" style='width: 222px;' >
						<option value='Không quy định giờ'>Không quy định giờ</option>
						<option value='22 giờ'>22 giờ</option>
						<option value='23 giờ'>23 giờ</option>
						<option value='0 giờ'>0 giờ</option>
					  </select>
					</td>
				</tr>
			  <tr>
				<td class="Left">Tự quản</td>
				<td>
					<input type="radio" name='member[TuQuan]' checked="checked" value="1" />Có &nbsp;&nbsp;
					<input type="radio" name='member[TuQuan]' value="0" /> Không
				</td>
			  </tr>
			  <tr>
					<td class="Left">Mô tả ngắn</td>
					<td ><textarea style='width:500px; height:40px;'name="member[MoTa]" class="" ></textarea></td>
				  </tr>
			  <tr>
			<td class="Left">Hình ảnh</td>
			<td><input type="file" name="fHinhAnh" class="shortInput"/></td>
		  </tr>
			  <tr>
				<td class="Left">Số loại phòng</td>
				<td ><select name="member[LoaiPhong]" id='cbLoaiPhong' class="shortInputCB">
					<option value='1'>1 loại</option>
					<option value='2'>2 loại</option>
					<option value='3'>3 loại</option>
				  </select></td>
			  </tr>
			</table>
		</td>
	</tr>
<!--table thu 2 -->
	<tr class='1st-type type'><!-- Loai 1 -->
	  <td>
		<table class="TableForm" style='width:100% !important'>
		  <tr >
			<td>Loại Phòng Thứ Nhất</td>
			<td><span class='hidethistype'>Ẩn / Hiện</span></td>
		  </tr>
		  <tr>
			<td class="Left">Số phòng còn trống</td>
			<td><input type="text" name="member[PhongConTrong1]" class="shortInputLoaiPhong"/>
			<?php echo form_error('PhongConTrong1');?>
			</td>
		  </tr>
		  <tr>
			<td class='Left'>Số lượng người/phòng</td>
			<td><input type="text" name="member[SoLuongNguoi1]" class="shortInputLoaiPhong"/></td>
		  </tr>
		  <tr>
			<td class="Left" >Chiều dài x Chiều rộng
			
			 </td>
			<td><input type="text" style= "width:45px;" name="member[ChieuDaia]" class="shortInputLoaiPhong" value='1'/>
				&nbsp; x &nbsp;
			   <?php echo form_error('ChieuDai1');?>
			   
			   <input type="text" style='width:45px;' name="member[ChieuRonga]" class="shortInputLoaiPhong" value='2'/>
			  &nbsp;Mét
			  <?php echo form_error('ChieuRong1');?>
			 </td>
		  </tr>
		  <tr>
			<td class="Left">Giá</td>
			<td><input type="text" style='width:100px;' name="member[Gia1]" class="shortInputLoaiPhong"/>&nbsp;000 000&nbsp;VNĐ
			  <?php echo form_error('Gia1');?>
			  </td>
		  </tr>
		  <tr>
			<td class="Left" >Tiện nghi</td>
			<td><input type="checkbox" name="member[CoGac1]" />
			  Có Gác <br />
			  <input type="checkbox" name="member[NhaVeSinh1]" />
			  Nhà vệ sinh trong<br />
		   </td>
		  </tr>
		  
		</table>
	  </td>
	</tr>
	<tr class='2nd-type type'> <!-- Loai 2  -->
	  <td>
		<table class="TableForm" style='width:100% !important'>
		  <tr >
			<td>Loại Phòng Thứ Hai</td>
			<td><span class='hidethistype'>Ẩn / Hiện</span></td>
		  </tr>
		  <tr>
			<td class="Left">Số phòng còn trống</td>
			<td><input type="text" name="member[PhongConTrong2]" class="shortInputLoaiPhong"/>
				<?php echo form_error('PhongConTrong2');?>
			</td>
		  </tr>
		  <tr>
			<td class='Left'>Số lượng người/phòng</td>
			<td><input type="text" name="member[SoLuongNguoi2]" class="shortInputLoaiPhong"/></td>
		  </tr>
		  <tr>
			<td class="Left" >Chiều dài x Chiều rộng
			
			 </td>
			<td><input type="text" style='width:45px;' name="member[ChieuDai1]"class="shortInputLoaiPhong"/>
				&nbsp; x &nbsp;
			   <?php echo form_error('ChieuDai1');?>
			   
			   <input type="text" style='width:45px;' name="member[ChieuRong1]"class="shortInputLoaiPhong"/>
			  &nbsp;Mét
			  <?php echo form_error('ChieuRong1');?>
			 </td>
		  </tr>
		  <tr>
			<td class="Left">Giá</td>
			<td><input type="text" style='width:100px;' name="member[Gia1]" class="shortInputLoaiPhong"/>&nbsp;000 000&nbsp;VNĐ
			  <?php echo form_error('Gia1');?>
			  </td>
		  </tr>
		  <tr>
			<td class="Left" >Tiện nghi</td>
			<td><input type="checkbox" name="member[CoGac2]" />
			  Có Gác <br />
			  <input type="checkbox" name="member[NhaVeSinh2]" />
			  Nhà vệ sinh trong<br />
		   </td>
		  </tr>
		  
		</table>
	  </td>
	</tr>
	<tr class='3th-type type'><!-- Loai 3  -->
	  <td>
		<table class="TableForm" style='width:100% !important'>
		  <tr >
			<td>Loại Phòng Thứ Nhất</td>
			<td><span class='hidethistype'>Ẩn / Hiện</span></td>
		  </tr>
		  <tr>
			<td class="Left">Số phòng còn trống</td>
			<td><input type="text" name="member[PhongConTrong3]" class="shortInputLoaiPhong"/>
					<?php echo form_error('PhongConTrong3');?>
			</td>
		  </tr>
		  <tr>
			<td class='Left'>Số lượng người/phòng</td>
			<td><input type="text" name="member[SoLuongNguoi3]" class="shortInputLoaiPhong"/></td>
		  </tr>
		  <tr>
			<td class="Left" >Chiều dài x Chiều rộng
			
			 </td>
			<td><input type="text" style='width:45px;' name="member[ChieuDai1]"class="shortInputLoaiPhong"/>
				&nbsp; x &nbsp;
			   <?php echo form_error('ChieuDai1');?>
			   
			   <input type="text" style='width:45px;' name="member[ChieuRong1]"class="shortInputLoaiPhong"/>
			  &nbsp;Mét
			  <?php echo form_error('ChieuRong1');?>
			 </td>
		  </tr>
		  <tr>
			<td class="Left">Giá</td>
			<td><input type="text" style='width:100px;' name="member[Gia1]" class="shortInputLoaiPhong"/>&nbsp;000 000&nbsp;VNĐ
			  <?php echo form_error('Gia1');?>
			  </td>
		  </tr>
		  <tr>
			<td class="Left" >Tiện nghi</td>
			<td><input type="checkbox" name="member[CoGac3]" />
			  Có Gác <br />
			  <input type="checkbox" name="member[NhaVeSinh3]" />
			  Nhà vệ sinh trong<br />
		   </td>
		  </tr>
		  
		</table>
	  </td>
	</tr>
	<tr>
	  <td align="left">
		<input type="submit" name="btnXemTruoc" value="Xem trước bản đăng" class="nutnhan2" />
		<input type="submit" name="btnDangTin" value="Đăng tin" class="nutnhan" />
	  </td>
	</tr>
</table>
</form>
</div>