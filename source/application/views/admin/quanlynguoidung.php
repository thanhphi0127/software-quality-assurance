
<script type="text/javascript">
	function toggle(source) {
	  checkboxes = document.getElementsByName('checked[]');
	  for(var i=0, n=checkboxes.length;i<n;i++) {
		checkboxes[i].checked = source.checked;
	  }
	}
	
</script>

<script>
	$(document).ready(function(e) {
		$('#choice').html('');
		$('#btn_save_modfify').hide();
		$('#btn_add').removeAttr('disabled');
		$('#btn_delete').removeAttr('disabled');
		
		$('#btn_delete').click( function() {
			var num_check = $('input[type=checkbox]:checked').size();
			if(num_check > 0) return confirm("Bạn có chắc chắn muốn xóa không?");
		});
		
			 	
		$('#btn_modify').click(function() {
			//var value = $('.checkall').parent('tr').find(':checkbox').attr('checked', this.checked);
			$('#edit').show();
			$(this).hide();
			$('#btn_add').css('disabled', 'disabled');
		});
		
		///////////////////////////////////////////////////////////////////////////////
		///Chọn chỉnh sua thong tin sinh vien
		$('#edit').click( function() {
			var sl = 0;
			if ($('input[type=checkbox]:checked').size() > 0)
			{
				$('#btn_add').attr('disabled', 'disabled');
				$('#btn_delete').attr('disabled', 'disabled');
			}
			
			$('input[type=checkbox]').each( function(e) {
				//$(this).parent('td').parent('tr').find($('span.txtModify')).removeClass('edit');
				//$(this).parent('td').parent('tr').find($('span.pModify')).removeClass('edit');	
				$(this).parent('td').parent('tr').find($('span.txtModify')).hide();
				$(this).parent('td').parent('tr').find($('span.pModify')).show();
   			 });
			
			$('input[type=checkbox]:checked').each( function(e) {
				
				//$(this).parent('td').parent('tr').find($('span.txtModify')).addClass('edit');
				//$(this).parent('td').parent('tr').find($('span.pModify')).addClass('edit');

				$(this).parent('td').parent('tr').find($('span.txtModify')).show();
				$(this).parent('td').parent('tr').find($('span.pModify')).hide();
				sl = $(this).size();
   			 });
			
			if (sl > 0) {
				$('#choice').html('');	
				$('#btn_save_modfify').show();
				$('#edit').hide();
			}
			else {
				$('#choice').html('Vui lòng chọn sinh viên');
			}
		});
		
		
		$('#btn_add').click(function () {
			$('#btn_add').attr('disabled', 'disabled');
			$('#btn_delete').attr('disabled', 'disabled');
			$('#edit').attr('disabled', 'disabled');
			
			$('.khung').css('opacity','0.5');
			//$('.container').attr('disabled', 'disabled');
			//$('#show_add').show(500);
			//$('.show_add').css('opacity','1');

			$('#add_thanhvien').show();
			$('#add_thanhvien').show(500);
			$('.add_thanhvien').css('opacity','1');
		});
		
		$('.huybo').click(function () {
			$('#hidden_add').attr('value', 0);
			$('.container').show();
			$('.khung').css('opacity','1');
			
			//$('#show_add').hide();
			$('#add_thanhvien').hide();
			
			$('#btn_add').removeAttr('disabled');
			$('#btn_delete').removeAttr('disabled');
			$('#edit').removeAttr('disabled');
		});
		
		//Hien thi lai form add neu du lieu khong lop le (FORM THEM SINH VIEN)
		var pre_add = $('#hidden_add').attr('value');
		if (pre_add == 1) {
			$('#show_add').show();
			$('#add_thanhvien').show();
			//$('.khung').hide();
			$('.khung').css('opacity','0.5');
		}
			
		//Hien thi lai form cap nhat neu du lieu khong lop le (FORM CAP NHAT SINH VIEN)
		var pre_modify = $('#hidden_modify').attr('value');
		if (pre_modify == 1) {
			$('#show_add').hide();
			$('.khung').show();
			$('#choice').html('');	
			$('#btn_modify').show();
			$('#edit').hide();
				
		}
		$('#idmatkhau').change(function(){
			var oldPass = $('#idmatkhau').attr('value');
		});
		
		
	});
</script>


<!-- ----------------------------------------------------------------------------------
                    COMPOSE ADD USER MODAL 
-------------------------------------------------------------------------------------->

