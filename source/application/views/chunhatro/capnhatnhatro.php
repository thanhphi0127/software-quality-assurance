<!-- Nội dung bên trong -->
<div>
<form name='fDangnhatro' method='POST' action=''>
  <table  class="TableContainer standardform" >
		<?php echo form_open('form'); ?>
    	<tr>
        	<td ><a href='<?php echo CIT_BASE_URL.'chunhatro/danhsachnhatro';?>'><< Quay về danh sách nhà trọ</a></td>
        </tr>
        <tr>
        	<td>
            	<table width="100%" class="TableForm">
                	<tr>
                    	<td class="Left">Tên Người Đăng</td>
                        <?php
							foreach($tenchu as $tt)
							{	
						?>
            			<td><input name="member[TenNguoiDang]" style='width:363px;' type="text" class="shortInput" value="<?php echo $tt['HOTEN'] ?>" readonly="readonly"/>
           			    <input name="member[MaNguoiDang]" style='width: 75px;' type="hidden" class="shortInput" value="<?php echo $tt['MSCHU'] ?>" hidden=""/></td>
          </tr>
          				<?php
							}
						?>
          <tr>
            <td class="Left">Tên nhà trọ</td>
            <?php
				foreach($info as $nt)
				{
					$tu_quan = '';
					$gio = '';
					$tu_quan = $nt['TUQUAN'];
					$gio = $nt['GIODONGCUA'];
			?>
            <td colspan='2'><input type="text" style='width: 476px;' name="member[TenNhaTro]"  class="shortInput" value="<?php echo $nt['TEN_NHATRO']; ?>" />
            
            </td>
                        
          </tr>
          <tr>
          	<td class="Left"> Địa chỉ cũ </td>
            <?php
				foreach($diachicu as $dc)
				{
			?>
            <td colspan='2'><textarea style='width:500px; height:40px;' rows="5" cols="20" name="txtDiaChiCu" class="expandInput"  readonly="readonly"><?php echo $dc['diachi'];?></textarea></td>
          </tr>
          <?php
				}
		  ?>
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
				</tr>
                <tr>
                    <td class="Left" >Giờ Đóng cửa</td>
                    <td><select name="member[Gio]" >
                        <option <?php if($gio == 'Không quy định giờ') echo 'selected'; ?> value='Không quy định giờ'>Không quy định giờ</option>
                        <option  <?php if($gio == '22') echo 'selected'; ?>  value='22'>22 giờ</option>
                        <option  <?php if($gio == '23') echo 'selected'; ?>   value='23'>23 giờ</option>
                        <option <?php if($gio == '0') echo 'selected'; ?>  value='0'>0 giờ</option>
                      </select></td>
          </tr>
          <tr>
            <td class="Left">Mô tả ngắn</td>
            <td colspan='2'><textarea style='width:500px; height:40px;' rows="5" cols="20" name="member[MoTa]" class="expandInput" ><?php echo $nt['MOTA']; ?></textarea></td>
          </tr>
          
           <tr>
            <td class="Left" >Tiện nghi chung</td>
            <td><input type="checkbox" name="member[NauAn]" <?php if($nt['NAU_AN'] == 1) echo "checked='checked'"; ?> />
              Nấu ăn <br />
              <input type="checkbox" name="member[BaiDauXe]" <?php if($nt['BAIDAUXE']== 1) echo "checked='checked'"; ?> />
              Bãi đậu xe <br />
           </td>
          </tr>
          <tr>
          	<td class="Left">Tự quản</td>
            <td>
            	<input type="radio" name='member[TuQuan]'
				<?php if($tu_quan == 1) echo "checked='checked'"; 
					else echo "";
				 ?> value = '1'/>Có &nbsp;&nbsp;
                <input type="radio" name='member[TuQuan]'
                <?php  if($tu_quan == 0) echo "checked='checked'"; 
					else echo "";
				 ?>
                 value="0" /> Không
            </td>
          </tr>
          <tr><td></td><td><img src="public/img/nhatro/<?php echo $nt['HINHANH']; ?>" width="50" height="" /></td></tr>
          <?php
		  //../../../public/img/nhatro/2221-large.jpg
				}
		  ?>
          <!--<tr>
            <td class="Left">Số loại phòng</td>
            <td colspan='2'><select name="member[LoaiPhong]" id='cbLoaiPhong' class="shortInputCB">
                <option value='1'>1 loại</option>
                <option value='2'>2 loại</option>
                <option value='3'>3 loại</option>
              </select></td>
          </tr>-->
          
        </table></td>
    </tr>
     <!--table thu 2 -->
    <tr class='1st-type type'><!-- Loai 1 -->
      <td><table class="TableForm" style='width:100% !important'>
          <tr >
            <td><b>Loại Phòng Thứ Nhất<b></td>
            <td><span class='hidethistype'>Ẩn / Hiện</span></td>
          </tr>
          <tr>
           <?php
		   	$c = 0;;
		  	foreach($phong as $p)
			{
				
				echo $p['MA_NHATRO'];
				++$c;
				 
		  	?>
            <td class="Left">Số phòng còn trống</td>
           
            <td><input type="text" name="member[PhongConTrong<?php echo $c; ?>]" class="shortInputLoaiPhong" value="<?php echo $p['CONTRONG']; ?>"/>
            <?php echo form_error('PhongConTrong1');?>
            </td>
          </tr>
          <tr>
          	<td class='Left'>Số lượng người/phòng</td>
            <td><input type="text" name="member[SoLuongNguoi<?php echo $c; ?>]" class="shortInputLoaiPhong" value="<?php echo $p['SL_NGUOI']; ?>"/></td>
          </tr>
          <tr>
            <td class="Left">Diện Tích</td>
            <td><input type="text" name="member[DienTich<?php echo $c; ?>]" class="shortInputLoaiPhong" value="<?php echo $p['DIENTICH']; ?>" />
              &nbsp;M2
              <?php ?>
              </td>
          </tr>
          <tr>
            <td class="Left">Giá</td>
            <td><input type="text" style='width:100px;' name="member[Gia<?php echo $c; ?>]" class="shortInputLoaiPhong" value="<?php echo $p['GIA']; ?>" />&nbsp;000 000&nbsp;VNĐ
              <?php echo form_error('Gia1');?>
              </td>
          </tr>
          <tr>
            <td class="Left" >Tiện nghi</td>
            <td><input type="checkbox" name="member[CoGac<?php echo $c; ?>]"  <?php if($p['GAC'] == 1) echo "checked='checked'"; ?>  />
              Có Gác <br />
              <input type="checkbox" name="member[NhaVeSinh<?php echo $c; ?>]"  <?php if($p['TOILETTRONG'] == 1) echo "checked='checked'"; ?>  />
              Nhà vệ sinh trong<br />
           </td>
          </tr>
          
          <tr><td colspan="2">-------------------------------------------------------
          --------------------------------------------------</td></tr>
          <?php
		  	
				}
		  ?>
        </table></td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="btnXemTruoc" value="Xem trước bản đăng" class="nutnhan2" />
        <input type="submit" name="btnCapNhat" value="Cập nhật" class="nutnhan" />
        <input type="submit" name="btnXemTruoc1" value="chon duong" class="nutnhan" /></td>
    </tr>
  </table>
</form>
</div>