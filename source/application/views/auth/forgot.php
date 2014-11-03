

	<div id='forgot' class='form'>
		<form action="" method="post">
	

				<?php echo common_showerror(validation_errors()); ?>
				<label> <p>Email:</p><input type="text" name='data[email]' class = 'txtEmail' ></label><br /> 
				<section>
					<input type="submit" name='send' value='Gửi' class='art-button'>
					<input type="reset" value='Làm lại'  class='art-button'>
				</section>
		</form>
	</div>

