<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='keyword' content="<?php echo isset($seo['keyword']) ? htmlspecialchars($seo['keyword']) : '';?>" />
<meta name='description' content="<?php echo isset($seo['description']) ? htmlspecialchars($seo['description']) : '';?>" />
<title><?php echo isset($seo['title']) ? htmlspecialchars($seo['title']) : '';?></title>
<meta name="viewport" content="width=device-width" />
<base href="<?php echo CIT_BASE_URL; ?>" />

<link rel="stylesheet" type="text/css" href="public/template/css/standardform.css">
<link rel='stylesheet' href='public/template/css/home.css' />
<link rel='stylesheet' href='public/template/css/index.css' />


<script src='public/template/js/jquery-2.1.1.min.js'></script>
<script language='javascript' src="public/template/js/home.js" ></script>


<?php
	if ('home/index' == $template || 'home/' == $template) {
	echo  '<link rel="stylesheet" type="text/css" href="public/template/css/home/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="public/template/css/home/bootstrap-theme.min.css">
			<link rel="stylesheet" type="text/css" href="public/template/css/home/custom.css">
			<link rel="stylesheet" type="text/css" href="public/template/css/home/font-awesome.css">
			<link rel="stylesheet" type="text/css" href="public/template/css/home/style.css">
			<link rel="stylesheet" type="text/css" href="public/template/css/home/ionicons.css">
			<link rel="stylesheet" type="text/css" href="public/template/css/home/home.css">
			<link rel="stylesheet" type="text/css" href="public/template/css/home/ionicons.min.css">';
	}
	
	
?>
</head>

<body>

<?php 
	$this->load->view("layout/bluesky/top");
	$this->load->view ($template, isset($data)?$data:NULL);
	$this->load->view("layout/bluesky/bottom");
?>

</body>
</html>

