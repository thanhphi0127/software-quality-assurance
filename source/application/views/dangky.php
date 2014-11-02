<script>
$(function() {
        /*$('#btn-register').click(function() {
                <!--var p = $('#pass').val();
                <!--var re_p = $('#re-pass').val();
                <!--if (p != re_p) {
                         'false';
                } else {
                }
        });*/
        $('#cancel').click(function() {
                $('.container').hide(1000);
        });
});
</script>

<div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading header">Đăng ký thành viên</div>
                    <div class="panel-body panelBody">
                        <div id="panel-body">
                                <form action="" method="post">
                                <!-- Ma so input-->
                                <div class="col-sm-6">
                                    <input type="text" name="member[ho]" value="<?php echo set_value('ho');?>" placeholder="Họ" class="form-control ho"/>
                                    <?php echo form_error('ho'); ?>
                                </div>
                            
                                <!-- Ho va ten input-->
                                <div class="col-sm-6">
                                    <input type="text" name="member[ten]" value="<?php echo set_value('ten');?>" placeholder="Tên" class="form-control ten"/>
                                    <?php echo form_error('ten'); ?>
                                </div>
                                    
                                
                                <div class="col-md-12">
                                    <input type="text" value="<?php echo set_value('username');?>" name="member[username]" placeholder="Tên đăng nhập" class="form-control username"/>
                                    <?php echo form_error('username'); ?>
                                </div>
                                
                                <div class="col-md-12">
                                    <input type="text" value="<?php echo set_value('email');?>" name="member[email]" placeholder="Email" class="form-control username"/>
                                    <?php echo form_error('email');?>
                                </div>
                                
                                <div class="col-md-12">
                                    <input id="pass" type="password"  value="<?php echo set_value('pass');?>" name="member[pass]" placeholder="Mật khẩu" class="form-control username"/>
                                    <?php echo form_error('pass');?>
                                </div>
                                
                                <div class="col-md-12">
                                    <input id="re_pass" value="<?php echo set_value('re_pass');?>" name="member[re_pass]" type="password" placeholder="Xác nhận mật khẩu" class="form-control username"/>
                                    <?php echo form_error('re_pass');?>
                                </div>
                                
                                <!--Ngay sinh input-->
                                <div class="col-md-4">
                                    <label class="col-md-12 control-label labelBirthday">Ngày sinh</label>
                                    <select name="member[day]" class="form-control day">
                                        <?php 
                                            for($i=1; $i<=31; $i++) {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <select name="member[month]" class="form-control month">
                                        <?php 
                                            for($i=1; $i<=12; $i++) {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <select name="member[year]" class="form-control year">
                                        <?php 
                                            $t = date('Y');
                                            for($i=$t; $i>=1900; $i--) {
												echo "<option value='$i'>$i</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <!-- Gioi tinh input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label labelSex">Giới tính</label>
                                    <div class="col-md-9 contentSex">
                                        <select name="member[sex]" class="form-control selectSex">
                                            <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!--btn dang ky -->
                                <div class="pull-right">
                                    <input type="submit" name="btn_register" class="btn btn-primary" value="Đăng ký"/>
                                    <input id="cancel" type="reset" class="btn btn-danger" value="Hủy đăng ký"/>
                                </div>
                            </form>
                        </div><!--end div css style-->
                    </div><!--end div panel-body-->
                </div><!--end div panel-->
            </div><!--end div col-md-6-->
        </div><!--end di row-->
   
    </div><!--end div container-->
