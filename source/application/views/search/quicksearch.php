<section id='result'>

		
		<p>
			<?php echo '"'.$keyword.'"';?><br/>
			<span class='count_result'>	<?php echo "Có ".$result['count']." nhà trọ được tìm thấy";?></span>
			
		</p>
		

	
	
	<!-- Kết quả tìm kiếm-->			
	<?php if (!empty($result['nhatro']) ) {
	?>
			<?php if ($result['count'] > 10) 
					$this->load->view('layout/pagination');
			?>
				<!-- Tiêu đề -->
				<div class="art-content-layout">
                  <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-0" style="width: 35%" >
                      <p style="text-align: center;"><span style="font-weight: bold; color: #F6A104;">Hình ảnh</span></p>
                    </div>
                    <div class="art-layout-cell" style="width: 65%" >
                      <p style="text-align: left;"><span style="color: rgb(246, 161, 4); font-weight: bold;">Mô tả sơ lược</span></p>
                    </div>
                  </div>
                </div>
	<?php
				foreach ($result['nhatro'] as $nhatro_list){ 
					foreach ($nhatro_list as $row){
						$i = 0;
	?>
						<div class="art-content-layout result">
									  <div class="art-content-layout-row">
										<div class="art-layout-cell layout-item-0" style="width: 35%" >
										  <p>
												<img width="145" height="108" alt="" class="art-lightbox" src="public/img/nhatro/<?php if (isset($row['HINHANH']) && !empty($row['HINHANH'])) 
																																			echo $row['HINHANH'];
																																		else 
																																			echo "no_photo.jpg";
																																?>">
												<br/>											
										  </p>
										</div>
										<div class="art-layout-cell" style="width: 65%" >
										  <p style='margin-top: 6px;'><a href="<?php echo CIT_BASE_URL.'search/houseinfo/'.$row['MA_NHATRO']; ?>"><span style="color: rgb(246, 161, 4); "><?php echo $row['TEN_NHATRO'];?></span><span style="color: rgb(246, 161, 4); "></span></a><span style="color: #F6A104;"></span></p>
										  <p><?php echo $row['MOTA']; ?></p>
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
										   ?>
										</div>
									  </div>
						</div>
	<?php 		}}?>
		
			<?php if ($result['count'] > 10) 
				$this->load->view('layout/pagination');
			?>
	<?php		
		}
	?>
				
	
	
	
</section>







