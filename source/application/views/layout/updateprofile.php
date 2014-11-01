<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>C?p nh?t thông tin cá nhân-Website tìm ki?m nhà tr? TP C?n Tho</title>
		<script src='public/template/js/jquery-2.1.1.min.js'></script>
		<base href="<?php echo CIT_BASE_URL;?>" />
<!--		<link rel='stylesheet' href='public/template/css/home.css' />	-->
		<link rel="stylesheet" type="text/css" href="public/template/css/manageinfo/standardform.css">
		<link rel="stylesheet"	type="text/css" href="public/template/css/manageinfo/style.css" />

		<script language='javascript' src="public/template/js/search/advancedsearch.js" ></script>
		<script language='javascript'>
			function earseText()
			{
				document.getElementById("output").ten = "";
			}
		</script>
<link rel='stylesheet' href='public/template/css/index.css' />
<link rel="stylesheet" type="text/css" href="public/template/css/home/home.css">
<link rel="stylesheet" type="text/css" href="public/template/css/home/style.css">
	</head>
	<body>
		<?php 
			$this->load->view("layout/bluesky/top");
			$this->load->view($template,isset($data) ? $data : NULL);
			$this->load->view("layout/bluesky/bottom");
			?>
		
	</body>
</html>