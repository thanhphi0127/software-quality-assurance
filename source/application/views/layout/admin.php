<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='keyword' content="<?php echo isset($seo['keyword']) ? htmlspecialchars($seo['keyword']) : '';?>" />
<meta name='description' content="<?php echo isset($seo['description']) ? htmlspecialchars($seo['description']) : '';?>" />
<title><?php echo isset($seo['title']) ? htmlspecialchars($seo['title']) : '';?></title>
<meta name="viewport" content="width=device-width" />
<base href="<?php echo CIT_BASE_URL;?>" />



<!--of home-->
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='keyword' content="<?php echo isset($seo['keyword']) ? htmlspecialchars($seo['keyword']) : '';?>" />
<meta name='description' content="<?php echo isset($seo['description']) ? htmlspecialchars($seo['description']) : '';?>" />
<title><?php echo isset($seo['title']) ? htmlspecialchars($seo['title']) : '';?></title>
<meta name="viewport" content="width=device-width" />
<base href="<?php echo CIT_BASE_URL; ?>" />

<link rel="stylesheet" type="text/css" href="public/template/css/standardform.css">
<link rel='stylesheet' href='public/template/css/index.css' />
<script src='public/template/js/jquery-2.1.1.min.js'></script>
<script language='javascript' src="public/template/js/home.js" ></script>
<!-- <link rel="stylesheet" type="text/css" href="public/template/css/home/bootstrap.css">-->
<link rel="stylesheet" type="text/css" href="public/template/css/home/css-dangky.css">


<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" href="public/template/css/style.css" media="screen">
<!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
<link rel="stylesheet" href="public/template/css/style.responsive.css" media="all">
<script src="public/template/js/jquery.js"></script>
<script src="public/template/js/script.js"></script>
<script src="public/template/js/script.responsive.js"></script>
	
<!--end of home-->

<script src='public/template/js/jquery-2.1.1.min.js'></script>
<link rel='stylesheet' href='public/template/css/index.css' />
<link rel="stylesheet" type="text/css" href="public/template/css/home/home.css">
<link rel="stylesheet" type="text/css" href="public/template/css/home/style.css">
<script src='public/template/js/result.js'></script>
<link rel="stylesheet" type="text/css" href="public/template/css/result.css">

<?php
	if($template == 'admin/duyetnhatro')
	{
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/bootstrap.css' />";
	}
	else if($template == 'admin/duyettintuc')
	{
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/bootstrap.css'/> ";
	}
	else if($template == 'admin/duyettungtin')
	{
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/admin/bootstrap.csscss/admin/bootstrap.css'/> ";
	}
	else if ('admin/quanlynguoidung' == $template){
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
	
?>


<body>

<?php 

	$this->load->view ('layout/standardlayout', isset($data)?$data:NULL);

?>

</body>
</html>

