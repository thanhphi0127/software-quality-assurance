<section id='target'>
	<div class='target'>
		<fieldset class='target'>
			<legend>Tiêu điểm tìm kiếm <img src='public/img/iconhot.gif'/></legend>
			<ul class='target'>
				<?php foreach ($tieudiem as $row) {?>
				<li><a href='<?php echo CIT_BASE_URL.'search/result/target/'.$row['MA_TIEUDIEM'];?>'><?php echo $row['TEN_TIEUDIEM'];?></a></li>
				<?php }?>
			</ul>
		</fieldset>
	</div>
</section>