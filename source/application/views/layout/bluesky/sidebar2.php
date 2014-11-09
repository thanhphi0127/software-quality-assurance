<div class="art-blockheader">
			 <div class="art-blockheader">
                <h3 class="t">Đăng nhập</h3>
             </div>
              <div class="art-blockcontent" >
				<?php if ($ma_quyen == 0) {?>
				<form action='<?php echo CIT_BASE_URL."auth/login";?>' method='post'>
					<input type='hidden' name='data[linker]' value='<?php if (isset($linker)) echo $linker; else echo '';?>'/>
					<p>Tài khoản:</p>
					<p>
					  <input type="text" name='data[username]'>
					 
					</p>
					<p>Mật khẩu:</p>
					<p>
					  <input type="password" name='data[password]'>
					 
					</p>
					<p>
					  <label class="art-checkbox">
						<input type="checkbox"/>
						&nbsp;Ghi nhớ</label>
					  
					</p>
					<p>&nbsp;<input type='submit' class="art-button" name='login' value='Đăng nhập'/></p>
				</form>
				
                <ul>
                  <li><span style="font-size: 12px; line-height: normal;"><a href="<?php echo CIT_BASE_URL.'auth/forgot';?>">Quên mật khẩu</a></span><br>
                  </li>                  
                  <li><span style="font-size: 12px; line-height: normal;"><a href="<?php echo CIT_BASE_URL.'auth/register';?>">Đăng ký mới</a></span><br>
                  </li>
                </ul>
                <p> </p>
				<?php }
					else { ?>
					<p><?php echo "Chào, ".$username;?></p>
					<p><span style="font-size: 12px; line-height: normal;"><a href="<?php echo CIT_BASE_URL.'auth/logout';?>">Đăng xuất</a></span></p>
				<?php	}
				?>
				
                
              </div>
            </div>
            
            <div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">Hỗ trợ</h3>
              </div>
              <div class="art-blockcontent">
                <p style="text-align: center;"><img width="131" height="75" alt="" src="public/img/lien_he.jpg" title='Liên hệ' class=""><br/>
                </p>
				<p style="text-align: left;line-height: 20px;">
					<span style="font-weight: bold;"><span style="color: rgb(226, 52, 29); text-decoration: underline;">Tài khoản tín dụng:</span>
					<span style="color: rgb(226, 52, 29); font-weight: bold; font-style: italic;"><span style='color:blueviolet;'>7600</span><span style='color:chartreuse;'>205433754</span></span>
				</p>
                <p style="text-align: left;line-height: 20px;">
					<span style="font-weight: bold;"><span style="color: rgb(226, 52, 29); text-decoration: underline;">Hot line 1:</span><br/>
					<span style="color: burlywood; font-weight: bold; font-style: italic;">0962 705 589</span>
				</p>
                <p style="text-align: left;line-height: 20px;">
					<span style="color: rgb(226, 52, 29); font-weight: bold; text-decoration: underline;">Hot line 2:</span></br>
					<span style="color: burlywood; font-weight: bold; font-style: italic;">0929 775 678</span>
				</p>
                <p style="text-align: left;line-height: 20px;">
					<span style="color: rgb(226, 52, 29); font-weight: bold; text-decoration: underline;">Mail:</span>
					<span style="color: burlywood; font-weight: bold; font-style: italic;">NhaTroCT@gmail.com</span>
				</p>
              </div>
            </div>
            <div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">Qui định</h3>
              </div>
              <div class="art-blockcontent">
                <p></p>
                <ul>
                  <li><a href="<?php echo CIT_BASE_URL.'home/quydinhdangnhatro';?>">Qui định về đăng tin nhà trọ</a><span style="font-size: 12px; line-height: normal; color: #F6A104;"></span><br>
                  </li>
                  <li><a href="<?php echo CIT_BASE_URL.'home/quydinhdangkithanhvien';?>">Qui định về đăng ký thành viên</a><span style="font-size: 12px; line-height: normal; color: #F6A104;"></span><br>
                  </li>
                </ul>
                <p> </p>
              </div>
            </div>
            <div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">Quảng cáo</h3>
              </div>
              <div class="art-blockcontent">
                <p><br>
                </p>
              </div>
			 </div>