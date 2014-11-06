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
                    <tr>
                    	<td><label>User name(*)</label></td>
                        <td>
                        	<input type="text" class="form-control" name="add[maso]" value="" /> 
                            <?php echo form_error('maso');?></td>
                    </tr>
                    
                    <tr>
                    	<td><label>Mật khẩu (*)</label></td>
                        <td>
                        	<input type="password" class="form-control" id="idmatkhau" name="add[matkhau]" value="<?php echo set_value('matkhau'); ?>" placeholder="Nhập mật khẩu"/> 
                            <?php echo form_error('matkhau');?></td>
                    </tr>
                    
                  <tr>
                      <td><label>Họ tên (*)</label></td>
                      <td><input type="text" class="form-control" name="add[hoten]" placeholder="Nhập họ tên" value="<?php echo set_value('hoten'); ?>"/>
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
               

                  <tr><td><label>Địa chỉ (*)</label></td><td><textarea name="add[diachi]" class="form-control" rows="2" placeholder="Nhập địa chỉ" ></textarea>
                      <?php echo form_error('diachi');?></td>
                   </tr>


                  <tr><td> <label>Số điện thoại (*)</label></td><td><input name="add[sodt]" type="text" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo set_value('sodt'); ?>"/>
                     <?php echo form_error('sodt'); ?>
</td>
				</tr>  
                  
                <tr><td> <label>Mail (*)</label></td><td><input name="add[mail]" type="text" class="form-control" placeholder="Nhập địa chỉ mail" value="<?php echo set_value('mail'); ?>"/>
                     <?php echo form_error('mail'); ?>
</td>
				</tr>   
                                       

                  <tr><td><label>Ngày đăng kí(*)</label></td>
                  	  <td>
                      	<input type="text"  name="add[ngaydangki]"value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly="readonly" />
                      </td>
                  </tr>
                      

                  <tr>
                  	<td colspan="2"><span style="color: red">(*) Là các trường bắt buộc nhập</span><input type="hidden" name="data[press]" id="hidden_add" value="<?php echo $press_add; ?>" id="temp" /></td>
                  </tr>

                  <tr>
                      <td><input id="btn_save" name="btnThemThanhVien" type="submit" class="btn btn-primary pull-left" value="Lưu lại"/></td>
                      <td>
                      	<input id="btn_huybo" name="huybo" type="reset" class="btn btn-primary huybo" value="Hủy bỏ" />
                      </td>
                  </tr>
           </table></div>
 			</form>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->