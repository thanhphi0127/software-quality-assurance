<script>
    $(function(){
        var ch = $('#check').attr('value');
        if (ch == 1) {
            $('#sua_chu').show();
            $('#sua_chu').css();
        }
        
       $('.sua').click(function() {
           var machu = $(this).parent('td').parent('tr').find('.layma').html();
           var hoten = $(this).parent('td').parent('tr').find('.layten').html();
           var sdt = $(this).parent('td').parent('tr').find('.laysdt').html();
           var email = $(this).parent('td').parent('tr').find('.layemail').html();
           var sex = $(this).parent('td').parent('tr').find('.laysex').html();
           $('#mschu').attr('value', machu);
           $('#hoten').attr('value', hoten);
           $('#sdt').attr('value', sdt);
           $('#email').attr('value', email);
           $('#sex').attr('value', sex);
           $('#sua_chu').show(1500);
           $('#dschu').css('opacity', '0.5');
       });
       
       $('#cancle').click(function() {
           $('#sua_chu').hide();
           $('#dschu').css('opacity', '1');
       });
       
    });
</script>

<section>
<div id="sua_chu" class="container" role="dialog" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h3 style="color: white">CHỈNH SỬA CHỦ NHÀ TRỌ</h3>
            </div>
            <form class="form-horizontal" action="" method="post">
                <input type="hidden" id='mschu' name='chu[mschu]'/>
                <div class="modal-body">
                    <!--Ho ten-->
					<div class="form-group">
						<div class="col-md-3">
							<label for="inputTen" class="control-label">Tên chủ nhà trọ</label><span><font style="color: red">*</font></span>
						</div>
						 <div class="col-md-9">
							<input style="margin-top: -7px;" type="text" value="<?php echo set_value('hoten')?>" class="form-control" id="hoten" name="chu[hoten]" required />
						</div>
					</div>
					<!--Gioi tinh-->
					<div class="form-group">
						<div class="col-md-3">
							<label for="inputGioiTinh" class="control-label">Giới tính</label>
						</div>
						<div class="col-md-9">
							<input type="radio" name="chu[gioitinh]"  value="Nam" required/>&nbsp;Nam&nbsp;&nbsp;&nbsp;
							<input type="radio" name="chu[gioitinh]"  value="Nữ" required/>&nbsp;Nữ
						</div>
					</div>
					<!--Ngay sinh-->
					<div class="form-group" name="ngaysinh">
						<div class="col-md-12">
							<label for="inputNgaySinh" class="control-label">Ngày sinh</label>
						</div>
						<!--Ngay-->
						<div class="col-md-4">
							<select style="margin-left: 145px;" name="chu[ngay]" class="form-control">
								<option>Ngày</option>
								<?php
									for ($i = 1; $i < 32; $i++) {
										echo "
											<option value='$i'>$i</option>
										";
									}
								?>
							</select>
						</div>
						<!--Thang-->
						<div class="col-md-4">
							<select style="margin-left: 72px;" name="chu[thang]" class="form-control">
								<option>Tháng</option>
								<?php
									for ($i = 1; $i < 13; $i++) {
										echo "
											<option value='$i'>$i</option>
										";
									}
								?>
							</select>
						</div>
						<!--Nam-->
						<div class="col-md-4">
							<select name="chu[nam]" class="form-control">
								<option>Năm</option>
								<?php
									for ($i = 2014; $i > 1904; $i--) {
										echo "
											<option value='$i'>$i</option>
										";
									}
								?>
							</select>
						</div>
					</div>
					<!--Dia chi-->
					<div class="form-group">
						<div class="col-md-12">
							<label class="label-control">Địa chỉ</label><span><font style="color: red">*</font></span>
						</div>
						<hr/>
						
						<div class="col-md-3">
							<label class="label-control">Số nhà</label>
						</div>
						<div class="col-md-3">
							<input style="margin-top: -6px;" id="sonha" type="text" name='chu[sonha]' style="width:100px;" class="form-control" required/>
						</div>
						<div class="col-md-3">
							<label style="margin-left: 17px">Quận</label>
						</div>
						<div class="col-md-3">
							<?php
								echo "<select id='quan' class='form-control' name='chu[quan]'>";
								foreach($huyen as $quan){
									 echo "<option value='".$quan['MA_HUYEN']."'>".$quan['TENHUYEN']."</option>";
								}
									echo "</select>";
							?>
						</div>    
						
						<div class="col-md-3">
							<label>Phường</label>
						</div>
						<div class="col-md-3">
							<?php
								echo "<select id='phuong' class='padding form-control' name='chu[phuong]'>";
								foreach($phuong as $phuong){
									   echo "<option value='".$phuong['MA_PHUONGXA']."'>".$phuong['TEN_PHUONGXA']."</option>";
									}
								echo "</select>";
							?>
						</div>   
						
						<div class="col-md-3">
							<label style="margin-left: 18px">Đường</label>
						</div>
						<div class="col-md-3">
							<?php
								echo "<select id='duong' class='padding form-control' name='chu[duong]'>";
								foreach($duong as $MA_PHUONGXA => $list){
									foreach ($list as $dg){
										echo "<option class='".$MA_PHUONGXA."' value='".$dg['MA_DUONG']."'>".$dg['TEN_DUONG']."</option>";
									}
								}
								 echo "</select>";
							 ?>
						</div>
						<hr/>
						<div class="col-md-3">
							 <label>Số điện thoại</label><span><font style="color: red">*</font></span><span id='dt'></span>
						</div>
						<div class="col-md-9">
							 <input type="text" name='chu[sdt]' value="<?php echo set_value('sdt');?>" id='sdt' class="form-control" style="width: 150px; " required/><br>
							<?php echo form_error('sdt')?>
						</div>
						<div class="col-md-3">
							 <label>Email</label>
						</div>
						<div class="col-md-9">
							 <input type="email" name='chu[email]' value="<?php echo set_value('email');?>" id='email' class="form-control"/><br>
						</div>
						<div class="col-md-12">
							<span><font style="color: red">Các trường có dấu (*) là bắt buộc phải có</font></span>
						</div>
					</div> <!--End div form-group-->
                    
					<div class="modal-footer clearfix">
						<button type="submit" class="btn btn-default pull-left button" name="btn_edit" onclick="check_sdt()">Sửa</button>
						<button type="button" id="cancle" class="btn btn-default button" name="btnHuy">Hủy</button>
					</div>
                </div>
        
                <input type='hidden' value='Yes' name='check_empty'/>
                <input type='hidden' value='<?php echo $check; ?>' id='check'/>
            </form>
		</div>
    </div>
