<header></header>
<section class='cit-wrapper' style="width: 87%;
margin: auto;
border: 1px solid #999;
margin-top: 22px;
padding: 5px;
border-radius: 5px;">
	<form action="" method="post">
	
        <fieldset>
            <legend>Đăng ký người dùng</legend>
			<?php echo common_showerror(validation_errors()); ?>
            <label> <p>Mã số sinh viên:</p><input type="text" name='data[username]' value="<?php echo common_postvalue(
									isset($_post['username']) ? $_post['username'] : '');?>" ></label><br /> 
									
			<label><p>Mật khẩu:</p><input type="text" name='data[password]' readonly = "readonly" value="<?php echo common_randvalue() ;?>" ></label><br /> 
			
			<label><p>Email:</p><input type="text" name='data[email]'  value="<?php echo common_postvalue(
									isset($_post['email']) ? $_post['email'] : '');?>" ></label><br /> 
									
			<label> <p>Họ tên:</p><input type="text" name='data[name]' value="<?php echo common_postvalue(
									isset($_post['name']) ? $_post['name'] : '');?>" ></label><br /> 
			
			<label> <p>Số điện thoại:</p><input type="text" name='data[phone]' value="<?php echo common_postvalue(
									isset($_post['phone']) ? $_post['phone'] : '');?>" ></label><br /> 
			
			<label> <p>Giới tính:</p> <val>Nam</val><input type="radio" name='data[sex]' value="male" <?php 
									if (isset($_post['sex']) && $_post['sex']=='male' )
										echo "checked='checked' ";?> > </label> 
			<label>  <p></p>         <val>Nữ</val>  <input type="radio" name='data[sex]' value="female" <?php 
									if (isset($_post['sex']) && $_post['sex']=='female' )
										echo "checked='checked' ";?>></label> 
			<label>  <p></p>       <val>Khác</val><input type="radio" name='data[sex]' value="other" <?php 
									if (isset($_post['sex']) && $_post['sex']=='other' )
										echo "checked='checked' ";?>> </label><br />
									
			<label> <p>Năm sinh:</p><input type="text" name='data[birth]' value="<?php echo common_postvalue(
									isset($_post['birth']) ? $_post['birth'] : '');?>" ></label><br /> 
									
			<label> <p>Lớp:</p><input type="text" name='data[classid]' value="<?php echo common_postvalue(
									isset($_post['classid']) ? $_post['classid'] : '');?>" ></label><br /> 
									
            <section>
				<input type="submit" name='register' value='Tạo mới'>
				<input type="reset" value='Làm lại'>
			</section>
			<nav>
				<ul>
					<li><a href='<?php echo CIT_BASE_URL; ?>' title='Về trang chủ' >Về trang chủ</a></li>
					<li>/</li>
					<li><a href='<?php echo CIT_BASE_URL; ?>auth/login' title='Đăng nhập'>Đăng nhập</a></li>                
				</ul>
			</nav>
    	</fieldset>
		
    </form>

</section>