<div id="add_thanhvien" tabindex="-1" aria-hidden="true" style="position:absolute; display:none;">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button id="btn-close" type="button" class="close huybo" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Thêm thành viên</h4>
          </div>
           
           <form action="" method="post">
          <div class="modal-body" style="margin: 0px padding: 3px;">  
          <table id="table_add" border="0">
					 <tr><td><label>Ngày đăng ký(*)</label></td>
                  	  <td>
                      	<input type="text"  name="add[ngaydangki]"value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly="readonly" />
                      </td>
                  </tr>
                    <tr>
                    	<td><label>User name(*)</label></td>
                        <td>
                        	<input type="text" class="form-control" name="add[maso]" value="" /> 
                            <?php echo form_error('maso');?></td>
                    </tr>
                    
                    <tr>
                    	<td><label>Mật khẩu (*)</label></td>
                        <td>
                        	<input type="password" class="form-control" id="idmatkhau" name="add[matkhau]" value="<?php echo set_value('matkhau'); ?>" placeholder=""/> 
                            <?php echo form_error('matkhau');?></td>
                    </tr>
                    
                  <tr>
                      <td><label>Họ tên (*)</label></td>
                      <td><input type="text" class="form-control" name="add[hoten]" placeholder="" value="<?php echo set_value('hoten'); ?>"/>
                      <?php  echo form_error('hoten'); ?>
                      </td>   
                  </tr>
                  
                  <tr>
                  	 <td><label>Giới tính (*)</label></td>
                     <td><select class="form-control" name="add[gioitinh]">
                          <option>Nam</option>
                          <option>Nữ</option>
                      </select></td> 
                  </tr>
                  
                  <tr>
                  	<td><label style="display:inline">Ngày sinh (*)</label></td>
                  	<td>
                          <input name="add[ngaysinh]" type="date" class="form-control" value="<?php echo set_value('ngaysinh'); ?>" placeholder="yyyy/mm/dd" />
						  <?php echo form_error('ngaysinh'); ?>
                    </td>            
                  </tr>
               

                  <tr><td><label>Địa chỉ (*)</label></td><td><textarea name="add[diachi]" class="form-control" rows="2" placeholder="" ></textarea>
                      <?php echo form_error('diachi');?></td>
                   </tr>


                  <tr><td> <label>SĐT (*)</label></td><td><input name="add[sodt]" type="text" class="form-control" placeholder="" value="<?php echo set_value('sodt'); ?>"/>
                     <?php echo form_error('sodt'); ?>
</td>
				</tr>  
                  
                <tr><td> <label>Mail (*)</label></td><td><input name="add[mail]" type="text" class="form-control" placeholder="Nhập chính xác" value="<?php echo set_value('mail'); ?>"/>
                     <?php echo form_error('mail'); ?>
</td>
				</tr>   
                                       
				<tr><td> <label>Thẻ tín dụng (*)</label></td><td><input name="add[card]" type="text" class="form-control" placeholder="Viết liền không khoảng trắng" value="<?php echo set_value('mail'); ?>"/>
                     
</td>
				</tr>   
                 
                      

                  <tr>
                  	<td colspan="2"><span style="color: red">(*) Là trường bắt buộc</span><input type="hidden" name="data[press]" id="hidden_add" value="<?php echo $press_add; ?>" id="temp" /></td>
                  </tr>
					
                  <tr>
                      <td><input id="btn_save" name="btnThemThanhVien" type="submit" class="btn btn-primary pull-left" value="Đăng ký"/></td>
                      <td>
                      	<input id="btn_huybo" name="huybo" type="reset" class="btn btn-primary huybo" value="Hủy bỏ" />
                      </td>
                  </tr>
				  
           </table>
 </div>
 	</form>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- NOI DUNG -->
