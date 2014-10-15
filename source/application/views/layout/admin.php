<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='keyword' content="<?php echo isset($seo['keyword']) ? htmlspecialchars($seo['keyword']) : '';?>" />
<meta name='description' content="<?php echo isset($seo['description']) ? htmlspecialchars($seo['description']) : '';?>" />
<title><?php echo isset($seo['title']) ? htmlspecialchars($seo['title']) : '';?></title>
<meta name="viewport" content="width=device-width" />
<base href="<?php echo CIT_BASE_URL;?>" />
<script src='public/template/js/jquery-2.1.1.min.js'></script>

<?php if ('admin/quanlynguoidung' == $template){
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/style.css'>";
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/quanlynguoidung.css'>";
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/custom.css'>";
				
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/bootstrap.css'>";
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/bootstrap-theme.min.css'>";

		    	echo "<script src='public/template/js/admin/jquery-ui-1.10.2.min.js'></script>";
    			echo "<script src='public/template/js/admin/bootstrap.js'></script>";
    			echo "<script src='public/template/js/admin/bootstrap.min.js'></script>";
				echo "<script src='public/template/js/admin/quanlysinhvien1.js'></script>";
				echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js'></script>";
				echo "<script src='public/template/js/admin/jquery.min.js'></script>";
				echo "<script src='public/template/js/admin/datatables/jquery.dataTables.js' type='text/javascript'></script>";
				echo "<script src='public/template/js/admin/datatables/dataTables.bootstrap.js' type='text/javascript'></script>";
				echo "<script type='text/javascript'>";
            	echo "$(function() {";
                echo "$('#example1').dataTable({";
                echo "    'bPaginate': true,";
                echo "    'bLengthChange': true,";
                echo "    'bFilter': true,";
                echo "    'bSort': true,";
				echo "	  'oPaginate': true,";
                echo "    'bInfo': true,";
                echo "    'bAutoWidth': false,";
				echo " 	 'bStateSave': true,";
                echo "});";
                echo "});";
                echo "</script>";
		
		}
		else if ('admin/duyetnhatro' == $template){
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/style.css'>";
				
		}
		else if ('admin/duyettintuc' == $template ) {
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/style.css'>";
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/quanlysinhvien.css'>";
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/custom.css'>";
				
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/bootstrap.css'>";
				echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/bootstrap-theme.min.css'>";

		    	echo "<script src='public/template/js/admin/jquery-ui-1.10.2.min.js'></script>";
    			echo "<script src='public/template/js/admin/bootstrap.js'></script>";
    			echo "<script src='public/template/js/admin/bootstrap.min.js'></script>";
				echo "<script src='public/template/js/admin/quanlysinhvien1.js'></script>";
				echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js'></script>";
				echo "<script src='public/template/js/admin/jquery.min.js'></script>";
				echo "<script src='public/template/js/admin/datatables/jquery.dataTables.js' type='text/javascript'></script>";
				echo "<script src='public/template/js/admin/datatables/dataTables.bootstrap.js' type='text/javascript'></script>";
				echo "<script type='text/javascript'>";
            	echo "$(function() {";
                echo "$('#example1').dataTable({";
                echo "    'bPaginate': true,";
                echo "    'bLengthChange': true,";
                echo "    'bFilter': true,";
                echo "    'bSort': true,";
				echo "	  'oPaginate': true,";
                echo "    'bInfo': true,";
                echo "    'bAutoWidth': true,";
				echo " 	 'bStateSave': true,";
                echo "});";
                echo "});";
                echo "</script>";
		}
		
?>

<body>

<?php 
	$this->load->view("layout/bluesky/top");
	$this->load->view($template, isset($data)?$data:NULL);
	$this->load->view("layout/bluesky/bottom");
?>

</body>
</html>

