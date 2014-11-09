<?php if ($success) {?>
			<p><span style='color:blue;' >Đăng ký thành công</span></p>
			<p><a href='<?php echo CIT_BASE_URL.'home/index';?>' > Về trang chủ</a></p>
	<?php } else {?>
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
                  
                <tr><td> <label>Mail (*)</label></td><td><input name="add[mail]" type="text" class="form-control" placeholder="Nhập chính xác địa chỉ để nhận email về nhà trọ" value="<?php echo set_value('mail'); ?>"/>
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
					<td colspan='2'>
						Khi bạn đăng ký tức là bạn đã chấp nhận các điều khoản trong <a target='_blank' style='color:red;' href='<?php echo CIT_BASE_URL.'home/quydinhdangkithanhvien';?>' >Quy định đăng ký </a> của chúng tôi.
					</td>
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
	<?php }?>