<section class='cit_timkiemnhatro'>
<div class="container">
    <div class="row">
            <div class="panel panel-primary" style="width: 700px">
              <div class="panel-heading">Góp ý</div>
              <div class="panel-body">
              	  <form class="form-horizontal" role="form" method="post">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Thành viên</label>
                    <div class="col-sm-8">
                    <?php
						foreach($info as $v)
						{
					?>
                      <input type="text" class="form-control"  name='member[ten]' value="<?php echo $v['HOTEN'];?>">
                      <input type="text" class="form-control"  name='member[ma]' hidden=""  value= "<?php echo $v['MSTHANHVIEN'];?>" />
                      <?php
						}
					  ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label" class="bg-primary">Nội dung</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" rows="3" name='member[noidung]' placeholder="Nội dung"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label" class="bg-primary">Mức đánh giá</label>
                    <div class="col-sm-8">
                      <label class="radio-inline">
                     	 <input type="radio" name="member[r][0]" id="inlineRadio1" value="1"> Không tốt
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="member[r][1]" id="inlineRadio2" value="2"> Bình thường
                      </label>
                      <label class="radio-inline">
                       <input type="radio" name="member[r][2]" id="inlineRadio3" value="3"> Tốt
                      </label>
                       <label class="radio-inline">
                       <input type="radio" name="member[r][3]" id="inlineRadio3" value="4"> Rất tốt
                      </label>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-10">
                      <input type="submit" class="btn btn-primary" name='btnGopY' value="Góp ý"></input>
                      &nbsp; &nbsp; &nbsp; &nbsp;
                      <input type="submit" class="btn btn-danger" name='btnHuy'  value="Hủy" ></input>
                    </div>
               
                  </div>
            </form>
			</div>
   	 </div>
</div>
</section>