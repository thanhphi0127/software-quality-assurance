<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='keyword' content="<?php echo isset($seo['keyword']) ? htmlspecialchars($seo['keyword']) : '';?>" />
<meta name='description' content="<?php echo isset($seo['description']) ? htmlspecialchars($seo['description']) : '';?>" />
<title><?php echo isset($seo['title']) ? htmlspecialchars($seo['title']) : '';?></title>
<meta name="viewport" content="width=device-width" />
<base href="<?php echo CIT_BASE_URL;?>" />

<link rel="stylesheet" type="text/css" href="public/template/css/login.css">
<link rel="stylesheet" type="text/css" href="public/template/css/home_index.css">
<link rel="stylesheet" type="text/css" href="public/template/css/bootstrap.css">
<link rel='stylesheet' type='text/css' href='public/template/css/bootstrap.min.css'>
<link rel='stylesheet' type='text/css' href='public/template/css/bootstrap.css'>

<script src='public/template/js/login.js' language='javascript'></script>
<script src='public/template/js/jquery-2.1.1.min.js'></script>

<!--Them vao-->
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
<link rel="stylesheet" type="text/css" href="public/template/css/index-include.css">
<script src="public/template/js/index-include.js"></script>


<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" href="public/template/css/style.css" media="screen">
<!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
<link rel="stylesheet" href="public/template/css/style.responsive.css" media="all">
<script src="public/template/js/jquery.js"></script>
<script src="public/template/js/script.js"></script>
<script src="public/template/js/script.responsive.js"></script>
	
<!--end of home-->

<!--/Them vao-->


<script>
	$(document).ready(function(){
		$('#intro').show();
		$('.form').css('float','left');
		$('.name-home').hide();
		
	});
</script>
</head>

<body>
<?php 
	
	$this->load->view ('layout/standardlayout', isset($data)?$data:NULL);
	
	
?>
</body>
</html>
