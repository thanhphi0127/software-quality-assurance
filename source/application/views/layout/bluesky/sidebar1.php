﻿<div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">Tìm kiếm nhanh</h3>
              </div>
              <div class="art-blockcontent">
			  <!--
                <p style="text-align: left;">
                  <label for="newsletter" style="font-style: italic; font-size: 14px;">Qu?n - Huy?n</label>
                  <select id="newsletter" name="newsletter">
                    <option value="Daily" selected>Ninh Ki?u</option>
                    <option value="Weekly">B�nh Th?y</option>
                    <option value="Monthly">C�i Rang</option>
                    <option value="Never">C? �?</option>
                    <option value="Monthly">Phong �i?n</option>
                    <option value="Never">� M�n</option>
                    <option value="Never">Th?t N?t</option>
                  </select>
                </p>
                <p style="text-align: left;">
                  <label for="updates" style="font-style: italic; font-size: 14px;">Phu?ng - X�</label>
                  <select id="updates" name="updates">
                    <option value="1" selected>Xu�n Kh�nh</option>
                    <option value="2">An Cu</option>
                    <option value="0">An Nghi?p</option>
                    <option value="1" selected>An L?c</option>
                  </select>
                  &nbsp;</p>
                <p style="text-align: left;">
                  <label for="updates" style="font-style: italic; font-size: 14px;">�u?ng</label>
                  <select id="updates" name="updates">
                    <option value="1" selected>3 Th�ng 2</option>
                    <option value="2">30 Th�ng 4</option>
                    <option value="0">M?u Th�n</option>
                    <option value="1" selected>Nguy?n Van C?</option>
                    <option value="1" selected>Tr?n Hung �?o</option>
                    <option value="2">L� T? Tr?ng</option>
                    <option value="0">Nguy?n Tr�i</option>
                    <option value="1" selected>Tr?n Van Kh�o</option>
                  </select>
                </p>
                <p style="text-align: center;">&nbsp;<a href="trang-chu.html" class="art-button">T�m Nhanh</a>&nbsp;<br>
                </p>
				-->
				<div>
                  <form action="<?php echo CIT_BASE_URL.'search/quicksearch';?>" class="art-search standardform" method="post" name="searchform">
                    <input type="text" style='padding: 3px 10px;padding-right: 29px !important;text-transform: none;' value="" name="keyword" placeholder='Bạn muốn tìm gì ?' />
                    <input type="submit" value="Search" name="quicksearch" class="art-search-button" />
                  </form>
                </div>
              </div>
            </div>
            <div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">Tìm kiếm nâng cao</h3>
              </div>
              <div class="art-blockcontent">
                <p style="text-align: center;"> </p>
                <p> </p>
                
                <p style="text-align: center;">
					<a href="<?php echo CIT_BASE_URL.'search/detailsearch';?>"><!--<img width="120" height="96" alt="" src="public/img/19ca3799-7a56-47f0-b894-9fc8c7a4719c.png" class="">--></a>
					<a href="<?php echo CIT_BASE_URL.'search/detailsearch';?>" class="art-button">Tìm kiếm chi tiết</a>&nbsp;<br>
					<a href="<?php echo CIT_BASE_URL.'search/areasearch';?>"><!--<img width="120" height="96" alt="" src="public/img/19ca3799-7a56-47f0-b894-9fc8c7a4719c.png" class="">--></a>
					<a href="<?php echo CIT_BASE_URL.'search/areasearch';?>" class="art-button">Tìm kiếm theo khu vực</a>&nbsp;<br>
					<?php $this->load->view('search/targetsearch');?>
                </p>
              </div>
            </div>
            
              
            <div class="art-block clearfix">
              <div class="art-blockheader">
                <h3 class="t">Quảng cáo</h3>
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
                <h3 class="t">Quảng cáo</h3>
              </div>
              <div class="art-blockcontent">
                <p><img src='public/img/danhchoquangcao.jpg' width='90%' height='auto'/>
                </p>
              </div>
            </div>