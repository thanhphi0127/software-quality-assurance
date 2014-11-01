			<ul class='target'>
				<?php foreach ($tieudiem as $row) {?>
				<li><a href='<?php echo CIT_BASE_URL.'search/result/target/'.$row['MA_TIEUDIEM'];?>'><?php echo $row['TEN_TIEUDIEM'];?></a></li>
				<?php }?>
			</ul>