</div>

                                    <!--Danh sách chủ nhà trọ-->

<section class='cit_timkiemnhatro'>
	<div class="container" id="dschu">
		
        <form method="post">
			<table class="table">
				<thead>
					<tr class="success">
					<th>STT</th>
					<th>Họ tên</th>
					<th>Giới tính</th>
					<th>Ngày sinh</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Email</th>
					<th>Chỉnh sửa</th>
				</tr>
				</thead>
				
				<tbody>
					<?php 
						$i = 0;
						foreach($chunhatro as $v) {
							$i++;
							echo "<tr class='warning'>";
								echo "<td hidden class='layma'>$v->mschu</td>";
								echo "<td>$i</td>";
								echo "<td class='layten' style='width: 200px'>$v->hoten</td>";
								echo "<td class='laysex'>$v->gioitinh</td>";
								echo "<td style='width: 130px'>$v->ngaysinh</td>";
								echo "<td class='laydiachi' style='width: 400px'>Số $v->so - Đ.$v->ten_duong - P.$v->ten_phuongxa - Q.$v->tenhuyen - Tp.Cần Thơ</td>";
								echo "<td class='laysdt' style='width: 110px'>$v->sdt</td>";
								echo "<td class='layemail' style='width: 150px'>$v->mail</td>";
								echo "<td class='col-md-2'><input type='button' value='Sửa' class='button sua'/></td>";
							echo "</tr>";
						}
					?>   
				</tbody>
			</table>
			<input type="hidden" value="Yes"/>
        </form>
    </div>
</section>

</section>