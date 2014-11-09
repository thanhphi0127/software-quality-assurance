

		<div id='login' class='form'>
						<form action='' method='post'>
						<?php echo "<span style='color:red;'>Bạn vừa nhập sai tên đăng nhập hoặc mật khẩu.</span>"; ?>
									<p >
										Tên đăng nhập</p><p>
										<input type="text" name='data[username]' placeholder="Nhập tài khoản người dùng"  
											       value="<?php echo common_postvalue(isset($_post['username']) ? $_post['username'] : '');?>" />
										
									</p>
									
									<p > 
										Mật khẩu</p></p>
											<input type="password" class="form-control"  name='data[password]' value="" placeholder="Nhập mật khẩu" >
										 
									</p>
									
										
									<p >
										
												<input  name="data[remember]" type="checkbox" value="0"> Ghi nhớ đăng nhập trong 2 ngày
										
									</p>
									
									<p >
										<a href="<?php echo CIT_BASE_URL; ?>home/index">Về trang chủ</a> / <a href="<?php echo CIT_BASE_URL; ?>auth/forgot">Quên mật khẩu</a> / <a href="<?php echo CIT_BASE_URL; ?>auth/register">Đăng ký mới</a> 
									</p>
									
									<p >	
										<input id="resetf"  type="reset" value="Hủy bỏ"/>
										<input id='loginf' type="submit"  name='login' value='Đăng nhập' />
										
									</p>
						</form>		
					
					
				</div>
			