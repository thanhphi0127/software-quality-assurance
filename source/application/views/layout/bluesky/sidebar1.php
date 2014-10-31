<div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">TÃ¬m kiáº¿m nhanh</h3>
              </div>
              <div class="art-blockcontent">
			  <!--
                <p style="text-align: left;">
                  <label for="newsletter" style="font-style: italic; font-size: 14px;">Qu?n - Huy?n</label>
                  <select id="newsletter" name="newsletter">
                    <option value="Daily" selected>Ninh Ki?u</option>
                    <option value="Weekly">Bình Th?y</option>
                    <option value="Monthly">Cái Rang</option>
                    <option value="Never">C? Ð?</option>
                    <option value="Monthly">Phong Ði?n</option>
                    <option value="Never">Ô Môn</option>
                    <option value="Never">Th?t N?t</option>
                  </select>
                </p>
                <p style="text-align: left;">
                  <label for="updates" style="font-style: italic; font-size: 14px;">Phu?ng - Xã</label>
                  <select id="updates" name="updates">
                    <option value="1" selected>Xuân Khánh</option>
                    <option value="2">An Cu</option>
                    <option value="0">An Nghi?p</option>
                    <option value="1" selected>An L?c</option>
                  </select>
                  &nbsp;</p>
                <p style="text-align: left;">
                  <label for="updates" style="font-style: italic; font-size: 14px;">Ðu?ng</label>
                  <select id="updates" name="updates">
                    <option value="1" selected>3 Tháng 2</option>
                    <option value="2">30 Tháng 4</option>
                    <option value="0">M?u Thân</option>
                    <option value="1" selected>Nguy?n Van C?</option>
                    <option value="1" selected>Tr?n Hung Ð?o</option>
                    <option value="2">Lý T? Tr?ng</option>
                    <option value="0">Nguy?n Trãi</option>
                    <option value="1" selected>Tr?n Van Khéo</option>
                  </select>
                </p>
                <p style="text-align: center;">&nbsp;<a href="trang-chu.html" class="art-button">Tìm Nhanh</a>&nbsp;<br>
                </p>
				-->
				<div>
                  <form action="<?php echo CIT_BASE_URL.'search/quicksearch';?>" class="art-search standardform" method="post" name="searchform">
                    <input type="text" style='padding: 3px 10px;padding-right: 29px !important;text-transform: none;' value="" name="keyword" placeholder='Báº¡n muá»‘n tÃ¬m gÃ¬ ?' />
                    <input type="submit" value="Search" name="quicksearch" class="art-search-button" />
                  </form>
                </div>
              </div>
            </div>
            <div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">TÃ¬m kiáº¿m nÃ¢ng cao</h3>
              </div>
              <div class="art-blockcontent">
                <p style="text-align: center;"> </p>
                <p> </p>
                
                <p style="text-align: center;">
					<a href="<?php echo CIT_BASE_URL.'search/detailsearch';?>"><!--<img width="120" height="96" alt="" src="public/img/19ca3799-7a56-47f0-b894-9fc8c7a4719c.png" class="">--></a>
					<a href="<?php echo CIT_BASE_URL.'search/detailsearch';?>" class="art-button">TÃ¬m kiáº¿m chi tiáº¿t</a>&nbsp;<br>
					<a href="<?php echo CIT_BASE_URL.'search/areasearch';?>"><!--<img width="120" height="96" alt="" src="public/img/19ca3799-7a56-47f0-b894-9fc8c7a4719c.png" class="">--></a>
					<a href="<?php echo CIT_BASE_URL.'search/areasearch';?>" class="art-button">TÃ¬m kiáº¿m theo khu vá»±c</a>&nbsp;<br>
					<?php $this->load->view('search/targetsearch');?>
                </p>
              </div>
            </div>
            
              
            <div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">Quáº£ng cÃ¡o</h3>
              </div>
              <div class="art-blockcontent">
                <p class='quangcao_one'>
					<video width="100%" height="auto" controls>
				  <source src="public/video/kokomi.mp4" type="video/mp4">
				Your browser does not support the video tag.
				</video>
                </p>
              </div>
            </div>
            <div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">Quáº£ng cÃ¡o</h3>
              </div>
              <div class="art-blockcontent">
                <p><img src='public/img/danhchoquangcao.jpg' width='90%' height='auto'/>
                </p>
              </div>
            </div>