<div class="art-content-layout">
                  <div class="art-content-layout-row">
                    <div class="art-layout-cell" style="width: 100%" >
                      <p style="text-align: center;">&nbsp;
						<a class="art-button prevpage" >&lt;&lt;</a>&nbsp;
						<?php for ($i = 0; $i < ceil($result['count']/IP); $i ++) {?>
								<a class="art-button page"><?php echo ($i + 1);?></a>&nbsp;
						<?php }?>
						<a class="art-button nextpage">&gt;&gt;</a>&nbsp;<br>
                      </p>
                    </div>
                  </div>
</div>
<input type='hidden' id='maxpage' value='<?php if (isset($result['count']) && !empty($result['count'])) 
													echo ceil($result['count']/IP);
											   else
													echo '0';
										 ?>'/>		
		