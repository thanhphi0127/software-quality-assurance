<section class='cit_timkiemnhatro'>
<div class="container">
    <div class="row">
            <div class="panel panel-primary" style="width: 700px">
              <div class="panel-heading">Đăng tin</div>
              <div class="panel-body">
              	  <form class="form-horizontal" role="form" method="post">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Tên người đăng</label>
                    <div class="col-sm-8">
                     <?php
						foreach($name as $v)
							{
					?>
                      <input type="text" class="form-control"  name='member[ten]' value= "<?php echo $v['HOTEN'];?>">
                      <input type="text" class="form-control"  name='member[ma]' hidden=""  value= "<?php echo $v['MSTHANHVIEN'];?>" />
                    </div>
					<?php
							}
					?>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Tiêu đề</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name='member[tieude]'  placeholder="Tiêu đề">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label" class="bg-primary">Nội dung</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" rows="3" name='member[noidung]' placeholder="Nội dung"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-6 col-sm-10">
                      <input type="submit" class="btn btn-primary" name='btnDangTin' value="Đăng tin"></input>
                      &nbsp; &nbsp; &nbsp; &nbsp;
                      <input type="submit" class="btn btn-danger" name='btnHuy'  value="Hủy" ></input>
                    </div>
               
                  </div>
            </form>
			</div>
   	 </div>
</div>
</section>