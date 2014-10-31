	<!-- NOI DUNG -->
<div class="container">
        <div class="row">
    		<div class="col-md-4">
                <h3 style="font-family:'Times New Roman', Times, serif">ĐĂNG NHẬP</h3>
                <form action="" method="post" >
				<div class="panel panel-default" style="background-color: #f5f9f5; border-color: #c5c5c5; height: 450px">
					<div class="panel-body" style="padding: 10px; margin:auto">
						<div align="center"><img src="<?php echo CIT_BASE_URL;?>public/img/login-user.png" alt="Image-User" title='login-user.png'/></div>
					</div>
					
					
						<?php echo "<span style='color:red;'>".common_showerror(validation_errors())."</span>"; ?>
									<p class="form-group">
										<label>Tên đăng nhập
										<input type="text" class="form-control" name='data[username]' placeholder="Nhập tài khoản người dùng"  
											       value="<?php echo common_postvalue(isset($_post['username']) ? $_post['username'] : '');?>" />
										</label>
									</p>
									
									<p class="form-group"> 
										<label>Mật khẩu
											<input type="password" class="form-control"  name='data[password]' value="" placeholder="Nhập mật khẩu" >
										 </label>
									</p>
									
										
									<p class="form-group_check">
										<label class="checkbox">
												<input  name="data[remember]" type="checkbox" value="0"> Ghi nhớ đăng nhập trong 2 ngày
										</label>
									</p>
									
									<p class="form-group">
										<label><a href="<?php echo CIT_BASE_URL; ?>auth/forgot">Quên mật khẩu?</a></label>
									</p>
									
									<p class='p-btn-primary'>	
										<input id="resetf" class='btn btn-primary' type="reset" value="Hủy bỏ"/>
										<input id='loginf' type="submit" class='btn btn-primary' name='login' value='Đăng nhập' />
										
									</p>
							</form>		
					
					
				</div>
			</div><!--end div col-md-4-->
			
			<div class="col-md-8">
				<div class="row">        		
					<div id='intro' style="border-radius:0px ">
						<span style="border-radius:2px; width: 200px">Giới thiệu về hệ thống</span>
						<table style="min-height: 440px;">
							<tr><td><img  class='crop'  src="<?php echo CIT_BASE_URL; ?>public/img/nhom-login.png" title='nhom-login.png'/></td><td>Hệ thống cho phép sinh viên có thể quản lý công việc của mỗi môn học cụ thể</p></td></tr>
							<tr><td><img  class='crop' src="<?php echo CIT_BASE_URL; ?>public/img/giangvien-login.png" title='giangvien-login'/></td><td>Giáo viên có thể xem xét, đánh giá mức độ hoàn thành công việc của mỗi thanh viên kèm theo quản lý các nhóm mà mình phụ trách.</td></tr>
						</table>
					</div>
				</div>
			</div><!--end div col-md-8-->
			
		</div><!--end div row-->
		
</div><!--end div container-->
