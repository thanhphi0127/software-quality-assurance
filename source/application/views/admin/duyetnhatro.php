<script type="text/javascript">
	function trimSpace(str) {
		return str.replace(/^\s*/, "").replace(/\s*$/, "");
	}
</script>

<script>
	$(function(){
		$('.btn_delete').click(function(){
			var ma_nhatro = $(this).parent('td').parent('tr').find($('.layma')).html();
			ma_nhatro = trimSpace(ma_nhatro);
			$('#dl_ma_nhatro').attr('value', ma_nhatro);
			$('#delete_nhatro').show();
			
		});
		
		$('#delete_cancel').click(function() {
			$('#delete_nhatro').hide();
		});
	});
</script>

<div id="delete_nhatro" role="dialog" style="position:absolute; margin-left: 355px; display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Xác nhận xóa</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <!--<img src="<?php echo CIT_BASE_URL?>public/img/warning-6-256.png" width="19px" height="19px"/>-->
                        Bạn có chắc xóa không?
                    </div>
                </div>
                
                <!-- Save data to tranfer to controller-->
                <input type="hidden" name="delete[ma_nhatro]" id="dl_ma_nhatro"/>
                <!--<input type="text" id="dl_ma_chude"/>-->
                
                
                <div class="modal-footer clearfix">
                    <input type="submit" value="Yes" name="btn_delete" class="btn btn-warning" />
                    <button type="button" id="delete_cancel" class="btn btn-warning"> No</button>
                </div>                
            </form>
        </div>
    </div>
</div>

<section class='cit_timkiemnhatro'>
	<!-- Nội dung bên trong -->
 <div class="container">
	
    <form method="post" action =''>
    	<h3>Nhà trọ chưa duyệt</h3>

        <table width="80%"  class="table table-bordered">
			<tr>
				<td colspan="6">
							<?php if ($info['count'] > 10) {
									$data['result']['count'] = $info['count'];
										$this->load->view('layout/pagination', $data);
								}
							?>
				</td>
			</tr>
            <tr class="danger">
                <th class="cotSTT">Chọn</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Địa chỉ</th>
                <th>Duyệt</th>
                <th>Hủy</th>
            </tr>
            <?php
                foreach($info as $v)
                {                   
                    echo "<tr class='result_chuaduyet result'>";
                    echo "<td><input type='checkbox' name = member[] value='".$v['MA_NHATRO']."'/></td>";
                    echo "<td hidden class='layma'>
                            ".$v['MA_NHATRO']."
                        </td>";
                    echo "<td class='cotText'><a href='http://localhost/timkiemnhatro/admin/duyettungnhatro/".$v['MA_NHATRO']."'>".$v['HOTEN']."</a></td>";
                    echo "<td class='cotText'><a href='http://localhost/timkiemnhatro/admin/duyettungnhatro/".$v['MA_NHATRO']."'>".$v['MOTA']."</a></td>";
					echo "<td class='cotText'><a href='http://localhost/timkiemnhatro/admin/duyettungnhatro/".$v['MA_NHATRO']."'>".$v['diachi']."</a></td>";
                    echo "<td><a class='cotNutChucNang' href='http://localhost/timkiemnhatro/admin/duyettungnhatro/".$v['MA_NHATRO']."'><input type='button' value='Duyệt'/></a></td>";
                    echo "<td>
                            <input type='button' class='btn_delete' value='Xoa' />
                        </td>";
                    echo "</tr>";
                }
           ?>
		   <tr>
				<td colspan="6">
					<?php if ($info['count'] > 10) {
			
								$this->load->view('layout/pagination');
									
						}
					?>
				</td>
			</tr>
           <tr>
                <td colspan="6"> <!--<input type="submit" name="btnDuyetNhaTro" value="Duyệt nhà trọ" class="nutnhan1"/>-->
                     <button type="submit" class="btn btn-primary" name='btnDuyetNhaTro'>Duyệt nhà trọ</button>
                </td>
            </tr>
			
    </table>
	

    <!--danh sach nha tro da duyet-->
    
		<h3>Nhà trọ đã duyệt</h3>
		
        <table width="100%" class="table table-bordered">
			<tr>
				<td colspan="5">
					<?php if ($data_info['count'] > 10) {
							$data['result']['count'] = $data_info['count'];
							$this->load->view('layout/pagination', $data);
						}
					?>
				</td>
			</tr>
            <tr class="danger">
                <th class="cotSTT">Chọn</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Địa chỉ</th>
                <th>Xóa</th>
                
            </tr>
            <?php
                foreach($data_info as $b)
                {
                    echo "<tr class='result_daduyet result'>";
                    echo "<td><input name = daduyet[] value='".$b['MA_NHATRO']."' type='checkbox' class='cotNutChucNang' value='".$b['MA_NHATRO']."' /></td>";
					 echo "<td hidden class='layma'>
                            ".$b['MA_NHATRO']."
                        </td>";
                    echo "<td class='cotText'><a href='#'>".$b['HOTEN']."</a></td>";
                    echo "<td class='cotText'><a href='#'>".$b['MOTA']."<a></td>";
					echo "<td class='cotText'><a href='#'>".$b['diachi1']."<a></td>";
                  //  echo "<td><a class='cotNutChucNang' href='http://localhost/timkiemnhatro/admin/xoatungnhatro/".$b['MA_NHATRO']."'><input type='button' value='Xóa'/></a></td>";
					 echo "<td>
                            <input type='button' class='btn_delete' value='Xoa' />
                        </td>";
                    echo "</tr>";
                }
            ?>
		<tr>
			<td colspan="5">
				<?php if ($data_info['count'] > 10) {
				
						$this->load->view('layout/pagination');
					}
				?>	
			</td>
		</tr>
         <tr>
        	<td colspan="5"><button type="submit" class="btn btn-primary" name='btnXoaNhaTro'>Xóa nhà trọ</button></td>
        </tr> 
		
    </table>
	
		
 </form>
 </div>
</section>