<div class="khung" style="font-family:'Times New Roman'; margin-top: 0px; ">
  <form action="" method="post">
    <div class="row top_row">
        
        <input type="hidden" value="<?php echo $press_modify; ?>" id="hidden_modify" />
        <table id="example1" class="table-bordered table-hover table_nguoidung">

               <thead>
               <tr>
               	<th colspan="11" class="student_header">Danh sách người dùng</th>
               </tr>
               <tr>
                   	   <th><input type="checkbox" name="checked[]" onclick="toggle(this)" value="" class="checkall"/></th>
                       <th>STT</th>
                       <th>Mã số</th>
                       <th>Họ tên</th>
                       <th>Giới tính</th>
                       <th>Mail</th>
                       <th>Số điện thoại</th>
                       <th>Ngày sinh</th>
                       <th>Địa chỉ</th>
                       <th>Ngày đăng kí</th>
                   </tr>
               </thead>
			<tbody>
        <?php 
			if(isset($DanhSachThanhVien) && !empty($DanhSachThanhVien)) {
				$i = 1;
				foreach ($DanhSachThanhVien as $a => $ds) {
				echo "<tr>
					<td><input type='checkbox' name='checked[]' value='".$ds['USERNAME']."'/></td>
					<td>$i</td>";
				echo "<td>
						<span class='pModify'>".$ds['USERNAME']."</span>
						<span class='txtModify' hidden>
						<input class='maso' readonly type='text' name='".$ds['USERNAME']."[maso]' value='".$ds['USERNAME']."'/></span>
					  </td>";	
					  
				echo "<td>
						<span class='pModify'>".$ds['HOTEN']."</span>
						<span class='txtModify' hidden>
						<input class='hoten' type='text' name='".$ds['USERNAME']."[hoten]' value='".$ds['HOTEN']."'/></span>
					  </td>";
			     echo "<td>
						<span class='pModify'>".$ds['GIOITINH']."</span>
						<span class='txtModify' hidden>
						  <select name='".$ds['USERNAME']."[gioitinh]'>
						     <option value='Nam'";
						     if ($ds['GIOITINH'] == 'Nam') echo 'selected';
			     echo                                ">Nam</option>
						     <option value='Nữ'";
						     if ($ds['GIOITINH'] == 'Nữ') echo 'selected';
				echo                  ">Nữ</option>
									</select></span></td>";
			     echo "<td>
						<span class='pModify'>".$ds['MAIL']."</span>
						<span class='txtModify' hidden>
						<input type='text' name='".$ds['USERNAME']."[mail]' value='".$ds['MAIL']."'/></span>
					  </td>";
			     echo "<td>
						<span class='pModify'>".$ds['SDT']."</span>
						<span class='txtModify' hidden>
						<input type='text' name='".$ds['USERNAME']."[sdt]' value='".$ds['SDT']."'/></span>
					  </td>";
			     echo "<td>
						<span class='pModify'>".$ds['NGAYSINH']."</span>
						<span class='txtModify' hidden>
						<input type='text' name='".$ds['USERNAME']."[ngaysinh]' value='".$ds['NGAYSINH']."'/></span>
					  </td>";
			     echo "<td>
						<span class='pModify'>".$ds['DIACHI']."</span>
						<span class='txtModify' hidden>
						<input type='text' name='".$ds['USERNAME']."[diachi]' value='".$ds['DIACHI']."'/></span>
					  </td>";
			     echo "<td>
						<span class='pModify'>".$ds['NGAYDANGKI']."</span>
						<span class='txtModify' hidden>
						<input type='text' readonly name='".$ds['USERNAME']."[ngaydangki]' value='".$ds['NGAYDANGKI']."'/></span>
					  </td>
					</tr>";
					$i++;
				}
			}
		?>
           
            </tbody>
            <tfoot>
                   <tr>
                   	   <th></th>
                       <th>STT</th>
                       <th>Mã số</th>
                       <th>Họ tên</th>
                       <th>Giới tính</th>
                       <th>Mail</th>
                       <th>Số điện thoại</th>
                       <th>Ngày sinh</th>
                       <th>Địa chỉ</th>
                       <th>Ngày đăng kí</th>
                   </tr>
            </tfoot>
        </table>
  
         <div id="choice" class="active"></div>
         <div class="row btn_border">
			<div class="col-md-2"></div>
			
         	<div class="col-md-8 btn_nguoidung">
				<input id="btn_add" class="btn btn-default" value="Thêm"/>
                <input id ="edit" name="edit" type="button" type="submit" class="btn btn-default" value="Cập nhật"/>
                <input id="btn_save_modfify" name="btn_save" type="submit" class="btn btn-default"  value="Lưu lại" />
                <input id="btn_huybo" style='width:80px;' stype="submit" class="btn btn-default" value="Hủy bỏ" />
				<input id="btn_delete" name="btn_delete" type="submit"  class="btn btn-default" value="Xóa" />
                <div style="background-color:#CCC"></div>
            
			</div>
			
			<div class="col-md-2"></div>
         </div><!--end div row -->
         
    

        
    </div><!--end div row-->
  </form> 
</div><!--end div khung-->





