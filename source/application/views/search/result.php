


<section id='cit_wrapper'>
<section id='area'>
	<div class='panel area'>Kết quả tìm kiếm <?php echo $type;?>
		
			<p><?php if ('theo khu vực' == $type) {
						echo "Quận ";
						echo $result['area'][0]['TENHUYEN'];
						echo ", Phường ";
						echo $result['area'][0]['TEN_PHUONGXA'];
						echo ", Đường ";
						if (isset($result['area'][0]['TEN_DUONG'])) 
							echo $result['area'][0]['TEN_DUONG'];
						else echo "(Tất cả)";
											
									
				
			
					
					}
				echo "<p><span class='count_result'>";
			
				if (empty($result['nhatro']))
						echo "Không tìm thấy nhà trọ phù hợp";
					else { 
						echo "Có ".$result['count']." nhà trọ được tìm thấy";
					}
			
				echo "</span></p>";
			?>
			
				
			</p>
			
	</div>
	<div class='standardform'>
			
			<table class='result'>
				
				<?php 
					
					if (!empty($result['nhatro']) ) {
						foreach ($result['nhatro'] as $row){ 
							$i = 0;
						
						echo "<tr>";
						echo "<td class='info' >";
				?>
						<p><span ><a href='<?php echo CIT_BASE_URL.'search/houseinfo/'.$row['MA_NHATRO']; ?>'><?php echo $row['TEN_NHATRO'];?></a></span></p>
						<p><span >Hình ảnh ở đây</span><span ><?php echo $row['MOTA']; ?></span></p>
						
							<?php 
								if (isset($result['phong'][$row['MA_NHATRO']]) && !empty($result['phong'][$row['MA_NHATRO']])) {
									foreach ($result['phong'][$row['MA_NHATRO']] as $item){ 
										$i ++; 
										echo "<p>Phòng ".$item['MA_PHONG'];
										echo "<span >Giá </span><span >".$item['GIA']."</span>";
										echo "<span >Diện tích </span><span >".$item['DIENTICH']."</span>";
										echo "</p>";
									}
								}
								/*else if ('nâng cao' == $type){
									echo "<p>Phòng ".$row['MA_PHONG'];
									echo "<span >Giá </span><span >".$row['GIA']."</span>";
									echo "<span >Diện tích </span><span >".$row['DIENTICH']."</span>";
									echo "</p>";
								}*/
							echo "</td>";
					echo "</tr>";
						}				
						
					}
							?>
					

			</table>
	</div>
</section>


<section id='target'>
	<div class='target'>
		<fieldset class='target'>
			<legend>Tiêu điểm tìm kiếm</legend>
			<ul class='target'>
				<?php foreach ($tieudiem as $row) {?>
				<li><a href='<?php echo CIT_BASE_URL.'search/result/target/'.$row['MA_TIEUDIEM'];?>'><?php echo $row['TEN_TIEUDIEM'];?></a></li>
				<?php }?>
			</ul>
							
		</fieldset>
	</div>
</section>

</section>


