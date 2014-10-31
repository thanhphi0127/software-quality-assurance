
<section id='cit_wrapper'>
	<div id='forgot' class='form'>
		<form action="" method="post">
	
			<fieldset>
				<legend>Quên thông tin tài khoản</legend>
				<?php echo common_showerror(validation_errors()); ?>
				<label> <p>Email:</p><input type="text" name='data[email]' class = 'txtEmail'></label><br /> 
				<section>
					<input type="submit" name='send' value='Gửi' class='submit-button'>
					<input type="reset" value='Làm lại'>
				</section>
				<nav>
					<ul class='forgot'>
						<li><a href='<?php echo CIT_BASE_URL; ?>' title='Về trang chủ' >Về trang chủ</a></li>
					</ul>
				</nav>
			</fieldset>
			
		</form>
	</div>
</section>
