


<section id='cit_wrapper'>
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

<section  id='search'>
	
   <div class='panel detailedsearch'>Tìm kiếm Chi tiết</div>
   <div class='detailedsearch'>
		<form class='standardform' action='<?php echo CIT_BASE_URL.'search/result/advance';?>' method='post'>
			<table class='detailedsearch'>
				<tr>
                    <td>Giá
                           <select name='data[GIA]'>
								<option value='0-0'>---------------Bất kì---------------</option>
								<optgroup label="Thấp / Rẻ ">
									<option value='500000-700000'>500 - 700 ngàn</option>
									<option value='700000-800000'>700 - 800</option>
								</optgroup>
								<optgroup label="Trung bình">
									<option value='800000-1000000'>800 - 1 triệu</option>
									<option value='1000000-1500000'>1 triệu - 1,5 triệu</option>
								</optgroup>
								<optgroup label="Cao">
									<option value='1500000-2000000'>1,5 triệu - 2 triệu</option>
									<option value='2000000'> 2 triệu</option>
								</optgroup>
							</select>
                   </td>


                    <td>Số người / phòng
                           <select name='data[SL_NGUOI]'>
								<option value='0' >---------------Bất kì---------------</option>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='>4'>Trên 4</option>
							</select>
                   </td>
                 </tr>
				 <tr>
					<td colspan='2'><a class='manipulation btnDetail'>Thêm tùy chọn</a></td>
				</tr>
				<tr>
					<td colspan='2' >
						<div class='btnDetail'>
							<p><label> <input type='checkbox' name='option[]' value='NAU_AN'/><span>Cho nấu ăn</span></label></p>
							<p><label><input type='checkbox' name='option[]' value='TOILETTRONG' /><span>Nhà vệ sinh trong</span></label></p>
							<p><label><input type='checkbox' name='option[]' value='BAIDAUXE' /><span>Bãi đậu xe</span></label></p>
							<p><label><input type='checkbox' name='option[]'  value='GAC'/><span>Có gác</span></label></p>
						</div>
					</td>
				</tr>
				<tr>
					 <td colspan='2'>
					  <fieldset class='search'>
							<legend>Giới hạn tìm kiếm ở</legend>
							<input type='button' class='btnSelectall' name='data[nolimit]' value='Không giới hạn'/>
							<input type='text' id='district_limit' class='hide' name='data[MA_HUYEN]' value='0'/>
							
							
							<section class='district limit'>
								<div class='district'>
										<span >Quận</span>
										
										<ul>
											<?php
												foreach ($quan as $row){
													echo "<li><input type='text' class='hide' value='".$row['MA_HUYEN']."'/>".$row['TENHUYEN']."</li>";
												}
											?>
										</ul>
								</div>
							</section>
							
							<section class='ward limit'>
								<div class='ward'><span >Phường</span>
									
									<?php
										foreach ($quan as $item){
											echo "<ul class='".$item['MA_HUYEN']."'>";
											foreach ($phuong as $row){
												if (substr($row['MA_PHUONGXA'], 0, 2) == $item['MA_HUYEN']) 
													echo "<li><label><input name='data[MA_PHUONGXA][]' type='checkbox' value='".$row['MA_PHUONGXA']."'/>".$row['TEN_PHUONGXA']."</label></li>";
											}
											echo "</ul>";
										}
												
											?>
									</select>
								</div>
							</section>
							
						</fieldset>
					</td>
				</tr>
				
				<tr>
					<td colspan='2' >
						<div class='fright searchstyle'>
							<ul>
								<li><label><span>Chỉ tìm nhà trọ còn trống</span> <input type='radio' value='empty_house' name='data[searchstyle]'/></label></li>
								<li><label><span>Tìm tất cả</span> <input type='radio' value='all_house' name='data[searchstyle]' checked='checked'/></label></p></li>
								<li><label><span><input type='submit' value='Tìm' /></label></li>
							</ul>
							
							
						</div>
					</td>
				</tr>

			</table>
		</form>
	</div>
</section>

</section>


