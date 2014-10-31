<!-- Nội dung bên trong -->


<form name='fDangnhatro' method='POST' action=''>
  <table  class="TableContainer standardform" >
		<?php echo form_open('form'); ?>
    	<tr>
        	<td class="Header">Đăng Tin</td>
        </tr>
        <tr>
        	<td>
            	<table width="100%" class="TableForm">
                	<tr>
                    	<td class="Left">Tên Người Đăng</td>
                        <?php
							foreach($thongtin as $tt)
							{
						?>
            <td><input name="member[TenNguoiDang]" type="text" class="shortInput" value="<?php echo $tt['HOTEN'] ?>"/></td>
            <td><input name="member[MaNguoiDang]" type="text" class="shortInput" value="<?php echo $tt['MSCHU'] ?>" hidden=""/></td>
          </tr>
          <?php
							}
					?>
          <tr>
            <td class="Left">Tên nhà trọ</td>
            <td colspan='2'><input type="text" name="member[TieuDe]"  class="shortInput" /></td>
                         <?php echo form_error('TieuDe');?></td>
                        </td>
                        
                    </tr>
                    <tr>
                        <td class="Left">Số Điện Thoại</td>
                        <td><input type="text" name="member[SDT]" class="shortInput"/></td>
                    </tr>
                     <tr>
                        <td class="Left">Địa Chỉ</td>
                        <td>
										<select name='member[Quan]'>
										<?php
											foreach($huyen as $v)
											{
												echo "<option value='".$v['MA_HUYEN']."'>".$v['TENHUYEN']."</option>";
											}
										?>
              </select><br/>
              <select name='member[Phuong]'>
                <?php
                                        foreach($phuong as $v)
											{
												echo "<option value='".$v['MA_PHUONGXA']."'>".$v['TEN_PHUONGXA']."</option>";
											}
										?>
              </select><br/>
              <select name='member[Duong]'>
                <?php
											foreach($Duong as $v)
											{
													echo "<option value='".$v['MA_DUONG']."'>".$v['TEN_DUONG']."</option>";
											}
										?>
              </select><br/>
              <input type='text' name='member[SoNha]' placeholder='Nhập (tên hẻm) số nhà'/></td>
          </tr>
          <tr>
            <td class="Left">Mô tả ngắn</td>
            <td colspan='2'><textarea rows="5" cols="20" name="member[MoTa]" class="expandInput" ></textarea></td>
          </tr>
          <tr>
            <td class="Left" >Giờ Đóng cửa</td>
            <td><select name="member[Gio]" >
                <option value='Không quy định giờ'>Không quy định giờ</option>
                <option value='22 giờ'>22 giờ</option>
                <option value='23 giờ'>23 giờ</option>
                <option value='0 giờ'>0 giờ</option>
              </select></td>
          </tr>
          <tr>
            <td class="Left">Số loại phòng</td>
            <td colspan='2'><select name="member[LoaiPhong]" id='cbLoaiPhong' class="shortInputCB">
                <option value='1'>1 loại</option>
                <option value='2'>2 loại</option>
                <option value='3'>3 loại</option>
              </select></td>
          </tr>
        </table></td>
    </tr>
    <!--table thu 2 -->
    <tr class='1st-type type'><!-- Loai 1 -->
      <td><table class="TableForm">
          <tr >
            <td>Loại Phòng Thứ Nhất</td>
            <td><span class='hidethistype'>Ẩn / Hiện</span></td>
          </tr>
          <tr>
            <td class="Left">Tổng số phòng</td>
            <td><input type="text" name="txtTongSoPhong1" class="shortInputLoaiPhong" /></td>
          </tr>
          <tr>
            <td class="Left">Số phòng còn trống</td>
            <td><input type="text" name="member[PhongConTrong1]" class="shortInputLoaiPhong"/></td>
          </tr>
          <tr>
            <td class="Left">Diện tích mỗi phòng</td>
            <td><input type="text" name="member[DienTich1]"class="shortInputLoaiPhong"/>
              &nbsp;M<sup>2</sup></td>
          </tr>
          <tr>
            <td class="Left">Giá</td>
            <td><input type="text" name="member[Gia1]" class="shortInputLoaiPhong"/>
              &nbsp;000</td>
          </tr>
          <tr>
            <td class="Left" >Tiện nghi</td>
            <td><input type="checkbox" name="member[CoGac]" />
              Có Gác <br />
              <input type="checkbox" name="member[BaiDauXe]" />
              Bãi đậu xe<br />
              <input type="checkbox" name="member[Internet]" />
              Internet<br />
              <input type="checkbox" name="member[NhaVeSinh]" />
              Nhà vệ sinh trong<br />
              <input type="checkbox" name="member[NauAn]" />
              Cho nấu ăn<br />
              <input type="checkbox" name="member[Giuong]" />
              Có giường<br />
              <input type="checkbox" name="member[Quat]" />
              Có quạt<br /></td>
          </tr>
          <tr>
            <td class="Left">Hình ảnh</td>
            <td><input type="file" name="fHinhAnh" class="shortInput"/></td>
          </tr>
        </table></td>
    </tr>
    <tr class='2nd-type type'> <!-- Loai 2  -->
      <td><table class="TableForm">
          <tr >
            <td>Loại Phòng Thứ Hai</td>
            <td><span class='hidethistype'>Ẩn / Hiện</span></td>
          </tr>
          <tr>
            <td class="Left">Tổng số phòng</td>
            <td><input type="text" name="txtTongSoPhong1" class="shortInputLoaiPhong" /></td>
          </tr>
          <tr>
            <td class="Left">Số phòng còn trống</td>
            <td><input type="text" name="member[PhongConTrong2]" class="shortInputLoaiPhong"/></td>
          </tr>
          <tr>
            <td class="Left">Diện tích mỗi phòng</td>
            <td><input type="text" name="member[DienTich2]"class="shortInputLoaiPhong"/>
              &nbsp;M<sup>2</sup></td>
          </tr>
          <tr>
            <td class="Left">Giá</td>
            <td><input type="text" name="member[Gia2]" class="shortInputLoaiPhong"/>
              &nbsp;000</td>
          </tr>
          <tr>
            <td class="Left" >Tiện nghi</td>
            <td><input type="checkbox" name="member[CoGac2]" />
              Có Gác <br />
              <input type="checkbox" name="member[BaiDauXe2]" />
              Bãi đậu xe<br />
              <input type="checkbox" name="member[Internet2]" />
              Internet<br />
              <input type="checkbox" name="member[NhaVeSinh2]" />
              Nhà vệ sinh trong<br />
              <input type="checkbox" name="member[NauAn2]" />
              Cho nấu ăn<br />
              <input type="checkbox" name="member[Giuong2]" />
              Có giường<br />
              <input type="checkbox" name="member[Quat2]" />
              Có quạt<br /></td>
          </tr>
          <tr>
            <td class="Left">Hình ảnh</td>
            <td><input type="file" name="fHinhAnh" class="shortInput"/></td>
          </tr>
        </table></td>
    </tr>
    <tr class='3th-type type'><!-- Loai 3  -->
      <td><table class="TableForm">
          <tr >
            <td>Loại Phòng Thứ Ba</td>
            <td><span class='hidethistype'>Ẩn / Hiện</span></td>
          </tr>
          <tr>
            <td class="Left">Tổng số phòng</td>
            <td><input type="text" name="txtTongSoPhong1" class="shortInputLoaiPhong" /></td>
          </tr>
          <tr>
            <td class="Left">Số phòng còn trống</td>
            <td><input type="text" name="member[PhongConTrong3]" class="shortInputLoaiPhong"/></td>
          </tr>
          <tr>
            <td class="Left">Diện tích mỗi phòng</td>
            <td><input type="text" name="member[DienTich3]"class="shortInputLoaiPhong"/>
              &nbsp;M<sup>2</sup></td>
          </tr>
          <tr>
            <td class="Left">Giá</td>
            <td><input type="text" name="member[Gia3]" class="shortInputLoaiPhong"/>
              &nbsp;000</td>
          </tr>
          <tr>
            <td class="Left" >Tiện nghi</td>
            <td><input type="checkbox" name="member[CoGac3]" />
              Có Gác <br />
              <input type="checkbox" name="member[BaiDauXe3]" />
              Bãi đậu xe<br />
              <input type="checkbox" name="ember[Internet3]" />
              Internet<br />
              <input type="checkbox" name="member[NhaVeSinh3]" />
              Nhà vệ sinh trong<br />
              <input type="checkbox" name="member[NauAn3]" />
              Cho nấu ăn<br />
              <input type="checkbox" name="ember[Giuong3]" />
              Có giường<br />
              <input type="checkbox" name="member[Quat3]" />
              Có quạt<br /></td>
          </tr>
          <tr>
            <td class="Left">Hình ảnh</td>
            <td><input type="file" name="fHinhAnh" class="shortInput"/></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="btnXemTruoc" value="Xem trước bản đăng" class="nutnhan2" />
        <input type="submit" name="btnDangTin" value="Đăng tin" class="nutnhan" />
        <input type="submit" name="btnXemTruoc1" value="chon duong" class="nutnhan" /></td>
    </tr>
  </table>
</form>
