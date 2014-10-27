<section class='cit_timkiemnhatro'>
	<!-- Nội dung bên trong -->
  <div class="container">
   <h2>Quản lý đăng tin</h2>
    <div class="row">
            <div class="panel panel-primary" style="width: 700px">
              <div class="panel-heading">Duyệt tin</div>
              <div class="panel-body">
              	  <form class="form-horizontal" role="form" method="post">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Xem tin</label>
                    <div class="col-sm-8">
                    <?php
						foreach($data_info as $v)
						{
					?>
                      <input type="text" class="form-control"  name='member[ten]' value="<?php echo $v['TIEUDE'];?>" readonly="readonly">
                      <input type="text" class="form-control"  name='member[ma]' hidden=""  value= "<?php echo $v['MA_DANGTIN'];?>" />
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label" class="bg-primary">Nội dung</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" rows="3" name='member[noidung]' placeholder="Nội dung" readonly="readonly"><?php echo $v['NOIDUNG']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Ngày đăng</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  name='member[ten]' value="<?php echo $v['NGAYDANG'];?>" readonly="readonly">
                    </div>
                    <label for="inputEmail3" class="col-sm-3 control-label">Người đăng</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  name='member[ten]' value="<?php echo $v['HOTEN'];?>" readonly="readonly">
                    </div>
                  </div>
                  <?php
						}
				  ?>
                  <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-10">
                      <input type="submit" class="btn btn-primary" name='btnDuyetTin' value="Duyệt tin"></input>
                      &nbsp; &nbsp; &nbsp; &nbsp;
                      <input type="submit" class="btn btn-danger" name='btnHuy'  value="Hủy" ></input>
                    </div>
               
                  </div>
            </form>
			</div>
   	 </div>
</div>
  
</section>