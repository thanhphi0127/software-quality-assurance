
<div id="art-main">
  <?php $this->load->view('layout/bluesky/header_top');?>
  <nav class="art-nav">
    <?php $this->load->view('layout/bluesky/home_menu');?>
  </nav>
  <div class="art-sheet clearfix">
    <div class="art-layout-wrapper">
      <div class="art-content-layout">
        <div class="art-content-layout-row">
			
		<?php if ($template != 'chunhatro/dangnhatro') {?>	
				 
          <div class="art-layout-cell art-sidebar1">
            <?php $this->load->view('layout/bluesky/sidebar1');?>
          </div>
		<?php } ?>
          <div class="art-layout-cell art-content">
            <article class="art-post art-article">
                <?php //$this->load->view('home/sidebarcontent');
					$this->load->view ($template);
				?>
            </article>
          </div>
          <?php if ($template != 'chunhatro/dangnhatro') {?>	
		  <div class="art-layout-cell art-sidebar2">
            <div class="art-block clearfix">
               <?php $this->load->view('layout/bluesky/sidebar2');?>
            </div>
          </div>
		  <?php }?>
        </div>
      </div>
    </div>
    <footer class="art-footer"> <a title="RSS" class="art-rss-tag-icon" style="position: absolute; bottom: 8px; left: 6px; line-height: 32px;" href="#"></a>
      <?php $this->load->view('layout/bluesky/bottom');?>
    </footer>
  </div>
  <p class="art-page-footer"> <span id="art-footnote-links"><a href="http://www.artisteer.com/" target="_blank">Web Template</a> created with Artisteer.</span> </p>
</div>
