<section id='area'>
	<div class='panel area'>Tìm theo khu vực</div>
	<div class='standardform'>
			<table>
				<tr>
					 <td class='district' >
										<p><span >Quận</span></p>
										<select id='quan' name='data[MA_HUYEN]' >
											<?php
												foreach ($quan as $row){
													echo "<option value='".$row['MA_HUYEN']."'>".$row['TENHUYEN']."</option>";
												}
											?>
										</select>
							
					</td>		
					<td class='ward'>
									<p><span >Phường </span></p>
									<select id='phuong' name='data[MA_PHUONGXA]'>
											<?php
												foreach ($phuong as $row){
													echo "<option value='".$row['MA_PHUONGXA']."'>".$row['TEN_PHUONGXA']."</option>";
												}
											?>
									</select>
								
					</td>
				</tr>
				<tr>
					<td colspan='2' style='text-align:center;'><a id='allofdistrict' href='<?php echo CIT_BASE_URL."search/result/area/NK-XK-0";?>'>Tìm tất cả đường thuộc quận-phường trên</a></td>
					
				</tr>
				<tr>			
					<td colspan='2' class='street' >
									<p><span >Hoặc chọn Đường</span></p>
							
								
										
									<?php 
										$i = 0;
										$tr = false;
										foreach ($duong as $ma_phuong => $item) {
											echo "<table class='".$ma_phuong."' style='width:100%;'> ";
											foreach ($item as $row){
												$i ++;
												if (1 == $i)
													echo "<tr>";
												if (1 <= $i && $i <= 4) {
													echo "<td style='width:25%;'><a class='".$ma_phuong."' href='".CIT_BASE_URL."search/result/area/".$row['MA_DUONG']."'>".$row['TEN_DUONG']."</a></td>";
													$tr = false;
												}
												
												
												if (4 == $i) {
													echo "</tr>";
													$tr = true;
													$i = 0;
												}
												
												
											}
											if (!$tr) {
													echo "</tr>";	
											}
											echo "</table>";
										}
										
										
									?>
									
									
										
									
					
					</td>
				</tr>
				
			</table>
			
</section>
